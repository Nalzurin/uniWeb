
<?php
require "Lab12Funcs/Connection.php";
require "Lab12Funcs/Functions.php";
$ID = $_POST['EditButton'];
$Name = $Class = $Race = $Description = $Image = '';
$Func = new Func($connection, $ID, null, null, null, null, null, null, null);
$result =$Func -> SearchById();
        $row = mysqli_fetch_assoc($result);
        $Name = $row["Name"];
        $Race = $row["Race"];
        $Class = $row["Class"];
        $Description = $row["Description"];
        $Image = $row["Image"];
        $ID = $row["ID"];

?>

<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <title>lab11</title>
    <link rel="stylesheet" href="nicepage.css" media="screen" />
    <link rel="stylesheet" href="lab11Edit.css" media="screen" />
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" />
</head>
<body class="u-body u-image u-xl-mode" style="background-position: 50% 50%;   background-color: black; background-image: url(&quot;images/1603987094_43-p-fon-taverna-71.jpg&quot;);">
    <?php include "Lab12Funcs/Menu.php"?>

    <section class="u-clearfix u-section-1" id="sec-84ec">
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
                                            <img src="<?=$Image?>"/>
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
                                        <input type="text" name="Name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" value="<?=$Name?>" pattern="[À-ß¥ª²¯à-ÿ´º³¿A-Za-z\s]+" />
                                    </div>
                                </div>
                                <div class="u-align-left u-container-style u-layout-cell u-size-15 u-layout-cell-3">
                                    <div class="u-container-layout u-container-layout-3">
                                        <h6 class="u-align-center u-text u-text-body-alt-color u-text-default u-text-2">Race</h6>
                                        <input type="text" name="Race" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" value="<?=$Race?>" pattern="[À-ß¥ª²¯à-ÿ´º³¿A-Za-z\s]+" />
                                    </div>
                                </div>
                                <div class="
                                            u-container-style u-layout-cell u-size-15 u-layout-cell-4" />
                                    <div class="u-container-layout u-container-layout-4">
                                        <h6 class="u-align-center u-text u-text-body-alt-color u-text-default u-text-3">Class</h6>
                                        <input type="text" name="Class" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" value="<?=$Class?>" pattern="[À-ß¥ª²¯à-ÿ´º³¿A-Za-z\s]+" />
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
                                        <input type="submit" name="Submit" class="u-align-center u-text  u-text-4" value="SaveEdit" />
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
   </body>
</html>