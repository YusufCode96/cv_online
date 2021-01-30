<?php

    include_once "controller.php";
    $myFunction = new CV(); // Inisialisasi CV Class
    $data = $myFunction->select("tb_education"); // Mengambil semua data yang kita select
    $table = "tb_education"; // tablenya
    $form = "?page=education";

    if(isset($_POST['getAdd'])){ // Jika tombol getAdd di tekan 
        $nama_instan = $myFunction->validateHtml($_POST['nama_instan']);
        $nama_sekolah = $myFunction->validateHtml($_POST['nama_sekolah']); // Memaksa huruf kecil nama barang
        $tahun       = $myFunction->validateHtml($_POST['tahun']);
        if(empty($nama_sekolah) || empty($tahun)){ // Validasi jika field kosong
            // Pemberian Alert
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
                // Penyambungan field yang ingin di insert ke database
                $values = "'','$nama_instan','$nama_sekolah','$tahun'";
                $response = $myFunction->insert($table,$values,$form); // Syntak insert ke database
            }
        }

    ?>
<div class="row">
    <div class="col-sm-8">
        <form method="post">
            <div class="panel panel-default">
                <div class="panel-heading">Add Education</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Nama Instansi</label>
                        <input type="text" name="nama_instan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="text" name="tahun" class="form-control"">
                    </div>
                    <button name="getAdd" class="btn btn-info">Simpan</button>
                    <a href="dashboard.php?page=education" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-4">
        <!-- Pemberian Include -->
        <?php include "response.php" ?>
    </div>
</div>