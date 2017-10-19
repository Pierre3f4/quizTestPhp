    <script type="text/javascript">
		var idOptionActive="";
		var points=0;
		
        function ajaxToControler(){
        	$.ajax({
		       url : 'php/controler.php',
		       type : 'POST',
		       data: {idOptionActive},

		       success: function(data){
		       		

		       		data=JSON.parse(data);

					console.log(data);


			        if(typeof data['checkPoint'] != "undefined" && data['checkPoint'] != null){
			        	checkPoint(data['checkPoint']);
			        }
			        if(typeof data['feedback'] != "undefined" && data['feedback'] != null && data['feedback'].length > 0){
			        	//on affiche le feedback et le bouton suivant
			        	$('.question-wrapper .btn-next-question').before('<div class="feedback">' + data['feedback'] + '</div>');
			        }
			        $('.btn-next-question').show();
		        	$('.submit-question').hide();

		        	$('.btn-next-question').on( "click", function(){
		        		$('.question-wrapper').html(data['render']);
		        		questionInit();
					});

			        if(idOptionActive == '-1'){
		        		$('.question-wrapper').html(data['render']);
		        		questionInit();
			        }
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
			});
			
			$('#btn-start').on( "click", function(){
	        	idOptionActive = '-1';
	        	ajaxToControler();
	        });
	        $('.submit-question').on( "click", function(){
	        	$('.option.available').removeClass('available');
	        	idOptionActive = $('.option.selected').attr("option-id");
	        	ajaxToControler();
			});
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
