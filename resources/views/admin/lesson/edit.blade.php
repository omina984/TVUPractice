@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.lessons.index') }}">برگشت</a>
            &nbsp; / &nbsp;
            <span style="color: gray">ویرایش درس موجود</span>
        </div>
    </div>
    
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <form data-aos="fade-up" data-aos-delay="400"
                        class="MyStyle_create_edit_form fb-toplabel fb-100-item-column selected-object" id="docContainer"
                        action="{{ route('admin.lesson.update', $lesson->id) }}" method="post">
                        @csrf

                        @include('layouts.messages')

                        <div class="section" id="section1">
                            <div class="column ui-sortable" id="column1">
                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="name" style="font-weight: bold; display: inline;">عنوان درس</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="name" id="item49_text_1" type="text" maxlength="254"
                                            placeholder="عنوان درس" data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ $lesson->name }}" />

                                        @error('name')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="lessongroups_id" style="font-weight: bold; display: inline;">گروه
                                            درسی</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="lessongroups_id" id="lessongroups_id"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            @foreach ($lessongroups as $lessongroup)
                                                <option value="{{ $lessongroup->id }}"
                                                    {{ old('lessongroups_id', $lesson->lessongroups_id) == $lessongroup->id ? 'selected' : '' }}>
                                                    {{ $lessongroup->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="lessongroup_code" style="font-weight: bold; display: inline;">کد گروه
                                            درسی</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="lessongroup_code" id="item49_text_1" type="text" maxlength="254"
                                            placeholder="کد گروه درسی" data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ $lesson->lessongroup_code }}" />

                                        @error('lessongroup_code')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="lessoncode" style="font-weight: bold; display: inline;">کد درس</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="lessoncode" id="item49_text_1" type="text" maxlength="254"
                                            placeholder="کد درس" data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ $lesson->lessoncode }}" />

                                        @error('lessoncode')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="vahed" style="font-weight: bold; display: inline;">تعداد واحد</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="vahed" id="item49_text_1" type="number" min="0"
                                            max="3" maxlength="254" placeholder="تعداد واحد" data-hint=""
                                            autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ $lesson->vahed }}" onkeypress='validate(event)'
                                            oninvalid="this.setCustomValidity('مقدار مجاز اعداد بین 0 الی 3 است')"
                                            oninput="this.setCustomValidity('')" />

                                        @error('vahed')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="vahed_teory" style="font-weight: bold; display: inline;"> تعداد واحد
                                            تئوری</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="vahed_teory" id="item49_text_1" type="number" min="0"
                                            max="3" maxlength="254" placeholder="تعداد واحد تئوری" data-hint=""
                                            autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ $lesson->vahed_teory }}" onkeypress='validate(event)'
                                            oninvalid="this.setCustomValidity('مقدار مجاز اعداد بین 0 الی 3 است')"
                                            oninput="this.setCustomValidity('')" />

                                        @error('vahed_teory')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="vahed_amali" style="font-weight: bold; display: inline;">تعداد واحد
                                            عملی</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="vahed_amali" id="item49_text_1" type="number" min="0"
                                            max="3" maxlength="254" placeholder="تعداد واحد عملی" data-hint=""
                                            autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ $lesson->vahed_amali }}" onkeypress='validate(event)'
                                            oninvalid="this.setCustomValidity('مقدار مجاز اعداد بین 0 الی 3 است')"
                                            oninput="this.setCustomValidity('')" />

                                        @error('vahed_amali')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item50">
                                    <div class="fb-grouplabel">
                                        <label id="state" style="font-weight: bold; display: inline;">وضعیت</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="state" id="state"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            <option value="1"
                                                {{ old('state', $lesson->state) == 1 ? 'selected' : '' }}>
                                                فعال</option>
                                            <option value="0"
                                                {{ old('state', $lesson->state) == 0 ? 'selected' : '' }}>
                                                غیر فعال</option>
                                        </select>

                                        @error('state')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fb-footer fb-item-alignment-center" id="fb-submit-button-div">
                            <button type="submit" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 18px; font-weight: bold; width: 150px;">
                                ثبت </button>

                            <button type="button" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 18px; font-weight: bold; width: 150px;"
                                onclick="window.location='{{ route('admin.lessons.index') }}'">
                                بازگشت </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection