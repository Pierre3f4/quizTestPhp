<?php
	function themeQuestion($libele, $options, $submit, $next, $idQuestion){
		$output = "";

		$output .= "<div class='question-inner'>";
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
			$output .= "</div>";
		$output .= "</div>";
		$output .= themeAnimation($idQuestion);
		return $output;
	}

	function themeAnimation($idQuestion, $inOut = false){
		if($idQuestion==1 && $inOut == false){
			return '
			
			<div class="scene-wrapper">
				<div class="stars"></div>
				<div class="scene">
					<div id="globe">
						<div id="map-monde">
						</div>
					</div>
					<div id="etoiles-filantes"></div>
					<div id="asteroid"></div>
				</div>
			</div>
			<script type="text/javascript">
				$(".wrapper-question").addClass("transition");
				$(document).ready(function () {
					var earthIn = new TimelineMax({onComplete:function(){$(".wrapper-question.transition").removeClass("transition");}});
					earthIn.add(
						TweenMax.fromTo($(".scene"), .5, {opacity : 0},  {opacity : 1})
					);
					earthIn.add(
						TweenMax.fromTo($("#etoiles-filantes"), 5, {x:750, y:-150},  {x:-750, y:150}), 0
					);
					earthIn.add(
						TweenMax.fromTo($("#asteroid"), 5, {x:500, y:50},  {x:-500, y:250}), 0
					);
					earthIn.add(
						TweenMax.fromTo($("#map-monde"), 5, {backgroundPosition: "0px 0px"},  {backgroundPosition: "-615px 0px"}), 0
					);
					//rebond
					earthIn.add(
						TweenMax.to($("#globe"), 4, {ease: Elastic.easeOut.config(1, 0.3), y: "300px"}), 5
					);
					earthIn.add(
						TweenMax.to($("#asteroid"), 4, {ease: Elastic.easeOut.config(1, 0.3), y: "450px"}), 5
					);
					earthIn.add(
						TweenMax.to($("#etoiles-filantes"), 4, {ease: Elastic.easeOut.config(1, 0.3), y: "400px"}), 5
					);
					earthIn.add(
						TweenMax.fromTo($(".question-inner"), 2, {y:-700}, {y: 0, ease: Power4.easeOut}), 7
					);
					

					//earthIn.pause();
					
				});
				//earthIn.play();
			</script>
			';
		}else{
			return NULL;
		}
	}

?>