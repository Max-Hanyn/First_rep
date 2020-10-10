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

    /**
     * @param array $data
     * @return $this
     * specify columns for update
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
     * specify conditions for sql string
     */

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
     * specify columns and values to insert
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
     * execute sql string
     */
    public function execute(){

        $query = $this->link->prepare($this->sql);
        $query->execute($this->data);
        $this->sql=[];
        $this->data=[];
        return $query->fetchall();
    }

    /**
     * @param string $columns
     * @return $this
     * specify columns to select
     */
    public function select(string $columns = '*'){

        $sql = ("SELECT {$columns} FROM `{$this->getTable()}`");
        $this->sql = $sql;
        return $this;
    }
    public function innerJoin(string $table, string $firstColumn, string $secondColumn){

        $this->sql.= "JOIN $table ON {$this->getTable()}.$secondColumn = $table.$firstColumn ";
        return $this;

    }

    /**
     * @return $this
     * delete specified rows
     */
    public function delete(){
        $sql = ("Delete FROM `{$this->getTable()}`");
        $this->sql = $sql;
        return $this;
    }
}
