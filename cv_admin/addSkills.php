<?php

    include_once "controller.php";
    $myFunction = new CV(); // Inisialisasi CV Class
    $data = $myFunction->select("tb_skill"); // Mengambil semua data yang kita select
    $table = "tb_skill"; // tablenya
    $form = "?page=skills";

    if(isset($_POST['getAdd'])){ // Jika tombol getAdd di tekan 
        $nama_skil = $myFunction->validateHtml($_POST['nama_skil']); // Memaksa huruf kecil nama barang
        $percent   = $myFunction->validateHtml($_POST['percent']);
        if(empty($nama_skil) || empty($percent)){ // Validasi jika field kosong
            // Pemberian Alert
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
                // Penyambungan field yang ingin di insert ke database
                $values = "'','$nama_skil','$percent'";
                $response = $myFunction->insert($table,$values,$form); // Syntak insert ke database
            }
        }

    ?>
<div class="row">
    <div class="col-sm-8">
        <form method="post">
            <div class="panel panel-default">
                <div class="panel-heading">Add Skills</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Nama Skills</label>
                        <input type="text" name="nama_skil" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Percent</label>
                        <input type="text" name="percent" class="form-control"">
                    </div>
                    <button name="getAdd" class="btn btn-info">Simpan</button>
                    <a href="dashboard.php?page=skills" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-4">
        <!-- Pemberian Include -->
        <?php include "response.php" ?>
    </div>
</div>