
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Administration</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Trang Ngoài</a>
        </li>
        <li class="nav-item <?php if(
            $current_page == 'category.php'
        ) echo 'active'; ?>">
          <a class="nav-link active" href="category.php">Thể loại</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tác giả</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Bài viết</a>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>