<?php

class Question {
	protected $libele;
	protected $questionType;
	protected $id_question;
	protected $options;



	public function __construct($id){

		//on récupère les données de BDD
		global $pdo;
		/* Exécute une requête préparée en passant un tableau de valeurs */
		$sql = 'SELECT * FROM questions WHERE id_question = :id';
		$sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$sth->bindParam(':id', $id, PDO::PARAM_INT);
		$sth->execute();
		$sqlQuestion = $sth->fetchAll();


		$sql = 'SELECT * FROM options WHERE question = :id';
		$sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$sth->bindParam(':id', $id, PDO::PARAM_INT);
		$sth->execute();
		$sqlOptions = $sth->fetchAll();



		if(!empty($sqlQuestion)){
			$this->libele = $sqlQuestion[0]['libele'];
			$this->id_question = $sqlQuestion[0]['id_question'];
			$this->questionType = $sqlQuestion[0]['question_type'];
			$this->options = $sqlOptions;
		}else{
			print 'Erreur, on essaie de créer une question avec un id non existant dans la base.';
		}
	}

	public function getLibele(){
		return $this->libele;
	}
	public function getQuestionType(){
		return $this->questionType;
	}
	public function getIdQuestion(){
		return $this->questionType;
	}
	public function getOptions(){
		return $this->options;
	}
	public function render(){
		$libele= $this->libele;
		$options = "";
		foreach ($this->options as $key => $value) {
			if($this->questionType == "multichoise"){
				$options .= "<div class='option option-multichoise' option-id='$value[id_option]'>$value[libele]</div>";
			}
		}
		$submit = "<button class='submit-question'>Suivant</button>";
		return themeQuestion($libele, $options, $submit);
	}
	public function getQuestionObject(){
		$thisQuestion = array(
			"libele" => $this->libele,
			"questionType" =>$this->questionType,
			"id_question" => $this->id_question,
			"options" => $this->options
		);
		return $thisQuestion;
	}
}


