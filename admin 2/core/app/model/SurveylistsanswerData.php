<?php

/**
 * surveylistsanswerData short summary.
 *
 * surveylistsanswerData description.
 *
 * @version 1.0
 * @author DigitalesWeb
 */

class SurveylistsanswerData
{ 
    public static $tablename = "surveylistsanswers";
    public function __construct()
    {
        $this->id ="";
        $this->pn ="";
        $this->answer ="";
        $this->surveylistsquestions_id = "";
        $this->surveylists_id ="";
        $this->pn_anho ="";
        $this->user_id ="1";
        $this->nameTEP ="";
        $this->a_code_approval = "";
        $this->created_at = (new \DateTime())->format('Y-m-d H:i:s');
    }
    public function add()
    {
        $sql= "INSERT INTO ".self::$tablename." (pn,pn_anho, answer,surveylistsquestions_id, user_id, nameTEP, created_at, surveylists_id, a_code_approval)";
        $sql .= " VALUES (\"$this->pn\",\"$this->pn_anho\",\"$this->answer\",\"$this->surveylistsquestions_id\",\"$this->user_id\",\"$this->nameTEP\",\"$this->created_at\",\"$this->surveylists_id\" ,\"$this->a_code_approval\" )";
        //echo $sql;
        Executor::doit($sql);
    }
    public function update()
    {
        $sql= "UPDATE ".self::$tablename." SET answer=\"$this->answer\", user_id=\"$this->user_id\", nameTEP=\"$this->nameTEP\", a_code_approval=\"$this->a_code_approval\"   WHERE id=$this->id ";
        Executor::doit($sql);
    }

    public function upload($radicado, $escritura, $CI, $email, $anho, $estatus)
    {
        $sql = "insert into ".self::$tablename." (radicado,escritura,CI,email,anho,estatus,user_id,created_at, surveylists_id) ";
        $sql .= "value (\"$radicado\",\"$escritura\",\"$CI\",\"$email\",\"$anho\",\"$estatus\",\"$this->user_id\",$this->created_at,\"$this->surveylists_id\")";
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
        return Model::many($query[0], new SurveylistsanswerData());
    }

    public static function getById($id)
    {
        $sql = "select * from ".self::$tablename." where id=$id";
        // echo $sql;
        $query = Executor::doit($sql);
        return Model::one($query[0], new SurveylistsanswerData());
    }
    public static function getByPN($pn, $anho)

    
    {
        $sql = "select * from ".self::$tablename." where pn=$pn AND pn_anho=$anho";
        $query = Executor::doit($sql);
        return Model::one($query[0], new SurveylistsanswerData());
    }
    public static function getAllAnswersOn($numeroescriturapublica, $anho, $surveylists_id)
    {
        $sql = "SELECT cl.id as cl_id, cla.id as cla_id, cla.surveylistsquestions_id as clq_id,  cla.answer as respuesta FROM surveylists as cl LEFT JOIN surveylistsanswers as cla ON cl.id = cla.surveylists_id WHERE cl.surveylist_status = 'open' AND cl.id = '".$surveylists_id."' AND cla.numeroescriturapublica ='".$numeroescriturapublica."' AND cla.ep_anho='".$anho."' ORDER BY cla.id ASC ";
        $query = Executor::doit($sql);
        return Model::many($query[0], new SurveylistsanswerData());
    }
    public static function getAllAnswers($numeroescriturapublica, $anho, $surveylists_id)
    {
        $sql = "SELECT cl.id as cl_id, cla.id as cla_id, cla.surveylistsquestions_id as clq_id, cla.answer as respuesta FROM surveylists as cl LEFT JOIN surveylistsanswers as cla ON cl.id = cla.surveylists_id WHERE cl.id = '".$surveylists_id."' AND cla.numeroescriturapublica ='".$numeroescriturapublica."' AND cla.ep_anho='".$anho."' ORDER BY cla.id ASC ";
        $query = Executor::doit($sql);
        return Model::many($query[0], new SurveylistsanswerData());
    }
    public static function getAllNumRow()
    {
        $sql = "select * from ".self::$tablename;
        $query = Executor::doit($sql);
        return Model::many($query[0], new SurveylistsanswerData());
    }
    public static function getAllNumRowAnswerToList()
    {
        $sql = "select t1.* from ".self::$tablename. " t1 join (select numeroescriturapublica, min(id) as min_fila from ".self::$tablename." group by numeroescriturapublica, ep_anho) t2 on t2.numeroescriturapublica = t1.numeroescriturapublica and t2.min_fila = t1.id order by t1.id ";
        $query = Executor::doit($sql);
        return Model::many($query[0], new SurveylistsanswerData());
    }
    public static function getAllLimitRowAnswerToList($this_page_first_result, $results_per_page)
    {
        $sql = "select t1.* from ".self::$tablename. " t1 join (select numeroescriturapublica, min(id) as min_fila from ".self::$tablename." group by numeroescriturapublica, ep_anho) t2 on t2.numeroescriturapublica = t1.numeroescriturapublica and t2.min_fila = t1.id order by t1.id LIMIT " . $this_page_first_result . "," .  $results_per_page;
        $query = Executor::doit($sql);
        return Model::many($query[0], new SurveylistsanswerData());
    }

    public static function getAllLimitRow($this_page_first_result, $results_per_page)
    {
        $sql = "select * from ".self::$tablename. " LIMIT " . $this_page_first_result . "," .  $results_per_page;
        $query = Executor::doit($sql);
        return Model::many($query[0], new SurveylistsanswerData());
    }
    public static function getAllnameTEP()
    {
        $sql = "select DISTINCT nameTEP from ".self::$tablename ;
        $query = Executor::doit($sql);
        return Model::many($query[0], new SurveylistsanswerData());
    }
}