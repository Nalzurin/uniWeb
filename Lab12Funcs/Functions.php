
<?php
class Func
{
    public $connection, $ID, $Name, $Race, $Class, $Description, $Image, $Query, $Category;

    function __construct($_connection, $_ID, $_Name, $_Race, $_Class, $_Description, $_Image,$_Query,$_Category)
    {
        $this->connection = $_connection;
        $this->ID = $_ID;
        $this->Name = $_Name;
        $this->Race = $_Race;
        $this->Class = $_Class;
        $this->Description = $_Description;
        $this->Image = $_Image;
        $this->Query = $_Query;
        $this->Category = $_Category;

    }
    function DeleteRecord()
    {
        $sql = "DELETE FROM `character` WHERE `ID` ='".$this->ID."'";
        mysqli_query($this->connection, $sql);
    }
    function AddRecord()
    {
        if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $tmp = explode('.',$_FILES['image']['name']);
            $file_ext=strtolower(end($tmp));

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }


            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"images/".$file_name);
                $this->Image = 'images/'.$file_name.'';
                echo "Success";
            }else{
                print_r($errors);
            }
        }

        if(!empty($this->ID))
        {
            $sql = "UPDATE `character` SET `Name` = '".$this->Name."', `Race` = '".$this->Race."', `Class` = '".$this->Class."', `Description` = '".$this->Description."', `Image` = '".$this->Image."'  WHERE `character`.`ID` = '".$this->ID."'";
            $result = mysqli_query($this->connection, $sql);
            header("location:Lab11.php");
        }
        else {


            $sql = "INSERT INTO `character` (`Name`, `Image`, `Class`, `Race`, `Description`) VALUES ('".$this->Name."','".$this->Image."', '". $this->Class."', '".$this->Race."', '".$this->Description."');";
            $result = mysqli_query($this->connection, $sql);
            header("location:Lab11.php");

        }
    }

    function SearchRecords()
    {
        $this->query = htmlspecialchars($this->query);

        if($this->category == 'RaceRadio')
        {
            $sql = "SELECT * FROM `character` WHERE (`Race` LIKE '%".$this->query."%')";
            echo 'Race is Chosen';

        }
        else if($this->category == 'ClassRadio')
        {
            $sql = "SELECT * FROM `character` WHERE (`Class` LIKE '%".$this->query."%')";
            echo 'Class is Chosen';
        }
        else
        {
            echo 'Error';
        }

        $_SESSION['SearchResults'] = $sql;
        header("location:Lab11.php");

    }
    function SearchById()
    {
        $sql = "SELECT * FROM `character` WHERE `ID` ='".$this->ID."'";
        $result = mysqli_query($this->connection, $sql);
        return $result;


    }
}

?>