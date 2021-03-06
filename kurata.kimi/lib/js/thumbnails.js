$(".thumbnails img").on("mouseenter",function(e){
  $(".tumbnails-main img")
    .attr("src",$(this).attr("src"));
})
console.log("hello");