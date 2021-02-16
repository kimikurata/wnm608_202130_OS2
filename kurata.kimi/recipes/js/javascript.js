$(document).ready(function(){
	// reference code from https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_active_element
			var link = $(".link_item")
			// for(var i= 0; i < link.length; i++){
			// 	link[i].addEventListener("click", function(){
			// 		var current = $(".active");
			// 		current[0].className = current[0].className.replace(" active", "");
		 //  			this.className += " active";
			// 	});
			// };
	//change 

	// reference code from https://stackoverflow.com/questions/9979827/change-active-menu-item-on-page-scroll
	var topMenu = $("#top-menu");
	var    topMenuHeight = topMenu.outerHeight()+15;
    // All list items
    var menuItems = topMenu.find("a");
    console.log(menuItems);
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      
      if (item.length) { 
      	return item; 
      }
    });
    console.log( scrollItems);



    

    $(window).scroll(function(){
   		// Get container scroll position
  		var fromTop = $(this).scrollTop()+topMenuHeight;
   	//	console.log(fromTop);

   		// Get id of current scroll item
   		var cur = scrollItems.map(function(){
     	if ($(this).offset().top < fromTop)
       		return this;
   		});
   		 // Get the id of the current element
   		cur = cur[cur.length-1];
   			var id = cur && cur.length ? cur[0].id : "";
   			 menuItems
     .parent().removeClass("active")
     .end().filter("[href='#"+id+"']").parent().addClass("active");
   });

  $("#mybtn1").click(function(){
    $("#recipe1_toggle").toggle();
    if ($(this).html() == "Read directions"){
      $(this).html("Hide directions");
    } else {
      $(this).html("Read directions");
    };
  });
  $("#mybtn2").click(function(){
    $("#recipe1_toggle").toggle();
    if ($("#mybtn1").html() == "Read directions"){
      $("#mybtn1").html("Hide directions");
    } else {
      $("#mybtn1").html("Read directions");
    };
  });
  $("#mybtn3").click(function(){
    $("#recipe2_toggle").toggle();
    if ($(this).html() == "Read directions"){
      $(this).html("Hide directions");
    } else {
      $(this).html("Read directions");
    };
  });
  $("#mybtn4").click(function(){
    $("#recipe2_toggle").toggle();
    if ($("#mybtn3").html() == "Read directions"){
      $("#mybtn3").html("Hide directions");
    } else {
      $("#mybtn3").html("Read directions");
    };
  });
  $("#mybtn5").click(function(){
    $("#recipe3_toggle").toggle();
    if ($(this).html() == "Read directions"){
      $(this).html("Hide directions");
    } else {
      $(this).html("Read directions");
    };
  });
  $("#mybtn6").click(function(){
    $("#recipe3_toggle").toggle();
    if ($("#mybtn5").html() == "Read directions"){
      $("#mybtn5").html("Hide directions");
    } else {
      $("#mybtn5").html("Read directions");
    };
  });
 

});



