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
    <a href="index.php" class="navbar-brand" style="color:red;">Weather Map</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Trang Chủ<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="#" onclick="baoLoi()">Bản đồ<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" onclick="baoLoi()" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hệ Thống
          </a>
        </li>
      </ul>
</nav>

<script>
  function baoLoi(){
    alert("Hãy đăng kí tài khoản mí choa sử dụng nhe :))))");
  }

</script>