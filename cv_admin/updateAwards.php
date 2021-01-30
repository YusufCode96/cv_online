<?php

    // Author Putay Ganteng

    
    include_once "controller.php";
    $myFunction = new CV();
    $data = $myFunction->selectWhere("tb_award","id",$_GET['id']); // Mengambil data yang ingin di gunakan
    $table = "tb_award";
    $form = "?page=awards";

    
    if(isset($_POST['getUpdate'])){
        // Validasi
        $judul        = $myFunction->validateHtml($_POST['deskripsi']);
        if(empty($judul)){
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
                    $where       = "judul";
                    $whereValues = $_GET['id'];
                    $values      = "judul = '$judul'";
                    $response    = $myFunction->update($table,$where,$whereValues,$values,$form); //Penggunaan syntax delete
            }
        }
    
    ?>
<div class="row">
    <div class="col-sm-8">
        <form method="post">
            <div class="panel panel-default">
                <div class="panel-heading">Update Awards</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="<?php echo $data['judul'] ?>">
                    </div>
                    <button name="getUpdate" class="btn btn-info">Update</button>
                    <a href="dashboard.php?page=awards" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-4">
        <?php include "response.php" ?>
    </div>
</div>