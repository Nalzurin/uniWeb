
<?php
class Func
{
    function DeleteRecord($connection,$deleteID)
    {
        $sql = "DELETE FROM `character` WHERE `ID` ='".$deleteID."'";
        mysqli_query($connection, $sql);
    }
    function AddRecord($connection, $ID, $Name, $Race, $Class, $Description, $Image)
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
                $Image = 'images/'.$file_name.'';
                echo "Success";
            }else{
                print_r($errors);
            }
        }

        if(!empty($ID))
        {
            $query = "UPDATE `character` SET `Name` = '".$Name."', `Race` = '".$Race."', `Class` = '".$Class."', `Description` = '".$Description."', `Image` = '".$Image."'  WHERE `character`.`ID` = '".$ID."'";
            $result = mysqli_query($connection, $query);
            header("location:Lab11.php");
        }
        else {


            $query = "INSERT INTO `character` (`Name`, `Image`, `Class`, `Race`, `Description`) VALUES ('".$Name."','".$Image."', '". $Class."', '".$Race."', '".$Description."');";
            $result = mysqli_query($connection, $query);
            header("location:Lab11.php");

        }
    }

    function SearchRecords($connection, $query, $category)
    {
        $query = htmlspecialchars($query);

        if($category == 'RaceRadio')
        {
            $sql = "SELECT * FROM `character` WHERE (`Race` LIKE '%".$query."%')";
            echo 'Race is Chosen';

        }
        else if($category == 'ClassRadio')
        {
            $sql = "SELECT * FROM `character` WHERE (`Class` LIKE '%".$query."%')";
            echo 'Class is Chosen';
        }
        else
        {
            echo 'Error';
        }

        $_SESSION['SearchResults'] = $sql;
        header("location:Lab11.php");

    }
    function SearchById($connection, $ID, $Name, $Race, $Class, $Description, $Image)
    {
        $sql = "SELECT * FROM `character` WHERE `ID` ='".$ID."'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $Name = $row["Name"];
        $Race = $row["Race"];
        $Class = $row["Class"];
        $Description = $row["Description"];
        $Image = $row["Image"];

    }
}

?>