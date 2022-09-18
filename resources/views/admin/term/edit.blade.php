@extends('admin.partials.layout')

@section('pagetitle')
    {{ $pagetitle }}
@endsection

@section('content')
    <div class="breadcrumb">
        <div>
            <a href="{{ route('admin.terms.index') }}">برگشت</a>
            &nbsp; / &nbsp;
            <span style="color: gray">ویرایش ترم موجود</span>
        </div>
    </div>

    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <form data-aos="fade-up" data-aos-delay="400" class="fb-toplabel fb-100-item-column selected-object"
                        id="docContainer" style="border-width: 3px; font-family: 'B Nazanin'; font-size: 20px; width: 800px;"
                        action="{{ route('admin.term.update', $term->id) }}" method="post">
                        @csrf

                        <div class="fb-form-header" id="fb-form-header1"
                            style="height: 0px; background-repeat: no-repeat; background-position-x: left; background-color: transparent;">
                            <a class="fb-link-logo" id="fb-link-logo1" style="max-width: 104px;" target="_blank"><img
                                    title="Alternative text" class="fb-logo" id="fb-logo1"
                                    style="width: 100%; display: none;" alt="Alternative text"
                                    src="common/images/image_default.png" /></a>
                        </div>

                        <div class="section" id="section1">
                            <div class="column ui-sortable" id="column1">
                                <div class="fb-item fb-50-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="name" style="font-weight: bold; display: inline;">عنوان ترم</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <input name="name" id="item49_text_1" type="text" maxlength="254"
                                            placeholder="عنوان ترم" data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;"
                                            value="{{ $term->name }}" />

                                        @error('name')
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
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold; height: 30px;">
                                            <option value="1" {{ old('state', $term->state) == 1 ? 'selected' : '' }}>
                                                فعال</option>
                                            <option value="0" {{ old('state', $term->state) == 0 ? 'selected' : '' }}>
                                                غیر فعال</option>
                                        </select>

                                        @error('state')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fb-item fb-100-item-column" id="item49">
                                    <div class="fb-grouplabel">
                                        <label id="description" style="font-weight: bold; display: inline;">شرح ترم</label>
                                    </div>

                                    <div class="fb-input-box">
                                        <textarea name="description" id="description" cols="30" rows="10" data-hint="" autocomplete="off"
                                            style="font-family: B Nazanin; font-size: 18px; font-weight: bold;" value="{{ old('description') }}" />{{ $term->description }}</textarea>

                                        @error('description')
                                            <div class="alert alert-danger"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fb-footer fb-item-alignment-center" id="fb-submit-button-div"
                            style="height: 75px; padding-top: 20px; min-height: 100px;">
                            <button type="submit" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 18px; font-weight: bold; width: 150px;">
                                ثبت </button>

                            <button type="button" class="btn btn-info btn-fw"
                                style="font-family: 'B Nazanin'; font-size: 18px; font-weight: bold; width: 150px;"
                                onclick="window.location='{{ route('admin.terms.index') }}'">
                                بازگشت </button>
                        </div>

                        <input name="fb_form_custom_html" type="hidden" />
                        <input name="fb_form_embedded" type="hidden" />
                        <input name="fb_js_enable" id="fb_js_enable" type="hidden" />
                        <input name="fb_url_embedded" id="fb_url_embedded" type="hidden" />
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
