<x-app-layout>
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">{{ __('auth.PasswordReset') }}</h1>
                        <form id="reset_password_form" {{isset($url) && $url!='' ? 'method="POST" action="'.$url.'"' : ''}} class="text-left">
                            <div class="form">

                                <div class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">{{ __('common.password') }}</label>
                                    </div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="{{ __('common.password') }}">
                                </div>

                                <div class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="confirm_password">{{ __('common.ConfirmPassword') }}</label>
                                    </div>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="confirm_password" name="confirm_password" type="password" class="form-control"
                                        placeholder="{{ __('common.ConfirmPassword') }}">
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
            validation.password_required = "{{ __('validation.validation.password.required') }}";
            validation.password_minlength = "{{ __('validation.validation.password.minlength') }}";
            validation.password_maxlength = "{{ __('validation.validation.password.maxlength') }}";
            validation.password_upperLetterPassword = "{{ __('validation.validation.password.upperLetterPassword') }}";
            validation.password_lowerLetterPassword = "{{ __('validation.validation.password.lowerLetterPassword') }}";
            validation.password_digitPassword = "{{ __('validation.validation.password.digitPassword') }}";
            validation.password_specialLetterPassword = "{{ __('validation.validation.password.specialLetterPassword') }}";
            validation.confirm_password_required = "{{ __('validation.validation.confirm_password.required') }}";
            validation.confirm_password_minlength = "{{ __('validation.validation.confirm_password.minlength') }}";
            validation.confirm_password_equalTo = "{{ __('validation.validation.confirm_password.equalTo') }}";
        </script>
        <script src="{{ asset('assets/js/auth/reset-password.js') }}"></script>
    </x-slot>
</x-app-layout>
