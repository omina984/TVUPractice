@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.index') }}">صفحه مدیریت</a>
            &nbsp; / &nbsp;
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
                                        <label id="lessongroup_id_name" style="font-weight: bold; display: inline;">گروه
                                            درسی</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="lessongroup_id" id="lessongroup_id"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            <option value="0"> لطفا انتخاب کنید </option>

                                            @foreach ($lessongroups as $lessongroup)
                                                <option value="{{ $lessongroup->id }}"
                                                    @if ($lessongroup->state == 0) style="background-color: lightsalmon;"
                                                    @else
                                                        style="background-color: transparent" @endif>
                                                    {{ $lessongroup->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('lessongroup_id')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="major_id_name" style="font-weight: bold; display: inline;">رشته
                                            تحصیلی</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="major_id" id="major_id"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            <option value="0"> لطفا انتخاب کنید </option>
                                        </select>

                                        @error('major_id')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
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

                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="term_id" style="font-weight: bold; display: inline;">ترم ارائه
                                            درس</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="term_id" id="term_id"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            @foreach ($terms as $term)
                                                <option value="{{ $term->id }}"
                                                    {{ old('term_id', $lesson->term_id) == $term->id ? 'selected' : '' }}>
                                                    {{ $term->name }}
                                                </option>
                                            @endforeach
                                        </select>
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

                                <div class="fb-item fb-100-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="description" style="font-weight: bold; display: inline;">شرح
                                            درس</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <textarea name="description" id="description" cols="30" rows="10" data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;" value="{{ old('description') }}" />{{ $lesson->description }}</textarea>

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
                                onclick="window.location='{{ route('admin.lessons.index') }}'">
                                بازگشت </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#lessongroup_id').change(function() {
            var id = $(this).val();
            $('#major_id').find('option').not(':first').remove();

            $.ajax({
                url: 'getMajors/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    var len = 0;

                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var option = "<option value='" + id + "'>" + name + "</option>";

                            $("#major_id").append(option);
                        }
                    }
                }
            });
        });
    });
</script>
