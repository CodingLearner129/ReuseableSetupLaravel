<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('assets/js/libs/jquery.growl.js') }}"></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script>
    const success = "{{ __('common.success') }}";
    const error = "{{ __('common.error') }}";
    const somethingWentWrong = "{{ __('common.somethingWentWrong') }}";
    const areYouSure = "{{ __('common.areYouSure?') }}";
    const wontRevert = "{!! __('common.wontBeRevert') !!}";
    const yesDelete = "{{ __('common.yesDelete') }}";
    const yesApprove = "{{ __('common.yesApprove') }}";
    const pleaseWait = "{{ __('common.pleaseWait') }}";
    const isWorking = "{{ __('common.isWorking') }}";
    const oops = "{{ __('common.oops') }}";
    const deleted = "{{ __('common.deleted') }}";
    const approvedSuccess = "{{ __('common.approvedSuccess') }}";
    const result = {};
</script>
{{-- <script>
    // let currentTimeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
    // $.get("<?=//route('setTimeZone')?>",{'timezone': currentTimeZone},function(){});
</script> --}}
@if ($errors->any())
    <script>
        result.msg = "{{ implode('; ', $errors->all()) }}";
    </script>
@endif
@if (Session::has('success_message'))
    <script>
        result.success_message = "{{ Session::get('success_message') }}";
    </script>
@endif
@if (Session::has('error_message'))
    <script>
        result.error_message = "{{ Session::get('error_message') }}";
    </script>
@endif

<script src="{{ asset('assets/js/flash-message.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
@if (Request::routeIs('*.login') ||
        Request::routeIs('*.login.*') ||
        Request::routeIs('*.signup') ||
        Request::routeIs('*.signup.*') ||
        Request::routeIs('forgot.*') ||
        Request::routeIs('reset.*') ||
        Request::routeIs('password-reset-success'))
    <script src="{{ asset('assets/js/authentication/form-2.js') }}"></script>
@else
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script>
        $(document).ready(function() {
            var loaderElement = document.querySelector('#load_screen');
            setTimeout(function() {
                loaderElement.style.display = "none";
            }, 3000);
        });
    </script>
    @if (Request::routeIs('*.dashboard'))
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/js/dashboard/dash_2.js') }}"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @endif
    @if (Request::routeIs('*.*.index'))
        <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    @endif
@endif
