<?php
          error_reporting(E_ERROR | E_PARSE);
          $method = $_SERVER["REQUEST_METHOD"];
          if(isset($_REQUEST["Hero"])&& isset($_REQUEST["Text"]))
          {
              $hero=$_REQUEST["Hero"];
              $text=$_REQUEST["Text"];

          }
          $Img = 'images\token_11.png';
          $ImgTalos = 'images\cfa0f158-bf89-1508-977b-23bc7af2a4b9.jpg';
          $ImgTeren = 'images\fentezi-elfy-les-art-trung-tin-shinji-el-1247294.png';
          $ImgArracks = 'images\Arracks.png';
          $ImgNewman = 'images\NewMan2.png';
          if($hero == "Talos")
          {
              $Img = $ImgTalos;
          }
          else if($hero == "Teren")
          {
              $Img = $ImgTeren;
          }
          else if($hero == "Arracks")
          {
              $Img = $ImgArracks;
          }
          else if($hero == "Newman")
          {
              $Img = $ImgNewman;
          }

?>
<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <title>lab10</title>
    <link rel="stylesheet" href="nicepage.css" media="screen" />
    <link rel="stylesheet" href="lab10.css" media="screen" />
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" />
</head>
<body class="u-body u-image u-xl-mode" style="background-position: 50% 50%; background-image: url(&quot;images/1603987094_43-p-fon-taverna-71.jpg&quot;);">
    <header class="u-clearfix u-gradient u-header u-sticky u-sticky-bc77 u-header" id="sec-8a2c">
        <div class="u-clearfix u-sheet u-sheet-1">
            <a href="Home.html" data-page-id="71010038" class="u-align-left-sm u-align-left-xs u-image u-logo u-image-1" data-image-width="256" data-image-height="256" title="Home">
                <img src="images/token_11.png" class="u-logo-image u-logo-image-1" />
            </a>
            <nav class="u-align-right-sm u-align-right-xs u-menu u-menu-one-level u-offcanvas u-menu-1" data-position="hmenu">
                <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                    <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#" style="padding: 12px 24px; font-size: calc(1em + 24px);">
                        <svg class="u-svg-link" viewbox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewbox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container">
                    <ul class="u-nav u-unstyled u-nav-1">
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-grey-50" href="Home.html" style="padding: 10px 20px;">Home</a>
                        </li><li class="u-nav-item">
                            <a class="u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-grey-50" href="heroes.html" style="padding: 10px 20px;">Герої</a><div class="u-nav-popup">
                                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                                    <li class="u-nav-item">
                                        <a class="u-button-style u-nav-link u-white" href="Талос.html">Талос</a>
                                    </li><li class="u-nav-item">
                                        <a class="u-button-style u-nav-link u-white" href="Терен.html">Терен</a>
                                    </li><li class="u-nav-item">
                                        <a class="u-button-style u-nav-link u-white" href="Арракс.html">Арракс</a>
                                    </li><li class="u-nav-item">
                                        <a class="u-button-style u-nav-link u-white" href="Ньюман.html">Ньюман</a>
                                    </li>
                                </ul>
                            </div>
                        </li><li class="u-nav-item">
                            <a class="u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-grey-50" href="Люди.html" style="padding: 10px 20px;">Люди</a>
                        </li><li class="u-nav-item">
                            <a class="u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-grey-50" href="World.html" style="padding: 10px 20px;">Світ</a>
                        </li><li class="u-nav-item">
                            <a class="u-button-style u-nav-link u-text-active-white u-text-body-alt-color u-text-hover-grey-50" href="lab10.php" style="padding: 10px 20px;">lab10</a>
                        </li>
                    </ul>
                </div>
                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="Home.html">Home</a>
                                </li><li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="heroes.html">Герої</a><div class="u-nav-popup">
                                        <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                                            <li class="u-nav-item">
                                                <a class="u-button-style u-nav-link" href="Талос.html">Талос</a>
                                            </li><li class="u-nav-item">
                                                <a class="u-button-style u-nav-link" href="Терен.html">Терен</a>
                                            </li><li class="u-nav-item">
                                                <a class="u-button-style u-nav-link" href="Арракс.html">Арракс</a>
                                            </li><li class="u-nav-item">
                                                <a class="u-button-style u-nav-link" href="Ньюман.html">Ньюман</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li><li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="Люди.html">Люди</a>
                                </li><li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="World.html">Світ</a>
                                </li><li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="lab10.php">lab10</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>
            </nav>
        </div>
    </header>
    <section class="u-clearfix u-section-1" id="sec-ff01">
        <div class="u-clearfix u-sheet u-sheet-1">
            <form action=" lab10.php" method="post">

                <label class="whitetext">
                    <input type="radio" name="Hero" id="TalosChar" value="Talos" checked="checked" /> Талос
                </label>
                <label class="whitetext">
                    <input type="radio" name="Hero" id="TerenChar" value="Teren" /> Терен
                </label>
                <label class="whitetext">
                    <input type="radio" name="Hero" id="ArracksChar" value="Arracks" /> Арракс
                </label>
                <label class="whitetext">
                    <input type="radio" name="Hero" id="NewmanChar" value="Newman" /> Ньюман
                </label><br />
                <input type="text" name="Text" id="Text"/><br />
                <input type="submit" name="Button" id="button" value="Send" /><br />
            </form>
            <img height= 500 width=300 src = <?=$Img?> /> 
            <p class=" u-align-center u-text u-text-body-alt-color u-text-default u-text-2 whitetext"> description</p><br />
            <p class='
                u-align-center u-text u-text-body-alt-color u-text-default u-text-2 whitetext'>
                <?php
                if(!empty($text))
                {
                    echo $text;
                }
                else
                {
                    echo "Enter text";
                }
                ?>
            </p>



        </div>
    </section>
</body>
</html>