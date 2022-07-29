<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
  </form>
  @auth
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="../stisla/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item has-icon text-danger">
              <span class="d-inline">Logout</span>
              <i class="fas fa-sign-out-alt py-2 pr-3"></i>
            </button>
          </form>
        </div>
      </li>
    </ul>
  @else
  <ul class="navbar-nav navbar-right">
    <li class="nav-item ">
      <a href="/admin" class="text-decoration-none text-white">Masuk <i class="fas fa-sign-in-alt"></i></a>
    </li>
  </ul>
  @endauth
  
</nav>