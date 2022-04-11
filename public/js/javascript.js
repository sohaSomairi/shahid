$(function () {
    $(".getsection").autocomplete({
        source: "/getSection",
        select: function(event, ui) {},
    });
    $(".gettopic").autocomplete({
        source: "/gettopic",
        select: function(event, ui) {},
    });

    let $topic ;

    Dropzone.options.dropzoneJsForm = {
        maxFiles: 1,
        maxFilesize: 10, // Mb
        acceptedFiles: 'image/*',
        init: function() {
            // Set up any event handlers
            this.on('complete', function() {
                location.reload()
            });
        }
    };


});
