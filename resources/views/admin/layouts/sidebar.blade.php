    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo d-flex align-items-center">
            <a href="#" class="d-flex align-items-center">
                <img src="{{ asset('asset/images/RENEW-LOGO.png') }}" alt="Cool Admin" class="img-fluid" style="width: 90px; height: 90px;" />
                <h1><strong class="ms-3">BSIT</strong> </h1>
            </a>
        </div>

        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li  @if (Route::currentRouteName() === 'admin.dashboard') class="active has-sub" @elseif (Route::currentRouteName() === 'officer.dashboard')  class="active has-sub" @elseif (Route::currentRouteName() === 'student.dashboard')  class="active has-sub"@endif >
                        @if (auth()->user()->user_type == 'admin')
                        <a class="js-arrow" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        @elseif (auth()->user()->user_type == 'officer')
                         <a class="js-arrow" href="{{ route('officer.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        @elseif (auth()->user()->user_type == 'student')
                        <a class="js-arrow" href="{{ route('student.dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        @endif

                        {{-- <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="index.html">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="index2.html">Dashboard 2</a>
                            </li>
                            <li>
                                <a href="index3.html">Dashboard 3</a>
                            </li>
                            <li>
                                <a href="index4.html">Dashboard 4</a>
                            </li>
                        </ul> --}}
                     </li>
                     @if(auth()->user()->user_type == 'admin')
                    <li  @if (Route::currentRouteName() === 'admin.index') class="active has-sub" @endif>
                            <a href="{{ route('admin.index') }}">
                            <i class="fas fa-users"></i>Create Bits Account</a>
                    </li>
                    @endif
                    @if(auth()->user()->user_type == 'officer')
                    @if(auth()->user()->officer_status == 1)
                    <li  @if (Route::currentRouteName() === 'officer.index.scanqr') class="active has-sub" @endif>
                        <a href="{{ route('officer.index.scanqr') }}">
                        <i class="fa fa-qrcode"></i>Scan QR Code</a>
                    </li>
                    @endif

                    <li  @if (Route::currentRouteName() === 'officer.pending') class="active has-sub" @endif>
                        <a href="{{ route('officer.pending') }}">
                            <i class="far fa-check-square"></i>Pending Accounts</a>
                    </li>
                    @if(auth()->user()->officer_status == 1)
                    <li  @if (Route::currentRouteName() === 'officer.event.index') class="active has-sub" @endif>
                        <a href="{{ route('officer.event.index') }}">
                            <i class="fas fa-table"></i>Events Records</a>
                    </li>
                    @endif
                    <li  @if (Route::currentRouteName() === 'officer.createEvent') class="active has-sub" @endif>
                        <a href="{{ route('officer.createEvent') }}">
                            <i class="fas fa-table"></i>Create Event</a>
                    </li>
                    @if (auth()->user()->payment_status == 1)
                    <li  @if (Route::currentRouteName() === 'officer.index.payment') class="active has-sub" @endif>
                        <a href="{{ route('officer.index.payment') }}">
                        <i class="fas fa-users"></i>Payment</a>
                    </li>
                    @endif

                    @endif

                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->
