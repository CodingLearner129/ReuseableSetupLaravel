<x-app-layout>
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">{{ __('auth.PasswordRecovery') }}</h1>
                        <p class="signup-link recovery">{{ __('common.PasswordRecoverySubTitle') }}</p>
                        <form id="forgot_password_form" method="POST" class="text-left">
                            @csrf
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">{{ __('common.email') }}</label>
                                    </div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="text" class="form-control" value="" placeholder="{{ __('common.email') }}">
                                </div>

                                <div class="d-sm-flex justify-content-between">

                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">{{ __('common.Reset') }}</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script src="{{ asset('assets/js/libs/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/js/libs/additional-methods.min.js') }}"></script>
        <script>
            const validation = {};
            validation.email_required = "{{ __('validation.validation.email.required') }}";
            validation.email_email = "{{ __('validation.validation.email.email') }}";
            validation.email_customEmail = "{{ __('validation.validation.email.customEmail') }}";
        </script>
        <script src="{{ asset('assets/js/auth/forgot-password.js') }}"></script>
    </x-slot>
</x-app-layout>
