<?php

/**
 * surveylistsquestionsData short summary.
 *
 * surveylistsquestionsData description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */

class SurveylistsquestionData
{
    public static $tablename = "surveylistsquestions";
    public function __construct()
    {
        $this->id ="";
        $this->question ="";
        $this->description ="";
        $this->linkpdf = "";
        $this->surveylists_id ="";
        $this->q_status = "";
        $this->position ="";
        $this->q_format = "radio";
        $this->user_id ="";
        $this->created_at = (new \DateTime())->format('Y-m-d H:i:s');
    }
    public function add()
    {
        $sql= "INSERT INTO ".self::$tablename." (question, description, linkpdf, user_id, created_at, surveylists_id, q_status, position, q_format)";
        $sql .= " VALUES (\"$this->question\",\"$this->description\",\"$this->linkpdf\",\"$this->user_id\",\"$this->created_at\",\"$this->surveylists_id\",\"$this->q_status\",\"$this->position\",\"$this->q_format\" )";
        Executor::doit($sql);
    }

    public function update()
    {
        $sql= "UPDATE ".self::$tablename." SET question=\"$this->question\", description=\"$this->description\",linkpdf=\"$this->linkpdf\", surveylists_id=\"$this->surveylists_id\",user_id=\"$this->user_id\", q_status=\"$this->q_status\", position=\"$this->position\"  WHERE id=$this->id ";
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


    public static function getAllQuestionsOn($mode, $id)
    {
        $sql = "SELECT *, cl.id as cl_id, clq.id as clq_id, clq.question as pregunta  FROM surveylists as cl LEFT JOIN ".self::$tablename." as clq ON cl.id = clq.surveylists_id WHERE cl.surveylist_status = '".$mode."' AND cl.id = '".$id."' AND clq.q_status = 'on' ORDER BY clq.position ASC";
        $query = Executor::doit($sql);
        return Model::many($query[0], new SurveylistsquestionData());
    }


    public static function getAll()
    {
        $sql = "select * from ".self::$tablename;
        $query = Executor::doit($sql);
        return Model::many($query[0], new SurveylistsquestionData());
    }

    public static function getById($id)
    {
        $sql = "select * from ".self::$tablename." where id=$id";
        $query = Executor::doit($sql);
        return Model::one($query[0], new SurveylistsquestionData());
    }
    public static function getAllBysurveylistsId($surveylists_id)
    {
        $sql = "select * from ".self::$tablename. " WHERE surveylists_id=$surveylists_id";
        $query = Executor::doit($sql);
        //echo $query;
        return Model::many($query[0], new SurveylistsquestionData());
    }
    public static function getAllNumRow()
    {
        $sql = "select * from ".self::$tablename;
        $query = Executor::doit($sql);
        //echo $query;
        return Model::many($query[0], new SurveylistsquestionData());
    }
    public static function getAllNumRowQuestionToList($surveylists_id)
    {
        $sql = "select * from ".self::$tablename. " WHERE surveylists_id=$surveylists_id ";
        $query = Executor::doit($sql);
        //echo $query;
        return Model::many($query[0], new SurveylistsquestionData());
    }
    public static function getAllLimitRowQuestionToList($surveylists_id, $this_page_first_result, $results_per_page)
    {
        $sql = "select * from ".self::$tablename. " WHERE surveylists_id=$surveylists_id". " ORDER BY position ASC LIMIT " . $this_page_first_result . "," .  $results_per_page . "";
        $query = Executor::doit($sql);
        //echo $sql;
        return Model::many($query[0], new SurveylistsquestionData());
    }

    public static function getAllLimitRow($this_page_first_result, $results_per_page)
    {
        $sql = "select * from ".self::$tablename. " LIMIT " . $this_page_first_result . "," .  $results_per_page;
        $query = Executor::doit($sql);
        //echo $sql;
        return Model::many($query[0], new SurveylistsquestionData());
    }
}
