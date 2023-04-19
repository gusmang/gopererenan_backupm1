<?php

return [
    'devUrl' => "administrator", 
    'assetsUrl' => "public",
    'publicUrl' => "http://localhost/puniadana/public",
    'adminPage' => "administrator",
    'jk_tenaga' => array("Perempuan","Laki - Laki"),
    'limit_page' => 10,
    'metode_pembayaran' => array("Manual Transfer","Payment GateWay","Cash"), 
    'status_tenaga' => array("Belum Bekerja","Interview","Aktif Bekerja"), // 'bar' is default if MY_VALUE is missing in .env
];

?>