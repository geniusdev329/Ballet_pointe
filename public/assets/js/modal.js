// Get the modal
var searchByMakerModal = document.getElementById("searchByMakerModal");
var searchByFeaturesModal = document.getElementById("searchByFeaturesModal");
var searchByNameModal = document.getElementById("searchByNameModal");

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");
var btn2 = document.getElementById("myBtn2");
var btn3 = document.getElementById("myBtn3");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];
var span3 = document.getElementsByClassName("close")[2];

// When the user clicks the button, open the modal 
btn1.onclick = function () {
    searchByMakerModal.style.display = "block";
}

btn2.onclick = function () {
    searchByFeaturesModal.style.display = "block";
}

btn3.onclick = function () {
    searchByNameModal.style.display = "block";
}


// When the user clicks on <span> (x), close the modal
span1.onclick = function () {
    searchByMakerModal.style.display = "none";
}

span2.onclick = function () {
    searchByFeaturesModal.style.display = "none";
}

span3.onclick = function () {
    searchByNameModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == searchByMakerModal) {
        searchByMakerModal.style.display = "none";
    }
    if (event.target == searchByFeaturesModal) {
        searchByFeaturesModal.style.display = "none";
    }
    if (event.target == searchByNameModal) {
        searchByNameModal.style.display = "none";
    }
}