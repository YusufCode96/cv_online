<?php

    // Author Putay Ganteng

    
    include_once "controller.php";
    $myFunction = new CV();
    $data = $myFunction->selectWhere("tb_education","id",$_GET['id']); // Mengambil data yang ingin di gunakan
    $table = "tb_education";
    $form = "?page=education";

    
    if(isset($_POST['getUpdate'])){
        // Validasi
        $nama_instan = $myFunction->validateHtml($_POST['nama_instan']);
        $nama_sekolah = $myFunction->validateHtml($_POST['nama_sekolah']);
        $tahun        = $myFunction->validateHtml($_POST['tahun']);
        if(empty($nama_sekolah) || empty($tahun)){
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
                    $where       = "nama_edu";
                    $whereValues = $_GET['id'];
                    $values      = "nama_instan = '$nama_instan', nama_edu = '$nama_sekolah', tahun = '$tahun'";
                    $response    = $myFunction->update($table,$where,$whereValues,$values,$form); //Penggunaan syntax delete
            }
        }
    
    ?>
<div class="row">
    <div class="col-sm-8">
        <form method="post">
            <div class="panel panel-default">
                <div class="panel-heading">Update Education</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Nama Instansi</label>
                        <input type="text" name="nama_instan" class="form-control" value="<?php echo $data['nama_instan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" class="form-control" value="<?php echo $data['nama_edu'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="text" name="tahun" class="form-control" value="<?php echo $data['tahun'] ?>">
                    </div>
                    <button name="getUpdate" class="btn btn-info">Update</button>
                    <a href="dashboard.php?page=about" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-4">
        <?php include "response.php" ?>
    </div>
</div>