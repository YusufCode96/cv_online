    <?php

    // Author Putay Ganteng

    
    include_once "controller.php";
    $myFunction = new CV(); // Inisialisasi OOP Class CRUD
    $data = $myFunction->select("tb_portofolio"); // Mengambil semua data 
    $table = "tb_portofolio"; // Inisialisasi database
    $form = "?page=portofolio";

    if(isset($_GET['hapus'])){ // Ketika ada uri segment ex : homepage.php?hapus&id = 1; kata disana adalah uri segment
        // Inisialisasi patokan data yang ingin di hapus
        $where = "id";
        // Isi data yang ingin di hapus
        $whereValues = $_GET['id'];
        $response = $myFunction->delete($table,$where,$whereValues); // Penggunaan Fungsi Hapus
        if($response['response'] == "positive"){ //Jika Berhasil
            // Window memindahkan ke halaman homepage
            echo "<script>window.location.href='dashboard.php?page=portofolio'</script>";
        }
    }

    if(isset($_POST['getCari'])){ // Ketika tombol cari di tekan
        $likeKey = "judul_porto"; // Pencarian menurut / bisa disebut patokan yang ingin dicari
        $likeOne = $_POST['search']; // Pemgambilan data
        $data = $myFunction->search($table,$likeKey,$likeOne); // Pemakaian syntax cari
    }else{
        
    }
    ?>

<div class="panel panel-default" id="panel-about">
<div class="panel-heading">Portofolio : Dashboard</div>
<div class="panel-body">
    <div class="row">
        <div class="col-sm-3">
            <a href="dashboard.php?page=addPortofolio" class="btn btn-primary">Tambah Data</a>
            <br>
            <br>
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

    <table class="table table-hovered table-bordered table-responsive">
        <tr>
            <th>No</th>
            <th>Gambar Portofolio</th>
            <th>Judul Portofolio</th>
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
                    <td><img class="img-responsive" src="image/<?php echo $ds['gambar_porto']; ?>" style="width: 450px; height: 200px;"></td>
                    <td><?= $ds['judul_porto']; ?></td>
                    <td colspan="2" class="text-center">
                        <a href="dashboard.php?page=updatePortofolio&id=<?= $ds['id'] ?>" class="btn btn-default">Update</a>
                        <a onclick="return confirm('Yakin Ingin Menghapus ?')" href="dashboard.php?page=portofolio&hapus&id=<?= $ds['id'] ?>" class="btn btn-danger" id="getDelete">Delete</a>
                    </td>
                </tr>
            <?php $no++; } 
        }else{ ?>
            <tr>
                <td colspan="4" class="text-center">Tidak ada data</td>
            </tr>
        <?php }
        ?>
    </table>
    <br>
    <button class="btn btn-primary" onclick="<?= $data = $myFunction->toPdf() ?>">Print</button>
</div>
</div>
