        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="{{asset('images/icon/logo-white.png')}}" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="bot-line"></span>
                                </a>

                            </li>

                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span class="bot-line"></span>Transaction</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="button.html" class="text-danger">New*</a>
                                    </li>   
                                    <li>
                                        <a href="#">Transactions</a>
                                    </li>                                
                                </ul>
                            </li>
                                                        <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-credit-card"></i>
                                    <span class="bot-line"></span>Expenditure</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="button.html" class="text-danger">New*</a>
                                    </li>   
                                    <li>
                                        <a href="#">Expenditures</a>
                                    </li>                                
                                </ul>
                            </li>
                                                        <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-group"></i>
                                    <span class="bot-line"></span>Clients</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="button.html" class="text-danger">New*</a>
                                    </li>                                       
                                    <li>
                                        <a href="button.html">Individual</a>
                                    </li>
                                    <li>
                                        <a href="button.html">Corporate</a>
                                    </li>                            
     
                                </ul>                                    
                            </li>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-bar-chart"></i>
                                    <span class="bot-line"></span>Reports</a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="login.html">By Client</a>
                                    </li>
                                    <li>
                                        <a href="register.html">By Period</a>
                                    </li>
                                    <li>
                                        <a href="forget-pass.html">Combined</a>
                                    </li>
                                    <li>
                                        <a href="forget-pass.html">Highest Spender</a>
                                    </li>                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="header-button-item has-noti js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>                            
                        </div>
                        <div class="header-button-item js-item-menu">
                            <i class="zmdi zmdi-settings"></i>
                            <div class="setting-dropdown js-dropdown">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            Users</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            Service Type</a>
                                    </div>
                                </div>
                                                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            Client Preference</a>
                                    </div>
                                </div>
                          <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            Items</a>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{asset('images/icon/avatar-01.jpg')}}" alt="logged user" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{substr(auth()->user()->name, 0, 11)}}..</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{asset('images/icon/avatar-01.jpg')}}" alt="John Doe" />
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
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
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
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo-white.png" alt="CoolAdmin" />
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
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
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
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-basket"></i>Transaction</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#" class="text-danger">New*</a>
                                </li>   
                                <li>
                                    <a href="#">Transactions</a>
                                </li>                         
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-credit-card"></i>Expenditure</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#" class="text-danger">New*</a>
                                </li>   
                                <li>
                                    <a href="#">Expenditures</a>
                                </li>                         
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-group"></i>Clients</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#" class="text-danger">New*</a>
                                </li>   
                                <li>
                                    <a href="#">Individual</a>
                                </li>                    
                                <li>
                                    <a href="#">Corporate</a>
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
                <div class="header-button-item js-item-menu">
                    <i class="zmdi zmdi-settings"></i>
                    <div class="setting-dropdown js-dropdown">
                        <div class="account-dropdown__body">
                             <div class="account-dropdown__item">
                      <a href="#">
                                            Users</a>
                            </div>
                            <div class="account-dropdown__item">
                                  <a href="#">
                                            Service Type</a>
                            </div>
                            <div class="account-dropdown__item">
                                 <a href="#">
                                            Client Preference</a>
                            </div>
                            <div class="account-dropdown__item">
                             <a href="#">
                                            Items</a>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="{{asset('images/icon/avatar-01.jpg')}}" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#">{{auth()->user()->name}}</a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="{{asset('images/icon/avatar-01.jpg')}}" alt="John Doe" />
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
                                    <a href="#">
                                        <i class="zmdi zmdi-account"></i>Account</a>
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
        <!-- END HEADER MOBILE -->
        <!-- logout post form -->
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>