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
        <title>AB FOODS || MENU</title>
		<!-- FAV ICONS -->
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
		<!-- Font Awesome -->
		<script src="https://kit.fontawesome.com/15379409d8.js" crossorigin="anonymous"></script>
        <!-- === CSS STYLE === -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/menu.css">
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
            <!---------------- NEW MENU SECTION --------------->
            <section class="new__menu section">
                <h3 class="section-title">
                    Create A new Menu
                </h3>
				<!---------------- PHP BLOCK --------------->
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						//DATA CATCHING		
						$m_name = $_POST['m_name'];
						$m_detail = $_POST['m_detail'];
						$m_price = $_POST['m_price'];
						$m_tag = $_POST['m_tag'];
						//FILE HANDLING
						$m_file_name = $_FILES['m_image']['name'];
						$m_file_size = $_FILES['m_image']['size'];
						$m_file_temp = $_FILES['m_image']['tmp_name'];
						$m_upload = 'assets/img/food/upload/'.$m_file_name;
						//MOVING THE FILE
						move_uploaded_file($m_file_temp, $m_upload);
						//QUERY SQL
						$m_sql = "INSERT INTO menu (m_name, m_detail, m_price, m_tag, m_upload)
							values ('$m_name', '$m_detail', '$m_price', '$m_tag', '$m_upload')";
						//SEND TO DATABASE 
						$m_result = $conn->query($m_sql);
						//IF STATEMENT
						if($m_result) {
							//SUCCESS
							echo '<div class="alert-container row grid-center"><div class="alert alert-success">
								Menu Item Added Successfully</div></div>';
							//PHP RELOAD PAGE
							echo "<meta http-equiv='refresh' content='3;url=menu.php'>";
						}else {
							//ERROR
							echo '<div class="alert-container row grid-center"><div class="alert alert-danger">
								Something Went Wrong. Please Try Again</div></div>';
						}
					}
				?>
                <!---------------- NEW MENU FORM --------------->
                <form action="" class="nm__form section" method="POST" enctype="multipart/form-data">
                    <!---------------- NAME --------------->
                    <div class="form__item form__div">
                        <!---------------- INPUT --------------->
                        <input type="text" class="form__input" name="m_name" id="" placeholder=" " required>
                        <!---------------- LABEL --------------->
                        <label class="form__label" for="">ITEM NAME</label>
                    </div>
                    <!---------------- DETAIL --------------->
                    <div class="form__item form__div">
                        <textarea class="form__input form__textarea" name="m_detail" id="" placeholder=" " required></textarea>
                        <!---------------- TEXTAREA LABEL --------------->
                        <label class="form__label" for="">ITEM DETAIL</label>
                    </div>
                    <!---------------- PRICE --------------->
                    <div class="form__item form__div">
                        <!---------------- INPUT --------------->
                        <input type="number" class="form__input" name="m_price" id="" placeholder=" " required>
                        <!---------------- LABEL --------------->
                        <label class="form__label" for="">ITEM PRICE</label>
                    </div>
                    <!---------------- TAG --------------->
                    <div class="form__item form__div">
                        <!---------------- INPUT --------------->
                        <input type="text" class="form__input" name="m_tag" id="" placeholder=" ">
                        <!---------------- LABEL --------------->
                        <label class="form__label" for="">Enter Any Tag</label>
                    </div>
                    <!---------------- FILE --------------->
                    <div class="file__container">
                        <div class="file__wrapper">
                            <!---------------- Image PART --------------->
                            <div class="nm__img" id="nm__img">
                                <img src="" alt="">
                            </div>
                            <!---------------- STATIC ICON --------------->
                            <div class="static__content">
                                <i class="fas fa-cloud-arrow-up"></i>
                                <span class="static__p">
                                    Upload Any Item Photo(max. 1 File)
                                </span>
                            </div>
                            <!---------------- CANCEL BUTTON --------------->
                            <div id="cancel-btn">
                                <i class="fas fa-times"></i>
                            </div>
                            <!---------------- FILE NAME --------------->
                            <div class="file__name" id="file-name">
                                File Name Here
                            </div>
                        </div>
                        <!---------------- DEFAULT INPUT --------------->
                        <input type="file" name="m_image" id="default-btn" accept="image/*" hidden>
                        <!---------------- CUSTOM BUTTON --------------->
                        <p id="custom-btn">Choose A File</p>
                    </div>
                    <!---------------- SUBMIT --------------->
                    <div class="form__item">
                        <input type="submit" value="CREATE" class="form__sumbit">
                    </div>
                </form>
            </section>
            <!---------------- CURRENT MENU SECTION --------------->
            <section class="current__menu section">
                <!---------------- TITLE --------------->
                <h3 class="section-title">
                    CURRENT MENU ITEMS
                </h3>
                <!---------------- CURRENT MENU CONTAINER --------------->
                <div class="cm__content section grid">
					<!---------------- ITEM WITH PHP LOOP --------------->
					<?php
						$menu_sql = "SELECT * FROM menu";
						$menu_result = $conn->query($menu_sql);
						//CREATING A LOOP
						while ($menu_row = $menu_result->fetch_assoc()) { ?>
							<!---------------- ITEM --------------->
							<div class="cm__item grid">
								<!---------------- IMAGE --------------->
								<div class="cm__img">
									<img src="<?php echo $main_url.'/'.$menu_row['m_upload'];?>" alt="">
								</div>
								<!---------------- NAME --------------->
								<span class="cm__name">
									<?php echo $menu_row['m_name'];?>
								</span>
								<!---------------- DETAIL --------------->                        
								<span class="cm__detail">
									<?php echo $menu_row['m_detail'];?>
								</span>
								<!---------------- PRICE --------------->                        
								<span class="cm__price">
									TK <?php echo $menu_row['m_price'];?>
								</span>
								<!---------------- TAG --------------->                        
								<span class="cm__tag">
									<?php echo $menu_row['m_tag'];?>
								</span>
							</div>
					<?php } ?>
                </div>
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
        <script src="assets/js/menu.js"></script>
    </body>
</html>