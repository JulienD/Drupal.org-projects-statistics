$(document).ready(function() {

    $(".flag").on("click", function() {

        var clicked_link = $(this);
        var projectId = this.getAttribute('data-project-id');
        var flagType  = this.getAttribute('data-flag-type');
        var status = !!this.getAttribute('data-flag-status'); // force to boolean

        var _status = (_status ? 'false' : 'true');

        var a = 2;

        // Ping the server to register the like.
        $.post(projectId + '/flag/' + flagType, function(obj) {

            if ($.isEmptyObject(obj)) {
                $(clicked_link).css( 'opacity', '1' );
            }
            else {
                $(clicked_link).css( 'opacity', '0.5' );
            }
            console.log(obj);
        });
        return false;
    });

});
