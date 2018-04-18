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
            $stmt = $this->con->prepare("INSERT INTO students(name, username, password, api_key) values(?, ?, ?, ?)");

            //mengikat parameter
            $stmt->bind_param("ssss", $name, $username, $password, $apikey);

            //mengeksekusi statement
            $result = $stmt->execute();

            //menutup statement
            $stmt->close();

            //jika statement tereksekusi dengan sukses
            if ($result) {
                //Mengembalikan 0 berarti siswa berhasil dibuat
                return 0;
            } else {
                //Returning 1 means failed to create student
                return 1;
            }
        } else {
            //returning 2 means user already exist in the database
            return 2;
        }
    }

    //methode for student login
    public function studentLogin($username, $pass)
    {
        //Menghasilkan hash kata sandi
        $password = md5($pass);

        //membuat query
        $stmt = $this->con->prepare("SELECT  * FROM students WHERE username=? and password=?");

        //mengikat parameter
        $stmt->bind_param("ss", $username,$password);

        
    }
}
