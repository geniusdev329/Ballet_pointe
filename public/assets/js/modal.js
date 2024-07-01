// Get the modal
var searchByFeaturesModal = document.getElementById("searchByFeaturesModal");
var searchByFeaturesBtn = document.getElementById("searchByFeaturesBtn");

if (searchByFeaturesBtn && searchByFeaturesModal) {
    searchByFeaturesBtn.onclick = function () {
        searchByFeaturesModal.style.display = "block";
    }
}

if (searchByFeaturesModal) {
    var closeBtn = searchByFeaturesModal.querySelector(".close");
    closeBtn.onclick = function () {
        searchByFeaturesModal.style.display = "none";
    }
    
}

var searchByMakerModal = document.getElementById("searchByMakerModal");
var searchByMakerBtn = document.getElementById("searchByMakerBtn");


if (searchByMakerBtn && searchByMakerModal) {
    searchByMakerBtn.onclick = function () {
        searchByMakerModal.style.display = "block";
    }
}

if (searchByMakerModal) {
    var closeBtn = searchByMakerModal.querySelector(".close");
    closeBtn.onclick = function () {
        searchByMakerModal.style.display = "none";
    }
    
}

var searchByNameModal = document.getElementById("searchByNameModal");
var searchByNameBtn = document.getElementById("searchByNameBtn");

if (searchByNameBtn && searchByNameModal) {
    searchByNameBtn.onclick = function () {
        searchByNameModal.style.display = "block";
    }
}

if (searchByNameModal) {
    var closeBtn = searchByNameModal.querySelector(".close");
    closeBtn.onclick = function () {
        searchByNameModal.style.display = "none";
    }
    
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