var submitReviewModal = document.getElementById("submitReviewModal");
var reviewModalBtn = document.getElementById("reviewModalBtn");

// Get the <span> element that closes the modal
var span4 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
if (submitReviewModal && reviewModalBtn) {
    reviewModalBtn.onclick = function () {
        submitReviewModal.style.display = "block";
    }
}

if (submitReviewModal) {
    var closeBtn = submitReviewModal.querySelector('.close');
    closeBtn.onclick = function () {
        submitReviewModal.style.display = "none";
    }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == submitReviewModal) {
        submitReviewModal.style.display = "none";
    }
}