<?php

	if($_POST){
		if(!empty($_POST['idOptionActive'])){
			$idOptionActive= $_POST['idOptionActive'];
			$checkPoint = array();
			$feedbackQuestionActive="";
			include('../config.php');
			include('classes/question.class.php');
			include('../' . $themePath . 'question.php');
			$pdo=new PDO('mysql:host=' . $bdd['host'] . ';dbname=' . $bdd['dbname'], $bdd['user'], $bdd['pwd'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


			if($idOptionActive=="-1"){
				//Si on est sur intro, on start le quiz en appelant la question 1
				$idNextQuestion = 1;
			}else{
				//on gère les infos à renvoyer à ajax.php dans le cas d'un nouvel affichage de question
				//on récupère les données de BDD
				
				//Exécute une requête préparée en passant un tableau de valeurs
				$sql = 'SELECT * FROM options WHERE id_option = :id';
				$sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$sth->bindParam(':id', $idOptionActive, PDO::PARAM_INT);
				$sth->execute();
				//définition de la question suivante
				$optionActive = $sth->fetchAll();
				$idNextQuestion = $optionActive[0]['next_question'];
				$idQuestionActive = $optionActive[0]['question'];
				//définition des bonnes réponses
				//on récupère l'ensemble des options reliées a la question active
				$sql = 'SELECT * FROM options WHERE question = :id';
				$sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$sth->bindParam(':id', $optionActive[0]['question'], PDO::PARAM_INT);
				$sth->execute();
				//on utilise cette liste d'option pour lister les bonnes réponses
				
				foreach ($sth->fetchAll() as $key => $value) {
					$checkPoint[$value['id_option']]=$value['point'];
				}
				//print_r($checkPoint);

				//on récupère l'ensemble des champs de la question active pour récup le feedback
				$sql = 'SELECT * FROM questions WHERE id_question = :id';
				$sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$sth->bindParam(':id', $idQuestionActive, PDO::PARAM_INT);
				$sth->execute();
				$questionActive = $sth->fetchAll();
				$feedbackQuestionActive = $questionActive[0]['feedback'];
			}
			
			if($idNextQuestion==NULL){
				//si pas de prochaine question, on affiche la conclusion
				$data = ['render' => $conclusion, 'checkPoint' => $checkPoint, 'feedback' => $feedbackQuestionActive];	
			}else{
				$nextQuestion = new Question($idNextQuestion);
				$data = ['render' => $nextQuestion->render(), 'checkPoint' => $checkPoint, 'feedback' => $feedbackQuestionActive];			
			}
			$data=json_encode($data);
			print ($data);


		}else{
			echo 'pas de $_POST[\'idOptionActive\']';
		}
	}else{
		echo 'Aucune données passées avec la méthode POST';
	}


