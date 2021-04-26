<?php
///This class is generic class that receives the table name and other parameters 
///of the table and dynamically Insert,Update,Delete,Get all records and other main functions
///on the table database   
class TableDatabase
{
    private $connection; //Data Base connection Parameter
    public $table;      //Table Name
    public $primarykeyfield;  //Primary key field Name
    private $imagefield;       //Image Field Name (if exists)
    
    //Constructor To supply The parameters through it . you can leave $imagefield empty if there is
    //no Field for Image
    public function __construct($connection,$table,$primarykeyfield,$imagefield='')

    {
    $this->connection=$connection;
    $this->table=$table;
    $this->primarykeyfield=$primarykeyfield;
    $this->imagefield=$imagefield;
        
    }
    //Function that Execute the mysql query supply the query and the parameters as array ($fields)
    //example ['id'=>null,'name'=>ahmed] each key has the name of the fields in the table 
    //and value has the value 
    private function ExecuteQuery($query,$fields=[])
    {
        $stmt=$this->connection->prepare($query);
        $stmt->execute($fields);
        return $stmt;
    }
    //Function that Insert new record in the table if you have not Image field you can
    //ommit it from the function call
    //$fields consists of column name of the table as key and the value of each column
    public function Insert($fields,$ImageFile='')
    {
        //If you supply the $ImageFile value then upload image
        //and add field of the image and supply it by the value of the uploaded image name
        if($this->imagefield!='')
        {
        $imagename=$this->UploadImage($ImageFile);
        $fields[$this->imagefield]=$imagename;
        }
        //Create Dynamic Insert Query as the elements of the fields array you supply  
        $query="insert into ".$this->table." (";
        foreach($fields as $key=>$value) $query.=$key." ,";
        $query=trim($query,",");
        $query.=") VALUES( ";
        foreach($fields as $key=>$value) $query.=":".$key.",";
        $query=trim($query,",");
        $query.=")";
        
        
        echo $query;
        $result=$this->ExecuteQuery($query,$fields);

    }
    
    //Function that Update the required record according to the supplied values
    //You must supply the primarykey field (i.e 'id' for example) by the value of the record id you
    //want to update
    public function Update($fields,$ImageFile=null)
    {   //If you supply imagefield and supply ImageFile and the ImageFile has name
        //Then Delete the old image from the images.
        if($this->imagefield!='' && $ImageFile!=null && $ImageFile['name']!='')
        {
        $id=$fields[$this->primarykeyfield];
        $this->DeleteImage($id);//delete the images of that id the id of the updated record
        $imagename=$this->UploadImage($ImageFile);//upload new Image
        $fields[$this->imagefield]=$imagename;   //add the uploaded Image name to the image column of the table
        }
        //Build Update Query according to the Fields array that is supplied
        $query="update ".$this->table." set ";
        foreach($fields as $key => $value) $query.=$key."=:".$key.",";
        $query=trim($query,",");
        $query.=" where ".$this->primarykeyfield."=:".$this->primarykeyfield;
        $result=$this->ExecuteQuery($query,$fields); //Execute the query 

    }

    //Function that deletes the specified id record
    public function Delete($id)
    {
        //delete the image of that record id
        $this->DeleteImage($id);
        //Build delete query
        $query="delete from ".$this->table." where ".$this->primarykeyfield."=:".$this->primarykeyfield;
        $fields[$this->primarykeyfield]=$id;
        $result=$this->ExecuteQuery($query,$fields);//Execute Query
    }
    //function that returns all records in the table
    public function GetAll()
    {
        $query="select * from ".$this->table;
        $result=$this->ExecuteQuery($query);
        $records=$result->fetchAll();
        return $records;
    }
    //function that returns certain record by its id
    public function FindById($id)
    {
        $query="select * from ".$this->table." where ".$this->primarykeyfield."=:".$this->primarykeyfield;
        $fields[$this->primarykeyfield ]=$id;
        $result=$this->ExecuteQuery($query,$fields);
        $record=$result->fetch();
        return $record;
    }
    //function that uploads Image to the directory Admin/images /{{tablename}}

    private function UploadImage($ImageFile)
    {
        if(!isset($ImageFile)) return;
        $folder="images/".$this->table."/";
        echo $folder;
        $filename=time().$ImageFile['name'];
        echo $filename;
        move_uploaded_file($ImageFile['tmp_name'],$folder.$filename);
        return $filename;//function returns the name that will be stored inside database table
    }

    //Function that Deletes image from the specified folder
    private function DeleteImage($id)
    {
        if ($this->imagefield=="") return;
        $folder="images/".$this->table."/";
        $record=$this->FindById($id);
        $filename=$folder.$record['image'];
        if(is_file($filename) ) unlink($filename);
    }
}