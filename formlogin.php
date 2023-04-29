<?php
    include("konfigurasi.php");
    $psn ="";
    if(isset($_POST["txUSER"])){
        $user = $_POST["txUSER"];
        $pwd = $_POST["txPASS"];

        $sql = "SELECT tu.nama, tu.email, tu.username,tu.passkey,tu.iduser FROM tbuser tu WHERE tu.username='".$user."';";
        $cnn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME, DBPORT) or die("gagal koneksi ke dbms");
        $hasil = mysqli_query($cnn,$sql);
        $jdata = mysqli_num_rows($hasil);
        if($jdata > 0){
        //echo "DEBUG: jdata=>" .$;
        $h = mysqli_fetch_assoc($hasil);
        echo "DEBUG:<br>Nama: " . $h["nama"];
        //echo "DEBUG:<br>Nama: " . $h["passkey"];
        if(md5($pwd) == $h["paskey"]){
            echo "DEBUG: password sama";
        }else{
            $psn ="Akses ditolak";
        }
        }else{
            $psn ="Akses ditolak";
        }

        


    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
</head>
<body>

    <div><?=$psn;?></div>

<form method="POST"action=formlogin.php>
    <h3>form Login</h3>
 <div>
    User Name
    <input type="text" name="txUSER">
</div>
<div>
    Password 
    <input type="password" name="txPASS">
</div>
    
<div>
    <button type="submit">Login</button>
</div>

</form>
</body>
</html>




