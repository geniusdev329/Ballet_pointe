/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Ecommerce product create Js File
*/


// // Dropzone
// var dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
// dropzonePreviewNode.itemid = "";
// var previewTemplate = dropzonePreviewNode.parentNode.innerHTML;
// dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode);
// var dropzone = new Dropzone(".dropzone", {
//     url: 'https://httpbin.org/post',
//     method: "post",
//     previewTemplate: previewTemplate,
//     previewsContainer: "#dropzone-preview",
// });

// Form Event
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // date & time
    var date = new Date().toUTCString().slice(5, 16);
    function currentTime() {
        var ampm = new Date().getHours() >= 12 ? "PM" : "AM";
        var hour =
            new Date().getHours() > 12
                ? new Date().getHours() % 12
                : new Date().getHours();
        var minute =
            new Date().getMinutes() < 10
                ? "0" + new Date().getMinutes()
                : new Date().getMinutes();
        if (hour < 10) {
            return "0" + hour + ":" + minute + " " + ampm;
        } else {
            return hour + ":" + minute + " " + ampm;
        }
    }
    setInterval(currentTime, 1000);

    // product image
    document.querySelector("#product-image-input").addEventListener("change", function () {
        var preview = document.querySelector("#product-img");
        var file = document.querySelector("#product-image-input").files[0];
        var reader = new FileReader();
        reader.addEventListener("load",function () {
            preview.src = reader.result;
        },false);
        if (file) {
            reader.readAsDataURL(file);
        }
    });
   
    // Loop over them and prevent submission
    // Array.prototype.slice.call(forms)
    //     .forEach(function (form) {
    //         form.addEventListener('submit', function (event) {
    //             if (!form.checkValidity()) {
    //                 event.preventDefault();
    //                 event.stopPropagation();
    //             } else {
    //                 //form.submit();
    //             }

    //             form.classList.add('was-validated');

    //         }, false)
    //     })
})()