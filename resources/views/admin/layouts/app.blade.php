<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Media Applicantion</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">

      <span class="brand-text font-weight-light">Media App System </span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="fas fa-user-circle"></i>
              <p>
                My Profile
              </p>
            </a>
          </li>

          <li class="nav-item mb-2">
            <a href="{{ route('admin#list') }}" class="nav-link">
              <i class="fas fa-list"></i>
              <p>
                Admin List
              </p>
            </a>
          </li>

          <li class="nav-item mb-2">
            <a href="{{ route('admin#category') }}" class="nav-link">
              <i class="fas fa-pizza-slice ms-5"></i>
              <p>
                Category
              </p>
            </a>
          </li>

         <li class="nav-item mb-2">
            <a href="{{ route('admin#post') }}" class="nav-link">
            <i class="fas fa-users"></i>
              <p>
                Post
              </p>
            </a>
          </li>

          <li class="nav-item mb-2">
            <a href="{{ route('admin#trend') }}" class="nav-link">
              <i class="fas fa-book"></i>
              <p>
                Trend Post
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="carrier.html" class="nav-link">
              <i class="fas fa-biking"></i>
              <p>
                Carrier
              </p>
            </a>
          </li>

          <li class="nav-item">
            <!-- <a href="" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a> -->
            <form action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn bg-danger w-100">
                <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
