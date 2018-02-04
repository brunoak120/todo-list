$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ajaxStart(function () {
    $(".container-loader").show();
});

$(document).ajaxStop(function () {
    $(".container-loader").hide();
});