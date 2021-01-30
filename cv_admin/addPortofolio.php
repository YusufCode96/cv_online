<?php

    include_once "controller.php";
    $myFunction = new CV(); // Inisialisasi CV Class
    $data = $myFunction->select("tb_portofolio"); // Mengambil semua data yang kita select
    $table = "tb_portofolio"; // tablenya
    $form = "?page=portofolio";

    if(isset($_POST['getAdd'])){ // Jika tombol getAdd di tekan 
        $gambar_porto = $myFunction->validateHtml($_FILES['gambar_porto']['name']); // Memaksa huruf kecil nama barang
        $phototmp = $_FILES['gambar_porto']['tmp_name'];
        $judul_portofolio   = $myFunction->validateHtml($_POST['judul_portofolio']);

        if(empty($gambar_porto) || empty($judul_portofolio)){ // Validasi jika field kosong
            // Pemberian Alert
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
                // Penyambungan field yang ingin di insert ke database
                $values = "'','$gambar_porto','$judul_portofolio'";
                $response = $myFunction->insert($table,$values,$form); // Syntak insert ke database
                move_uploaded_file($phototmp, 'image/'.$gambar_porto);
            }
        }

    ?>
<div class="row">
    <div class="col-sm-8">
        <form method="post" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">Add Portofolio</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Foto Portofolio</label>
                        <input type="file" name="gambar_porto" id="file-input photo">
                    </div>
                    <div class="form-group">
                        <label for="">Judul Portofolio</label>
                        <input type="text" name="judul_portofolio" class="form-control"">
                    </div>
                    <button name="getAdd" class="btn btn-info">Simpan</button>
                    <a href="dashboard.php?page=portofolio" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-4">
        <!-- Pemberian Include -->
        <?php include "response.php" ?>
    </div>
</div>