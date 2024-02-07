<?php 
    include '../layout/Config.php';
    

    $data_dosen = mysqli_query($koneksi,"SELECT * FROM dosen");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Print</title>
</head>
<body>

<div class="container mt-5">
    <h1>Data Dosen</h1>
    <hr>

    <table class="table table-bordered table-striped mt-4 myTable">
        <thead>
            <tr>
                <th scope ="col">No</th>
                <th scope ="col">NIDN</th>
                <th scope ="col">Nama Dosen</th>    
                <th scope ="col">Email</th>    
                <th scope ="col">Agama</th>        
                <th scope ="col">Alamat</th>        
            </tr>
        </thead>

        <tbody>
        <?php $no = 1; ?>
            <?php foreach ($data_dosen as $dosen): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $dosen['nidn']; ?></td>
                <td><?= $dosen['nama']; ?></td>
                <td><?= $dosen['email']; ?></td>
                <td><?= $dosen ['agama']; ?></td>
                <td><?= $dosen ['alamat']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script>
	window.print();
</script>

    
</body>
</html>