<?php
include "Lab12Funcs/Connection.php";
include "Lab12Funcs/Functions.php";
$NameError = $Name = $RaceError = $Race = $Image = "";
$ClassError = $Class = $Description = "";
$Func = new Func();
if(isset($_POST['DeleteButton']) && is_numeric($_POST['DeleteButton']))
{

    $deleteID= $_POST['DeleteButton'];
    $Func -> DeleteRecord($connection, $deleteID);

}
if(isset($_POST['submit']) && $_POST['submit'] == "AddRecord" )
{
    $ID = $_POST["ID"];
    $Name = $_POST["Name"];
    $Race = $_POST["Race"];
    $Class = $_POST["DNDClass"];
    $Description = $_POST["Description"];
    $Image = $_POST["Image"];
    $Func -> AddRecord($connection,$ID,$Name,$Race,$Class,$Description,$Image);
}

if(isset($_POST['Search']) && $_POST['Search'] == "Searching" )
{
    $query = $_POST['Query'];
    $category = $_POST['Category'];
    $Func ->SearchRecords($connection, $query, $category);
}




?>
<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <title>lab11</title>
    <link rel="stylesheet" href="nicepage.css" media="screen" />
    <link rel="stylesheet" href="lab11.css" media="screen" />
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
$(document).ready(function(){
    $("#AddButton").click(function () {
               if ($("#sec-e9f4").is(":hidden")) {
                $("#sec-e9f4").show();
                $("#searchsection").hide();
                 $("#Display").hide();
                $("#EditSection").hide();
        }
                else {
                $("#Display").show();
                $("#sec-e9f4").hide();
            }
    });

    $("#SearchButton").click(function () {
            if ($("#searchsection").is(":hidden")) {
                $("#searchsection").show();
                $("#sec-e9f4").hide();
                $("#Display").hide();
                $("#EditSection").hide();
            }
            else {
                $("#Display").show();
                $("#searchsection").hide();
            }
    });

            $("#EditButton").click(function () {
            if ($("#EditSection").is(":hidden")) {
                $("#EditSection").show();
                $("#sec-e9f4").hide();
                $("#searchsection").hide();
                $("#Display").hide();
            }
            });

});

    </script>





    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" />
</head>
<body class="u-body u-image u-xl-mode" style="background-position: 50% 50%;   background-color: black; background-image: url(&quot;images/1603987094_43-p-fon-taverna-71.jpg&quot;);">
   <?php include "Lab12Funcs/Menu.php"?>



    <section class="u-align-center u-clearfix u-section-1 AddForm" id="sec-e9f4" >
        <div class="u-clearfix u-sheet u-sheet-1">
            <h2 class="u-text u-text-body-alt-color u-text-default u-text-1">New Hero</h2>
            <div class="u-form u-form-1">
                <form action="Lab11.php" method="POST" class="u-clearfix u-form-spacing-10 u-inner-form " style="padding: 10px" name="Form" enctype="multipart/form-data">
                    <div class="u-form-group u-form-name u-label-none">
                        <label for="name-   3b9a" class="u-label">Name</label>
                        <input type="text" placeholder="Enter Name" id="name-3b9a" name="Name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" />
                    </div>
                    <div class="u-form-group u-form-message u-label-none u-form-group-2">
                        <label for="text-1f6e" class="u-label">Class</label>
                        <input type="text" placeholder="Enter Class" id="name-3b9a" name="DNDClass" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" />
                    </div>
                    <div class="u-form-group u-form-message u-label-none">
                        <label for="text-1f6e" class="u-label">Race</label>
                        <input type="text" placeholder="Enter Race" name="Race" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" />
                    </div>
                    <div class="u-form-group u-form-message u-label-none">
                        <label for="textarea" class="u-label">Description</label>
                        <textarea placeholder="Enter Description" rows="4" cols="50" id="textarea" name="Description" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white"></textarea>
                    </div>
                    <div class="u-form-group u-form-message u-label-none">
                        <input type="file" name="image" id="image" style="color:white" />
                    </div>
                    <div class="u-align-left">
                        <input type="submit" name="submit" value="AddRecord" />
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    
    
    <section class="u-align-center u-clearfix u-section-2 SearchForm" id="searchsection">
        <div>
            <form action="Lab11.php" method="POST" class="u-clearfix u-form-spacing-10 u-inner-form " style="padding: 10px" name="Form" enctype="multipart/form-data">
                <div class="u-form-group u-form-name u-label-none">
                    <label for="name-search" class="u-label">Search by</label>
                    <div>
                            <input type="radio" name="Category" id="Race" value="RaceRadio" checked="checked" /><p class="whitetext">Race</p>   
                                <input type="radio" name="Category" id="Class" value="ClassRadio" /><p class="whitetext">Class</p>
                                <br />
</div>
                    <div class="u-form-group u-form-message u-label-none">

                        <input type="text" placeholder="Search..." id="name-search" name="Query" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" />
                    </div>

                </div>

                <div class="u-align-left">
                    <input type="submit" name="Search" value="Searching" />
                </div>

            </form>
        </div>
            
            
            
            </section>







    <section class="u-clearfix u-section-1 EditForm" id="EditSection" name="EditSection">
        <?php
        $ID = $_POST["EditButton"];
        $Func ->SearchById($connection, $ID, $Name, $Race, $Class, $Description, $Image);

        ?>
        <form action="Lab11.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ID" value="<?=$ID?>" /><input type="hidden" name="Image" value="<?=$Image?>" />
            <div class="u-clearfix u-gutter-10 u-layout-wrap u-layout-wrap-1">
                <div class="u-gutter-0 u-layout">
                    <div class="u-layout-row">
                        <div class="u-size-30">
                            <div class="u-layout-col">
                                <div class="u-align-left u-container-style u-image u-layout-cell u-size-60 u-image-1">
                                    <div class="u-container-layout u-valign-middle u-container-layout-1">
                                        <input type='radio' name='Image' id="<?=$Image?>" value="<?=$Image?>" checked="checked" style="display:none" />
                                        <label for="<?=$Image?>">
                                            <img src="<?=$Image?>" />
                                        </label>"
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="u-size-30">
                            <div class="u-layout-col">
                                <div class="u-align-left u-container-style u-layout-cell u-size-15 u-layout-cell-2">
                                    <div class="u-container-layout u-container-layout-2">
                                        <h3 class="u-align-center u-text u-text-body-alt-color u-text-default u-text-1">Name</h3>
                                        <input type="text" name="Name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" value="<?=$Name?>" />
                                    </div>
                                </div>
                                <div class="u-align-left u-container-style u-layout-cell u-size-15 u-layout-cell-3">
                                    <div class="u-container-layout u-container-layout-3">
                                        <h6 class="u-align-center u-text u-text-body-alt-color u-text-default u-text-2">Race</h6>
                                        <input type="text" name="Race" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" value="<?=$Race?>" />
                                    </div>
                                </div>
                                <div class="u-container-style u-layout-cell u-size-15 u-layout-cell-4">
                                    <div class="u-container-layout u-container-layout-4">
                                        <h6 class="u-align-center u-text u-text-body-alt-color u-text-default u-text-3">Class</h6>
                                        <input type="text" name="DNDClass" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" value="<?=$Class?>" />
                                    </div>
                                </div>
                                <div class="u-container-style u-layout-cell u-size-15 u-layout-cell-5">
                                    <div class="u-container-layout u-container-layout-5">
                                        <p class="u-align-center u-text u-text-body-alt-color u-text-default u-text-4">Desc</p>
                                        <textarea rows="10" cols="50" id="textarea" name="Description" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                                            <?=$Description?>
                                        </textarea>

                                    </div>
                                </div>
                                <div class="u-container-style u-layout-cell u-size-15 u-layout-cell-5">
                                    <input type="file" name="image" id="image" style="color:white" />
                                </div>
                                <div class="u-container-style u-layout-cell  u-layout-cell-5">
                                    <div class="u-container-layout">
                                        <input type="submit" name="EditSubmit" class="u-align-center u-text  u-text-4" value="EditSubmit" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="GalleryChoose">
                <?php
                $imagesDirectory = "images/";
                $opendirectory = opendir($imagesDirectory);

                while (($image = readdir($opendirectory)) !== false)
                {
                    if(($image == '.') || ($image == '..'))
                    {
                        continue;
                    }

                    $imgFileType = pathinfo($image,PATHINFO_EXTENSION);

                    if(($imgFileType == 'jpg') || ($imgFileType == 'png'))
                    {
                        echo " <input type='radio' name='Image' id='images/".$image."' value='images/".$image."'>
                       <label  for='images/".$image."'><img src='images/".$image."' width='200'></label>";
                    }
                }

                closedir($opendirectory);

                ?>
            </div>

        </form>
    </section>



    <section id="Display" style="pointer-events : none;">
        <?php

            if(isset($_SESSION['SearchResults']))
            {
                $sql = $_SESSION['SearchResults'];

            }
            else
            {
                $sql = "SELECT * FROM `character` ";

            }
            $result = mysqli_query($connection, $sql);
            if($result->num_rows > 0)
    {
            while($row = mysqli_fetch_assoc($result)) {
                echo " <section class='u-clearfix u-section-1' id='sec-ff01'>

             <div class='u-clearfix u-sheet u-sheet-1 '>

             <section class='u-clearfix u-section-1 ' id='sec-84ec'>
             <div class='u-clearfix u-gutter-10 u-layout-wrap u-layout-wrap-1'>
             <div class='u-gutter-0 u-layout'>


            <div class='u-layout-row'>
             <div class='u-size-30'>
              <div class='u-layout-col'>
                      <div>
                           <div class='u-container-layout u-valign-middle u-container-layout-1'>
                             <img class='u-align-left u-container-style u-image u-layout-cell u-size-60 u-image-1' data-image-width='1080' data-image-height='1080'  src='".$row['Image']."'>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class='u-size-30'>
              <div class='u-layout-col'>
                <div class='u-align-left u-container-style u-layout-cell'>
                  <div class='u-container-layout u-container-layout-2'>
                    <form action = '' method = 'post'>
                     <button type='Submit'   name='EditButton' id='EditButton'  class='u-image u-image-default u-preserve-proportions u-image-2' style ='background:0'  Value = '".$row['ID']."'> <img src='images/Edit.png' width='40px' height ='40px'></button></form>
                  </div>
                    <div class='u-container-layout u-container-layout-2'>
                    <form  action = 'Lab11.php' method = 'post' style = 'width: 50px'>
                     <button type='Submit'   name='DeleteButton' id='DeleteButton'  class='u-image u-image-default u-preserve-proportions u-image-3' style ='background:0'  Value = '".$row['ID']."'> <img src='images/Trash.png' width='40px' height ='40px'></button></form>
                   </div>

                </div>
                <div class='u-container-layout u-container-layout-2'>
                <h3 class='u-align-center u-text u-text-body-alt-color u-text-default u-text-1'>" .$row['Name']. "</h3>
                 </div>
                <div class='u-align-left u-container-style u-layout-cell u-size-15 u-layout-cell-3'>
                  <div class='u-container-layout u-container-layout-3'>
                    <h6 class='u-align-center u-text u-text-body-alt-color u-text-default u-text-2'>" .$row['Class']. "</h6>
                  </div>
                </div>
                <div class='u-container-style u-layout-cell u-size-15 u-layout-cell-4'>
                  <div class='u-container-layout u-container-layout-4'>
                    <h6 class='u-align-center u-text u-text-body-alt-color u-text-default u-text-3'>" .$row['Race']. "</h6>
                  </div>
                </div>
                <div class='u-container-style u-layout-cell u-size-15 u-layout-cell-5'>
                  <div class='u-container-layout u-container-layout-5'>
                    <p class='u-align-center u-text u-text-body-alt-color u-text-default u-text-4'>" .$row['Description']. "</p>
                  </div>
                </div>
              </div>
             </div>
             </div>
             </div>
             </div>
             </section>
             </div>
            </section>

             <hr>";

        }
    }

        ?>
    </section>


</body>
</html>