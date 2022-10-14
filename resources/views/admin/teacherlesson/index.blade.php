@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.index') }}">برگشت</a>
            &nbsp; / &nbsp;
            <span class="MyStyle_breadcrumb_span">تخصیص دروس</span>
        </div>
    </div>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    @include('layouts.messages')

                    <form data-aos="fade-up" data-aos-delay="400" class="fb-toplabel fb-100-item-column selected-object"
                        style="width: 100%;" id="docContainer" action="{{ route('admin.teacherlessons.search') }}"
                        method="post">
                        @csrf

                        <div class="section" id="section1">
                            <h2 id='MyH2'> تخصیص دروس موجود
                            </h2>

                            {{-- <div class="column ui-sortable" id="column1"> --}}
                            <div class="fb-item fb-100-item-column" id="item49">
                                <div class="container">
                                    <div class="d-flex justify-content-between" style="margin-left: -6px;">
                                        <div>
                                            <button type="button" class="MyStyle_inbox_button btn btn-info btn-fw"
                                                onclick="window.location='{{ route('admin.teacherlesson.create') }}'"
                                                style="width: 160px;">
                                                تخصیص دروس جدید </button>
                                        </div>

                                        <div style="width: 100%; text-align: left;">
                                            <button type="submit" class="MyStyle_inbox_button btn btn-info btn-fw"
                                                onclick="window.location='{{ route('admin.teacherlessons.search') }}'">
                                                جستجو
                                            </button>
                                        </div>

                                        <div style="padding-top: 1px; padding-right: 5px; padding-left: 5px;">
                                            <input name="nationalcode" id="item49_text_1" type="text" maxlength="254"
                                                placeholder="کدملی استاد" data-hint="" autocomplete="off"
                                                style="font-family: B Nazanin; font-size: 16px; width: 200px; text-align: left;"
                                                value="{{ old('nationalcode') }}" />
                                        </div>
                                    </div>

                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <td>شناسه</td>
                                                <td>نام استاد</td>
                                                <td>نام درس</td>
                                                <td>کد درس</td>
                                                <td>ترم ارائه</td>
                                                <td>توضیحات</td>
                                                <td>وضعیت</td>
                                                <td>ویرایش</td>
                                            </tr>
                                        </thead>

                                        <body>
                                            @foreach ($teacherlessons as $teacherlesson)
                                                <tr
                                                    @if ($teacherlesson->teacherlesson_state == 0) style="background-color: lightsalmon;"
                                            @else
                                                style="background-color: transparent" @endif>
                                                    <td style="width: 5%; background-color:lightblue;"><a
                                                            href="{{ route('admin.teacherlesson.edit', $teacherlesson->teacherlesson_id) }}">{{ $teacherlesson->teacherlesson_id }}</a>
                                                    </td>
                                                    <td style="width: 15%;">
                                                        {{ $teacherlesson->teacher_name . ' ' . $teacherlesson->teacher_family }}
                                                    </td>
                                                    <td style="width: 15%;">{{ $teacherlesson->lesson_name }}</td>
                                                    <td style="width: 10%;">{{ $teacherlesson->lessoncode }}</td>
                                                    <td style="width: 10%;">{{ $teacherlesson->term_name }}</td>
                                                    <td style="width: 25%;">{{ $teacherlesson->teacherlesson_description }}
                                                    </td>
                                                    <td style="width: 10%;">
                                                        @if ($teacherlesson->teacherlesson_state == 0)
                                                            غیر فعال
                                                        @elseif ($teacherlesson->teacherlesson_state == 1)
                                                            فعال
                                                        @else
                                                            نا معلوم
                                                        @endif
                                                    </td>
                                                    <td style="width: 10%;">
                                                        <a id='Mya'
                                                            href="{{ route('admin.teacherlesson.edit', $teacherlesson->teacherlesson_id) }}"
                                                            class="btn btn-info">ویرایش
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </body>
                                    </table>
                                </div>

                                <div id='MyPaginate'>
                                    {{ $teacherlessons->links() }}
                                </div>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
