{{-- <ul class="list-group list-group-flush member-nav">
    <li class="list-group-item">
        <a href="{{ sc_route('customer.change_password') }}"><i class="fa fa-key" aria-hidden="true"></i> {{ sc_language_render('customer.change_password') }}</a></li>
    <li class="list-group-item">
        <a href="{{ sc_route('customer.change_infomation') }}"><i class="fa fa-list-alt" aria-hidden="true"></i> {{ sc_language_render('customer.change_infomation') }}
        </a>
    </li>
    <li class="list-group-item">
        <a href="{{ sc_route('customer.address_list') }}"><i class="fa fa-id-card-o" aria-hidden="true"></i> {{ sc_language_render('customer.address_list') }}</a>
    </li>
    <li class="list-group-item">
        <a href="{{ sc_route('customer.order_list') }}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> {{ sc_language_render('customer.order_history') }}</a>
    </li>
</ul> --}}
<ul class="nav flex-column" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ sc_route('customer.order_list') }}"><i class="fi-rs-shopping-bag mr-10"></i>Đơn hàng</a>
    </li>
    <li class="nav-item">
        <a class="nav-link"  href="{{ sc_route('customer.change_infomation') }}"><i class="fi-rs-user mr-10"></i>Thông tin chi tiết</a>
    </li>
    <li class="nav-item">
        <a class="nav-link"  href="{{ sc_route('customer.change_password') }}"><i class="fi-rs-user mr-10"></i>Thay đổi mật khẩu</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ sc_route('logout') }}"><i class="fi-rs-sign-out mr-10"></i>Đăng xuất</a>
    </li>
</ul>