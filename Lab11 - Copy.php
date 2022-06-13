<?php
require "Lab12Funcs/Connection.php";
include "Lab12Funcs/Functions.php";
$NameError = $Name = $RaceError = $Race = $Image = $Query = "";
$ClassError = $Class = $Description = $Category = $ID = "";

if(isset($_POST['DeleteButton']) && is_numeric($_POST['DeleteButton']))
{

    $ID= $_POST['DeleteButton'];
    $Func = new Func($connection, $ID, null, null, null, null, null, null, null);
    $Func -> DeleteRecord();

}
if(isset($_POST['submit']) && $_POST['submit'] == "AddRecord"|| isset($_POST['Submit']) && $_POST['Submit'] == "SaveEdit")
{
    $ID = $_POST["ID"];
    $Name = $_POST["Name"];
    $Race = $_POST["Race"];
    $Class = $_POST["Class"];
    $Description = $_POST["Description"];
    $Image = $_POST["Image"];
    $Func = new Func($connection, $ID, $Name, $Race, $Class, $Description, $Image, null, null);
    $Func -> AddRecord();
}

if(isset($_POST['Search']) && $_POST['Search'] == "Searching" )
{
    $query = $_POST['Query'];
    $category = $_POST['Category'];
    $Func = new Func($connection, null, null, null, null, null, null, $Query, $Category);
    $Func ->SearchRecords();
}


?>
<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <title>lab11</title>

    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
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


});

    </script>





    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" />
</head>
<body class="u-body u-image u-xl-mode" style="background-position: 50% 50%;   background-color: black; background-image: url(&quot;images/1603987094_43-p-fon-taverna-71.jpg&quot;);">
    <?php include "Lab12Funcs/Menu.php"?>

    <section class="u-align-center u-clearfix u-section-1 AddForm" id="sec-e9f4">
        <div class="u-clearfix u-sheet u-sheet-1">
            <h2 class="u-text u-text-body-alt-color u-text-default u-text-1">New Hero</h2>
            <div class="u-form u-form-1">
                <form action="Lab11.php" method="POST" class="u-clearfix u-form-spacing-10 u-inner-form " id="AddNew" style="padding: 10px" name="Form" enctype="multipart/form-data">
                    <div>
                        <label for="name-   3b9a" class="u-label " style="color:white">Name</label>
                        <input type="text" placeholder="Enter Name" id="name-3b9a" name="Name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required pattern="[а-яА-Яa-zA-Z\u0400-\u04ff\s]{3,30}" />
                        <small></small>
                    </div>
                    <div>
                        <label for="text-1f6e" class="u-label" style="color:white">Class</label>
                        <input type="text" placeholder="Enter Class" id="Class" name="Class" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required pattern="[а-яА-Яa-zA-Z\u0400-\u04ff\s]{3,30}" />
                        <small></small>
                    </div>
                    <div>
                        <label for="text-1f6e" class="u-label" style="color:white">Race</label>
                        <input type="text" placeholder="Enter Race" name="Race" id="Race" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required pattern="[а-яА-Яa-zA-Z\u0400-\u04ff\s]{3,30}{3,30}" />
                        <small></small>
                    </div>
                    <div>
                        <label for="textarea" class="u-label" style="color:white">Description</label>
                        <textarea placeholder="Enter Description" rows="4" cols="50" id="textarea" name="Description" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white"></textarea>
                        <small></small>
                    </div>
                    <div class="u-form-group u-form-message u-label-none">
                        <input type="file" name="image" id="image" style="color:white" />
                    </div>
                    <div class=" ">
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

                        <input type="text" placeholder="Search..." id="name-search" name="Query" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white " required pattern="[а-яА-Я\u0400-\u04ff\s]{3,30}" />
                    </div>

                </div>

                <div class="u-align-left">
                    <input type="submit" name="Search" value="Searching" />
                </div>

            </form>
        </div>



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
            echo "<div id='Accordion'>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "
                 <h3 style='color:white'>".$row['Name']."</h3>
                <div id='".$row['Name']."'>
             123
            </div> ";

            }
            echo "</div>";
        }

        ?>

</section>
    <script>
        $(document).ready(function () {

            $("#accordion").accordion({

                collapsible: true

            });

        });

    </script>
</body>
</html>