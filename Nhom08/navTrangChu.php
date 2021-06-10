<style>
nav.navbar{
    justify-content: space-around;
    position: fixed;
    top: 0px;
    left: 0px;
    right: 0px;
    z-index: 1000;
}

img{
  height: 60px;
  width: 60px;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="images/partly_cloudy_night_200px.png" >
    <a href="TrangChu.php" class="navbar-brand" style="color:red;">Weather Map</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="TrangChu.php">Trang Chủ<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="map.php">Bản đồ<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hệ Thống
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="QLNguoiDung.php">Quản lí người dùng</a>
            <a class="dropdown-item" href="TaiLieu.php">Tài liệu tham khảo</a>
          </div>
        </li>
      </ul>
      
      <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Đăng Xuất</button>
</nav>