<script type="text/javascript">

$('body').on('click','.property-detail-view',function(){
	
	var th= $(this);
	var property_id=th.attr('property-id');
	var _token=$("#_token").val();
	//alert(property_id);
	// Show full page LoadingOverlay
    $.LoadingOverlay("show");	
	$.ajax({
	url: "{{url('property/viewsingleproperty')}}",
	type: 'post',
	datatype:'json',
	data:{property_id:property_id,_token:_token}	
	}).done(function(response){		
		
		
	 var obj = jQuery.parseJSON(JSON.stringify(response)); 	

	 if(obj.success==true){
	
	 var propertyHtml='';	
     propertyHtml +='<div class="result">';
     propertyHtml +='<div class="result-img"> <img src="'+obj.data.image+'" class="img-responsive">';
     propertyHtml +='<div class="result-text">';
     propertyHtml +='<div class="row">';
     propertyHtml +='<div class=" col-sm-1">';
     propertyHtml +='<div class="property_number">';
     propertyHtml +='<div class="hb-md-margin"><span class="hb1 hb-md1  color-bg1 color_white">90</span></div>';
     propertyHtml +='</div>';
     propertyHtml +='</div>';
     propertyHtml +='<div class="col-sm-8">';
     propertyHtml +='<div class="property-name">';
     propertyHtml +='<h3>'+obj.data.street_number+' '+obj.data.city+','+obj.data.country+'</h3>';
     propertyHtml +='<h4>'+obj.data.num_beds+' Beds | '+obj.data.num_baths+' Bath | '+obj.data.floor_area+' Sqft</h4>';
     propertyHtml +='</div>';
     propertyHtml +='</div>';
     propertyHtml +='<div class=" col-sm-3">';
     propertyHtml +='<div class="result-heart"> <span class="icon-heart-o"> </span> </div>';
     propertyHtml +='</div>';
     propertyHtml +='</div>';
     propertyHtml +='</div>';
     propertyHtml +='<div class="result-visit">';
     propertyHtml +='<h4>Visit <span>7</span></h4>';
     propertyHtml +='</div>';
     propertyHtml +='</div>';
     propertyHtml +='</div>';
     propertyHtml +='<div class="result-list">';
     propertyHtml +='<ul>';
     for(var i=0; i<obj.data.property_links.length; i++)
     {
     propertyHtml +='<li>';
     propertyHtml +='<div class="col-sm-3 "> <span class=""><i class="fa fa-ellipsis-v" aria-hidden="true"></i></span> <img src="'+obj.data.property_links[i].icon_image+'" class=""> </div>';
     propertyHtml +='<div class="col-sm-3 col-xs-3 no-padd">';
     propertyHtml +='<h4>'+obj.data.property_links[i].main_title+'</h4>';
     propertyHtml +='<h5>'+obj.data.property_links[i].small_title+'</h5>';
     propertyHtml +='</div>';
     propertyHtml +='<div class="col-sm-6 col-xs-9 text-right">';
     propertyHtml +='<h4>'+obj.data.property_links[i].main_title+'</h4>';
     propertyHtml +='<h5>'+obj.data.property_links[i].small_title+'</h5>';
     propertyHtml +='</div>';
     propertyHtml +='<div class="clearfix"></div>';
     propertyHtml +='</li>';
     }
     propertyHtml +='</ul>';
     propertyHtml +='</div>';		
     
     th.addClass('image-bg');
     th.closest('li').siblings().find('div').removeClass('image-bg');
      $('#btn-property-detail').removeClass('togle-butn-right').addClass('togle-butn-left');
	  $('#btn-property-detail').find('i').removeClass('fa-chevron-left').addClass('fa-chevron-right');
     $('#view-single-property').html(propertyHtml).show();
      
     }
        // Hide it after 2 seconds
	 setTimeout(function(){
     $.LoadingOverlay("hide");
	 }, 1000); 
     
	});
	
});

//Scroll top position setting
var elementPosition = $('#view-single-property').offset();
$(window).scroll(function(){
        if($(window).scrollTop() > elementPosition.top){
              $('#view-single-property').css('position','fixed').css('top','0');
        } else {
            $('#view-single-property').css('position','absolute');
        }    
});

//toggle button for property Details

$('#btn-property-detail').on('click',function(){
	
	if($(this).hasClass('togle-butn-right'))
	{
		  $(this).removeClass('togle-butn-right').addClass('togle-butn-left');
		  $(this).find('i').removeClass('fa-chevron-left').addClass('fa-chevron-right');	
		if($('#view-single-property').html().trim()!='')
		{	
			
		  $('#view-single-property').	css('display','block');
		}
		else
		{
				 $('.filter_right').css('display','block');	
				 $('#view-single-property').css('display','none');
	    }
	}	
	else if($(this).hasClass('togle-butn-left'))
	{
		$(this).removeClass('togle-butn-left').addClass('togle-butn-right');
		$(this).find('i').removeClass('fa-chevron-right').addClass('fa-chevron-left');
		 $('.filter_right').	css('display','none');	
		$('#view-single-property').css('display','none');
	}	

});

//Property Filers

	$('.filter-property').on('click',function(){
	
	var _token=$("#_token").val();
	var dataArray = {};
	 dataArray['main_cat_id']= $("#main_cat_id").val();	
	 dataArray['sub_cat_id']= $("#sub_cat_id").val();
	 dataArray['_token']=_token;	
	$('.filter-property').each(function(){					
			if($(this).prop("checked") == true){
			var name=$(this).attr('name');					
			dataArray[name]	=$(this).val();	
			}	
	 });
		 
		$.ajax({
		url: "{{url('property/filter')}}",
		data:dataArray,
		type:'post',
		datatype:'json'
		}).done(function(response){
			
		
		});
	
	});




</script>