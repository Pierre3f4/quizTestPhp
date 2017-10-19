<?php

	if($_POST){
		if(!empty($_POST['idOptionActive'])){
			$idOptionActive= $_POST['idOptionActive'];
			include('../config.php');
			include('classes/question.class.php');
			include('../' . $themePath . 'question.php');
			$pdo=new PDO('mysql:host=' . $bdd['host'] . ';dbname=' . $bdd['dbname'], $bdd['user'], $bdd['pwd'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


			if($idOptionActive=="-1"){
				//on start le quiz en appelant la question 1
				$idNextQuestion = 1;
			}else{
				//on continue le quiz
				//on récupère les données de BDD
				
				//Exécute une requête préparée en passant un tableau de valeurs
				$sql = 'SELECT * FROM options WHERE id_option = :id';
				$sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
				$sth->bindParam(':id', $idOptionActive, PDO::PARAM_INT);
				$sth->execute();
				$idNextQuestion = $sth->fetchAll();
				$idNextQuestion = $idNextQuestion[0]['next_question'];
			}
			
			if($idNextQuestion==NULL){
				//si pas de prochaine question, on affiche la conclusion
				print $conclusion;
			}else{
				$nextQuestion = new Question($idNextQuestion);

				$data = $nextQuestion->render();
	        	print ($data);				
			}


		}else{
			echo 'pas de $_POST[\'idOptionActive\']';
		}
	}else{
		echo 'Aucune données passées avec la méthode POST';
	}


