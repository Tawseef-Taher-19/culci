<!--Bismillahir Rahmanir Rahim-->



<!--Header Section-->


<?php

include_once "admin_detected.php";

?>


<nav class="navbar navbar-expand-lg navbar-light bg-light header">

  <a class="navbar-brand" href="#">
    <div class="logo_img">
      <img src="./image/lion_image.png" alt="">
    </div>
  </a>

  <button class="navbar-toggler bar_1 active" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class=""><i class="fa fa-bars" aria-hidden="true"></i></span>
  </button>

  <div class="collapse navbar-collapse header-middle" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="./home.php">HOME <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle header_a" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CLUB COMMITTEE
        </a>
        <div class="dropdown-menu dropdown_item" aria-labelledby="navbarDropdown">

          <div class="triangle_up">
            <span><i class="fa fa-caret-up" aria-hidden="true"></i></span>
          </div>

          <a class="dropdown-item" href="./lion_club.php">LIONS CLUB COMMITTEE</a>
          <a class="dropdown-item" href="./leo_club.php">LEO CLUB COMMITTEE</a>
          <a class="dropdown-item" href="./inactive_lion.php">INACTIVE LIONS</a>
          <a class="dropdown-item" href="./inactive_leo.php">INACTIVE LEO </a>

        </div>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="./home.php">POST <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="./category.php">CATEGORY <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="./message.php">MESSAGE <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="./blood.php">BLOOD <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="./gallery.php">GALLERY <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="./attendance.php">ATTENDANCE <span class="sr-only">(current)</span></a>
      </li>



    </ul>

  </div>

  <div class="header_right">
    <a href="./logout.php"><span>LOGOUT</span></a>
  </div>



</nav>