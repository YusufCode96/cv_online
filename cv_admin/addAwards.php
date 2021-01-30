<?php

    include_once "controller.php";
    $myFunction = new CV(); // Inisialisasi CV Class
    $data = $myFunction->select("tb_award"); // Mengambil semua data yang kita select
    $table = "tb_award"; // tablenya
    $form = "?page=awards";

    if(isset($_POST['getAdd'])){ // Jika tombol getAdd di tekan 
        $judul = $myFunction->validateHtml($_POST['deskripsi']);
        if(empty($judul)){ // Validasi jika field kosong
            // Pemberian Alert
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
                // Penyambungan field yang ingin di insert ke database
                $values = "'','$judul'";
                $response = $myFunction->insert($table,$values,$form); // Syntak insert ke database
            }
        }

    ?>
<div class="row">
    <div class="col-sm-8">
        <form method="post">
            <div class="panel panel-default">
                <div class="panel-heading">Add Awards</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control">
                    </div>
                    <button name="getAdd" class="btn btn-info">Simpan</button>
                    <a href="dashboard.php?page=awards" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-4">
        <!-- Pemberian Include -->
        <?php include "response.php" ?>
    </div>
</div>