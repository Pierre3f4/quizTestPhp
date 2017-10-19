<?php
	function themeQuestion($libele, $options, $submit, $next){
		$output = "";
		$output .= "<div class='container'>";
			$output .= "<div class='row'>";
				$output .= "<div class='col-md-8 col-md-offset-2'>";
					$output .= "<div class='libele-wrapper'><h3>$libele</h3></div>";
					$output .= $options;
					$output .= $submit;
					$output .= $next;
				$output .= "</div>";
			$output .= "</div>";
		$output .= "</div>";
		return $output;
	}
?>