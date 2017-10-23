    <script type="text/javascript">
		var idOptionActive="";
		var points=0;
		animationOut = "";
		animationIn = "";
		
        function ajaxToControler(){
        	$.ajax({
		       url : 'php/controler.php',
		       type : 'POST',
		       data: {idOptionActive},

		       success: function(data){
		       		
		       		console.log(data);
		       		data=JSON.parse(data);

			        if(typeof data['checkPoint'] != "undefined" && data['checkPoint'] != null){
			        	checkPoint(data['checkPoint']);
			        }
			        if(typeof data['feedback'] != "undefined" && data['feedback'] != null && data['feedback'].length > 0){
			        	//on affiche le feedback et le bouton suivant
			        	$('.question-wrapper .btn-next-question').before('<div class="feedback">' + data['feedback'] + '</div>');
			        }
			        $('.btn-next-question').show();
		        	$('.submit-question').hide();

			        if(idOptionActive == ''){
		        		$('.question-wrapper').html(data['render']);
		        		questionInit();
			        }
		        	$('.btn-next-question').on( "click", function(){
		        			if(animationOut!==""){
		        				$(".question-wrapper").addClass("transition");
		        				animationOut.addCallback(function(){
		        					$(".question-wrapper.transition").removeClass("transition");
		        					$('.question-wrapper').html(data['render']);
		        					questionInit();
		        				});
		        				animationOut.play();
		        			}else{
		        				$('.question-wrapper').html(data['render']);
		        				questionInit();
		        			}
		        			
					});


			    }
		    });
        }


		function questionInit(){
			$('.submit-question').hide();
			$('.btn-next-question').hide();
			$('.option').addClass('available');
			$(document).on( "click", '.option.available', function(){
				$('.option').removeClass("selected");
				$(this).addClass("selected");
				$('.submit-question').show();
	        	idOptionActive = $(this).attr("option-id");
			});

			$('#btn-start').on( "click", function(){
	        	ajaxToControler();
	        });
	        $('.submit-question').on( "click", function(){
	        	$('.option.available').removeClass('available');
	        	ajaxToControler();
			});

			if(animationIn!==""){
				$(".question-wrapper").addClass("transition");
				animationIn.addCallback(function(){
		        	$(".question-wrapper.transition").removeClass("transition");
		        });
		        animationIn.play();
			}
		}
		questionInit();

		function checkPoint(checkPoint){
			$.each(checkPoint, function( index, value ) {
				console.log( index + ": " + value );
				//on ajoute les class de correction
				if(value==0){
					$('.option[option-id=' + index + ']').addClass('bad');
				}else{
					$('.option[option-id=' + index + ']').addClass('good');
				}
				//on compte les points
				if($('.option[option-id=' + index + ']').hasClass('selected')){
					points = points+parseInt(value);
				}
			});
			$('#points-counter').html(points);
		}
    </script>
