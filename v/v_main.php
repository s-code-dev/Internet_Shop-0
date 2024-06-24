<!DOCTYPE html>
<html >
<head>
<title><?=$title?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="page">
        <header class="header_one">
            <a class="logo-a" href="#"><img class="logo_h" src="img/img_site/logo.png"></a>
            <h3 class="name-shop"><?=$title?></h3>
            <menu class="user_reg_in_ac">
            <?php
            
            
            if ($_SESSION['user_id']) {
                echo '<li class="men_two"><a  href="index.php?c=user&act=info">PERSONAL ACCOUNT</a></li>  
                <li class="men_two" ><a href="index.php?c=user&act=logout">GO OUT('. $user .')</a></li> 
                <li class="men_two " id="menu_basket"><a href="index.php?c=page&act=basket">BASKET</a></li>';
                if($_SESSION['admin_id']){
                    echo '  <li  id="manegement"><a href="index.php?c=page&act=admin">MANAGEMENT OF ORDERS</a></li>';
                   }
			} else {
                echo '<li class="men_two" ><a  href="index.php?c=user&act=login">ENTER</a></li><li class="men_two" сlass="color_menu_2"><a  href="index.php?c=user&act=reg">REGISTRATION</a></li>';   
			}
            ?>
            </menu>
            </header> 
            <img class="img_fon_little" src="img/img_site/adw.png" alt="Фото">
            <menu class="menu-top">
            <ul class="menu-ul">
                <li class="men"><a href="index.php">SHOP</a></li>
                <li class="men"><a href="index.php?c=page&act=content">СONTENT</a></li>
                <?php if($_SESSION['admin_id']):?>

                <li class="men"><a href="index.php?c=page&act=edit">EDIT</a></li>  
                <?php endif; ?>     
            </ul>
            </menu>
        
    <article id="content">
		<?=$content?>
	</article>
    <footer class="footer">
        <ul>
        <li>
            <p class="home">Home</p>
            <a class="logo" href="#">Company Name <i>&copy; 2019</i></a>
        </li>
        <li>
            <p class="services">Services</p>
 
            <ul>
                <li><a href="#">3D modeling</a></li>
                <li><a href="#">Web development</a></li>
                <li><a href="#">Mobile development</a></li>
                <li><a href="#">Web &amp; Print Design</a></li>
            </ul>
        </li>
        <li>
            <p class="reachus">Reach us</p>
 
            <ul class="social-icons">
            <li><a class="icon" href="https://plus.google.com" target="_blank"><img src="img/img_site/google.png" alt=""></a></li>
            <li><a class="icon" href="https://www.linkedin-russia.ru" target="_blank"><img src="img/img_site/inicon.png" alt=""></a></li>
            <li><a class="icon" href="http://all-rss.ru" target="_blank"><img src="img/img_site/rss.png" alt=""></a></li>
            <li><a class="icon" href="https://ru-ru.facebook.com" target="_blank"><img src="img/img_site/facebook.png" alt=""></a></li>
            </ul>
        </li>
        <li>
            <p class="clients">Clients</p>
 
            <ul>
                <li><a href="#">Login Area</a></li>
                <li><a href="#">Support Center</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </li>
    </ul>
        <div >
            
        </div>
        <h4>&copy;Все права защищены</h4>
    </footer>
    </div>
</body>
</html>