<?php


abstract class ModelBase
{
    protected $link;
    protected $sql = '';
    protected $data = [];

    /**
     * @return string
     */
    abstract protected function getTable();
    public function __construct()
    {
        $this->connection();
    }

    public function connection(){
        $this->link = new PDO('mysql:host=localhost;dbname=users_info', 'root', '');
        return $this;
    }
//    public function getById($id){
//        $sql = ("SELECT * FROM `{$this->getTable()}` WHERE ( `id` = :id )");
//        $query = $this->link->prepare($sql);
//        $query->execute([':id' => $id]);
//        return $query->fetch(PDO::FETCH_ASSOC);
//    }
//    public function get($params = null){
//
//        $sql = ("SELECT * FROM `{$this->getTable()}`");
//        $query = $this->link->prepare($sql);
//        $query->execute();
//        return $query->fetchall();
//    }

    /**
     * @param array $data
     * @return $this
     */
    public function update(array $data)
    {
        $update = "";
        foreach ($data as $colum) {
            $update.= array_search($colum,$data)."=:". array_search($colum,$data) . ",";
        }
        $update = substr($update, 0, -1);
        $this->sql = "UPDATE `{$this->getTable()}` SET {$update}";
        $this->data = $data;
        return $this;
    }


    /**
     * @param string $where
     * @return $this
     */

//    where("role_id",$role_id,"token",$token)
    public function where(...$params){
        $where = '';
        $check = true;
        foreach ($params as $param){
            if($check){
                $where.=$param;
            }else {
                $where.=" = '" . $param . " ' ,";
            }
            $check=!$check;
        }
        $where = substr($where, 0, -1);
         $str = str_replace(',',' AND ',$where);
         $this->sql.= " WHERE (" . $str . ")";
         return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function insert(array $data){

        $insert = "";
        $values = '';

        foreach ($data as $colum) {

            $values.= ':'.array_search($colum,$data) .",";
            $insert.= array_search($colum,$data).",";

       }
        $insert = substr($insert, 0, -1);
        $values = substr($values, 0, -1);
        $this->sql = "INSERT INTO `{$this->getTable()}` ({$insert}) VALUES ({$values})";
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function execute(){

//        print_r($this->sql);
//        exit();
        $query = $this->link->prepare($this->sql);
        $query->execute($this->data);
        $this->sql=[];
        $this->data=[];
        return $query->fetchall();
    }

    /**
     * @param string $columns
     * @return $this
     */
    public function select(string $columns = '*'){

        $sql = ("SELECT {$columns} FROM `{$this->getTable()}`");
        $this->sql = $sql;
        return $this;
    }
}
