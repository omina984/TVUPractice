@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.users.index') }}">بازگشت</a>
            &nbsp; / &nbsp;
            <span style="color: gray">کاربر جدید</span>
        </div>
    </div>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <form data-aos="fade-up" data-aos-delay="400"
                        class="MyStyle_create_edit_form fb-toplabel fb-100-item-column selected-object" id="docContainer"
                        action="{{ route('admin.user.store') }}" method="post">
                        @csrf

                        <div class="section" id="section1">
                            <div class="column ui-sortable" id="column1">
                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="username" style="font-weight: bold; display: inline;">نام
                                            کاربری</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="username" id="item49_text_1" type="text" maxlength="254"
                                            placeholder="نام کاربری یکتا" data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ old('username') }}" />

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
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;" />

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
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ old('name') }}" />

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
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ old('family') }}" />

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
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ old('father') }}" />

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
                                        <input name="nationalcode" id="item55_text_1" type="text" maxlength="10"
                                            placeholder="" data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ old('nationalcode') }}" onkeypress='validate(event)'/>

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
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
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
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ old('mobile') }}" onkeypress='validate(event)'/>

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
                                            oninvalid="this.setCustomValidity('لطفا آدرس پست الکترونیکی درست وارد کنید')"
                                            oninput="this.setCustomValidity('')" placeholder="it@tvu.ac.ir"
                                            data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; text-align: left;"
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
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            <option value="student" selected>دانشجو</option>
                                            <option value="teacher">استاد</option>
                                            <option value="admin">مدیر</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fb-footer fb-item-alignment-center" id="fb-submit-button-div">
                            <button type="submit" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 18px; font-weight: bold; width: 150px;">
                                ثبت نام</button>

                            <button type="button" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 18px; font-weight: bold; width: 150px;"
                                onclick="window.location='{{ route('admin.users.index') }}'">
                                بازگشت </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
