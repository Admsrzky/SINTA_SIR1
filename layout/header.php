<?php
    include 'Config.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>SInTA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- datatables -->
  <link href='https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css' rel='stylesheet'/>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
  <script src='https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js'></script>

  <!--boxicons-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

<div class="">

<!--jumbotron -->

<div class="mt-1 p-3 bg-primary text-white rounded">
    <h1>SInTA</h1> 
    <p>Sistem Informasi Tugas Akhir</p> 
  </div>
</div>

<!-- navbar -->

<nav class="navbar navbar-expand-sm bg-primary navbar-dark mt-2 rounded ">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="index.php"><i class='bx bx-home-heart'></i>Beranda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../views/Mahasiswa.php"><i class='bx bx-user'></i>Mahasiswa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../views/Dosen.php"><i class='bx bx-user'></i>Dosen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ta.php"><i class='bx bx-book'></i>Tugas Akhir</a>
      </li>
     <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>-->
    </ul>
    <a href="../Logout.php" class="btn btn-primary fs-5">Logout</a>
  </div>
</nav>