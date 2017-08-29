 $(document).ready(function(){
            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
                                             .addClass('btn btn-info')
                                             .on('click', function(){ 
                                                    if( !$(this).hasClass('disabled')){ 
                                                        var elmForm = $("#propertyForm");
                                                        if(elmForm){
                                                            elmForm.validator('validate'); 
                                                            var elmErr = elmForm.find('.has-error');
                                                            if(elmErr && elmErr.length > 0){
                                                                alert('Oops we still have error in the form');
                                                                return false;    
                                                            }else{
                                                                alert('Great! we are ready to submit form');
                                                                elmForm.submit();
                                                                return false;
                                                            }
                                                        }
                                                    }
                                                });
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger')
                                             .on('click', function(){ 
                                                    $('#smartwizard').smartWizard("reset"); 
                                                    $('#propertyForm').find("input, textarea").val(""); 
                                                });                         
            
            
            
            // Smart Wizard
            $('#smartwizard').smartWizard({ 
                    selected: 0, 
                    theme: 'dots',
                    transitionEffect:'fade',
                    toolbarSettings: {toolbarPosition: 'bottom',
                                      toolbarExtraButtons: [btnFinish, btnCancel]
                                    },
                    anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
                 });
            
            $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation 
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if(stepDirection === 'forward' && elmForm){
                    elmForm.validator('validate'); 
                    var elmErr = elmForm.children('.has-error');
                    if(elmErr && elmErr.length > 0){
                        // Form validation failed
                        return false;    
                    }
                }
                return true;
            });
            
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if(stepNumber == 4){ 
                    $('.btn-finish').removeClass('disabled');  
                } else {
                    $('.btn-finish').addClass('disabled');
                }
            });                               
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////Code start for Image Preview while uploading  
        
            ////Image gallary start
            
     var inputLocalFont = document.getElementById("images");
    inputLocalFont.addEventListener("change",previewImages,false); //bind the function to the input

   function previewImages(){
   var fileList = this.files;

    var anyWindow = window.URL || window.webkitURL;

        for(var i = 0; i < fileList.length; i++){
          //get a blob to play with
          var objectUrl = anyWindow.createObjectURL(fileList[i]);
          // for the next line to work, you need something class="preview-area" in your html
          $('#preview').append('<img src="'+objectUrl+'" alt=""  class="thumb" /> <span class="remove_img_preview"></span>');
          
          // get rid of the blob
          window.URL.revokeObjectURL(fileList[i]);
        }

    }

//////Code End for Image Preview while uploading  
 
      ///start remove image from previewImages      
      	$('.remove_img_preview').on('click',function(){
      		var inputLocalFont = document.getElementById("images");	
      		var fileList = inputLocalFont.files;
      	});
      ///End code remove image from preview
      
      
      ///code start for add more property links 
      $("#addMore").on('click',function() {         
  
      var linkshtml='<div class="form-group"><label for="terms">Url </label><input  class="form-control col-md-7 col-xs-12" type="text" name="url[]" required></div><div class="form-group"><label for="terms">Name/Price</label><input  class="form-control col-md-7 col-xs-12" type="text" name="main_title[]" required></div><div class="form-group"><label for="terms">Small Title</label><input class="form-control col-md-7 col-xs-12" type="text" name="small_title[]" required></div><div class="form-group"><label for="icon_image ">Image</label><input class="form-control col-md-7 col-xs-12" type="file" name="icon_image[]" required></div>';    
      $("#form-step-2").append('<div class="extraTab"><h2 class="extra-link">Add Extra link</h2>'+linkshtml+'<span class="removeMore btn btn-danger">Remove </span></div>');     
      });
      
     $(document).on('click', '.removeMore', function(e) {

       $(this).parent('.extraTab').remove();
	});
      
      
});   
        
        