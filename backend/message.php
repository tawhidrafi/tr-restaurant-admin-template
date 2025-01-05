<?php
	session_start();
	if(!isset($_SESSION['login']) && $_SESSION['login'] != true ) {
		header ('location: assets/php/signin.php');
	} 
	include ('assets/php/connection.php');
	include ('assets/php/path.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AB FOODS || MESSAGES</title>
		<!-- FAV ICONS -->
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
		<!-- Font Awesome -->
		<script src="https://kit.fontawesome.com/15379409d8.js" crossorigin="anonymous"></script>
        <!-- === CSS STYLE === -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/message.css">
    </head>
    <body>
        <!---------------- HEADER --------------->
        <header class="header">
            <!---------------- NAV --------------->
            <nav class="nav flex">
                <!---------------- LOGO --------------->
                <div class="nav__logo">
                    <a href="index.php">
                        <img src="assets/img/logo.png" alt="" class="nav__logo__img">
                    </a>
                </div>
                <!---------------- MENU SWITCH --------------->
                <div class="nav__switch" id="nav__switch">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <!---------------- MENU --------------->
                <div class="nav__menu" id="nav__menu">
                    <ul class="nav__menu__ul">
                        <li class="nav__menu__ul__li">
                            <a href="index.php" class="nav__link">DASHBOARD</a>
                        </li>
                        <li class="nav__menu__ul__li">
                            <a href="menu.php" class="nav__link">MENU</a>
                        </li>
                        <li class="nav__menu__ul__li">
                            <a href="booking.php" class="nav__link">BOOKINGS</a>
                        </li>
                        <li class="nav__menu__ul__li">
                            <a href="team.php" class="nav__link">TEAM</a>
                        </li>
                        <li class="nav__menu__ul__li">
                            <a href="message.php" class="nav__link">MESSAGES</a>
                        </li>
                        <li class="nav__menu__ul__li">
                            <a href="assets/php/logout.php" class="nav__link">LOG OUT</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!---------------- MAIN AREA --------------->
        <main class="main">
            <!---------------- TITLE --------------->
            <h3 class="main-title">
                messages
            </h3>
            <!---------------- BOOKING SECTION --------------->
            <section class="message section">
				<!---------------- ITEM WITH PHP LOOP --------------->
					<?php
						$mes_sql = "SELECT * FROM message";
						$mes_result = $conn->query($mes_sql);
						//CREATING A LOOP
						while ($mes_row = $mes_result->fetch_assoc()) { ?>
							<!---------------- ITEM --------------->
							<div class="m__item">
								<!---------------- NAME PART --------------->
								<div class="m__div">
									<span class="m__title">
										Name
									</span>
									<span class="m__name m__detail">
										<?php echo $mes_row['mes_name']; ?>
									</span>
								</div>
								<!---------------- CONTACT PART --------------->
								<div class="m__div">
									<span class="m__title">
										Contact
									</span>
									<span class="m__phone m__detail">
										<?php echo $mes_row['mes_email']; ?>
									</span>
								</div>
								<!---------------- MESSAGE PART --------------->
								<div class="m__div">
									<span class="m__title">
										Message
									</span>
									<span class="m__message m__detail">
										<?php echo $mes_row['mes_mes']; ?>
									</span>
								</div>
							</div>
					<?php } ?>
            </section>
        </main>
        <!---------------- FOOTER --------------->
        <footer class="footer flex-col">
            <!---------------- LOGO --------------->
            <a href="index.php" class="footer__logo">
                <img src="assets/img/logo.png" alt="">
            </a>
            <!---------------- TITLE --------------->
            <p class="footer__title">
                AB FOODS ADMIN PANEL || ALL RIGHTS RESERVED
            </p>
            <!---------------- CREDIT --------------->
            <p class="footer__credit">
                DESIGNED & DEVELOPED BY <a href="">TAWHID RAFI</a>
            </p>
        </footer>
        <script src="assets/js/main.js"></script>
    </body>
</html>