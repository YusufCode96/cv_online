    <?php

    // Author Putay Ganteng

    
    include_once "controller.php";
    $myFunction = new CV(); // Inisialisasi OOP Class CRUD
    $data = $myFunction->select("tb_about"); // Mengambil semua data 
    $table = "tb_about"; // Inisialisasi database

    if(isset($_GET['hapus'])){ // Ketika ada uri segment ex : homepage.php?hapus&id = 1; kata disana adalah uri segment
        // Inisialisasi patokan data yang ingin di hapus
        $where = "id";
        // Isi data yang ingin di hapus
        $whereValues = $_GET['id'];
        $response = $myFunction->delete($table,$where,$whereValues); // Penggunaan Fungsi Hapus
        if($response['response'] == "positive"){ //Jika Berhasil
            // Window memindahkan ke halaman homepage
            echo "<script>window.location.href='dashboard.php?page=about'</script>";
        }
    }

    if(isset($_POST['getCari'])){ // Ketika tombol cari di tekan
        $likeKey = "nama"; // Pencarian menurut / bisa disebut patokan yang ingin dicari
        $likeOne = $_POST['search']; // Pemgambilan data
        $data = $myFunction->search($table,$likeKey,$likeOne); // Pemakaian syntax cari
    }else{
        
    }
    ?>

<div class="panel panel-default" id="panel-about">
<div class="panel-heading">About : Dashboard</div>
<div class="panel-body">
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4 col-sm-offset-3">
            <form method="post">
                <div class="form-group">
                    <input type="search" class="form-control" name="search"></button>
                </div>
            
        </div>
        <div class="col-sm-1">
            <button class="btn btn-info" name="getCari">Cari
        </div>
        </form>
    </div>

    <table class="table table-hovered table-bordered table-responsive" id="about">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Content</th>
            <th>Nama</th>
            <th>Bagian</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Negara</th>
            <th>No. HP</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        // Menampilkan data
        // Count di pakai untuk menghitung data yang keluar
        if(count($data) > 0){
            // Penamaan ulang 
            foreach($data as $ds){ ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><img class="img-responsive" src="image/<?php echo $ds['foto']; ?>" style="width: 450px; height: 200px;"></td>
                    <td><?= $ds['isi']; ?></td>
                    <td><?= $ds['nama']; ?></td>
                    <td><?= $ds['bagian']; ?></td>
                    <td><?= $ds['ttl']; ?></td>
                    <td><?= $ds['alamat']; ?></td>
                    <td><?= $ds['negara']; ?></td>
                    <td><?= $ds['no_hp']; ?></td>
                    <td><?= $ds['email']; ?></td>
                    <td colspan="2" class="text-center">
                        <a href="dashboard.php?page=updateAbout&id=<?= $ds['id'] ?>" class="btn btn-default">Update</a>
                        <a onclick="return confirm('Yakin Ingin Menghapus ?')" href="dashboard.php?page=about&hapus&id=<?= $ds['id'] ?>" class="btn btn-danger" id="getDelete">Delete</a>
                    </td>
                </tr>
            <?php $no++; } 
        }else{ ?>
            <tr>
                <td colspan="10" class="text-center">Tidak ada data</td>
            </tr>
        <?php }
        ?>
    </table>
    <br>
    <button class="btn btn-primary" onclick="<?= $data = $myFunction->toPdf() ?>">Print</button>
</div>
</div>
