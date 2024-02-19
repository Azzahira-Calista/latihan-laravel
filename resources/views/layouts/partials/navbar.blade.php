<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Laravel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          {{-- <a class="nav-link active" aria-current="page" href="/home">Home</a>--}}
          <a class="nav-link" href="/about">About</a> 
          <a class="nav-link" href="/students/all">Students</a>
          {{-- <a class="nav-link" href="/Ekstra/ekstra">Ekstra</a> --}}
          <a class="nav-link" href="/kelas/all">Kelas</a>
        </div>
        @guest
        <a  class="btn btn-outline-primary" href="/auth/login">Login</a>
        @else
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
            Hi, {{ Auth::user()->name }}
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard/dashboard">Dashboard</a></li>
            <li>
                <form action="/auth/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
          </ul>
          </div>
        @endguest

      </div>
    </div>
  </nav>