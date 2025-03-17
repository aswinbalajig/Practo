<?php
class DB
{   private $conn;
    public function __construct($confName)
    {   $db_conf=require __DIR__.'/DB_conf.php';
        // var_dump($db_conf);
        // die();
        $conf=$db_conf[$confName];
        $con_string="{$conf['dbtype']}:host={$conf['host']};dbname={$conf['dbname']};charset=utf8mb4";
        $this->conn=new PDO($con_string,$conf['username'],$conf['password'],[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function query_records($query,$params=null,$is_single=false)
    {
        if($params===null)
        {
            $stmt = $this->conn->query($query);
            $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $stmt=$this->conn->prepare($query);
            $stmt->execute($params);
            if($is_single)
            {
                $records=$stmt->fetch(PDO::FETCH_ASSOC);
            }
            else{
                $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $records;
    }
    public function insert_record($query,$params)
    {
        $stmt=$this->conn->prepare($query);
        $stmt->execute($params);
        return $this->conn->lastInsertId();
    }

    public function alter_record($query,$params)
    {
        $stmt=$this->conn->prepare($query);
        $stmt->execute($params);
    }

    public function get_connection()
    {
        return $this->conn;
    }
}
