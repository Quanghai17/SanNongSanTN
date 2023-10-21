@php
/*
$layout_page = shop_contact
*/
@endphp

@extends($sc_templatePath.'.layout')

@section('block_main')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ sc_route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a>
                <span></span> Liên hệ 
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="mb-50">
                        <div class="row mb-60">
                            <div class="col-md-10 mb-12 mb-md-0">
                                <h4 class="mb-15 text-brand">Thông tin liên hệ</h4>
                                {{ sc_store('address', ($storeId ?? null)) }}<br>
                                <abbr title="Phone">Số điện thoại:</abbr>  {{ sc_store('long_phone', ($storeId ?? null)) }}<br>
                                <abbr title="Email">Email: </abbr>{{ sc_store('email', ($storeId ?? null)) }}<br>
                                <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="contact-from-area padding-20-row-col">
                                    <h5 class="text-brand mb-10">Form liên hệ</h5>

                                    <form method="post" action="{{ sc_route('contact.post') }}" class="contact-form-style mt-30" id="form-process">
                                        {{ csrf_field() }}
                                        <div id="contactFormWrapper">
                                            <div class="row">
                                                <div class="input-style mb-20 {{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label>{{ sc_language_render('contact.name') }}:</label>
                                                    <input type="text" class="form-control {{ ($errors->has('name'))?"input-error":"" }}"
                                                        name="name" placeholder="{{ sc_language_render('contact.name') }}" value="{{ old('name') }}">
                                                    @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        {{ $errors->first('name') }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="input-style mb-20 {{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label>{{ sc_language_render('contact.email') }}:</label>
                                                    <input type="email" class="form-control {{ ($errors->has('email'))?"input-error":"" }}"
                                                        name="email" placeholder="{{ sc_language_render('contact.email') }}" value="{{ old('email') }}">
                                                    @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        {{ $errors->first('email') }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="input-style mb-20 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                    <label>{{ sc_language_render('contact.phone') }}:</label>
                                                    <input type="telephone" class="form-control {{ ($errors->has('phone'))?"input-error":"" }}"
                                                        name="phone" placeholder="{{ sc_language_render('contact.phone') }}" value="{{ old('phone') }}">
                                                    @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        {{ $errors->first('phone') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                        
                                            <div class="row">
                                                <div class="input-style mb-20 {{ $errors->has('title') ? ' has-error' : '' }}">
                                                    <label class="control-label">{{ sc_language_render('contact.subject') }}:</label>
                                                    <input type="text" class="form-control {{ ($errors->has('title'))?"input-error":"" }}"
                                                        name="title" placeholder="{{ sc_language_render('contact.subject') }}" value="{{ old('title') }}">
                                                    @if ($errors->has('title'))
                                                    <span class="help-block">
                                                        {{ $errors->first('title') }}
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="input-style mb-20 {{ $errors->has('content') ? ' has-error' : '' }}">
                                                    <label class="control-label">{{ sc_language_render('contact.content') }}:</label>
                                                    <textarea class="form-control {{ ($errors->has('content'))?"input-error":"" }}" rows="5"
                                                        cols="75" name="content" placeholder="{{ sc_language_render('contact.content') }}">{{ old('content') }}</textarea>
                                                    @if ($errors->has('content'))
                                                    <span class="help-block">
                                                        {{ $errors->first('content') }}
                                                    </span>
                                                    @endif
                        
                                                </div>
                                            </div>
                        
                                            {!! $viewCaptcha?? '' !!}
                        
                                            {{-- Button submit --}}
                                            

                                            <div class="col-lg-12 col-md-12">
                                                <button class="submit submit-auto-width" type="submit">{{ sc_language_render('action.submit') }}</button>
                                            </div>
                                            {{--// Button submit --}}
                                        </div>
                                    </form>
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                            <div class="col-lg-4 pl-50 d-lg-block d-none">
                                <img class="border-radius-15 mt-50" src="https://thainguyen.gov.vn/documents/130212/7203175/Fectival+tra+2.jpg/c86c9e7c-a51a-42bf-89c7-f703d9f4b6cd?t=1642560329978" alt="">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection


@push('styles')
{{-- Your css style --}}
@endpush

@push('scripts')
{{-- //script here --}}
@endpush