@extends('layouts.app')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            @include('pages.settings.usergroups.partials._module-permission')

        </div>
        {{-- @include('layouts.modal.diti-modal') --}}

        {{-- @include('pages.operations.employees.partials._editemployeemodal')
        @include('layouts.common._modal-delete') --}}
    @endsection



    @section('scripts')
        <script>
            $(document).on('click', '.rolecheck', function(e) {
                // e.preventDefault();
                var roleId = $(this).data('id');
                var action = $(this).is(':checked') ? 1 : 0;
                var type = $(this).data('type');
                // alert(action);
                $.ajax({
                    url: '{{ route('usergroups.roles.change') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        roleId: roleId,
                        action: action,
                        type: type,
                        usergroupId: {{ $usergroup->id }}
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function(resp) {
                        console.log(resp);
                        if (resp.Status == 'Success') {
                            toastr.success(resp.Msg, resp.Status);
                           
                        } else {
                            toastr.error(resp.Msg, resp.Status);
                        }
                    }
                });
            });


            $(document).on('click', '.rolespecialcheck', function(e) {
                // e.preventDefault();
                var roleId = $(this).data('id');
                var special_permission_id = $(this).data('spid');
                var action = $(this).is(':checked') ? 1 : 0;
                // var type = $(this).data('type');
                // alert(action);
                $.ajax({
                    url: '{{ route('usergroups.roles.changespecialpermissions') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        roleId: roleId,
                        action: action,
                        special_permission_id: special_permission_id,
                        // type: type,
                        usergroupId: {{ $usergroup->id }}
                    },
                    dataType: 'json',
                    type: 'POST',
                    success: function(resp) {
                        console.log(resp);
                        if (resp.Status == 'Success') {
                            toastr.success(resp.Msg, resp.Status);
                        } else {
                            toastr.error(resp.Msg, resp.Status);
                        }
                    }
                });
            });
        </script>
        {{-- @include('layouts.modal.diti-modal-script') --}}
        {{-- <script src="{{ asset('js/submit.js') }}"></script> --}}
        <script src="{{ asset('js/update.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>
        <script src="{{ asset('js/delete.js') }}"></script>
    @endsection
