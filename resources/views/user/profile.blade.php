<x-app-layout>
    <x-slot name="breadCrumb">
        <li class="breadcrumb-item active" aria-current="page"><span>{{ __('common.myProfile') }}</span></li>
    </x-slot>

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <form class="mt-4" method="POST" id="edit_profile_form" action="{{ $url }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-4">
                            <div class="col-xl-3 col-lg-6 col-md-8 col-sm-12 col-12">
                                <div class="form-group mb-4">
                                    <label for=""
                                        class="form-label mb-2">{{ __('common.profileImage') }}*</label>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image">
                                            <img src="{{ isset($profile_picture) && $profile_picture != '' ? asset('storage/'.$profile_picture) : asset('assets/img/400x300.jpg') }}"
                                                class="picture__img">
                                        </span>
                                    </label>
                                    <input type="file" name="picture__input" id="picture__input"
                                        accept="image/jpg, image/jpeg, image/png">
                                </div>
                            </div>
                            <div class="col-xl-1"></div>
                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 row">
                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 form-group mb-4">
                                    <label for="full_name" class="form-label">{{ __('common.full_name') }}*</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                        id="full_name" name="full_name" placeholder="{{ __('common.EnterFullName') }}"
                                        value="{{ isset($name) && $name != '' ? $name : '' }}">
                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div
                                    class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 form-group mb-4 offset-xl-2 offset-lg-2 offset-md-2">
                                    <label for="email" class="form-label">{{ __('common.email') }}*</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="{{ __('common.EnterEmail') }}"
                                        value="{{ isset($email) && $email != '' ? $email : '' }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 form-group mb-4">
                                    <label for="address" class="form-label">{{ __('common.address') }}*</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ isset($address) && $address != '' ? $address : __('common.EnterAddress') }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mx-0 px-0">
                            <a href="{{ $cancelUrl }}"
                                class="btn btn-secondary mt-4 py-2 px-4">{{ __('common.Cancel') }}</a>
                            <button type="submit"
                                class="btn btn-primary mt-4 mx-3 py-2 px-4">{{ __('common.Save') }}</button>
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
            const imageFound = "{{ isset($profile_picture) && $profile_picture != '' }}";
            const upload = "{{ __('common.upload') }}";
            const maxSize = 500;
            const validation = {};
            validation.full_name_required = "{{ __('validation.validation.full_name.required') }}";
            validation.full_name_minlength = "{{ __('validation.validation.full_name.minlength') }}";
            validation.full_name_maxlength = "{{ __('validation.validation.full_name.maxlength') }}";
            validation.address_required = "{{ __('validation.validation.address.required') }}";
            validation.address_minlength = "{{ __('validation.validation.address.minlength') }}";
            validation.address_maxlength = "{{ __('validation.validation.address.maxlength') }}";
            validation.email_required = "{{ __('validation.validation.email.required') }}";
            validation.email_email = "{{ __('validation.validation.email.email') }}";
            validation.email_customEmail = "{{ __('validation.validation.email.customEmail') }}";
            validation.image_extension = "{{ __('validation.validation.image.extensionMimes') }}";
            validation.image_maxSize = "{{ __('validation.validation.image.maxsize') }}";
            // let pictureImageTxt =
            //     '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>';
            // pictureImageTxt += '<p>' + upload + '</p>';
            // pictureImageTxt += '<p>(' + validation.image_maxSize + ')</p>';
        </script>
        <script src="{{ asset('assets/js/inputImagePreview.js') }}"></script>
        <script src="{{ asset('assets/js/users/editProfile.js') }}"></script>
    </x-slot>
</x-app-layout>
