//Bootsshop-----------------------//
$(document).ready(function(){
	$("#document-loader-div").hide();
	$("#document-loader-div").click(function(){
		$(this).hide();
	});
	/* carousel of home page animation */
	// $('#myCarousel').carousel({
	//   interval: 4000
	// })
	//  $('#featured').carousel({
	//   interval: 4000
	// })
	// $(function() {
	// 	$('#gallery a').lightBox();
	// });
	
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
//end of profiles and logout section.............................................
   

});
