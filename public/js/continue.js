

$(document).on('click', '.btnContinue', function (e) {
    // $(document).on('submit', '#fmCreate', function (e) {
    // alert('hi');
    e.preventDefault();
    // var form = $("#fmCreate");
    var form = $(this).closest("form");
    var submiturl = form.find('#submiturl').val();
    var forwardurl = $(this).data('forwardurl');
    var completed = $(this).data('completed');
    // alert(completed);
    console.log(form);
    $.ajax({
        url: window.location.origin + '/' + submiturl,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: new FormData(form[0]),
        dataType: 'json',
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (resp) {
            console.log(resp);
            if (resp.Status == 'Success') {
                toastr.success(resp.Msg, resp.Status);
                // setTimeout(function() {
                //     window.location = resp.RedirectUrl;
                // }, 1000);

                if (completed == 1)
                    window.location = resp.RedirectUrl;
                else
                    loadWizard(forwardurl + '&project_id=' + resp.project_id);
            }
            else {
                toastr.error(resp.Msg, resp.Status);
            }
        },
        error: function (reject) {
            // console.log(reject);
            if (reject.status === 422) {
                var err = $.parseJSON(reject.responseText);
                console.log(err.errors);

                // swalalert();


                $.each(err.errors, function (key, val) {
                    form.find("#" + key + "_error").html(val[0]);
                    form.find("#" + key + "_error").removeClass('d-none');
                    // $("#" + key).addClass('is-invalid');
                });
            }
        }
    });

});




$(document).on('click', '.btnBack', function (e) {
    // $(document).on('submit', '#fmCreate', function (e) {
    // alert('hi');
    e.preventDefault();

    var backurl = $(this).data('backurl');
    loadWizard(backurl);

});

function loadWizard(url) {
    // alert(window.location.origin + url);
    $.ajax({
        url: window.location.origin + '/' + url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'html',
        type: 'GET',
        success: function (resp) {
            $('#diti-modal-content').html(resp);
            // $('#ditimodal').modal('show');

            // if (callbackfn)
            //     eval(callbackfn);
        }
    });
}