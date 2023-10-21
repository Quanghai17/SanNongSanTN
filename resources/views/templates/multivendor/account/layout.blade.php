@extends($sc_templatePath.'.layout')

@section('block_main')
<main class="main pages">
  <div class="page-header breadcrumb-wrap">
      <div class="container">
          <div class="breadcrumb">
              <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a>
              <span></span> Tài khoản
          </div>
      </div>
  </div>
  <div class="page-content pt-150 pb-150">
      <div class="container">
          <div class="row">
              <div class="col-lg-10 m-auto">
                  <div class="row">
                      <div class="col-md-3">
                          <div class="dashboard-menu">
                            @include($sc_templatePath.'.account.nav_customer')
                          </div>
                      </div>
                      <div class="col-md-9">
                          <div class="tab-content account dashboard-content pl-50">
                            @section('block_main_profile')
                            @show
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
{{-- <section class="section section-sm section-first bg-default text-md-left">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3">
          @include($sc_templatePath.'.account.nav_customer')
        </div>
        <div class="col-12 col-sm-12 col-md-9 min-height-37vh">
            @section('block_main_profile')
            @show
        </div>
      </div>
    </div>
</section> --}}
@endsection