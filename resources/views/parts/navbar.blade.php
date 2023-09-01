<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('index') }}">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('categories') }}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('show_cart') }}">Cart</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Administrator
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="nav-link" href="{{ route('create_item') }}">Create Item</a></li>
              <li><a class="nav-link" href="{{ route('create_category') }}">Create Category</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('edit_catalog') }}">Edit Catalog</a></li>
            </ul>
          </li>
        </ul>
        @auth
        <form class="d-flex" method="POST" action="{{ route('logout') }}">
            @csrf
          <button class="btn btn-outline-danger" type="submit">Logout</button>
        </form>
        @else
        <a class="btn btn-outline-success" type="submit" href="{{ route('loginPage') }}">Login</a>
        @endauth

      </div>
    </div>
  </nav>