<?php
class ClientData
{
    public static $tablename = "client";
    public function __construct()
    {
        $this->is_public = "0";
        $this->created_at = "NOW()";
    }

    public function add()
    {
        $sql = "insert into ".self::$tablename." (name,lastname,cc,address,phone,email,is_dr,created_at) ";
        $sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->cc\",\"$this->address\",\"$this->phone\",\"$this->email\",\"$this->is_dr\",$this->created_at)";
        Executor::doit($sql);
    }

    public static function delById($id)
    {
        $sql = "delete from ".self::$tablename." where id=$id";
        Executor::doit($sql);
    }
    public function del()
    {
        $sql = "delete from ".self::$tablename." where id=$this->id";
        Executor::doit($sql);
    }

    // partiendo de que ya tenemos creado un objecto ClientData previamente utilizamos el contexto
    public function update_active()
    {
        $sql = "update ".self::$tablename." set last_active_at=NOW() where id=$this->id";
        Executor::doit($sql);
    }


    public function update()
    {
        $sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",cc=\"$this->cc\",email=\"$this->email\",address=\"$this->address\",phone=\"$this->phone\" where id=$this->id";
        //echo $sql;
        Executor::doit($sql);
    }

    public static function getById($id)
    {
        $sql = "select * from ".self::$tablename." where id=$id";
        $query = Executor::doit($sql);
        return Model::one($query[0], new ClientData());
    }


    public static function getAll()
    {
        $sql = "select *  from ".self::$tablename." order by created_at desc";
        $query = Executor::doit($sql);
        return Model::many($query[0], new ClientData());
    }

    public static function getAllNumRow()
    {
        $sql = "select * from ".self::$tablename;
        $query = Executor::doit($sql);
        //echo $query;
        return Model::many($query[0], new ClientData());
    }

    public static function getAllLimitRow($this_page_first_result, $results_per_page)
    {
        $sql = "select * from ".self::$tablename. " LIMIT " . $this_page_first_result . "," .  $results_per_page;
        $query = Executor::doit($sql);
        //echo $sql;
        return Model::many($query[0], new ClientData());
    }

    public static function getAllActive()
    {
        $sql = "select * from client where last_active_at>=date_sub(NOW(),interval 3 second)";
        $query = Executor::doit($sql);
        return Model::many($query[0], new ClientData());
    }

    public static function getAllDrActive()
    {
        $sql = "select * from client where is_active>=1 and is_dr=1";
        $query = Executor::doit($sql);
        return Model::many($query[0], new ClientData());
    }

    public static function getAllUnActive()
    {
        $sql = "select * from client where last_active_at<=date_sub(NOW(),interval 3 second)";
        $query = Executor::doit($sql);
        return Model::many($query[0], new ClientData());
    }


    public function getUnreads()
    {
        return MessageData::getUnreadsByClientId($this->id);
    }


    public static function getLike($q)
    {
        $sql = "select * from ".self::$tablename." where title like '%$q%' or email like '%$q%'";
        $query = Executor::doit($sql);
        return Model::many($query[0], new ClientData());
    }
}
