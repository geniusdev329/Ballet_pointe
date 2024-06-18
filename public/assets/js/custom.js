$("#hamburg-btn").click(function() {
    $(this).toggleClass("is-active");
    $(".c-header__sp").toggleClass("h-active");
})

$(".__sp-item").click(function() {
    $(".c-header__sp").toggleClass("h-active");
    $("#hamburg-btn").toggleClass("is-active");
})

$(".modal").click(function(e){
    $('#demo-modal').css("visibility","hidden");
    $('#demo-modal').css("opacity","0");
    $('#business-modal').css("visibility","hidden");
    $('#business-modal').css("opacity","0");
});

$(".more-btn").click(function() {
    $('#demo-modal').css("visibility","visible");
    $('#demo-modal').css("opacity","1");
})

$(".__business-more").click(function() {
    $('#business-modal').css("visibility","visible");
    $('#business-modal').css("opacity","1");
})
