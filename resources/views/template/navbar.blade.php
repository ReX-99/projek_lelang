<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @if (auth()->user()->level === 'admin')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard/admin" class="nav-link">Home</a>
      </li>
      @endif
      @if (auth()->user()->level === 'petugas')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard/petugas" class="nav-link">Home</a>
      </li>
      @endif
      @if (auth()->user()->level === 'masyarakat')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard/masyarakat" class="nav-link">Home</a>
      </li>
      @endif
    </ul>
    {{-- right navbar links --}}
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('logout-petugas')}}" class="nav-link">Log out</a>
        {{-- <a href="#" class="nav-link">Contact</a> --}}
      </li>

    </ul>
  </nav>