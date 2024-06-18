var acc = document.getElementsByClassName("accordion");
var faq_item = document.getElementsByClassName("p-faq__item");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("pb-10");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;  
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
  faq_item[i].addEventListener("click", function() {
    this.classList.toggle("active");
  });
}
