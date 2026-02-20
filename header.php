 <?php
    require('connector.php');
    ?>




 <div id="header" class="header-wrapper">
     <div class="logo">
         <a href="index.html" title="ALBERTOS - Pizza HTML Theme"><img class="logoImage" src="img-pizza/pizza.png" alt="l'antico forno - Pizza HTML Theme" /><img class="logoImageRetina" src="images/logo-retina.png" alt="ALBERTOS - Pizza HTML Theme" /></a>
         <div class="clear"></div>
     </div>
     <div class="menu-wrapper">
         <div class="main-menu">
             <div class="menu-main-nav-menu-container">
                 <ul id="menu-main-nav-menu" class="sf-menu">
                     <?php
                        $querymenu = "SELECT * FROM menu;";
                        $resultmenu = mysqli_query($conn, $querymenu);
                        while ($vocemenu = mysqli_fetch_assoc($resultmenu)) {
                            echo "<li class=\"menu-item menu item\"><a href=\"" . $vocemenu['link'] . "\">" . $vocemenu["nome"] . "</a></li>";
                        }
                        ?>
                 </ul>
             </div>
         </div>
         <div class="menu-icons-inside">
             <div class="menu-icon menu-icon-mobile"><span class="menu-icon-create"></span></div>
         </div>
     </div>
     <div class="clear"></div>
     <div class="footer">
         <div class="footer-socials">
             <ul class="socials-sh">
                 <li>
                     <a class="fa sh-socials-url fa-twitter" href="#" title="Twitter" target="_blank"></a>
                 </li>
                 <li>
                     <a class="fa sh-socials-url fa-facebook" href="#" title="Facebook" target="_blank"></a>
                 </li>
                 <li>
                     <a class="fa sh-socials-url fa-linkedin" href="#" title="LinkedIn" target="_blank"></a>
                 </li>
                 <li>
                     <a class="fa sh-socials-url fa-google-plus" href="#" title="Google Plus" target="_blank"></a>
                 </li>
             </ul>
         </div>
         <div class="footer-content">
             ©AmandaCarpenedo 2026. Made by <a href="http://themeforest.net/user/max-themes/portfolio" title="Pego HTML Themes">Max-Themes</a>.</div>
     </div>
 </div>