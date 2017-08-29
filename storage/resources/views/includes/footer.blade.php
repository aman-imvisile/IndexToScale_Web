
@include('frontend.components.login_register_modal')
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
		  $('.hex_ques').click(function() {
                $('.ques_menu').slideToggle("");
        });
    });
</script> 

<script type="text/javascript">

      $( 'ul.nav.nav-tabs  a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          $( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>

