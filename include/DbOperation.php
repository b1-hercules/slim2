<?php

class DbOperation
{
    //link koneksi database
    private $con;

    //konstruktor kelas
    function __construct() {
        
        //getting DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';

        //membuat objek DbConnect untuk konek ke db
        $db = new DbConnect();

        //inisialisasi link koneksi dari kelas ini
        //dgn memanggil method konek dari kelas DbConnect
        $this->con = $db->connect();
    }

    //methodakan membuat new student
    public function createStudent($name,$username,$pass)
    {
        //pertama kita akan memeriksa apakah murid sudah terdaftar atau belum
        if (!$this->isStudentExists($username)) {
            //mengenkripsi password
            $password =md5($pass);

            //meng-generate API key
            $apikey = $this->generateApiKey();

            //membuat statement
            
        }
    }
}
