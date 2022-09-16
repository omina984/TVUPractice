@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.index') }}">برگشت</a>
            &nbsp; / &nbsp;
            <span style="color: gray">به‌روزرسانی کاربر</span>
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
                            <h2 style="text-align: center; text-decoration: underline; padding-top: 10px;"> کاربران موجود
                            </h2>

                            <button type="button" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 18px; font-weight: bold; width: 150px; margin-right:10px;"
                                onclick="window.location='{{ route('admin.term.create') }}'">
                                ایجاد ترم جدید </button>

                            {{-- <div class="column ui-sortable" id="column1"> --}}
                            <div class="fb-item fb-100-item-column" id="item49">
                                <div class="container">
                                    <table class="table table-bordered table-hover" style="margin-right: 6px;">
                                        <thead>
                                            <tr>
                                                <td style="border: 1px solid; background-color:lightblue;">شناسه</td>
                                                <td style="border: 1px solid; background-color:lightblue;">نام کاربری</td>
                                                <td style="border: 1px solid; background-color:lightblue;">نام</td>
                                                <td style="border: 1px solid; background-color:lightblue;">نام خانوادگی</td>
                                                <td style="border: 1px solid; background-color:lightblue;">کدملی</td>
                                                <td style="border: 1px solid; background-color:lightblue;">دانشکده</td>
                                                <td style="border: 1px solid; background-color:lightblue;">ویرایش</td>
                                            </tr>
                                        </thead>

                                        <body>
                                            @foreach ($users as $user)
                                                <tr style="border: 1px solid;">
                                                    <td style="width: 5%; border: 1px solid; background-color:lightblue;"><a
                                                            href="#">{{ $user->user_id }}</a>
                                                    </td>
                                                    <td style="width: 15%; border: 1px solid;">{{ $user->username }}</td>
                                                    <td style="width: 15%; border: 1px solid;">{{ $user->user_name }}</td>
                                                    <td style="width: 15%; border: 1px solid;">{{ $user->family }}</td>
                                                    <td style="width: 15%; border: 1px solid;">{{ $user->nationalcode }}
                                                    </td>
                                                    <td style="width: 20%; border: 1px solid;">
                                                        {{ $user->markaz_name }}
                                                    </td>
                                                    <td style="width: 15%;"><a
                                                            href="#"
                                                            class="btn btn-link"
                                                            style="width: 90%; margin-top: 5px;">ویرایش</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </body>
                                    </table>
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
