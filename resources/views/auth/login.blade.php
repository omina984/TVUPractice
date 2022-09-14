@extends('auth.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="MyStyle">
        به سامانه مدیریت تمارین خوش آمدید
    </div>
    <br>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <form data-aos="fade-up" data-aos-delay="400" class="fb-100-item-column selected-object" id="docContainer"
                        style="margin-top: 0px; border-width: 5px; font-family: 'B Nazanin'; font-size: 20px;"
                        action="{{ route('login') }}" method="post">
                        @csrf

                        @include('layouts.messages')

                        <div class="fb-form-header" id="fb-form-header1"
                            style="height: 0px; background-repeat: no-repeat; background-position-x: left; background-color: transparent;">
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
                                            کاربری یا آدرس پست الکترونیکی</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="username" id="item49_text_1" type="text" maxlength="254"
                                            placeholder="نام کاربری یا آدرس پست الکترونیکی" data-hint=""
                                            autocomplete="off" value="{{ old('username') }}"
                                            style="font-size: 16px; font-weight: bold; text-align: left;" />

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
                                            placeholder="کلمه عبور" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold; text-align: left;" />

                                        @error('password')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fb-footer fb-item-alignment-center" id="fb-submit-button-div"
                            style="height: 75px; padding-top: 25px; min-height: 1px;">
                            <button type="submit" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 18px; font-weight: bold; width: 150px;">
                                ورود</button>

                            <button type="button" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 18px; font-weight: bold; width: 150px;"
                                onclick="window.location='{{ url('resetpassword') }}'">
                                تغییر کلمه عبور</button>
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
