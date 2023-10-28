<x-app-layout>
    <x-slot name="breadCrumb">
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __('common.changePassword') }}</span></li>
    </x-slot>

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="row">
                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                    <form class="mt-4" method="POST" id="change_password_form" action="{{ $url }}">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="current_password" class="form-label">{{ __('common.CurrentPassword') }}*</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                id="current_password" name="current_password"
                                placeholder="{{ __('common.EnterCurrentPassword') }}">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="new_password" class="form-label">{{ __('common.NewPassword') }}*</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                id="new_password" name="new_password" placeholder="{{ __('common.EnterNewPassword') }}">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="confirm_password" class="form-label">{{ __('common.ConfirmPassword') }}*</label>
                            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                                id="confirm_password" name="confirm_password"
                                placeholder="{{ __('common.EnterConfirmPassword') }}">
                            @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-0 px-0">
                            <a href="{{ $cancelUrl }}"
                                class="btn btn-white mt-4 py-2 px-4">{{ __('common.Cancel') }}</a>
                            <button type="submit"
                                class="btn btn-primary mt-4 py-2 px-4">{{ __('common.Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <x-slot name="script">
        <script src="{{ asset('assets/js/libs/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/js/libs/additional-methods.min.js') }}"></script>
        <script>
            const validation = {};
            validation.current_password_required = "{{ __('validation.validation.current_password.required') }}";
            validation.current_password_minlength = "{{ __('validation.validation.current_password.minlength') }}";
            validation.current_password_maxlength = "{{ __('validation.validation.current_password.maxlength') }}";
            validation.new_password_required = "{{ __('validation.validation.new_password.required') }}";
            validation.new_password_minlength = "{{ __('validation.validation.new_password.minlength') }}";
            validation.new_password_maxlength = "{{ __('validation.validation.new_password.maxlength') }}";
            validation.new_password_upperLetterPassword = "{{ __('validation.validation.new_password.upperLetterPassword') }}";
            validation.new_password_lowerLetterPassword = "{{ __('validation.validation.new_password.lowerLetterPassword') }}";
            validation.new_password_digitPassword = "{{ __('validation.validation.new_password.digitPassword') }}";
            validation.new_password_specialLetterPassword =
                "{{ __('validation.validation.new_password.specialLetterPassword') }}";
            validation.new_password_notEqualToCurrentPassword =
                "{{ __('validation.validation.new_password.notEqualToCurrentPassword') }}";
            validation.confirm_password_required = "{{ __('validation.validation.confirm_password.required') }}";
            validation.confirm_password_minlength = "{{ __('validation.validation.confirm_password.minlength') }}";
            validation.confirm_password_equalTo = "{{ __('validation.validation.confirm_password.equalToNewPassword') }}";
        </script>
        <script src="{{ asset('assets/js/changePassword.js') }}"></script>
    </x-slot>
</x-app-layout>
