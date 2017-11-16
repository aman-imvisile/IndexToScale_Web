
<!-- 
@include('frontend.components.login_register_modal')
 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="{{URL::asset('public/frontend/js/loadingoverlay.min.js')}}"></script>
<script src="{{URL::asset('public/frontend/js/loadingoverlay_progress.min.js')}}"></script> 

<script type="text/javascript">

$(".alert2 .icon-heart-o").click(function(){
 $('.alert2 .icon-heart-o').toggleClass('icon-heart-o');
 //$(this).addClass('icon-heart2');
});

//Show user's settings or info
$("#user-info").on('click',function(){
	$("#menu-prop").css('display','block');
});

//Hide user's setting or info
 $(document).mouseup(function (e) {
     var popup = $("#menu-prop");
     if (!$('#user-info').is(e.target) && !popup.is(e.target) && popup.has(e.target).length == 0) {
         popup.hide(500);
     }
 });

$(document).ready(function() {
        $('.hex_help').click(function() {
        $('.help_menu').slideToggle("");
        });
		  $('.hex_ques').click(function(){
          $('.ques_menu').slideToggle("");
        });
    });
</script> 

<script type="text/javascript">

      $( 'ul.nav.nav-tabs  a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      });

      ( function( $ ) {
          // Test for making sure event are maintained
          $( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

</script>
<!-- user register Modal End -->
<script type="text/javascript">

  $("#user-login").on('click',function(){
  		if($('.filter_right').is(":visible"))
  		{ 
	     $('.filter_right').css('display','none');
	     }
	     else {
	     $('.filter_right').css('display','block');
	     }

 }); 
 //user Login

$('#headerloginUser').on('submit',function(e){
  e.preventDefault();
  // Show full page LoadingOverlay
    $.LoadingOverlay("show");
 var Formdata = {email:$("#headeremail").val(),password:$("#headerpassword").val(),_token:$("#header_token").val()};

    $.ajax({
        url: "{{url('frontend/user/login')}}",
        data: Formdata, 
        type: 'POST',
        success: function(data){
        	
          var loginObj=jQuery.parseJSON(JSON.stringify(data));
          if(loginObj.success==true){
          	   // Hide it after 1 seconds
	 		   setTimeout(function(){
     		   $.LoadingOverlay("hide");
	 		   }, 1000); 
             window.location.reload();
          
          } else {
				  // Hide it after 1 seconds
	 		   setTimeout(function(){
     		   $.LoadingOverlay("hide");
	 		   }, 1000);
				printErrorMsg(loginObj.validator);
		}
	}
       
    });
    
});

//user register
$('#headeruserRegister').on('submit',function(e){
  // Show full page LoadingOverlay
    $.LoadingOverlay("show");
  e.preventDefault();


    $.ajax({
        url: "{{url('frontend/user/register')}}",
        data: new FormData($("#headeruserRegister")[0]), 
        dataType:'json',
      	async:false,
      	type:'post',
      	processData: false,
      	contentType: false,
        success: function(data){

          var reggisterObj= jQuery.parseJSON(JSON.stringify(data)); 
          if(reggisterObj.success==true){
             // Hide it after 1 seconds
	 		   setTimeout(function(){
     		   $.LoadingOverlay("hide");
	 		   }, 1000); 
			window.location.reload();
		   } else {
		   // Hide it after 2 seconds
	 		setTimeout(function(){
    		$.LoadingOverlay("hide");
	 		}, 1000); 
			printErrorMsg(reggisterObj.validator);
		
		}

        }
    });
    });
    ///error message function
    function printErrorMsg (msg) {

	$(".print-error-msg").find("ul").html('');

	$(".print-error-msg").css('display','block');

	$.each( msg, function( key, value ) {

		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');

	});

  }
  
  
  
  //toggle button for property Details

$('#btn-property-detail').on('click',function(){
	
	if($(this).hasClass('togle-butn-right'))
	{		
		    $('.residential_grid_ul > li').width('').width('15%');		
		  $(document).find('.residential_grid').width('80%');	
		  $('.input-group').width('89%');
		  $(this).removeClass('togle-butn-right').addClass('togle-butn-left');
		  $(this).find('i').removeClass('fa-chevron-left').addClass('fa-chevron-right');			
		  $('.filter_right').css('display','block');	
		  $('#view-single-property').css('display','none');
	    
	}	
	else if($(this).hasClass('togle-butn-left'))
	{
		$('.residential_grid_ul > li').width('').width('19%');	
		$(document).find('.residential_grid').width('100%');	
		$('.input-group').width('100%');	
		$(this).removeClass('togle-butn-left').addClass('togle-butn-right');
		$(this).find('i').removeClass('fa-chevron-right').addClass('fa-chevron-left');
		
		$('.property-detail-view').removeClass('image-bg');
		$('.filter_right').css('display','none');	
		$('#view-single-property').css('display','none');
	}	

});
 </script>  
    
