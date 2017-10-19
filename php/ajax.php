    <script type="text/javascript">
		var idOptionActive="";
        function ajaxToControler(){
        	$.ajax({
		       url : 'php/controler.php',
		       type : 'POST',
		       data: {idOptionActive},

		       success: function(data){
			        $('.question-wrapper').html(data);
			        questionInit();
			    }
		    });
        }


		function questionInit(){
			$('.submit-question').hide();
			$('.option').click(function(){
				$('.option').removeClass("selected");
				$(this).addClass("selected");
				$('.submit-question').show();
			});
			
			$('#btn-start').on( "click", function(){
	        	idOptionActive = '-1';
	        	ajaxToControler();
	        });
	        $('.submit-question').on( "click", function(){
	        	idOptionActive = $('.option.selected').attr("option-id");
	        	ajaxToControler();
			});
		}
		questionInit();
    </script>
