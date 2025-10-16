function populateSelect(url, data, target, selectall = 0, selected = []) {
    $.ajax({
        url: window.location.origin + url,
        type: 'GET',
        dataType: 'json',
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (resp) {
            if (resp.Status === 'Success') {
                const options = resp.returndata;
                const isMultiple = target.prop('multiple');

                target.empty();

                if (!isMultiple) {
                    if (selectall == 0)
                        target.append("<option value=''>Select</option>");
                    else
                        target.append("<option value='All'>All</option>");
                }

                for (const key in options) {
                    target.append(`<option value="${key}">${options[key]}</option>`);
                }

                // Reinitialize Select2
                if ($.fn.select2) {
                    target.select2({ width: '100%' });
                }

                // Pre-select values (for edit case)
                if (Array.isArray(selected) && selected.length > 0) {
                    target.val(selected).trigger('change');
                }

            } else {
                toastr.error(resp.Msg, resp.Status);
            }
        },
        error: function () {
            toastr.error('Failed to load dropdown data.');
        }
    });
}
