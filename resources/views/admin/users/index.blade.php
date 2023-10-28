<x-app-layout>
    <x-slot name="breadCrumb">
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __('common.Users') }}</span></li>
    </x-slot>

    <div class="row layout-top-spacing" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <table id="user_module" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('common.name') }}</th>
                            <th>{{ __('common.email') }}</th>
                            <th class="no-content">{{ __('common.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <x-slot name="script">
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            const getData = "{{ $dataUrl }}";
            const tableElement = document.getElementById('user_module');
        </script>
        <script src="{{ asset('assets/js/admin/userModule.js') }}"></script>
        <script src="{{ asset('assets/js/tableAction.js') }}"></script>
    </x-slot>
</x-app-layout>
