<script>
    $(document).on('click', '.btnAction', function(e) {
        e.preventDefault();

        var url = $(this).data('url'); // Get URL from button attribute
        var path = $(this).data('path')||''; // Get URL from button attribute
        var redirect = $(this).data('redirect')|| '';
        console.log("AJAX Request URL:", url); // Debugging
        var callbackfn = $(this).data('callback'); 
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            data: {
                redirect: redirect, 
                path: path, 
            },
            beforeSend: function() {
                // Show loader (if Metronic has a loader animation)
                $("#diti-modal-content").html(
                    '<div class="text-center p-5"><i class="fa fa-spinner fa-spin fa-2x"></i> Loading...</div>'
                );
            },
            success: function(resp) {
                $('#diti-modal-content').html(resp);
                $('#ditimodal').modal('show');

                if (callbackfn)
                    eval(callbackfn);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                console.error("Status:", status);
                console.error("Response Text:", xhr.responseText);

                // Show error message inside modal
                $('#diti-modal-content').html(
                    '<div class="alert alert-danger">Failed to load content. Please try again.</div>'
                );
            }
        });
    });
</script>
