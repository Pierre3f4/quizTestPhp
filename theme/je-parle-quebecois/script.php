<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/easing/EasePack.min.js"></script>

<!--
<script type="text/javascript">
	$(document).ready(function () {
		var earthIn = new TimelineMax({onComplete:function(){$('.wrapper-question.transition').removeClass('transition');}});

		earthIn.add(
			TweenMax.fromTo($('.scene'), .5, {opacity : 0},  {opacity : 1})
		);
		earthIn.add(
			TweenMax.fromTo($('#etoiles-filantes'), 5, {x:750, y:-150},  {x:-750, y:150}), 0
		);
		earthIn.add(
			TweenMax.fromTo($('#asteroid'), 5, {x:500, y:50},  {x:-500, y:250}), 0
		);
		earthIn.add(
			TweenMax.fromTo($('#map-monde'), 5, {backgroundPosition: "0px 0px"},  {backgroundPosition: "-615px 0px"}), 0
		);
		//rebond
		earthIn.add(
			TweenMax.to($('#globe'), 5, {ease: Elastic.easeOut.config(1, 0.3), y: "300px"}), 5
		);
		earthIn.add(
			TweenMax.to($('#asteroid'), 5, {ease: Elastic.easeOut.config(1, 0.3), y: "450px"}), 5
		);
		earthIn.add(
			TweenMax.to($('#etoiles-filantes'), 5, {ease: Elastic.easeOut.config(1, 0.3), y: "400px"}), 5
		);
		earthIn.add(
			TweenMax.to($('#question-wrapper'), 5, {ease: Elastic.easeOut.config(1, 0.3), y: "0px"}), 5
		);
		earthIn.add(
			TweenMax.fromTo($('.question-inner'), 5, {y:-700}, {y: 0, ease: Elastic.easeOut.config(1, 0.3)}), 5
		);
		

		earthIn.pause();
		
	});
    
</script>
-->