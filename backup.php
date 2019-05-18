#!/usr/bin/php
<?php

// nastaveni zaloh
$servername = "localhost";
$user = "root";
$pass = "********";
$backup_path = "/var/backup/mysql_backup/";

// vytvoreni spojeni se serverem
$mysqli = mysqli_connect("localhost", $user, $pass);

// zjistit seznam databazi
$result = $mysqli->query("SHOW DATABASES");
while($row = $result->fetch_array()) {
        if(
                // vyjmenuji databaze ktere nechci zalohovat
                $row[0] != "performance_schema" && $row[0] != "mysql" &&
                $row[0] != "phpmyadmin" && $row[0] != "roundcube" &&
                $row[0] != "dbispconfig" && $row[0] != "information_schema"
        ) {
                $database[] = $row[0];
        }
}

// odpojeni od serveru
mysqli_close($mysqli);

// zazalohuje vsechny databaze
foreach($database as $key => $db)
{

        // nazev souboru
        $filename = $db . "_" . date('y_m_d_h_i') . ".sql";

        // result
        $result = exec("mysqldump " . $db . " --password=" . $pass . " --user=" . $user . " --single-transaction >" . $backup_path . $filena$

}

?>
