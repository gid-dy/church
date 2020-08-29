$(document).ready(function() {
    var brand = document.getElementById('child-image');
    brand.className = 'attachment_upload';
    brand.onchange = function() {
        document.getElementById('childimage').value = this.value.substring(12);
    };

    // Source: http://stackoverflow.com/a/4459419/6396981
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#child-image").change(function() {
        readURL(this);
    });
});