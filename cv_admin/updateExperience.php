<?php

    // Author Putay Ganteng

    
    include_once "controller.php";
    $myFunction = new CV();
    $data = $myFunction->selectWhere("tb_experience","id",$_GET['id']); // Mengambil data yang ingin di gunakan
    $table = "tb_experience";
    $form = "?page=experience";

    
    if(isset($_POST['getUpdate'])){
        // Validasi
        $foto_exper = $myFunction->validateHtml($_FILES['foto_exper']['name']); // Memaksa huruf kecil nama barang
        $phototmp = $_FILES['foto_exper']['tmp_name'];
        $tahun   = $myFunction->validateHtml($_POST['tahun']);
        $judul_exper   = $myFunction->validateHtml($_POST['judul_exper']);

        if(empty($foto_exper) || empty($tahun) || empty($judul_exper)){
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
                    $where       = "judul_exper";
                    $whereValues = $_GET['id'];
                    $values      = "foto_exper = '$foto_exper', tahun = '$tahun', judul_exper = '$judul_exper'";
                    $response    = $myFunction->update($table,$where,$whereValues,$values,$form); //Penggunaan syntax delete
                    move_uploaded_file($phototmp, 'image/'.$foto_exper);
            }
        }
    
    ?>
<div class="row">
    <div class="col-sm-8">
        <form method="post" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">Update Experience</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Gambar Experience</label>
                        <input type="file" name="foto_exper" class="form-control">
                        <br>
                        <img src="image/<?php echo $data['foto_exper'] ?>" style="width: 100%; height: 300px;" alt="">
                    </div>
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="number" name="tahun" class="form-control" value="<?php echo $data['tahun'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Judul Portofolio</label>
                        <input type="text" name="judul_exper" class="form-control" value="<?php echo $data['judul_exper'] ?>">
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