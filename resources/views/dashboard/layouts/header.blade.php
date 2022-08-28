{{-- <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 ml-4" href="/home">My Blog</a>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-link nav-link px-3" >Logout</button>
        </form>
      </div>
    </div>
  </header> --}}
<div class="container">
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="/home">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/dashboard/articles">Dashboard</a>
            </li>
        </ul>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-link nav-link px-3" >Logout</button>
        </form>
    </div>
    </nav>
</div>

