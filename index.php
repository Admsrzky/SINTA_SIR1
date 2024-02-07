<?php 
    session_start();
    
    if(!isset($_SESSION['login'])) {
      header('Location: Login.php');
    }
    
    include 'layout/header.php';

    $jumlah_mahasiswa = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM mahasiswa"));
    $jumlah_dosen = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM dosen"));
    $jumlah_ta = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ta"));


 
?>

<div class="container text-center" style="margin-top:80px">
    <div class="row">
      <h1 class="mb-5">WELCOME</h1>
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-header text-uppercase fw-bold">Mahasiswa</div>
                <div class="card-body">
                    <p class="card-text">
                        <i class='bx bxs-user-account bx-lg'></i>
                    </p>
                    <p class="card-text">
                        <?php echo $jumlah_mahasiswa ?>
                    </p>
                    <a href="views/mahasiswa.php" class="btn btn-primary">Selengkapnya <i data-feather="chevrons-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-header text-uppercase fw-bold">Dosen</div>
                <div class="card-body">
                    <p class="card-text">
                        <i class='bx bxs-user-account bx-lg'></i>
                    </p>
                    <p class="card-text">
                        <?php echo $jumlah_dosen ?>
                    </p>
                    <a href="views/dosen.php" class="btn btn-primary">Selengkapnya <i data-feather="chevrons-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="card">
                <div class="card-header text-uppercase fw-bold">Tugas Akhir</div>
                <div class="card-body">
                    <p class="card-text">
                        <i class='bx bxs-user-account bx-lg'></i>
                    </p>
                    <p class="card-text">
                        <?php echo $jumlah_ta ?>
                    </p>
                    <a href="views/Ta.php" class="btn btn-primary">Selengkapnya <i data-feather="chevrons-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include("layout/footer.php");

?>