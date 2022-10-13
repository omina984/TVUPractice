@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.teacherlessons.index') }}">برگشت</a>
            &nbsp; / &nbsp;
            <span style="color: gray">تخصیص دروس جدید</span>
        </div>
    </div>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <form data-aos="fade-up" data-aos-delay="400"
                        class="MyStyle_create_edit_form fb-toplabel fb-100-item-column selected-object" id="docContainer"
                        style="margin-bottom: 5px;" method="post">
                        @csrf

                        <div class="section" id="section1">
                            <div class="column ui-sortable" id="column1">
                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="lessongroup_id_search_name"
                                            style="font-weight: bold; display: inline;">گروه
                                            درسی</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="lessongroup_id_search" id="lessongroup_id_search"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            <option value="0"> لطفا انتخاب کنید </option>

                                            @foreach ($lessongroups as $lessongroup)
                                                <option value="{{ $lessongroup->id }}">
                                                    {{ $lessongroup->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="major_id_search_name" style="font-weight: bold; display: inline;">رشته
                                            تحصیلی</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="major_id_search" id="major_id_search"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            <option value="0"> لطفا انتخاب کنید </option>

                                            @foreach ($majors as $major)
                                                <option value="{{ $major->id }}">
                                                    {{ $major->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <form data-aos="fade-up" data-aos-delay="400"
                        class="MyStyle_create_edit_form fb-toplabel fb-100-item-column selected-object" id="docContainer"
                        action="{{ route('admin.teacherlesson.store') }}" method="post">
                        @csrf

                        <div class="section" id="section1">
                            <div class="column ui-sortable" id="column1">
                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="teacher_id_name" style="font-weight: bold; display: inline;">نام
                                            استاد</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="teacher_id" id="teacher_id"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            <option value="0"> لطفا انتخاب کنید </option>

                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->teacher_id }}">
                                                    {{ $teacher->teacher_name . ' ' . $teacher->teacher_family }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('teacher_id')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="lesson_id_name" style="font-weight: bold; display: inline;">نام
                                            درس</label>
                                    </div>

                                    <div class="fb-dropdown">
                                        <select name="lesson_id" id="lesson_id"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 40px;">
                                            <option value="0"> لطفا انتخاب کنید </option>
                                            {{-- @foreach ($lessons as $lesson)
                                                <option value="{{ $lesson->id }}">
                                                    {{ $lesson->name }}
                                                </option>
                                            @endforeach --}}
                                        </select>

                                        @error('lesson_id')
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
                                            <option value="1" selected>فعال</option>
                                            <option value="0">غیر فعال</option>
                                        </select>

                                        @error('state')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-100-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="description_name" style="font-weight: bold; display: inline;">شرح تخصیص
                                            درس</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <textarea name="description" id="description" cols="30" rows="10" data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;" value="{{ old('description') }}" /></textarea>

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
                                onclick="window.location='{{ route('admin.teacherlessons.index') }}'">
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
        $('#lessongroup_id_search').change(function() {
            var id = $(this).val();
            $('#major_id_search').find('option').not(':first').remove();

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

                            $("#major_id_search").append(option);
                        }
                    }
                }
            });
        });
    });
</script>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#lessongroup_id_search').change(function() {
            var id = $(this).val();
            // $("#description").val(id);

            $('#teacher_id').find('option').not(':first').remove();

            $.ajax({
                url: 'getTeachers/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    var len = 0;

                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            // $("#description").val(response['data'][i].id);

                            var id = response['data'][i].teacher_id;
                            var name = response['data'][i].teacher_name + " " + response[
                                'data'][i].teacher_family;
                            var option = "<option value='" + id + "'>" + name + "</option>";

                            $("#teacher_id").append(option);
                        }
                    }
                }
            });
        });
    });
</script>

<script type='text/javascript'>
    $(document).ready(function() {
        $('#teacher_id').change(function() {
            var id = $(this).val();
            // $("#description").val(id);

            $('#lesson_id').find('option').not(':first').remove();

            $.ajax({
                url: 'getLessons/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    var len = 0;

                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        for (var i = 0; i < len; i++) {
                            // $("#description").val(response['data'][i].id);

                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var option = "<option value='" + id + "'>" + name + "</option>";

                            $("#lesson_id").append(option);
                        }
                    }
                }
            });
        });
    });
</script>
