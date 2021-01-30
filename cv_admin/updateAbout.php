<?php

    // Author Putay Ganteng

    
    include_once "controller.php";
    $myFunction = new CV();
    $data = $myFunction->selectWhere("tb_about","id",$_GET['id']); // Mengambil data yang ingin di gunakan
    $table = "tb_about";
    $form = "?page=about";

    
    if(isset($_POST['getUpdate'])){
        // Validasi
        $foto    = $myFunction->validateHtml($_FILES['foto']['name']);
        $phototmp = $_FILES['foto']['tmp_name'];
        $content = $myFunction->validateHtml($_POST['content']);
        $nama    = $myFunction->validateHtml($_POST['nama']);
        $bagian  = $myFunction->validateHtml($_POST['bagian']);
        $ttl     = $myFunction->validateHtml($_POST['ttl']);
        $alamat  = $myFunction->validateHtml($_POST['alamat']);
        $negara  = $myFunction->validateHtml($_POST['negara']);
        $no_hp   = $myFunction->validateHtml($_POST['hp']);
        $email   = $myFunction->validateHtml($_POST['email']);
        if(empty($content) || empty($nama) || empty($bagian) || empty($ttl) || empty($alamat) || empty($negara) || empty($no_hp) || empty($email)){
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
            if(!is_numeric($no_hp)){
                $response = ['response'=>'negative','alert'=>'No HP Harus Angka'];
            }else{
                if(strlen($no_hp) < 12){
                    $response = ['response'=>'negative','alert'=>'Harga Harus 12 Digit'];
                }else{
                    $where       = "harga";
                    $whereValues = $_GET['id'];
                    $values      = "foto = '$foto', isi = '$content', nama = '$nama', bagian = '$bagian', ttl = '$ttl', alamat = '$alamat', negara = '$negara', no_hp = '$no_hp', email = '$email'";
                    $response    = $myFunction->update($table,$where,$whereValues,$values,$form);
                    move_uploaded_file($phototmp, 'image/'.$foto);
                }
            }
        }
    }
    

    ?>
<div class="row">
    <div class="col-sm-8">
        <form method="post" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">Update About</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control" value="<?php echo $data['foto'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control" value="<?= $data['isi'] ?>"><?= $data['isi'] ?></textarea>
                          
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Bagian</label>
                        <input type="text" name="bagian" class="form-control" value="<?php echo $data['bagian'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" name="ttl" class="form-control" value="<?php echo $data['ttl'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Negara</label>
                        <input type="text" name="negara" class="form-control" value="<?php echo $data['negara'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">No. Hp</label>
                        <input type="number" name="hp" class="form-control" value="<?php echo $data['no_hp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $data['email'] ?>">
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