<?php
    // Author Putay Ganteng

    // Syntax Connect Mysli
    $username = "root";
    $password = "";
    $database = "db_cvonline";
    $hostname = "localhost";
    $con = mysqli_connect($hostname,$username,$password,$database) or die("Connection Corrupt");


    // Membuat Class CV
    class CV{
        

        // Function yang digunakan Untuk Login
        public function login($username,$password){
            global $con;
            // Query Login
            $sql = "SELECT * FROM tb_login WHERE username ='$username' AND password = '$password' ";
            //Eksekusi Query yang sudah di buat
            $query = mysqli_query($con,$sql);
            //Fungsi untuk menghitung jumlah data Di database
            $rows  = mysqli_num_rows($query);
            //Mengecek jumlah data
            if($rows > 0){
                // Memberi Respon Positive Jika Berhasil
                return ['response'=>'positive','alert'=>'Berhasil Login'];
            }else{
                // Memberi Respon Negative Jika Negative
                return ['response'=>'negative','alert'=>'Username atau Password Salah'];
            }
        }

        public function register($name,$username,$password,$confirm){
            //Cek data Di database
            global $con;
            // Mengecek Data Kosong
            if(empty($name) || empty($username) || empty($password)){
                return ['response'=>'negative','alert'=>'Lengkapi Form'];
            }
            // Mengecek Kesedian Username karna username tidak boleh sama
            $sql     = "SELECT * FROM table_user WHERE username = '$username'";
            $query   = mysqli_query($con,$sql);
            // Mengecek Di database Jumlah rows
            $rows    = mysqli_num_rows($query);

            if(strlen($username) < 6){
                return ['response'=>'negative','alert'=>'username minimal 6 Huruf']; 
            }
            //Mengecek jumlah data

            //Jika Tidak ada Data yang sama
            if($rows == 0){
                // htmlspecialchars berfungsi untuk menghalang attribut html yang masuk Ex: <h1>Contoh</h1>
                $name     = htmlspecialchars($name);
                // strtolower Berfungsi untuk memaksa string menjadi huruf kecil
                $username = strtolower(htmlspecialchars($username));
                $password = htmlspecialchars($password);
                $confirm  = htmlspecialchars($confirm);
                // Mengecek Kecocokan Password
                if($password == $confirm ){
                    $sql = "INSERT INTO table_user VALUES('','$name','$username','$password')";
                    $query   = mysqli_query($con,$sql);
                    if($query){
                        // Jika Berhasil Syntax akan Memberi respon positive
                        return ['response'=>'positive','alert'=>'Registrasi Berhasil'];
                    }else{
                        // Jika Error Syntax akan Memberi respon negative
                        return ['response'=>'negative','alert'=>'Registrasi Error'];
                    }
                }else{
                    // Jika Password Berbeda
                    return ['response'=>'negative','alert'=>'Password Tidak Cocok'];
                }
            //Jika Tidak ada data
            }else if($rows == 1){
                // Jika Username tersedia
                return ['response'=>'negative','alert'=>'Username telah digunakan'];
            }

        }

        // Fungsi Untuk Mengecek keberadaan Session
        public function sessionCheck(){
            if(!isset($_SESSION['username'])){
                // Jika tidak ada Session akan mereturn False
                return "false";
            }else{
                // Jika ada Session akan mereturn False
                return "true";
            }
        }

        // Fungsi Untuk Menghalang semua Request
        public function deniedRequest(){
            if(!isset($denied)){
                return "true";
            }else{
                return "false";
            }
        }

        // Syntax Untuk logout
        public function logout(){
            session_destroy();
            header("Location:index.php");
        }


        // Fungsi untuk Select semua data di table
        public function select($table){
            global $con;
            $sql = "SELECT * FROM $table";
            $query = mysqli_query($con,$sql);
            $data = [];
            while($bigData = mysqli_fetch_assoc($query)){
                $data[] = $bigData;
            }
            return $data;
        }

        // Fungsi untuk Select semua data di table
        public function selectone($table){
            global $con;
            $sql = "SELECT * FROM $table";
            $query = mysqli_query($con,$sql);
            $data = [];
            $bigData = mysqli_fetch_assoc($query);
            return $bigData;
        }

        // Fungsi Untuk Mengambil salah satu data saja di table
        public function selectWhere($table,$where,$whereValues){
            global $con;
            $sql = "SELECT * FROM $table WHERE $where = '$whereValues'";
            $query = mysqli_query($con,$sql);
            return $data = mysqli_fetch_assoc($query);
        }

        public function selectWhereAll($table,$where,$whereValues){
            global $con;
            $sql = "SELECT * FROM $table WHERE $where = '$whereValues'";
            $query = mysqli_query($con,$sql);
            $data = [];
            while($bigData = mysqli_fetch_assoc($query)){
                $data[] = $bigData;
            }
            return $data;
        }


        // Fungsi Untuk mengambil beberapa Field saja di database
        public function selectWhereOptional($table,$where,$whereValues,$optional){
            global $con;
            $sql = "SELECT $optional FROM $table WHERE $where = '$whereValues'";
            $query = mysqli_query($con,$sql);
            return $data = mysqli_fetch_assoc($query);
        }

        // Fungsi untuk Mencari data
        public function search($table,$likeKey,$likeOne){
            global $con;
            $sql = "SELECT * FROM $table WHERE $likeKey like '%$likeOne%'";
            $query = mysqli_query($con,$sql);
            $data = [];
            while($bigData = mysqli_fetch_assoc($query)){
                $data[] = $bigData;
            }
            return $data;

        }


        // Mengambil Jumlah data yang ada di table
        public function getCountRows($table){
            global $con;
            $sql   = "SELECT * FROM $table";
            $query = mysqli_query($con,$sql);
            $rows  = mysqli_num_rows($query);
            
            return $rows;
        }

        // Fungsi menghapus data di database
        public function delete($table,$where,$whereValues){
            global $con;
            $sql = "DELETE FROM $table WHERE $where = '$whereValues'";
            $query = mysqli_query($con,$sql);
            if($query){
                return ['response'=>'positive','alert'=>'Berhasil Menghapus Data'];
            }else{
                return ['response'=>'negative','alert'=>'Gagal Menghapus Data'];
            }
        }

        // Fungsi untuk mengambil data yang di edit
        // Where adalah field apa yang menjadi patokan edit contoh :id_pelanggan
        // WhereValues adalah data apa yang ingin di bandingkan dengan where Variable
        public function edit($table,$where,$whereValues){
            global $con;
            $sql = "SELECT * FROM $table WHERE $where = '$whereValues'";
            $query = mysqli_query($con,$sql);
            $data = [];
            while($bigData = mysqli_fetch_assoc($query)){
                $data[] = $bigData;
            }
            return $data;
        }

        // Fungsi Untuk mengupdate data di database
        // Where adalah field apa yang menjadi patokan edit contoh :id_pelanggan
        // WhereValues adalah data apa yang ingin di bandingkan dengan where Variable
        // Values disana untuk memasukan Values apa saja yang ingin di update
        public function update($table,$where,$whereValues,$values,$form){
            global $con;
            $sql   = "UPDATE $table SET $values WHERE id = '$whereValues'";
            $query = mysqli_query($con,$sql);
                if($query){
                    ?>
                    <script>
                        swal('Berhasil','Data Berhasil Diupdate','success')
                        .then((value)=>{
                            window.location.href='<?php echo $form; ?>';
                        });
                    </script>
                <?php
                }else{
                    return ['response'=>'negative','alert'=>'Gagaal Update Data'];
                }
        }

        // Fungsi untuk menambahkan data
        public function insert($table,$values,$form){
            global $con;
            
            $sql   = "INSERT INTO $table VALUES($values)";
            $query = mysqli_query($con,$sql);
            
            if($query){
                    ?>
                    <script>
                        swal('Berhasil','Data berhasil disimpan','success')
                        .then((value)=>{
                            window.location.href='<?php echo $form; ?>';
                        });
                    </script>
                <?php
            }else{
                return ['response'=>'negative','alert'=>'Gagal Menambahkan Data'];
            }
        }

        // Fungsi disini untuk menggabukan 2 table
        public function setJoin($tableOne,$tableTwo,$selectData,$whereJoin){
            global $con;
            $sql = "SELECT $selectData FROM $tableOne INNER JOIN $tableTwo ON $whereJoin";
            $query = mysqli_query($con,$sql);
            $data = [];
            while($bigData = mysqli_fetch_assoc($query)){
                $data[] = $bigData;
            }
            return $data;
        }

        // Fungsi disini untuk menggabukan 3 table
        public function setJoinThree($tableOne,$tableTwo,$tableThree,$selectData,$whereJoinOne,$whereJoinTwo){
            global $con;
            $sql = "SELECT $selectData FROM $tableOne INNER JOIN $tableTwo ON $whereJoin INNER JOIN $tableThree ON $whereJoinTwo";
            $query = mysqli_query($con,$sql);
            $data = [];
            while($bigData = mysqli_fetch_assoc($query)){
                $data[] = $bigData;
            }
            return $data;
        }
        

        // Fungsi Untuk mengecek AuthUser yang sedang login
        public function AuthUser($sessionUser){
            global $con;
            $sql = "SELECT * FROM table_user WHERE username = '$sessionUser'";
            $query = mysqli_query($con,$sql);
            $data = [];
            while($bigData = mysqli_fetch_assoc($query)){
                $data[] = $bigData;
            }
            return $data;
        }

        // Fungsi Untuk menguploud Foto
        function setfoto($input){
            global $con;
            $name       = $input['fotos']['name']; // Syntax untuk mengambil data Foto
            $ukuranFile = $input['fotos']['size']; // Syntax Untuk mengambil ukuran file foto
            $error      = $input['fotos']['error']; // Syntax untuk mengecek Kevalidan foto
            $tmpName    = $input['fotos']['tmp_name']; // Syntax untuk mengambil tmp dari foto tersebut
            // Note : tmp adalah penympanan sementara sebelum di pindahkan ke codingan kita

            $folder = '/img/'; // Menginisialisasi Folder penyimpanan foto yang telah di uploud

            $ekstensiGambar = explode('.',$name); //Syntak untuk untuk mengambil ekstensi gambar
            $namaGambar = $ekstensiGambar[0]; 
            $ekstensiBelakang = strtolower(end($ekstensiGambar)); // Mengambil extensi belakang contoh :jpg,png,dll
            $ekstensi = ['jpg','jpeg','png','bmp']; // Memberi extensi yang boleh di uploud
            $error = array(); // Membuat variable untuk menyimpan semua error

            if (empty($input['fotos']['tmp_name'][$i])) { // Syntax untuk mengecek jika file tidak di uploud
                    $errors[] = "Silahkan pilih kurang lebih 1 gambar untuk di Uploud "; // Alert dari fungsi
            }
            else{

                if (in_array($ekstensiBelakang, $ekstensi) === false) { // Fungsi ini adalah untuk Mengecek ekstensi valid
                    $errors[] = "Uploud file gambar!"; // Jika tidak gambar 
                }

                if ($ukuranFile > 4000000) { // Fungsi untuk mengecek jika file terlalu Besar
                    $errors[] = "Ukuran gambar terlalu besar! "; // Alert di atas
                }

            }

            if (empty($errors)) {
                if (!file_exists('img')) { // Jika belum ada Folder img PHP akan membuat folder bernama img
                    mkdir('img',0563);
                }
                
            }

            move_uploaded_file($tmpName, $folder.$name); // Jika tidak error syntax ini akan memindahkan file yang telah di uploud

            // Mengirim nama foto di database
            $sql = mysqli_query($conn,"UPDATE $table SET foto = '$fotoValues' WHERE user_id = '$userValues'");
            if ($sql) {
                // Alert Success
                return "image-success";
            }
            else{
                // Alert Negative
                return "image-error";
            }
        }

        // Fungsi di bawah digunakan untuk  Membuat autokode String increment 
        // Note: TR001,PL002.dll
        public function autokode($table,$field,$pre){
            global $con;
            // Mengambil jumlah maksimal data di database yang di inisialisasi kan menjadi field kode
            $sql = "SELECT MAX($field) as kode FROM $table";
            // Execute
            $query = mysqli_query($con,$sql);
            // Meretrive data yang telah di Execute
            // Note: Retrive adalah membagi data besar menjadi bentuk array
            $number = mysqli_fetch_assoc($query);
            // Strlen berfungsi untuk mengecek panjang String
            
            if(strlen($number['kode']) == 3){ // Jika String panjang Tiga
                // Menyambungkan Kode
                $kode = $pre.$number['kode'];
            }else if(strlen($number['kode']) == 2){ // Jika String panjang Dua
                // Menyambungkan Kode
                $kode = $pre."0".$number['kode'];
            }else if(strlen($number['kode']) == 1){ // Jika String panjang Dua
                // Menyambukan Kode
                $kode = $pre."00".$number['kode'];
            }
            // echo $kode;
        }

        public function validateHtml($field){ // Validasi Html Character
            $field = htmlspecialchars($field);
            return $field;
        }

        public function validateLower($field){ // Validasi Huruf Kecil
            $field = strtolower($field);
            return $field;
        }

        public function toExcel($nameFile){
            // Data Waktu Sekarang
            $dateNow = date("Y-m-d");

            // Fungsi header dengan mengirimkan raw data ke excel
            $rawSended = header("Content-type : application/vnd-ms-excel");
            // Funsgi untuk membuat nama file 
            $GoExport  = header("Content-D isposition : attachment; filename = $dateNow-$nameFile");


            if($rawSended == true && $GoExport == true){ // Mengecek apakah ada error di atas
                // Memberi Response Positive jika Export Berhasil
                return ['response'=>'positive','alert'=>'Berhasil Meng Export data'];
            }else{
                // Memberi Response Negative Jika Export Gagal
                return ['response'=>'negative','alert'=>'Gagal Melakukan Export']; 
            }
        }

        public function toWord($nameFile){
            $dateNow = date("Y-m-d");
            // Fungsi header dengan mengirimkan raw data ke excel
            $rawSended = header("Content-type : application/vnd-ms-word");
            // Funsgi untuk membuat nama file 
            $GoExport  = header("Content-D isposition : attachment; filename = $dateNow-$nameFile");


            if($rawSended == true && $GoExport == true){ // Mengecek apakah ada error di atas
                // Memberi Response Positive jika Export Berhasil
                return ['response'=>'positive','alert'=>'Berhasil Meng Export data'];
            }else{
                // Memberi Response Negative Jika Export Gagal
                return ['response'=>'negative','alert'=>'Gagal Melakukan Export']; 
            }
        }

        public function toPdf(){
            echo "window.print()";
        }

        
        
    }

?>