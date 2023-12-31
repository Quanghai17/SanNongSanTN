@extends($sc_templatePath . '.layout')

@section('block_main')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a>
                    <span></span> Đăng nhập
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15"
                                    src="https://wp.alithemes.com/html/nest/demo/assets/imgs/page/login-1.png"
                                    alt="">
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <section class="section section-sm section-first bg-default text-md-left">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <h2>{{ sc_language_render('customer.title_login') }}</h2>
                                                <form action="{{ sc_route('postLogin') }}" method="post" class="box">
                                                    {!! csrf_field() !!}
                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="email"
                                                            class="control-label">{{ sc_language_render('customer.email') }}</label>
                                                        <input
                                                            class="is_required validate account_input form-control {{ $errors->has('email') ? 'input-error' : '' }}"
                                                            type="text" name="email" value="{{ old('email') }}">
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                {{ $errors->first('email') }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label for="password"
                                                            class="control-label">{{ sc_language_render('customer.password') }}</label>
                                                        <input
                                                            class="is_required validate account_input form-control {{ $errors->has('password') ? 'input-error' : '' }}"
                                                            type="password" name="password" value="">
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                {{ $errors->first('password') }}
                                                            </span>
                                                        @endif

                                                    </div>
                                                    <button style="margin: 10px" type="submit" name="SubmitLogin"
                                                        class="button button-lg button-secondary">{{ sc_language_render('front.login') }}</button>

                                                    @if (!empty(sc_config('LoginSocialite')))
                                                        <ul style="display: flex;justify-content: space-around;">
                                                            <li class="rd-dropdown-item">
                                                                <a class="rd-dropdown-link"
                                                                    href="{{ sc_route('login_socialite.index', ['provider' => 'facebook']) }}"><i
                                                                        class="fab fa-facebook"></i>
                                                                    {{ sc_language_render('front.login') }} facebook</a>
                                                            </li>
                                                            <li class="rd-dropdown-item">
                                                                <a class="rd-dropdown-link"
                                                                    href="{{ sc_route('login_socialite.index', ['provider' => 'google']) }}"><i
                                                                        class="fab fa-google-plus"></i>
                                                                    {{ sc_language_render('front.login') }} google</a>
                                                            </li>
                                                            <li class="rd-dropdown-item">
                                                                <a class="rd-dropdown-link"
                                                                    href="{{ sc_route('login_socialite.index', ['provider' => 'github']) }}"><i
                                                                        class="fab fa-github"></i>
                                                                    {{ sc_language_render('front.login') }} github</a>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                    <p class="lost_password form-group">
                                                        <a style="margin: 10px" class="btn btn-link"
                                                            href="{{ sc_route('forgot') }}">
                                                            {{ sc_language_render('customer.password_forgot') }}
                                                        </a>
                                                        <br>
                                                        <a style="margin: 10px" class="btn btn-link"
                                                            href="{{ sc_route('register') }}">
                                                            {{ sc_language_render('customer.title_register') }}
                                                        </a>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--form-->
   
    <!--/form-->
@endsection
