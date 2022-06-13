<?php
require "Lab12Funcs/Connection.php";
$error="";
if(isset($_SESSION["Session"]))
{
    header("Location:Lab11.php");
}
else
{}
if(isset($_POST["Login"]))
{
    $username=htmlspecialchars($_POST['username']);
    $password=htmlspecialchars($_POST['password']);
    if(!empty($username) && !empty($password))
    {
        $query ="SELECT * from `logininfo` WHERE Username='$username' AND Password ='$password'";
        $result = mysqli_query($connection, $query);
        if($result->num_rows > 0)
        {
            while($row = mysqli_fetch_assoc($result)) {

                    $dbusername = $row["Username"];
                    $dbpassword = $row["Password"];

                if($username == $dbusername && $password == $dbpassword)
                {
                    $_SESSION['Session']=$username;
                    header("Location:Lab11.php");
                    exit();
                }
                else {$error =  "Wrong username or password!";}
            }
        }
        else {$error = "This account does not exist!";}

    }
}


?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login and Registration Form Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="NicePage.css" />

</head>
<body class="u-body u-image u-xl-mode" style="background-position: 50% 50%;   background-color: black; background-image: url(images/1603987094_43-p-fon-taverna-71.jpg)">

       <section class="u-clearfix u-section-1" id="sec-b378">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-expanded-width u-form u-form-1">
            <form action="LoginPage.php" onsubmit="return validateForm()" method="POST" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;">


                <div class="u-form-group u-form-name">
                    <label for="name-0709" class="u-label u-text-body-alt-color">Username</label>
                    <input type="text" id="name-0709" placeholder="Enter a valid Username" name="username" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-text-body-alt-color" />
                    <p style="color:white;" id="errorUsername"></p>
                </div>
                <div class="u-form-email u-form-group">
                    <label for="email-0709" class="u-label u-text-body-alt-color">Password</label>
                    <input type="password" placeholder="Enter a valid password" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-text-body-alt-color" />
                    <p style="color:white" id="errorPassword"></p>
                </div>
                <div class="u-align-left u-form-group u-form-submit">

                    <input type="submit" name ="Login"value="Login" />
                </div>


            </form>
            <div class="u-align-left u-form-group ">
                <p style=" color:white"> Don't have an account yet?'</p>
               <form action="RegisterPage.php">
                   <input type="submit" value="Create one" />
               </form>
            </div>



        
         

        


        </div>
      </div>
    </section>

    <script type="text/javascript">
        function validateForm() {
            document.getElementById("errorUsername").textContent = "";
            document.getElementById("errorPassword").textContent = "";

            let CheckUser = document.forms["form"]["username"].value;
            let CheckPass = document.forms["form"]["password"].value;
            if (CheckUser == "") {
                document.getElementById("errorUsername").textContent = "Username must not be empty!";

                return false;
            }
            if (CheckPass == "") {
                document.getElementById("errorPassword").textContent = "Password must not be empty!";
                return false;

            }

        }
    </script>
</body>
</html>

