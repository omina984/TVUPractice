@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.majors.index') }}">برگشت</a>
            &nbsp; / &nbsp;
            <span style="color: gray">ویرایش رشته تحصیلی موجود</span>
        </div>
    </div>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <form data-aos="fade-up" data-aos-delay="400"
                        class="MyStyle_create_edit_form fb-toplabel fb-100-item-column selected-object" id="docContainer"
                        action="{{ route('admin.major.update', $major->id) }}" method="post">
                        @csrf

                        @include('layouts.messages')

                        <div class="section" id="section1">
                            <div class="column ui-sortable" id="column1">
                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="lessongroup_id" style="font-weight: bold; display: inline;">گروه
                                            درسی</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="lessongroup_id" id="lessongroup_id"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            @foreach ($lessongroups as $lessongroup)
                                                <option value="{{ $lessongroup->id }}"
                                                    {{ old('lessongroup_id', $major->lessongroup_id) == $lessongroup->id ? 'selected' : '' }}>
                                                    {{ $lessongroup->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="name" style="font-weight: bold; display: inline;">عنوان رشته
                                            تحصیلی</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="name" id="item49_text_1" type="text" maxlength="254"
                                            placeholder="عنوان رشته تحصیلی" data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ $major->name }}" />

                                        @error('name')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-100-item-column" id="item50">
                                    <div class="fb-grouplabel">
                                        <label id="state" style="font-weight: bold; display: inline;">وضعیت</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="state" id="state"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            <option value="1" {{ old('state', $major->state) == 1 ? 'selected' : '' }}>
                                                فعال</option>
                                            <option value="0" {{ old('state', $major->state) == 0 ? 'selected' : '' }}>
                                                غیر فعال</option>
                                        </select>

                                        @error('state')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-100-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="description" style="font-weight: bold; display: inline;">شرح رشته
                                            تحصیلی</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <textarea name="description" id="description" cols="30" rows="10" data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;" value="{{ old('description') }}" />{{ $major->description }}</textarea>

                                        @error('description')
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
                                onclick="window.location='{{ route('admin.majors.index') }}'">
                                بازگشت </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection