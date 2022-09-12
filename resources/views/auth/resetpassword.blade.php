@extends('auth.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="aa">
        لطفا اطلاعات خواسته شده را وارد و سپس کلمه عبور خود را به روزرسانی کنید
    </div>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <form data-aos="fade-up" data-aos-delay="400" class="fb-toplabel fb-100-item-column selected-object"
                        id="docContainer" style="border-width: 3px; font-family: 'B Nazanin'; font-size: 20px;"
                        action="{{ route('auth.resetpassword.resetpass') }}" method="post">
                        @csrf

                        {{-- @include('layouts.messages') --}}

                        <div class="fb-form-header" id="fb-form-header1"
                            style="height: 30px; background-repeat: no-repeat; background-position-x: left; background-color: transparent;">
                            <a class="fb-link-logo" id="fb-link-logo1" style="max-width: 104px;" target="_blank"><img
                                    title="Alternative text" class="fb-logo" id="fb-logo1"
                                    style="width: 100%; display: none;" alt="Alternative text"
                                    src="common/images/logo.png" /></a>
                        </div>

                        <div class="section" id="section1">
                            <div class="column ui-sortable" id="column1">
                                <div class="fb-item fb-100-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="txtusername" style="font-weight: bold; display: inline;">نام
                                            کاربری</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="username" id="item49_text_1" type="text" maxlength="254"
                                            placeholder="نام کاربری موجود" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold;" value="{{ old('username') }}" />

                                            @error('username')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-100-item-column" id="item50">
                                    <div class="fb-grouplabel">
                                        <label id="txtpassword" style="font-weight: bold; display: inline;">کلمه
                                            عبور</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="password" id="item50_text_1" type="password" maxlength="254"
                                            placeholder="کلمه عبور جدید خود را وارد کنید" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold;" />

                                            @error('password')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item55">
                                    <div class="fb-grouplabel">
                                        <label id="txtnationalcode"
                                            style="font-weight: bold; display: inline;">کدملی</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="nationalcode" id="item55_text_1" type="text" maxlength="254"
                                            placeholder="کدملی خود را وارد کنید" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold;" value="{{ old('nationalcode') }}" />

                                            @error('nationalcode')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item55">
                                    <div class="fb-grouplabel">
                                        <label id="txtmobile" style="font-weight: bold; display: inline;">تلفن
                                            همراه</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="mobile" id="item55_text_1" type="text" maxlength="254"
                                            placeholder="شماره تلفنی که قبلا ثبت نموده‌اید را وارد کنید" data-hint=""
                                            autocomplete="off" style="font-size: 16px; font-weight: bold;"
                                            value="{{ old('mobile') }}" />

                                            @error('mobile')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-100-item-column" id="item60">
                                    <div class="fb-grouplabel">
                                        <label id="txtemail"
                                            style="font-weight: bold; display: inline; direction: ltr">آدرس پست
                                            الکترونیک</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="email" id="item60_text_1" type="email" maxlength="254"
                                            placeholder="آدرس پست الکترونیکی که قبلا در سامانه ثبت کرده‌اید را وارد کنید"
                                            data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold; text-align: left;"
                                            value="{{ old('email') }}" />

                                            @error('email')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fb-footer fb-item-alignment-center" id="fb-submit-button-div"
                            style="height: 75px; padding-top: 25px; min-height: 1px;">
                            <button type="submit" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 16px; font-weight: bold; width: 150px;">
                                به روزرسانی</button>

                            <button type="button" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 16px; font-weight: bold; width: 150px;"
                                onclick="window.location='{{ url('/') }}'">
                                بازگشت </button>
                        </div>
                        <br>

                        <input name="fb_form_custom_html" type="hidden" />
                        <input name="fb_form_embedded" type="hidden" />
                        <input name="fb_js_enable" id="fb_js_enable" type="hidden" />
                        <input name="fb_url_embedded" id="fb_url_embedded" type="hidden" />
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
