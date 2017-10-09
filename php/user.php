<?php
require_once("mysql.php");

class User{

    /**
     * description_插入数据到XX
     * @param $tableName
     * @param $name
     * @param $password
     * @return int
     */
    public function insert($tableName,$name,$password){
        $db = new DB();
        $resultId = $db->insertData("$tableName",array('name','password'),array($name,$password));
        return $resultId;
    }
    /**
     * @description根据ID或XXX查询一条数据，user所查询的表，id是字段名
     * @param $table
     * @param $name
     * @param $value
     * @return array|null
     */
    public static function getUserById($table,$name,$value){
        $db = new DB();
        return $db->getDataByAtr("$table",'$name',$value);
    }
    /**
     * @description根据name查询一条数据
     * @param $name
     * @return array|null
     */
    public static function getUserByName($name){
        $db = new DB();
        @$data = $db->QueryAll("SELECT * FROM user WHERE name = '".$name."'");
        if(count($data)!=0)return $data;
        else return null;
    }
    /**
     * @description_获取全部数据，调方法使用
     * @param $tableName
     * @return null
     */
    public static function QueryAll($tableName){
        $db = new DB();
        @$data = $db->QueryAll("select * FROM"." ".$tableName);
        if(count($data)!=0) echo $data;
        else return null;
    }
    /**
     * @description_获取全部数据，通讯使用
     * @param $tableName
     */
    public static function QueryAllJson($tableName){
        $db = new DB();
        @$data = $db->QueryAllJson("SELECT * FROM ".$tableName."");
        if(count($data)!=0) echo $data;
        else echo false;
    }
    /**
     * description分页查询，返回Json格式。通讯用，echo
     * @param $start
     * @param $count
     */
    public static function QueryWithPage($start,$count){
        $db = new DB();
        @$data = $db->QueryAllJson("select id,name,password from user order by id limit"." ".$start.",".$count);
        if(count($data)!=0) echo $data;
        else echo false;
    }
    /**
     * @description_删除数据，根据ID，user是表名，id是....
     * @param $tableName
     * @param $name
     * @param $value
     * @return bool
     */
    public static function deleteByUid($tableName,$name,$value){
        $db = new DB();
        if($db->delete("$tableName","$name",$value)) return true;
        else return false;
    }
}