<?php

    // Author Putay Ganteng

    
    include_once "controller.php";
    $myFunction = new CV();
    $data = $myFunction->selectWhere("tb_skill","id",$_GET['id']); // Mengambil data yang ingin di gunakan
    $table = "tb_skill";
    $form = "?page=skills";

    
    if(isset($_POST['getUpdate'])){
        // Validasi
        $nama_skill = $myFunction->validateHtml($_POST['nama_skill']);
        $percent    = $myFunction->validateHtml($_POST['percent']);
        if(empty($nama_skill) || empty($percent)){
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
                    $where       = "nama_skill";
                    $whereValues = $_GET['id'];
                    $values      = "nama_skil = '$nama_skill', percent = '$percent'";
                    $response    = $myFunction->update($table,$where,$whereValues,$values,$form); //Penggunaan syntax delete
            }
        }
    
    ?>
<div class="row">
    <div class="col-sm-8">
        <form method="post">
            <div class="panel panel-default">
                <div class="panel-heading">Update About</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Nama Skills</label>
                        <input type="text" name="nama_skill" class="form-control" value="<?php echo $data['nama_skil'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Percent</label>
                        <input type="number" name="percent" class="form-control" value="<?php echo $data['percent'] ?>">
                    </div>
                    <button name="getUpdate" class="btn btn-info">Update</button>
                    <a href="dashboard.php?page=skills" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-4">
        <?php include "response.php" ?>
    </div>
</div>