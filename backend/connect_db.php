<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "herbalplant_db";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if(!$connect){
    ?>
    <script>
        alert("Connection to database failed.");
    </script>
    <?php
}


?>