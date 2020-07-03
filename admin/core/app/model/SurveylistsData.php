<?php

/**
 * surveylistsData short summary.
 *
 * surveylistsData description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */

class SurveylistsData
{
    public static $tablename = "surveylists";
    public function __construct()
    {
        $this->id = "";
        $this->name = "";
        $this->description = "";
        $this->user_id = "";
        $this->surveylist_status = "";
        $this->created_at = Util::getDatetimeNow();
    }
    public function add()
    {
        $sql= "INSERT INTO ".self::$tablename." (name, description, user_id, created_at, surveylist_status)";
        $sql .= " VALUES (\"$this->name\",\"$this->description\",\"$this->user_id\",\"$this->created_at\",\"$this->surveylist_status\" )";
        Executor::doit($sql);
    }

    public function update()
    {
        $sql= "UPDATE ".self::$tablename." SET name=\"$this->name\", description=\"$this->description\", user_id=\"$this->user_id\", surveylist_status=\"$this->surveylist_status\"   WHERE id=$this->id ";
        //echo $sql;
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

    public static function getAll()
    {
        $sql = "select * from ".self::$tablename;
        $query = Executor::doit($sql);
        return Model::many($query[0], new surveylistsData());
    }
    public static function getAllOpen()
    {
        $sql = "select * from ".self::$tablename. " WHERE surveylist_status ='open'";
        $query = Executor::doit($sql);
        return Model::many($query[0], new surveylistsData());
    }

    public static function getById($id)
    {
        $sql = "select * from ".self::$tablename." where id=$id";
        $query = Executor::doit($sql);
        return Model::one($query[0], new surveylistsData());
    }
    public static function getAllNumRow()
    {
        $sql = "select * from ".self::$tablename;
        $query = Executor::doit($sql);
        //echo $query;
        return Model::many($query[0], new surveylistsData());
    }

    public static function getAllLimitRow($this_page_first_result, $results_per_page)
    {
        $sql = "select * from ".self::$tablename. " LIMIT " . $this_page_first_result . "," .  $results_per_page;
        $query = Executor::doit($sql);
        return Model::many($query[0], new surveylistsData());
    }
 
    public static function getAllNumRowToListByRange($start_at, $finish_at)
    {
        $sql = "select t1.* from ".self::$tablename. " t1 join (select name, min(id) as min_fila from ".self::$tablename." group by name, description) t2 on t2.name = t1.name and t2.min_fila = t1.id and  t1.created_at>=\"$start_at\" and t1.created_at<=\"$finish_at\" order by t1.id ";
        $query = Executor::doit($sql);
        return Model::many($query[0], new surveylistsData());
    }
}