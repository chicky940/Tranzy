<?php
    $host = 'localhost';
    $user = 'root';
    $pwd = 'root';
    $db = 'transy';
    
    $con = mysql_connect($host,$user,$pwd)
                or die('Database Server is currently not available, please try again later.');
    mysql_select_db($db)
                or die('Database not ready, please try again later');
/*    $con = mysqli_connect($host, $user, $pwd) or die("Database Server is currently not available, please try again later.");
    mysqli_select_db($con, $db)or die("Could not find database.");  */