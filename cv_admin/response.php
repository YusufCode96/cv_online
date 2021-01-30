<?php

    // Author Putay Ganteng

    
    // Response ini adalah hasil keluaran dari fungsi yang telah di buat di controller.php
    // Jika response Ber isi Negative
      if(isset($response) && @$response['response'] == "negative") { ?>
        <div class="alert alert-danger text-center">
        <!-- Mempilkan Response yang ada -->
            <?= @$response['alert']; ?>
        </div>
    <!-- Jika Response positive -->
<?php }else if(isset($response) && @$response['response'] == "positive"){ ?>
        <div class="alert alert-success text-center">
        <!-- Menampilkan Response yang ada -->
            <?= $response['alert']; ?>
        </div>
<?php } ?>