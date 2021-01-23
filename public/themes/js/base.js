//Bootsshop-----------------------//
$(document).ready(function(){
	$("#document-loader-div").hide();
	$("#document-loader-div").click(function(){
		$(this).hide();
	});
		
	$('.subMenu > a').click(function(e)
	{
		e.preventDefault();
		var subMenu = $(this).siblings('ul');
		var li = $(this).parents('li');
		var subMenus = $('#sidebar li.subMenu ul');
		var subMenus_parents = $('#sidebar li.subMenu');
		if(li.hasClass('open'))
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				subMenu.slideUp();
			} else {
				subMenu.fadeOut(250);
			}
			li.removeClass('open');
		} else 
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				subMenus.slideUp();			
				subMenu.slideDown();
			} else {
				subMenus.fadeOut(250);			
				subMenu.fadeIn(250);
			}
			subMenus_parents.removeClass('open');		
			li.addClass('open');	
		}
	});
	var ul = $('#sidebar > ul');
	$('#sidebar > a').click(function(e)
	{
		e.preventDefault();
		var sidebar = $('#sidebar');
		if(sidebar.hasClass('open'))
		{
			sidebar.removeClass('open');
			ul.slideUp(250);
		} else 
		{
			sidebar.addClass('open');
			ul.slideDown(250);
		}
	});
	// all categories modal section............
	$("#all-categories-btn").click(function(){
		$("#all-categories").fadeIn();
	});

	$("#all-categories").click(function(){
          $(this).fadeOut();
	});

	$("#all-categories .sidebar-close-btn").on({
		click: function(){
			$("#all-categories").fadeOut();
		}
	});

	$("#sideManuu").click(function(event){
           event.stopPropagation();
	});

   $("#categories-header").click(function(event){
           event.stopPropagation();
	});
   // end of all categories modal section.......
	// university search modal section......................
	$(".uv-search-open-btn").click(function(event){
		event.stopPropagation();
		$("#uv-search-body").toggle();
	});
	$("#uv-search-body").click(function(event){
        event.stopPropagation(); 
	});
	$(".uv-search-close-btn").click(function(){
		 $("#uv-search-body").hide();
	});
	$(document).click(function(){
         $("#uv-search-body").hide(); 
         $("#regionsDiv").hide();    
	});
	// end of university search modal section...............
    // product images preview section...............................
	
	   $(".more-product-imgs img").click(function(){
	     var img_active = $(this).attr('src');
	     $(".main-product-img img").attr('src',img_active);
	     $(".main-product-img .active_img_link").attr('href',img_active);
	     $(".more-product-imgs img").removeClass('active_image');
	     $(this).addClass('active_image');
	   });


	   $("#regionsLink").click(function(e){
	   	  e.preventDefault();
	   	  e.stopPropagation();
          $("#regionsDiv").slideToggle();
	   });
	   $("#regions_close_btn").click(function(){
	     $("#regionsDiv").hide();
	   });

		$("#regionsDiv").click(function(event){
	        event.stopPropagation(); 
		});

		// premium products flickity.....................	  

		$('.main-carousel').flickity({
		            cellAlign: 'left',
		            contain: true,
		            draggable: true,
		            wrapAround: true,
		            freeScroll: true,
		            autoPlay: 2500,
		            groupCells: false,
		            pageDots:false,
		          
		}); 

		$('.laptops-carousel').flickity({
		            cellAlign: 'left',
		            contain: true,
		            draggable: true,
		            wrapAround: true,
		            freeScroll: true,
		            autoPlay: true,
		            groupCells: false,
		            pageDots:false,
		          
		});
    // end of product images preview section........................
   
//login ajax request handling.......................................
$("#login_form input[type=password]").focus(function(){
      $("#pwd_check").text('').removeClass("d-block").addClass("d-none");
});
$("#login_form").submit(function(event){
  event.preventDefault();
  var path = $("input[name=login_url]").val();
 
    $.ajax({
      url: path,
      method: "POST",
      data: $(this).serializeArray(),
      success: function(res){
        if (res == "ok") {
              window.location.href = "/chuobusiness/public";
        }else{
         $("#pwd_check").text(res).removeClass("d-none").addClass("d-block"); 
        }  
      },
      error: function(rs){
      	$("#login_form").submit();

      }
    }); 
});
 
//login modal section...........................................................
$("#loginBtn").click(function(event){
  event.preventDefault();
  $("#loginDiv").fadeToggle();

});

$("#loginDiv").click(function(){
     $(this).fadeOut();
});

$("#loginDiv .modal").click(function(event){
     event.stopPropagation();
});

$("#loginCloseBtn").click(function(){
	 $("#loginDiv").fadeOut();
});
$("#CloseBtn").click(function(){
	 $("#loginDiv").fadeOut();
});

//profile and logout section....................................................
  $("#profile-link").click(function(event){
  	event.preventDefault();
  	event.stopPropagation();
      $("#profile-container").toggle();
  });
  $(document).click(function(){
      $("#profile-container").hide(); 
  });
  $("#profile-container").click(function(e){
     e.stopPropagation();
  });

  $("#toggler1").click(function(){
      $("#linksMenu").slideToggle();
  });
//end of profiles and logout section.............................................
//region products section........................................................
$("#regions_products").change(function(){
   var region_id = $(this).val();
   var path = $("#regions_path").val();
   if (region_id != "") {
    window.location.href= path+"/"+region_id+"/1";
   }
});

$("#regions_items").change(function(){
   var region_id = $(this).val();
   var path = $("#regions_path").val();
   if (region_id != "") {
    window.location.href= path+"/"+region_id+"/1";
   }
});

  $("#rProductsForm").submit(function(e){
      var uv_id = $("#regions_products").val();
      if (uv_id == "") {
      	e.preventDefault();
      }  
  });

  $("#regions_items_form").submit(function(e){
      var uv_id = $("#regions_products").val();
      if (uv_id == "") {
      	e.preventDefault();
      }  
  });
//top universities section...........
$("#top_universities").change(function(){
    var university_id = $(this).val();
    var path = $("#university_path").val();
   if (university_id != "") {
    window.location.href= path+"/"+university_id+"/1";
   }
});
  $("#topUniversitiesForm").submit(function(e){
      var uv_id = $("#top_universities").val();
      if (uv_id == "") {
      	e.preventDefault();
      }  
  });
//end of top universities section......
// handling search engines section......................................................
$("#searchEnginesContainer").click(function(){
       $(this).fadeOut(function(){
       	$("#searchFormsDiv > form").hide();
       });
});
$("#searchEngine_close_btn").click(function(){
     	  $("#searchFormsDiv > form").hide(function(){
     	    $("#searchEnginesContainer").fadeOut();
          });
});

$(".searchContainer").click(function(e){
      e.stopPropagation();
});
//opening specified search form...........................................
//nation level item search
$(".a-search-field").focus(function(){
	$(".a-search-form").show();
    $("#searchEnginesContainer").fadeIn(function(){
  	$(".a-search-form input[type='text']").val("").focus();
  }); 
});
// user university.college search.........................................
$(".college-search-field").focus(function(){
	$(".university-search-form").show();
    $("#searchEnginesContainer").fadeIn(function(){
  	$(".university-search-form input[type='text']").val("").focus();
  }); 
});
// region level item search.................................................
$(".b-search-field").focus(function(){
	$(".b-search-form").show();
    $("#searchEnginesContainer").fadeIn(function(){
  	$(".b-search-form input[type='text']").val("").focus();
  }); 
});
//university level item search.....................................
$(".c-search-field").focus(function(){
	$(".c-search-form").show();
    $("#searchEnginesContainer").fadeIn(function(){
  	$(".c-search-form input[type='text']").val("").focus();
  }); 
});
// search forms validation and normal submittion............................
$(".a-search-form").submit(function(e){
 var item = $(".a-search-form input[type='text']").val();
 if (item.length < 1) {
 	e.preventDefault();
 }

});

$(".b-search-form").submit(function(e){
 var item = $(".b-search-form input[type='text']").val();
 if (item.length < 1) {
 	e.preventDefault();
 }

});

$(".c-search-form").submit(function(e){
 var item = $(".c-search-form input[type='text']").val();
 if (item.length < 1) {
 	e.preventDefault();
 }

});

$(".university-search-form").submit(function(e){
 var item = $(".university-search-form input[type='text']").val();
 if (item.length < 1) {
 	e.preventDefault();
 }

});
//item search ajax requests........................
// product search  request at nation level.......................................
         $(".a-search-form input[type='text']").on('keyup',function(){
         if ($(this).val().trim() != ""){
           var item = $(this).val().trim();
           var path = $("#a-search-path").val();
             if (item.length > 1) {
	           $.ajax({
	             url: path +"/"+ item,
	             method: "GET",
	             success: function(rs){
	               $("#a-search-suggestions").html(rs);
	             },
	             error: function(){
	             	console.log("something went wrong");
	             }
	           });
             }

         }else{
              $("#a-search-suggestions").html("");
         }
        });

// product search  request at region level..................................................
         $(".b-search-form input[type='text']").on('keyup',function(){
         if ($(this).val().trim() != ""){
           var item = $(this).val().trim();
           var path = $("#b-search-path").val();
         
             if (item.length > 1) {
	           $.ajax({
	             url: path +"/"+ item ,
	             method: "GET",
	             success: function(rs){
	               $("#b-search-suggestions").html(rs);
	             },
	             error: function(){
	             	console.log("something went wrong");
	             }
	           });
             }

         }else{
              $("#b-search-suggestions").html("");
         }
        });

// product search  request at university level..................................................
         $(".c-search-form input[type='text']").on('keyup',function(){
         if ($(this).val().trim() != ""){
           var item = $(this).val().trim();
           var path = $("#c-search-path").val();
         
             if (item.length > 1) {
	           $.ajax({
	             url: path +"/"+ item ,
	             method: "GET",
	             success: function(rs){
	               $("#c-search-suggestions").html(rs);
	             },
	             error: function(){
	             	console.log("something went wrong");
	             }
	           });
             }

         }else{
              $("#c-search-suggestions").html("");
         }
        });

//university search request.....................................
         $(".university-search-form input[type='text']").on('keyup',function(){
          if ($(this).val().trim() != ""){
           var item = $(this).val().trim();
           var path = $("#university-search-path").val();
             if (item.length > 1) {
	           $.ajax({
	             url: path +"/"+ item,
	             method: "GET",
	             success: function(rs){
	               $("#college-search-suggestions").html(rs);
	             },
	             error: function(){
	             	console.log("something went wrong");
	             }
	           });
             }

         }else{
              $("#college-search-suggestions").html("");
         }
        });


// search form validation b4 submit...................
         $("#search-form-div form").on('submit', function(event){
            
             var itm = $("#search-form-div form input[name='item']").val().trim();
              if (itm != "") {
                $(this).submit();
              }else{
                 event.preventDefault();
              }

         });


//end of search engines section..........................................................
});
