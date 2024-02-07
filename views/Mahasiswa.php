<?php

    include '../layout/header.php';

    $perintah = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

    // tambah mahasiswa
    if(isset($_POST['simpan'])){
        if(($_POST) > 0) {
            echo "<script>
                    alert('Data Mahasiswa Berhasil Ditambahkan');
                    document.location.href = 'Mahasiswa.php';
                </script>";
        } else {
                echo "<script>
                    alert('Data Mahasiswa Gagal Ditambahkan');
                    document.location.href = 'Mahasiswa.php';
                </script>";
        }

            $nim = $_POST['nim'];
            $nama_mahasiswa = $_POST['nama_mahasiswa'];
            $prodi = $_POST['prodi'];
            $alamat = $_POST['alamat'];
            
            $query = "INSERT INTO mahasiswa(nim, nama_mahasiswa, prodi, alamat) VALUES('$nim', '$nama_mahasiswa', '$prodi', '$alamat')";
            $perintah = mysqli_query($koneksi, $query);

    }
    // Edit Data
    if(isset($_POST['Edit'])) {
        if(($_POST) > 0) {
            echo "<script> 
                alert('Data Mahasiswa Berhasil Diperbarui');
                document.location.href = 'Mahasiswa.php';
            </script>";
    } else {
            echo "<script> 
                alert('Data Mahasiswa Gagal Diperbarui');
                document.location.href = 'Mahasiswa.php';
            </script>";
        }
            $id_mahasiswa = $_POST['id_mahasiswa'];

            $nim = $_POST['nim'];
            $nama_mahasiswa = $_POST['nama_mahasiswa'];
            $prodi = $_POST['prodi'];
            $alamat = $_POST['alamat'];  

            $query =  mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama_mahasiswa='$nama_mahasiswa', prodi='$prodi', alamat='$alamat' WHERE id_mahasiswa=$id_mahasiswa");
    }

    // Hapus Data
    if(isset($_POST['Hapus'])) {

        $query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id_mahasiswa= '$_POST[id_mahasiswa]'");
        header("Location: Mahasiswa.php");
    }



?>

<div class="container-fluid">
    <h1 class="text-center mt-4">Data Mahasiswa</h1>
    <hr>

    <button type="button" class="btn btn-info mb-4 mt-2 p-2 py-2 mx-2" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class='bx bx-user-plus'></i> Tambah Data</button>
    <a href="../model/ExportM_Excel.php" class="btn btn-success p-1 fs-5 mb-3 float-end" value="Excel"><i class='bx bx-table mx-2 p-1'></i></a>
    <a href="../model/Print_mahasiswa.php" class="btn btn-danger p-1 fs-5 mb-3 mx-3 float-end" value="Print"><i class='bx bx-import mx-2 p-1'></i></a>
    <a href="../model/ExportM_PDF.php" class="btn btn-danger p-1 fs-5 mb-3 float-end" value="Print"><i class='bx bxl-product-hunt mx-3'></i></a>


    <table id="myTable" class="display">
        <thead>
            <tr>
                <th class='bg-warning p-3'>ID</th>
                <th class='bg-warning p-3'>NIM</th>
                <th class='bg-warning p-3'>NAMA</th>
                <th class='bg-warning p-3'>PRODI</th>
                <th class='bg-warning p-3'>ALAMAT</th>
                <th class='bg-warning p-3'>OPSI</th>
            </tr>
        </thead>
        
        <tbody>
            <?php $no = 1; ?>
            <?php foreach($perintah as $data): ?>
            <tr>
                <td><?= $no ++ ?></td>
                <td><?= $data['nim']; ?></td>
                <td><?= $data['nama_mahasiswa']; ?></td>
                <td><?= $data['prodi']; ?></td>
                <td><?= $data['alamat']; ?></td>
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
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Edit Mahasiswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    
                            <form action="" method="POST">
                            <input type="hidden" name="id_mahasiswa" value="<?= $data['id_mahasiswa']; ?>">
                            
                            <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">NIM</label>
                                <input type="text" class="form-control" name="nim" value="<?= $data['nim']; ?>" placeholder="Masukkan NIM Anda!">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama mahasiswa</label>
                                <input type="text" class="form-control" name="nama_mahasiswa" value="<?= $data['nama_mahasiswa']; ?>" placeholder="Masukkan Nama Anda!">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Program Studi</label>
                                <select class="form-select" name="prodi">
                                    <option><?= $data['prodi'] ?></option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Manajemen Informatika">Manajemen Informatika</option>
                                    <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3"><?= $data['alamat']; ?></textarea>
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
                    <input type="hidden" name="id_mahasiswa" value="<?= $data['id_mahasiswa']; ?>">
                    
                    <div class="modal-body">
                        <h5 class="text-center">Apakah Anda yakin akan menghapus data ini?<br>
                            <span class="text-danger"><?= $data['nama_mahasiswa']; ?></span>
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
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim" placeholder="Masukkan NIM Anda!">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" name="nama_mahasiswa" placeholder="Masukkan Nama Anda!">
                </div>

                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <select class="form-select" name="prodi">
                        <option></option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Manajemen Informatika">Manajemen Informatika</option>
                        <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3"></textarea>
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