 $(document).ready(function(){
        $('.close').click(function(){
            $('#welcome').hide(1000);
        });     
       setTimeout(function(){ $('#welcome').hide(1000); }, 3000);
    });
$(document).ready(function(){
        $('#regLink').click(function(){	
			$('#frameLogIn').fadeOut();
            $('#overlay').fadeIn();           
			$('#frameReg').fadeIn();
		});

        $('#regLink1').click(function(){	
			$('#frameLogIn').fadeOut();
            $('#overlay').fadeIn();           
			$('#frameReg').fadeIn();
		});

        $('#loginLink').click(function(){
			$('#overlay').fadeIn();
            $('#frameReg').fadeOut();
			$('#frameLogIn').fadeIn();
		});

        $('#loginLink1').click(function(){
			$('#overlay').fadeIn();
            $('#frameReg').fadeOut();
			$('#frameLogIn').fadeIn();
		});

		$('#btnCallPost').click(function(){
			$('#overlay').fadeIn();
			$('#btnCallPost').fadeOut();
			$('#myPost').fadeIn();
		});

		$('#btnCancel').click(function(){
			$('#overlay').fadeOut();
			$('#myPost').fadeOut();
			$('#btnCallPost').fadeIn();

		});

		$('#btnCloss').click(function(){
			$('#overlay').fadeOut();
			$('#myPost').fadeOut();
			$('#frameImg').fadeOut();
		});

		$('#frameReg button,#frameLogIn button').click(function(){
			$('#overlay').fadeOut();
			$('#frameLogIn').fadeOut();
            $('#frameReg').fadeOut();
		});

		$('img').click(function(){
			var getImgSrc = $(this).attr('src');
			$('#frameImg img').attr('src',getImgSrc);
			$('#overlay').fadeIn();
			$('#frameImg').fadeIn();
		});

});