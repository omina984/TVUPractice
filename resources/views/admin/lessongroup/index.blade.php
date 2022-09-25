@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.index') }}">برگشت</a>
            &nbsp; / &nbsp;
            <span class="MyStyle_breadcrumb_span">گروه‌های درسی</span>
        </div>
    </div>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    @include('layouts.messages')

                    <form data-aos="fade-up" data-aos-delay="400" class="fb-toplabel fb-100-item-column selected-object"
                        style="width: 100%;" id="docContainer" action="#">
                        <div class="section" id="section1">
                            <h2 id='MyH2'> گروه‌های درسی موجود
                            </h2>

                            {{-- <div class="column ui-sortable" id="column1"> --}}
                            <div class="fb-item fb-100-item-column" id="item49">
                                <div class="container">
                                    <button type="button" class="MyStyle_inbox_button btn btn-info btn-fw"
                                    style="width: 160px;"
                                        onclick="window.location='{{ route('admin.lessongroup.create') }}'">
                                        ایجاد گروه درسی جدید </button>

                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <td>شناسه</td>
                                                <td>نام</td>
                                                <td>توضیحات</td>
                                                <td>وضعیت</td>
                                                <td>ویرایش</td>
                                            </tr>
                                        </thead>

                                        <body>
                                            @foreach ($lessongroups as $lessongroup)
                                                <tr>
                                                    <td style="width: 5%; background-color:lightblue;"><a
                                                            href="{{ route('admin.lessongroup.edit', $lessongroup->id) }}">{{ $lessongroup->id }}</a>
                                                    </td>
                                                    <td style="width: 20%;">{{ $lessongroup->name }}</td>
                                                    <td style="width: 55%;">{{ $lessongroup->description }}</td>
                                                    <td style="width: 10%;">
                                                        @if ($lessongroup->state == 0)
                                                            غیر فعال
                                                        @elseif ($lessongroup->state == 1)
                                                            فعال
                                                        @else
                                                            نا معلوم
                                                        @endif
                                                    </td>
                                                    <td style="width: 10%;">
                                                        <a id='Mya' href="{{ route('admin.lessongroup.edit', $lessongroup->id) }}"
                                                            class="btn btn-info">ویرایش
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </body>
                                    </table>
                                </div>

                                <div id='MyPaginate'>
                                    {{ $lessongroups->links() }}
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
