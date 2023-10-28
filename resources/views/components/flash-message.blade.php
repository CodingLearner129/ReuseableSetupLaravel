@if (Session::has('success_message'))
    <div class="alert alert-light-success border-0 mb-4" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        <strong>Success!</strong> {{ Session::get('success_message') }} </button>
    </div>
@endif
@if (Session::has('error_message'))
<div class="alert alert-light-danger border-0 mb-4" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-x close" data-dismiss="alert">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </button>
    <strong>Error!</strong> {{ Session::get('error_message') }} </button>
</div>
@endif
