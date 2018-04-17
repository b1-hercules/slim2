<?php

class DbConnect
{
    //variable untuk menyimpan link database
    private $con;

    //class construktor
    function __construct(){

    }

    //method ini akan konek ke db
    function connect()
    {
        //termasuk file constant.php untukmendapatkan konstanta db
        include_once dirname(__FILE__) . '/Constants.php';

        //konek ke db mysql
        $this->con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        //memeriksa apakah ada kesalahan saat menghubungkan
        if (mysqli_connect_errno()){
            echo "gagal Terkoneksi ke MySQL: " . mysqli_connect_error();
        }

        //akhirnya return link koneksi
        return $this->con;
    }
}
