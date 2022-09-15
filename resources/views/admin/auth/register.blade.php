@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.index') }}">بازگشت</a>
            &nbsp; / &nbsp;
            <span style="color: gray">کاربر جدید</span>
        </div>
    </div>

    <div class="MyStyle">
        لطفا در صورت نداشتن نام کاربری با مدیر سامانه در تماس باشید
    </div>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <form data-aos="fade-up" data-aos-delay="400" class="fb-toplabel fb-100-item-column selected-object"
                        id="docContainer" style="border-width: 3px; font-family: 'B Nazanin'; font-size: 20px; width: 800px;"
                        action="{{ route('register') }}" method="post">
                        @csrf

                        {{-- @include('layouts.messages') --}}

                        <div class="fb-form-header" id="fb-form-header1"
                            style="height: 30px; background-repeat: no-repeat; background-position-x: left; background-color: transparent;">
                            <a class="fb-link-logo" id="fb-link-logo1" style="max-width: 104px;" target="_blank"><img
                                    title="Alternative text" class="fb-logo" id="fb-logo1"
                                    style="width: 100%; display: none;" alt="Alternative text"
                                    src="common/images/image_default.png" /></a>
                        </div>

                        <div class="section" id="section1">
                            <div class="column ui-sortable" id="column1">
                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="txtusername" style="font-weight: bold; display: inline;">نام
                                            کاربری</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="username" id="item49_text_1" type="text" maxlength="254"
                                            placeholder="نام کاربری یکتا" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold;" value="{{ old('username') }}" />

                                        @error('username')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item52">
                                    <div class="fb-grouplabel">
                                        <label id="txtpassword" style="font-weight: bold; display: inline;">کلمه
                                            عبور</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="password" id="item52_text_1" type="password" maxlength="254"
                                            placeholder="حداقل هشت کاراکتر" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold;" />

                                        @error('password')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item50">
                                    <div class="fb-grouplabel">
                                        <label id="txtname" style="font-weight: bold; display: inline;">نام</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="name" id="item50_text_1" type="text" maxlength="254"
                                            placeholder="" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold;" value="{{ old('name') }}" />

                                        @error('name')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item51">
                                    <div class="fb-grouplabel">
                                        <label id="txtfamily" style="font-weight: bold; display: inline;">نام
                                            خانوادگی</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="family" id="item51_text_1" type="text" maxlength="254"
                                            placeholder="" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold;" value="{{ old('family') }}" />

                                        @error('family')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item54">
                                    <div class="fb-grouplabel">
                                        <label id="txtfather" style="font-weight: bold; display: inline;">نام
                                            پدر</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="father" id="item54_text_1" type="text" maxlength="254"
                                            placeholder="" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold;" value="{{ old('father') }}" />

                                        @error('father')
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
                                            placeholder="" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold;"
                                            value="{{ old('nationalcode') }}" />

                                        @error('nationalcode')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item59">
                                    <div class="fb-grouplabel">
                                        <label id="txtmarkaz" style="font-weight: bold; display: inline;">
                                            دانشکده محل آموزش</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="markaz" id="markaz"
                                            style="font-size: 16px; font-weight: bold; height: 30px;">
                                            @foreach ($marakez as $mz)
                                                <option value="{{ $mz->id }}">{{ $mz->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item55">
                                    <div class="fb-grouplabel">
                                        <label id="txtmobile" style="font-weight: bold; display: inline;">تلفن
                                            همراه</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="mobile" id="item55_text_1" type="text" maxlength="254"
                                            placeholder="" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold;" value="{{ old('mobile') }}" />

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
                                            placeholder="it@tvu.ac.ir" data-hint="" autocomplete="off"
                                            style="font-size: 16px; font-weight: bold; text-align: left;"
                                            value="{{ old('email') }}" />

                                        @error('email')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-100-item-column" id="item50">
                                    <div class="fb-grouplabel">
                                        <label id="txtname" style="font-weight: bold; display: inline;">نوع
                                            کاربر</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="type" id="type"
                                            style="font-size: 16px; font-weight: bold; height: 30px;">
                                            <option value="student" selected>دانشجو</option>
                                            <option value="teacher">استاد</option>
                                            <option value="admin">ادمین</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fb-footer fb-item-alignment-center" id="fb-submit-button-div"
                            style="height: 75px; padding-top: 25px; min-height: 1px;">
                            <button type="submit" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 16px; font-weight: bold; width: 150px;">
                                ثبت نام</button>

                            <button type="button" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 16px; font-weight: bold; width: 150px;"
                                onclick="window.location='{{ route('admin.index') }}'">
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
