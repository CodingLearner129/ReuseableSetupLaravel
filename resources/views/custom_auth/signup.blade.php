<x-app-layout>
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">{{ __('auth.register') }}</h1>
                        <p class="signup-link register">{{ __('common.AlreadyHaveAnAccount?') }} <a href="{{ $urlLogin }}">{{ __('auth.LogIn') }}</a></p>
                        <form id="signup_form" class="text-left" method="POST" action="{{ $url }}">
                            @csrf
                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">{{ __('common.name') }}</label>
                                    <svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="username" name="name" type="text" class="form-control"
                                        placeholder="{{ __('common.name') }}">
                                </div>

                                <div id="email-field" class="field-wrapper input">
                                    <label for="email">{{ __('common.email') }}</label>
                                    <svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-at-sign register">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="email" name="email" type="text" value=""
                                        class="form-control" placeholder="{{ __('common.email') }}">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">{{ __('common.password') }}</label>
                                    </div>
                                    <svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="{{ __('common.password') }}">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
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

                                {{-- <div class="field-wrapper terms_condition">
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" class="new-control-input">
                                            <span class="new-control-indicator"></span><span>I agree to the <a
                                                    href="javascript:void(0);"> terms and conditions </a></span>
                                        </label>
                                    </div>

                                </div> --}}

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">{{ __('common.GetStarted!') }}</button>
                                    </div>
                                </div>

                                {{-- <div class="division">
                                    <span>OR</span>
                                </div> --}}

                                {{-- <div class="social">
                                    <a href="javascript:void(0);" class="btn social-fb">
                                        <svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook">
                                            <path
                                                d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>
                                        <span class="brand-name">Facebook</span>
                                    </a>
                                    <a href="javascript:void(0);" class="btn social-github">
                                        <svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-github">
                                            <path
                                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                            </path>
                                        </svg>
                                        <span class="brand-name">Github</span>
                                    </a>
                                </div> --}}

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
            validation.name_required = "{{ __('validation.validation.name.required') }}";
            validation.name_minlength = "{{ __('validation.validation.name.minlength') }}";
            validation.name_maxlength = "{{ __('validation.validation.name.maxlength') }}";
            validation.email_required = "{{ __('validation.validation.email.required') }}";
            validation.email_email = "{{ __('validation.validation.email.email') }}";
            validation.email_customEmail = "{{ __('validation.validation.email.customEmail') }}";
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
        <script src="{{ asset('assets/js/auth/signup.js') }}"></script>
    </x-slot>
</x-app-layout>
