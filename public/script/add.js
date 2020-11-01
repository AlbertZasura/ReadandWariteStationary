function loadPreview(input,id) {
    id = id || '#imgProduct';

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(id).attr('src', e.target.result).width(200).height(150);
        };
        reader.readAsDataURL(input.files[0]);
    }
}