@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.users.index') }}">بازگشت</a>
            &nbsp; / &nbsp;
            <span style="color: gray">کاربر موجود</span>
        </div>
    </div>

    {{-- <div class="MyStyle">
        لطفا در صورت نداشتن نام کاربری با مدیر سامانه در تماس باشید
    </div> --}}

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <form data-aos="fade-up" data-aos-delay="400"
                        class="MyStyle_create_edit_form fb-toplabel fb-100-item-column selected-object" id="docContainer"
                        action="{{ route('admin.user.update', $user->id) }}" method="post">
                        @csrf

                        @include('layouts.messages')

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
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;" disabled
                                            value="{{ $user->username }}" />

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
                                            value="{{ $user->name }}" />

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
                                            value="{{ $user->family }}" />

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
                                            value="{{ $user->father }}" />

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
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ $user->nationalcode }}" />

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
                                                <option value="{{ $mz->id }}"
                                                    {{ old('markaz_id', $user->markaz_id) == $mz->id ? 'selected' : '' }}>
                                                    {{ $mz->name }}
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
                                            value="{{ $user->mobile }}" />

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
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; text-align: left;"
                                            value="{{ $user->email }}" />

                                        @error('email')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item50">
                                    <div class="fb-grouplabel">
                                        <label id="type" style="font-weight: bold; display: inline;">نوع
                                            کاربر</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="type" id="type"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            <option value="2" {{ $user->type == 2 ? 'selected' : '' }}>دانشجو
                                            </option>
                                            <option value="1" {{ $user->type == 1 ? 'selected' : '' }}>استاد
                                            </option>
                                            <option value="0" {{ $user->type == 0 ? 'selected' : '' }}>مدیر</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item50">
                                    <div class="fb-grouplabel">
                                        <label id="state" style="font-weight: bold; display: inline;">وضعیت</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="state" id="type"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            <option value="1" {{ $user->state == 1 ? 'selected' : '' }}>فعال</option>
                                            <option value="0" {{ $user->state == 0 ? 'selected' : '' }}>غیر فعال
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fb-footer fb-item-alignment-center" id="fb-submit-button-div">
                            <button type="submit" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 18px; font-weight: bold; width: 150px;">
                                ثبت</button>

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
