
var Profile = (function () {
    let modules = {};

    modules.readURL = function (input, imgControlName) {
        let file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function () {
                $(imgControlName).attr('src', reader.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    modules.deleteImage = function () {
        $('#profile_picture_hidden').val(0);
    };

    return modules;
}(window.jQuery, window, document));


$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    setTimeout(() => {
        RUN.init();
    }, 100);

    setTimeout(function() {
        $('.profile-notification').fadeOut();
    }, 3000);

    $('#imag').change(function () {
        var imgControlName = '.image-preview';
        Profile.readURL(this, imgControlName);
    });

    $('.btn-delete-image').click(function (e) {
        var src = $("#data-img-profile").attr("data-img-profile");
        $('#imag').val(null);
        $('.image-preview').attr('src', src);
        Profile.deleteImage();
    });

    $('.btn-show-logout').click(() => {
        $('.user-list-option').toggle();
    });

    $('.wrap-user').click(() => {
        $('.user-list-option').toggle();
    });

});