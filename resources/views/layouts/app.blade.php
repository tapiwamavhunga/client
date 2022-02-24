<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/medinformer-api-client-public.js') }}" defer></script>
    <script type='text/javascript' id='medinformer-api-client-js-extra'>
/* <![CDATA[ */
    var ajax = {"url":"https:\/\/practitioner.medinformer.co.za\/ajax.php"};
/* ]]&gt; */
</script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet"> 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <style>
    .alert{
        border-radius: 0px !important;
    }
    #alphabetical-posts .posts .list > div {
  background: #fff;
  padding: 15px 0 !important;
  border-bottom: 0.5px solid #f2f2f2;
}

body, h5, .h5, .user-info span,h4, .h4,.card-title, .welcome-profile .card-body ul li a, .btn.btn-primary,.dropdown-item, i, .medclient-search input[type="text"] {
  font-family: Archivo !important;
}

.brochure-category-details h2 {
  font-size: 12px;
  font-weight: 500;
  text-transform: uppercase;
  margin: 0;
  padding: 0;
  color: #fff;
  text-align: center;
  font-size: 12px !important;
  font-family: Archivo !important;
}




    </style>
</head>
<body class="dashboard">

<div id="preloader"><i>.</i><i>.</i><i>.</i></div>
<div id="main-wrapper">
<div class="header bg-light" style="background: #fff !important;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xxl-12">
        <div class="header-content">
          <div class="header-left">
            <div class="brand-logo">
                <a href="/">
                <img src="{{URL::asset('/images/Cipla_logo.svg_-.png')}}" style="width: 150px; float: left;">
                </a>
            </div>
            <div class="search d-none">
              <form action="#">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search Here"
                  />
                  <span class="input-group-text"
                    ><i class="icofont-search"></i
                  ></span>
                </div>
              </form>
            </div>
          </div>

          <div class="header-right">
            <div class="dark-light-toggle" onclick="themeToggle()">
              <span class="dark"><i class="bi bi-moon"></i></span>
              <span class="light"><i class="bi bi-brightness-high"></i></span>
            </div>
            <div class="notification dropdown">
              <div class="notify-bell" data-toggle="dropdown">
                <span><i class="bi bi-bell"></i></span>
              </div>
              <div class="dropdown-menu dropdown-menu-right notification-list">
                <h4>Announcements</h4>
                <div class="lists">
                  <a href="#" class="">
                    <div class="d-flex align-items-center">
                      <span class="me-3 icon success"
                        ><i class="bi bi-check"></i
                      ></span>
                      <div>
                        <p>Account created successfully</p>
                        <span>2020-11-04 12:00:23</span>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="">
                    <div class="d-flex align-items-center">
                      <span class="me-3 icon fail"
                        ><i class="bi bi-x"></i
                      ></span>
                      <div>
                        <p>2FA verification failed</p>
                        <span>2020-11-04 12:00:23</span>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="">
                    <div class="d-flex align-items-center">
                      <span class="me-3 icon success"
                        ><i class="bi bi-check"></i
                      ></span>
                      <div>
                        <p>Device confirmation completed</p>
                        <span>2020-11-04 12:00:23</span>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="">
                    <div class="d-flex align-items-center">
                      <span class="me-3 icon pending"
                        ><i class="bi bi-exclamation-triangle"></i
                      ></span>
                      <div>
                        <p>Phone verification pending</p>
                        <span>2020-11-04 12:00:23</span>
                      </div>
                    </div>
                  </a>

                  <a href="settings-activity.html"
                    >More <i class="icofont-simple-right"></i
                  ></a>
                </div>
              </div>
            </div>
            @guest

            <ul>
                 @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
            </ul>

            @else
            <div class="profile_log dropdown">
              <div class="user" data-toggle="dropdown">
                <span class="thumb"
                  ><img src="images/profile/2.png" alt=""
                /></span>
                <span class="arrow"><i class="icofont-angle-down"></i></span>
              </div>


              <div class="dropdown-menu dropdown-menu-right">
                <div class="user-email">
                  <div class="user">
                    <span class="thumb"
                      ><img src="images/profile/2.png" alt=""
                    /></span>
                    <div class="user-info">
                      <h5>{{ Auth::user()->name }}</h5>
                      <span>{{ Auth::user()->email }}</span>
                    </div>
                  </div>
                </div>

                
                <a href="user/profile/{{ Auth::user()->id }}" class="dropdown-item">
                  <i class="bi bi-person"></i>Profile
                </a>
                <a href="wallet.html" class="dropdown-item">
                  <i class="bi bi-wallet"></i>Wallet
                </a>
                <a href="settings-profile.html" class="dropdown-item">
                  <i class="bi bi-gear"></i> Setting
                </a>
                <a href="settings-activity.html" class="dropdown-item">
                  <i class="bi bi-clock-history"></i> Activity
                </a>
                <a href="lock.html" class="dropdown-item">
                  <i class="bi bi-lock"></i>Lock
                </a>
                

                <a class="dropdown-item logout" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bi bi-power"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


              </div>
            </div>

            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


  <div class="sidebar">
  <div class="brand-logo">
    <a href="/"><img src="{{URL::asset('/images/fav.png')}}" alt="" width="50" /> </a>
  </div>
  <div class="menu">
    <ul>
      <li>
        <a
          href="/"
          data-toggle="tooltip"
          data-placement="right"
          title="Home"
        >
          <span><i class="bi bi-house"></i></span>
        </a>
      </li>
      <li>
        <a
          href=""
          data-toggle="tooltip"
          data-placement="right"
          title="Trade"
        >
          <span><i class="bi bi-globe2"></i></span>
        </a>
      </li>
      <li>
        <a
          href="wallet.html"
          data-toggle="tooltip"
          data-placement="right"
          title="Wallet"
        >
          <span><i class="bi bi-wallet2"></i></span>
        </a>
      </li>
      <li>
        <a
          class="setting_"
          href="/settings"
          data-toggle="tooltip"
          data-placement="right"
          title="Settings"
        >
          <span><i class="bi bi-gear"></i></span>
        </a>
      </li>
      <li class="logout">
        <a
          href="signin.html"
          data-toggle="tooltip"
          data-placement="right"
          title="Signout"
        >
          <span><i class="bi bi-power"></i></span>
        </a>
      </li>
    </ul>

    <p class="copyright">&#169; <a href="#">Qkit</a></p>
  </div>
</div>


<div class="content-body" style="background: #fff !important;">
            @yield('content')
</div>


</div>

    


<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/basic-table/jquery.basictable.min.js') }}"></script>
<script src="{{ asset('js/plugins/basic-table-init.js') }}"></script>

<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>


</body>
</html>
