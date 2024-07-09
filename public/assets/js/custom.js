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
$(".dropdown_btn").click(function() {
    $('.dropdown_menu').toggleClass("hide");
})

$('.que_sym').click(function(event) {
    event.stopPropagation(); // Prevent this click from being detected by the document
    $(this).find('.tooltip').toggleClass('hide');
});

// Hide tooltip when clicking anywhere else on the document
$(document).click(function() {
    $('.tooltip').addClass('hide');
});

// // Prevent clicks within the tooltip from closing it
// $('.tooltip').click(function(event) {
//     event.stopPropagation();
// });


document.addEventListener('DOMContentLoaded', function() {
    let textContent = document.getElementById('textContent');
    
    // Replace newlines with <br> tags and preserve spaces
    text = text.replace(/\n/g, '<br>').replace(/ /g, '&nbsp;');
    
    textContent.innerHTML = text;
});