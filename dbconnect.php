<?php
    $server = 'localhost:3306';//localhost:3306
    $username = 'root';
    $password = '';
    $namadb = 'tugasweb';

   $k = new mysqli($server, $username, $password, $namadb);
   if($k->connect_errno)
   {
        echo "failed ", $k->connect_error;
        exit();
   }