$(document).on('change', '.itemsel', function (e) {
    e.preventDefault();
// $('.itemsel').on('change', function () {
    let row = $(this).closest('tr');
    let itemid = $(this).val();
    // alert(itemid);

    populateModel('/brands',
        { id: itemid },
        row.find('.brandsel'),
        'id',
        'name');

});

$(document).on('change', '.brandsel', function (e) {
    e.preventDefault();
    let row = $(this).closest('tr');
    let itemid = row.find('.itemsel').val();
    let brandid = row.find('.brandsel').val();

    populateModel('/itemmodels',
        { itemid: itemid, brandid: brandid },
        row.find('.modelsel'),
        'id',
        'name');

});

function emptyInput(target) {
    target.empty();
    target.append("<option value=''>Select</option>");
}


function populateModel(url, data, target, id, name) {
    $.ajax({
        url: window.location.origin + url,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: data,
        dataType: 'json',
        type: 'GET',
        success: function (resp) {
            // console.log(resp.returndata);
            if (resp.Status == 'Success') {
                var v = resp.returndata;
                var len = v.length;
               emptyInput(target);



                for (var i = 0; i < len; i++) {
                    var idval = v[i][id];
                    var nameval = v[i][name];
                    target.append("<option value='" + idval + "'>" + nameval + "</option>");
                }
            }
            else {
                toastr.error(resp.Msg, resp.Status);
            }
        }
    });
}