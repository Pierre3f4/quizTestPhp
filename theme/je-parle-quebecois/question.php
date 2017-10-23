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
		$output .= animationIn($idQuestion);
		$output .= animationOut($idQuestion);
		return $output;
	}

	function themeAnimation($idQuestion){
		if($idQuestion==1){
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
			</div>';
		}
	}
	function animationIn($idQuestion){
		if($idQuestion==1){
			return '
			<script type="text/javascript">
					var animationIn = new TimelineMax();
					animationIn.add(
						TweenMax.fromTo($(".scene"), 2, {opacity : 0},  {opacity : 1})
					);
					animationIn.add(
						TweenMax.fromTo($("#etoiles-filantes"), 5, {x:750, y:-150},  {x:-750, y:150}), 0
					);
					animationIn.add(
						TweenMax.fromTo($("#asteroid"), 5, {x:500, y:50, rotation:0},  {x:-500, y:250, rotation:-50}), 0
					);
					animationIn.add(
						TweenMax.fromTo($("#map-monde"), 5, {backgroundPosition: "0px 0px"},  {backgroundPosition: "-615px 0px"}), 0
					);
					//rebond
					animationIn.add(
						TweenMax.to($("#globe"), 2, {ease: Power4.easeInOut, y: "500px", scale:1.5}), 5
					);
					animationIn.add(
						TweenMax.to($("#asteroid"), 2, {ease: Power4.easeInOut, y: "450px", scale:1.5}), 5
					);
					animationIn.add(
						TweenMax.to($("#etoiles-filantes"), 2, {ease: Power4.easeInOut, y: "400px, scale:1.5"}), 5
					);
					animationIn.add(
						TweenMax.fromTo($(".question-inner"), 2, {y:-300, opacity:0, scale:.5}, {y: 0, opacity:1, scale:1, ease: Power4.easeInOut}), 5
					);
					

					animationIn.pause();
					
			</script>
			';
		}else{
			return '
				<script type="text/javascript">
							animationIn = "";
				</script>
			';
		}
	}
	function animationOut($idQuestion){
		if($idQuestion==1){
			return '
				<script type="text/javascript">
							animationOut = new TimelineMax();

							animationOut.add(
								TweenMax.to($("#etoiles-filantes"), 2, { opacity: 0}), 0
							);
							animationOut.add(
								TweenMax.to($("#asteroid"), 2, { opacity: 0}), 0
							);
							animationOut.add(
								TweenMax.to($(".question-inner"), 2, {scale:0, ease: Power4.easeInOut}), 0
							);
							animationOut.add(
								TweenMax.to($(".question-inner"), 1.5, {y:-500, opacity:0, ease: Power4.easeInOut}), .5
							);
							animationOut.add(
								TweenMax.to($("#globe"), 2, {scale:0, ease: Power4.easeInOut}), 0
							);
							animationOut.add(
								TweenMax.to($("#globe"), 2, {y:-500, opacity:0, ease: Power4.easeInOut}), 0
							);
							animationOut.add(
								TweenMax.to($(".stars"), 1, {opacity:0, scale:.5}), 1.5
							);
							animationOut.pause();


				</script>
			';
		}else{
			return '
				<script type="text/javascript">
							animationOut = "";
				</script>
			';
		}
	}

?>