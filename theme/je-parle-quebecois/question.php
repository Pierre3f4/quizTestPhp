<?php
	function themeQuestion($libele, $options, $submit, $next){
		$output = "";

		$output .= "<div class='display-table'>";
			$output .= "<div class='display-cell'>";
				$output .= "<div class='container'>";
					$output .= "<div class='row'>";
						$output .= "<div class='col-md-8 col-md-offset-2'>";
							$output .= "<div class='libele-wrapper'><h3><span class='bg-marron'>$libele</span></h3></div>";
							$output .= "<div class='options-wrapper'>";
								$output .= "<div class='options-inner'>";
									$output .= $options;
								$output .= "</div>";
							$output .= "</div>";
							$output .= "<div class='submit-wrapper'>";
								$output .= $submit;
							$output .= "</div>";
							$output .= "<div class='feedback-wrapper'>";
								$output .= $next;
							$output .= "</div>";
						$output .= "</div>";
					$output .= "</div>";
				$output .= "</div>";
		$output .= "</div>";
		return $output;
	}
/*
	function themeAnimation($idQuestion, $inOut){
		if($idQuestion==1){
		}else{
			return NULL;
		}
	}
	*/
?>