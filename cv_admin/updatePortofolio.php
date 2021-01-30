<?php

    // Author Putay Ganteng

    
    include_once "controller.php";
    $myFunction = new CV();
    $data = $myFunction->selectWhere("tb_portofolio","id",$_GET['id']); // Mengambil data yang ingin di gunakan
    $table = "tb_portofolio";
    $form = "?page=portofolio";

    
    if(isset($_POST['getUpdate'])){
        // Validasi
        $gambar_porto = $myFunction->validateHtml($_FILES['gambar_porto']['name']); // Memaksa huruf kecil nama barang
        $phototmp = $_FILES['gambar_porto']['tmp_name'];
        $judul_portofolio   = $myFunction->validateHtml($_POST['judul_portofolio']);

        if(empty($gambar_porto) || empty($judul_portofolio)){
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
                    $where       = "judul_porto";
                    $whereValues = $_GET['id'];
                    $values      = "gambar_porto = '$gambar_porto', judul_porto = '$judul_portofolio'";
                    $response    = $myFunction->update($table,$where,$whereValues,$values,$form); //Penggunaan syntax delete
                    move_uploaded_file($phototmp, 'image/'.$gambar_porto);
            }
        }
    
    ?>
<div class="row">
    <div class="col-sm-8">
        <form method="post" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">Update Portofolio</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Gambar Portolio</label>
                        <input type="file" name="gambar_porto" class="form-control">
                        <br>
                        <img src="image/<?php echo $data['gambar_porto'] ?>" style="width: 100%; height: 300px;" alt="">
                    </div>
                    <div class="form-group">
                        <label for="">Judul Portofolio</label>
                        <input type="text" name="judul_portofolio" class="form-control" value="<?php echo $data['judul_porto'] ?>">
                    </div>
                    <button name="getUpdate" class="btn btn-info">Update</button>
                    <a href="dashboard.php?page=portofolio" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-4">
        <?php include "response.php" ?>
    </div>
</div>