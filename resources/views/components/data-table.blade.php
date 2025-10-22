<!--begin::Table-->
<div class="table-responsive">
    <table id="{{ $tableId ?? 'kt_table' }}" class="table align-middle table-row-dashed fs-6 gy-5 {{ $tableClass ?? '' }}">
        <!--begin::Table head-->
        <thead>
            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                @if(isset($checkboxes) && $checkboxes)
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#{{ $tableId ?? 'kt_table' }} .form-check-input" value="1" />
                        </div>
                    </th>
                @endif
                @if(isset($columns) && is_array($columns))
                    @foreach($columns as $column)
                        <th class="{{ $column['class'] ?? 'min-w-125px' }}">{{ $column['title'] ?? '' }}</th>
                    @endforeach
                @endif
                @if(isset($actions) && $actions)
                    <th class="text-end min-w-70px">Actions</th>
                @endif
            </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="fw-semibold text-gray-600">
            {{ $slot }}
        </tbody>
        <!--end::Table body-->
    </table>
</div>
<!--end::Table-->