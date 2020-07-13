<?php
class Database
{
    public static $db;
    public static $con;
    public function __construct()
    {
        $this->user="u402197955_spanish";
        $this->pass="SpanishASAP$$2";
        $this->host="localhost";
        ///$this->user="root";
        ///$this->pass="root";
        ///$this->host="localhost";
        $this->ddbb="u402197955_spanish";
        /// echo $_SESSION['user_id'];
    }

    public function connect()
    {
        $con = new mysqli($this->host, $this->user, $this->pass, $this->ddbb);
        return $con;
    }


    public static function getCon()
    {
        if (self::$con==null && self::$db==null) {
            self::$db = new Database();
            self::$con = self::$db->connect();
        }
        return self::$con;
    }
}