import "./bootstrap";
import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    acceptedFiles: ".png, .jpg, jpeg, .gif",
    addRemoveLinks: true,
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name="img"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="img"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(
                this,
                imagenPublicada,
                `/uploads/${imagenPublicada.name}`
            );

            imagenPublicada.previewElement.classList.add(
                "dz-succes",
                "dz-complete"
            );
        }
    },
});

dropzone.on("success", function (file, response) {
    console.log(response.imagen);
    document.querySelector('[name="img"]').value = response.imagen;
});

dropzone.on("removedfile", function (file, message) {
    document.querySelector('[name="img"]').value = "";
});
