

<?php
//this class controller perform yhe main actions on the table
//it shows the table page of the database table records
//it shows the edit/addnew page of the database table
//it also performs Update,Insert and delete records from the specified table
class Controller
{
  //this variable carries the table name of the controller
    private $tableclass;
    //supply the table name to the constructor
    public function __construct($tableclass)
    {
        $this->tableclass=$tableclass;
        
    }
    //this function displays the table of the data base table
    public function ShowAll()
    {
        //get all the records from table database
        $records=$this->tableclass->GetAll();
       //the path of the page that displays the content of the table
       //is under Admin/views folder + table name +"_showall.html.php"
       //this page contains the variable called $records that contains
       //the all database of the records
        $showallpath="views/".$this->tableclass->table."_showall.html.php";
        include ($showallpath);
    }
     //this function displays Addnew or Edit form
    public function ShowAddNewEditForm()
    {
        $id=$_GET['id'] ?? '';
        //if you dont supply the id variable when calling action
        //the AddNew form will be displayed
        //else the Edit form will be displayed 
        //the $record variable will return the value of fields of the specified is
        $record=$this->tableclass->FindById($id);
        //the path of the page to be displayed is
        // Admin/views + table name +"_addnew_edit.html.php
        $ShowAddnewpath="views/".$this->tableclass->table."_addnew_edit.html.php";

        include ($ShowAddnewpath);
    }
    ///this function Make Update or Insert the record into the table database
    public function UpdateAddNew()
    {
        $fields=$_POST;
        //if $fields variable of the primarykey =="" them make Insert create new record
        //else make update of certain Id record
        if($_POST[$this->tableclass->primarykeyfield]=='')
        $this->tableclass->Insert($fields,$_FILES['image'] );
        else $this->tableclass->Update($fields,$_FILES['image']);
        //Return to the Show all table page
        header("location: Adminroutes.php?action=".$this->tableclass->table."_showall");


    }
    //this function deletes the specified id from data base
    public function Delete()
    {
        $id=$_POST['id'];
        $this->tableclass->Delete($id);
        //Return to the show all table page
        header("location: Adminroutes.php?action=".$this->tableclass->table."_showall");
    }
}