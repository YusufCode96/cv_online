<?php

    include_once "controller.php";
    $myFunction = new CV(); // Inisialisasi CV Class
    $data = $myFunction->select("tb_experience"); // Mengambil semua data yang kita select
    $table = "tb_experience"; // tablenya
    $form = "?page=experience";

    if(isset($_POST['getAdd'])){ // Jika tombol getAdd di tekan 
        $foto_exper = $myFunction->validateHtml($_FILES['foto_exper']['name']); // Memaksa huruf kecil nama barang
        $phototmp = $_FILES['foto_exper']['tmp_name'];
        $tahun   = $myFunction->validateHtml($_POST['tahun']);
        $judul   = $myFunction->validateHtml($_POST['judul']);

        if(empty($foto_exper) || empty($tahun) || empty($judul)){ // Validasi jika field kosong
            // Pemberian Alert
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
                // Penyambungan field yang ingin di insert ke database
                $values = "'','$foto_exper','$tahun','$judul'";
                $response = $myFunction->insert($table,$values,$form); // Syntak insert ke database
                move_uploaded_file($phototmp, 'image/'.$foto_exper);
            }
        }

    ?>
<div class="row">
    <div class="col-sm-8">
        <form method="post" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">Add Experience</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Gambar Experience</label>
                        <input type="file" name="foto_exper" id="file-input photo">
                    </div>
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="number" name="tahun" class="form-control"">
                    </div>
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" name="judul" class="form-control"">
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