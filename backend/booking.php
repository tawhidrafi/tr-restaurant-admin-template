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
        <title>AB FOODS || BOOKINGS</title>
		<!-- FAV ICONS -->
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
		<!-- Font Awesome -->
		<script src="https://kit.fontawesome.com/15379409d8.js" crossorigin="anonymous"></script>
        <!-- === CSS STYLE === -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bookings.css">
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
            <h3 class="main__title">
                Booking List
            </h3>
            <!---------------- BOOKING SECTION --------------->
            <section class="booking section">
				<?php
					$b_sql = "SELECT * FROM booking";
					$b_result = $conn->query($b_sql);
					//CREATING A LOOP
					while ($b_row = $b_result->fetch_assoc()) { ?>
						<!---------------- BOOKING SINGLE ITEM --------------->
						<div class="b__item">
							<!---------------- NAME PART --------------->
							<div class="b__div">
								<span class="b__title">
									Guest Name
								</span>
								<span class="b__name b__detail">
									<?php echo $b_row['b_name'];?>
								</span>
							</div>
							<!---------------- CONTACT PART --------------->
							<div class="b__div">
								<span class="b__title">
									Contact
								</span>
								<span class="b__phone b__detail">
									<?php echo $b_row['b_contact'];?>
								</span>
							</div>
							<!---------------- NUMBER PART --------------->
							<div class="b__div">
								<span class="b__title">
									Total Guest
								</span>
								<span class="b__num b__detail">
									<?php echo $b_row['b_num'];?>
								</span>
							</div>
							<!---------------- DATE PART --------------->
							<div class="b__div">
								<span class="b__title">
									Date
								</span>
								<span class="b__date b__detail">
									<?php echo $b_row['b_date'];?>
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