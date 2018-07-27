<!-- HEADER DESKTOP-->
<header class="header-desktop3 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="#">
                    <img src="{{asset('images/icon/logo-white.png')}}" alt="Eljomi" />
                </a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li class="has-sub">
                        <a href="{{route('dashboard')}}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard
                            <span class="bot-line"></span>
                        </a>

                    </li>
              
                    <li class="has-sub">
                        <a href="{{route('customers.index')}}">
                            <i class="fas fa-group"></i>
                            <span class="bot-line"></span>Clients</a>
                        <ul class="header3-sub-list list-unstyled">                                                             
                            <li>
                                <a href="{{route('customers.type', ['type' => 'Individual'])}}">Individual</a>
                            </li>
                            <li>
                                <a href="{{route('customers.type', ['type' => 'Corporate'])}}">Corporate</a>
                            </li>                            

                        </ul>                                    
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-bar-chart"></i>
                            <span class="bot-line"></span>Reports</a>
                        <ul class="header3-sub-list list-unstyled">  
                            <li>
                                <a href="{{route('reports.today')}}">Today's Delivery</a>
                            </li>                        
                            <li>
                                <a href="{{route('reports.pending')}}">Pending Delivery</a>
                            </li>
                            <li>
                                    <a href="{{route('reports.overdue')}}">Over-Due Delivery</a>
                            </li>                            
                                                                     
                        </ul>
                    </li>
                </ul>
                    </div>
                    <div class="header__tool">

                    
                        <div class="header-button-item has-noti ">                            
                                <a href="#"  data-toggle="modal" data-target="#resetPasswordModal">
                                        <i class="zmdi zmdi-lock text-danger"></i>
                                    </a>
                        
                        <!-- <i class="zmdi zmdi-notifications"></i>                             -->
                </div>
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{asset('images/icon/user.png')}}" alt="logged user" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{substr(auth()->user()->name, 0, 11)}}..</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{asset('images/icon/user.png')}}" alt="Eljomi" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{auth()->user()->name}}</a>
                                            </h5>
                                            <span class="email">{{auth()->user()->email}}</span>
                                        </div>
                                    </div>                              
                                    <div class="account-dropdown__footer">
                                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

<!-- END HEADER DESKTOP-->

<!-- HEADER MOBILE-->
<header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{route('dashboard')}}">
                    <img src="{{asset('images/icon/logo-white.png')}}" alt="Eljomi" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{route('dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                            
                            </ul>
                        </li>
                    
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-group"></i>Reports</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                            <a href="{{route('reports.today')}}">Today's Delivery</a>
                                        </li>                        
                                        <li>
                                            <a href="{{route('reports.pending')}}">Pending Delivery</a>
                                        </li>
                                        <li>
                                                <a href="{{route('reports.overdue')}}">Over-Due Delivery</a>
                                        </li>                                                                                    
                            </ul>
                        </li>                                                

                        <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-group"></i>Clients</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                                <a href="{{route('customers.type', ['type' => 'Individual'])}}">Individual</a>
                                            </li>
                                            <li>
                                                <a href="{{route('customers.type', ['type' => 'Corporate'])}}">Corporate</a>
                                            </li>                                                                                      
                                </ul>
                            </li>  
                    </ul>
                </div>
            </nav>

</header>
<div class="sub-header-mobile-2 d-block d-lg-none">
    <div class="header__tool">
        <div class="header-button-item has-noti js-item-menu">
            <i class="zmdi zmdi-notifications"></i>
            <div class="notifi-dropdown notifi-dropdown--no-bor js-dropdown">
            </div>
        </div>

        <div class="account-wrap">
            <div class="account-item account-item--style2 clearfix js-item-menu">
                <div class="image">
                    <img src="{{asset('images/icon/user.png')}}" alt="Eljomi" />
                </div>
                <div class="content">
                    <a class="js-acc-btn" href="#">{{auth()->user()->name}}</a>
                </div>
                <div class="account-dropdown js-dropdown">
                    <div class="info clearfix">
                        <div class="image">
                            <a href="#">
                                <img src="{{asset('images/icon/user.png')}}" alt="John Doe" />
                            </a>
                        </div>
                        <div class="content">
                            <h5 class="name">
                                <a href="#">{{auth()->user()->name}}</a>
                            </h5>
                            <span class="email">{{auth()->user()->email}}</span>
                        </div>
                    </div>
                    <div class="account-dropdown__body">

                        <div class="account-dropdown__item">
                            <a href="#" data-toggle="modal" data-target="#resetPasswordModal">
                                <i class="zmdi zmdi-lock"></i>Change Password
                            </a>
                        </div>
                    </div>
                    <div class="account-dropdown__footer">
                        <a href="{{route('logout')}}"            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="zmdi zmdi-power"></i>Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('include.modals.service_types.new')
@include('include.modals.password.password_reset')

<!-- END HEADER MOBILE -->
<!-- logout post form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>