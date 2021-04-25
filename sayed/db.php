<?php
class db{
    public $con;
    function __construct($host,$dbname,$username,$password)
    {
        $db='mysql:host='.$host.';dbname='.$dbname.'';
        $con=new PDO($db,$username,$password);
        $this->con=$con;
    }
    public function getAll($table){
        $query='select * from '.$table.'';
        $sql=$this->con->prepare($query);
        $stm=$sql->execute();
        return $sql->fetchAll();
    }
    // edit product
    public function update($table,$newValues,$id)
    {
        $query='update '.$table.' set ';
        $i=count($newValues);
        foreach($newValues as $key => $value)
        {
            $i--;
            if($i==0)
            {
                $query.=' '.$key.'="'.$value.'"';
            }
            else{
                $query.=' '.$key.'="'.$value.'" ,';
            }
        }
        $query.=' where id='.$id.'';
        $sql=$this->con->prepare($query);
        $stm=$sql->execute();
        return $stm;
    }
    
    // delete product
    public function delete($table,$id)
    {
        $query='delete from '.$table.' where id='.$id.'';
        $sql=$this->con->prepare($query);
        $stm=$sql->execute();
        return $stm;
    }
    // select single record
    public function getRecord($table,$id)
    {
        $query='select * from '.$table.' where id='.$id.'';
        $sql=$this->con->prepare($query);
        $stm=$sql->execute();
        return $sql->fetch();
    }
    // create
    public function create($table,$newValues)
    {
        $query='insert into '.$table.' (';
        $i=count($newValues);
        foreach($newValues as $key => $value)
        {
            $i--;
            if($i!=0)
            {
                $query.='`'.$key.'`, ';
            }
            else{
                $query.='`'.$key.'`) ';
            }
        }
        $query.=' values (';
        $i=count($newValues);
        foreach($newValues as $key => $value)
        {
            $i--;
            if($i!=0)
            {
                $query.='"'.$value.'", ';
            }
            else{
                $query.='"'.$value.'") ';
            }
        }
        $sql=$this->con->prepare($query);
        $stm=$sql->execute();
        return $stm;
    }
}
?>