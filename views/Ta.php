<?php

    include '../layout/header.php';

    $query1 = "SELECT * FROM ta";
    $query2 = "SELECT
                    ta.id, ta.no_ta, ta.judul, mahasiswa.nama_mahasiswa as mahasiswa, dosen.nama as pembimbing
                    FROM
                     ta
                        LEFT JOIN mahasiswa ON ta.mahasiswa = mahasiswa.id_mahasiswa
                        LEFT JOIN dosen ON ta.pembimbing = dosen.id";

    $perintah = mysqli_query($koneksi, $query2);

    if(isset($_POST['simpan'])){
        if(($_POST) > 0) {
            echo "<script>
                    alert('Data Tugas Akhir Berhasil Ditambahkan');
                    document.location.href = 'Ta.php';
                </script>";
        } else {
                echo "<script>
                    alert('Data Tugas Akhir Gagal Ditambahkan');
                    document.location.href = 'Ta.php';
                </script>";
        }

            $no_ta = $_POST['no_ta'];
            $judul = $_POST['judul'];
            $mahasiswa = $_POST['mahasiswa'];
            $pembimbing = $_POST['pembimbing'];
            
            $query = "INSERT INTO ta(no_ta, judul, mahasiswa, pembimbing) VALUES('$no_ta', '$judul', '$mahasiswa', '$pembimbing')";
            $perintah = mysqli_query($koneksi, $query);
    }

    if(isset($_POST['Edit'])) {
        if(($_POST) > 0) {
            echo "<script> 
                alert('Data Tugas Akhir Berhasil Diperbarui');
                document.location.href = 'Ta.php';
            </script>";
    } else {
            echo "<script> 
                alert('Data Tugas Akhir Gagal Diperbarui');
                document.location.href = 'Ta.php';
            </script>";
        }
            $id = $_POST['id'];
            $no_ta = $_POST['no_ta'];
            $judul = $_POST['judul'];
            $mahasiswa = $_POST['mahasiswa'];
            $pembimbing = $_POST['pembimbing'];
        
            $query = "UPDATE ta SET no_ta = '$no_ta', judul = '$judul', mahasiswa = '$mahasiswa', pembimbing = '$pembimbing' WHERE id = $id";
            $result = mysqli_query($koneksi, $query);
    }

    if(isset($_POST['Hapus'])) {
        $id = $_POST['id'];
    
        $query = "DELETE FROM ta WHERE id = $id";
        $result = mysqli_query($koneksi, $query);
        header("location: Ta.php");
    }
    
?>

<div class="container-fluid">
    <h1 class="text-center mt-4">Data Tugas Akhir</h1>
    <hr>

    <button type="button" class="btn btn-info mb-4 mt-2 p-2 py-2 mx-2" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class='bx bx-user-plus'></i> Tambah Data</button>
    <a href="../model/ExportE_Dosen.php" class="btn btn-success p-1 fs-5 mb-3 float-end" value="Excel"><i class='bx bx-table mx-2 p-1'></i></a>
    <a href="../model/TA_Print.php" class="btn btn-danger p-1 fs-5 mb-3 mx-3 float-end" value="Print"><i class='bx bx-import mx-2 p-1'></i></a>
    <a href="../model/ExportD_PDF.php" class="btn btn-danger p-1 fs-5 mb-3 float-end" value="Print"><i class='bx bxl-product-hunt mx-3'></i></a>

    
    <table class="col-xs-12 table table-bordered table-striped mt-4" id="myTable">
        <thead>
            <tr>
                <th class='bg-warning p-3'>ID</th>
                <th class='bg-warning p-3'>NO TA</th>
                <th class='bg-warning p-3'>JUDUL</th>
                <th class='bg-warning p-3'>MAHASISWA</th>
                <th class='bg-warning p-3'>PEMBIMBING</th>
                <th class='bg-warning p-3'>AKSi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach($perintah as $data): ?>
            <tr>
                <td><?= $no ++ ?></td>
                <td><?= $data['no_ta']; ?></td>
                <td><?= $data['judul']; ?></td>
                <td><?= $data['mahasiswa']; ?></td>
                <td><?= $data['pembimbing']; ?></td>
                <td> 
                    <a href="" class="btn btn-primary col-xs-12 col-md-5 mt-1" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>"><i class="bx bx-edit"> Edit</i></a>
                    <a href="" class="btn btn-danger col-xs-12 col-md-5 mt-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>"><i class='bx bx-edit'> Hapus</i></a>
                </td>
            </tr>

                <!-- Start Modal Edit -->
            <div class="modal fade" id="modalEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Tugas Akhir</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    
                            <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            
                            <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nomer Tugas Akhir</label>
                                <input type="text" class="form-control" name="no_ta" value="<?= $data['no_ta']; ?>" placeholder="Masukkan Nomer TA Anda!">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul TA</label>
                                <input type="text" class="form-control" name="judul" value="<?= $data['judul']; ?>" placeholder="Masukkan Judul TA Anda!">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mahasiswa</label>
                                <input type="text" class="form-control" name="mahasiswa" value="<?= $data['mahasiswa']; ?>" placeholder="Masukkan Nama Mahasiswa Anda!">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pembimbing</label>
                                <input type="text" class="form-control" name="pembimbing" value="<?= $data['pembimbing']; ?>" placeholder="Masukkan Nama Pembimbing Anda!">
                            </div>
                            
                    
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="Edit">Save Changes</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Edit -->

            <!-- Start Modal Hapus -->
            <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            
                    <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">
                    
                    <div class="modal-body">
                        <h5 class="text-center">Apakah Anda yakin akan menghapus data ini?<br>
                            <span class="text-danger"><?= $data['judul']; ?></span>
                        </h5>
            
                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="Hapus">Ya, Hapus</button>
                </div>
            </form>
            </div>
        </div>
             </div>
            <!-- End Modal Hapus -->
        <?php endforeach; ?>  
        </tbody>
    </table>
</div>

         <!-- Start Modal Tambah Mahasiswa -->
    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Dosen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="" method="POST">
            <div class="modal-body">
                
                <div class="mb-3">
                    <label class="form-label">NOMOR Tugas Akhir</label>
                    <input type="text" class="form-control" name="no_ta" placeholder="Masukkan Nomer Tugas Akhir Anda!">
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Anda!">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mahasiswa</label>
                    <input type="text" class="form-control" name="mahasiswa" placeholder="Masukkan Nama Mahasiswa!">
                </div>
               
                <div class="mb-3">
                    <label class="form-label">Pembimbing</label>
                    <input type="text" class="form-control" name="pembimbing" placeholder="Masukkan Nama Pembimbing!">
                </div>

            
            </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Save Changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Mahasiswa -->

<?php include '../layout/footer.php' ;?>