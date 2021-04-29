
$(()=>{

   $(".image-thumbs img").on("mouseenter",function(){
      $(".image-main img").attr("src",$(this).attr("src"));
   })

});