<!-- 
	DEVELOPER:: TAWHID RAFI
	PROJECT NAME:: AB FOODS ADMIN PANEL
	DATE:: 20 MAR 2022
	VERSION-DATE:: 
	LINK:: https://github.com/tawhidrafi/
-->
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
        <title>AB FOODS || DASHBOARD</title>
		<!-- FAV ICONS -->
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
		<!-- Font Awesome -->
		<script src="https://kit.fontawesome.com/15379409d8.js" crossorigin="anonymous"></script>
        <!-- === CSS STYLE === -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/dashboard.css">
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
            <h3 class="main-title">
                Hello, Tawhid Rafi
            </h3>
			<!---------------- SUMMERY DATA FROM DATABASE --------------->
			<?php
				//MENU PART
				$fs_sql = "SELECT * FROM menu";
				$fs_result = $conn->query($fs_sql);
				$fs_total_row = $fs_result -> num_rows;
				//TEAM PART
				$ctm_sql = "SELECT * FROM team";
				$ctm_result = $conn->query($ctm_sql);
				$ctm_total_row = $ctm_result -> num_rows;
				//BOOKING PART
				$booking_sql = "SELECT * FROM booking";
				$booking_result = $conn->query($booking_sql);
				$booking_total_row = $booking_result -> num_rows;
			?>
            <!---------------- SUMMERY SECTION --------------->
            <section class="summery section">
                <!---------------- SUMMERY FOOD --------------->
                <div class="s__item grid">
                    <!---------------- SUMMERY TITLE --------------->
                    <span class="summery__title">
                        Food & Menu
                    </span>
                    <!---------------- SUMMERY ICON --------------->
                    <span class="summery__icon">
                        <i class="fa-brands fa-servicestack"></i>
                    </span>
                    <!---------------- SUMMERY NUMBER --------------->
                    <span class="summery__num">
                        <?php echo $fs_total_row; ?>
                    </span>
                    <!---------------- SUMMERY ACTION --------------->
                    <span class="summery__action">
                        <a href="menu.php">EDIT</a>
                    </span>
                </div>
                <!---------------- SUMMERY ITEM --------------->
                <div class="s__item grid">
                    <span class="summery__title">
                        BOOKING
                    </span>
                    <span class="summery__icon">
                        <i class="fa-solid fa-b"></i>
                    </span>
                    <span class="summery__num">
                        <?php echo $booking_total_row; ?>
                    </span>
                    <span class="summery__action">
                        <a href="booking.php">EDIT</a>
                    </span>
                </div>
                <!---------------- SUMMERY TEAM --------------->
                <div class="s__item grid">
                    <span class="summery__title">
                        TEAM MEMBERS
                    </span>
                    <span class="summery__icon">
                        <i class="fa-solid fa-user-tie"></i>
                    </span>
                    <span class="summery__num">
                        <?php echo $ctm_total_row; ?>
                    </span>
                    <span class="summery__action">
                        <a href="team.php">EDIT</a>
                    </span>
                </div>
            </section>
            <!---------------- POPUP NOTICE SECTION--------------->
            <section class="notice section">
                <!---------------- TITLE --------------->
                <h3 class="section-title">
                    CREATE A POPUP NOTICE
                </h3>
				<!---------------- PHP BLOCK --------------->
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						//DATA CATCHING		
						$p_mes = $conn->real_escape_string($_POST['p_mes']);
						//QUERY SQL
						$p_sql = "INSERT INTO popup (p_mes)
							values ('$p_mes')";
						//SEND TO DATABASE 
						$p_result = $conn->query($p_sql);
						//IF STATEMENT
						if($p_result) {
							//SUCCESS
							echo '<div class="alert-container row grid-center"><div class="alert alert-success">
								Pop Up Message Created Succesfully</div></div>';
							//PHP RELOAD PAGE
							echo "<meta http-equiv='refresh' content='2;url=index.php'>";
						}else {
							//ERROR
							echo '<div class="alert-container row grid-center"><div class="alert alert-danger">
								Something Went Wrong. Please Try Again</div></div>';
							//PHP RELOAD PAGE
							echo "<meta http-equiv='refresh' content='5;url=index.php'>";
						}
					}
				?>
                <!---------------- POPUP NOTICE FORM --------------->
                <form action="" class="n__form section flex-col" method="POST">
                    <!---------------- NOTICE TEXTAREA --------------->
                    <div class="form__item form__div">
                        <textarea class="form__textarea" name="p_mes" id="" placeholder=" "></textarea>
                        <!---------------- TEXTAREA LABEL --------------->
                        <label class="form__label" for="">Write Your Message</label>
                    </div>
                    <!---------------- SUBMIT BUTTON --------------->
                    <div class="form__item">
                        <input type="submit" class="form__submit" value="CREATE">
                    </div>
                </form>
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