@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.index') }}">برگشت</a>
            &nbsp; / &nbsp;
            <span class="MyStyle_breadcrumb_span">کاربران</span>
        </div>
    </div>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    @include('layouts.messages')

                    <form data-aos="fade-up" data-aos-delay="400" class="fb-toplabel fb-100-item-column selected-object"
                        style="width: 100%;" id="docContainer" action="{{ route('admin.users.search') }}" method="post">
                        @csrf

                        <div class="section" id="section1">
                            <h2 class="MyStyle_inbox_H2"> کاربران موجود
                            </h2>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <button type="button" class="MyStyle_inbox_button btn btn-info btn-fw"
                                        onclick="window.location='{{ route('admin.user.create') }}'">
                                        ایجاد کاربر جدید
                                    </button>
                                </div>

                                <div>
                                    <button type="submit" class="MyStyle_inbox_button btn btn-info btn-fw"
                                        onclick="window.location='{{ route('admin.users.search') }}'">
                                        جستجو
                                    </button>

                                    <input name="username" id="item49_text_1" type="text" maxlength="254"
                                        placeholder="نام کاربری" data-hint="" autocomplete="off"
                                        style="font-size: 16px; font-weight: bold; width: 200px; text-align: left; margin-left: 10px;"
                                        value="{{ old('username') }}" />
                                </div>
                            </div>

                            <div class="fb-item fb-100-item-column" id="item49">
                                <div class="container">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <td>شناسه</td>
                                                <td>نام کاربری</td>
                                                <td>نام</td>
                                                <td>نام خانوادگی</td>
                                                <td>کدملی</td>
                                                <td>دانشکده</td>
                                                <td>ویرایش</td>
                                            </tr>
                                        </thead>

                                        <body>
                                            @foreach ($users as $user)
                                                <tr 
                                                    @if ($user->type != 0) 
                                                        @if ($user->user_state == 0)
                                                            style="background-color: lightsalmon;" 
                                                        @else 
                                                            style="background-color: transparent" 
                                                        @endif
                                                    @elseif ($user->type == 0)
                                                        @if ($user->user_state == 0) 
                                                            style="background-color: lightsalmon;" 
                                                        @else
                                                            style="background-color: lightgreen;" 
                                                        @endif
                                                    @endif
                                                    >

                                                    <td style="width: 5%;"><a href="#">{{ $user->user_id }}</a>
                                                    </td>
                                                    <td style="width: 15%;">
                                                        {{ $user->username }}</td>
                                                    <td style="width: 15%;">{{ $user->user_name }}</td>
                                                    <td style="width: 15%;">{{ $user->family }}</td>
                                                    <td style="width: 15%;">{{ $user->nationalcode }}
                                                    </td>
                                                    <td style="width: 25%;">
                                                        {{ $user->markaz_name }}
                                                    </td>
                                                    <td style="width: 10%;"><a
                                                            href="{{ route('admin.user.edit', $user->user_id) }}"
                                                            class="btn btn-info"
                                                            style="width: 90%; margin-top: 5px;">ویرایش</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </body>
                                    </table>
                                </div>

                                <div id='MyPaginate'>
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
