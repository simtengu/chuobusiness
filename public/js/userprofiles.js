    $(document).ready(function(){
 	$("#document-loader-div").click(function(){
		$(this).hide();
	});

	  $(document).click(function(){
        $("#delete-form").hide("slow");
      });

      $("#delete-button").click(function(event){
          event.stopPropagation();
          $("#delete-form").slideDown();  
      });

    });
