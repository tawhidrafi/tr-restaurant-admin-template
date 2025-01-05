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
        <title>AB FOODS || TEAM</title>
		<!-- FAV ICONS -->
		<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
		<!-- Font Awesome -->
		<script src="https://kit.fontawesome.com/15379409d8.js" crossorigin="anonymous"></script>
        <!-- === CSS STYLE === -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/team.css">
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
            <!---------------- NEW TEAM MEMBER SECTION --------------->
            <section class="new__team section">
                <h3 class="section-title">
                    Add A New Team Member
                </h3>
				<!---------------- PHP BLOCK --------------->
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						//DATA CATCHING
						$tm_name = $_POST['tm_name'];
						$tm_position = $_POST['tm_position'];
						$tm_phone = $_POST['tm_phone'];
						$tm_email = $_POST['tm_email'];
						$tm_wa = $_POST['tm_wa'];
						$tm_fb = $_POST['tm_fb'];
						$tm_twitter = $_POST['tm_twitter'];
						//FILE HANDLING
						$tm_file_name = $_FILES['tm_image']['name'];
						$tm_file_size = $_FILES['tm_image']['size'];
						$tm_file_temp = $_FILES['tm_image']['tmp_name'];
						$tm_upload = 'assets/img/team/upload/'.$tm_file_name;
						//MOVING THE FILE
						move_uploaded_file($tm_file_temp, $tm_upload);
						//QUERY SQL
						$tm_sql = "INSERT INTO team (tm_name, tm_position, tm_phone, tm_email, tm_wa, tm_fb, tm_twitter, tm_upload) values ('$tm_name', '$tm_position', '$tm_phone', '$tm_email', '$tm_wa', '$tm_fb', '$tm_twitter', '$tm_upload')";
						//SEND TO DATABASE 
						$tm_result = $conn->query($tm_sql);
						//IF STATEMENT
						if($tm_result){
							//SUCCESS
							echo '<div class="alert-container row grid-center"><div class="alert alert-success">
								Menu Item Added Successfully</div></div>';
							//PHP RELOAD PAGE
							echo "<meta http-equiv='refresh' content='3;url=team.php'>";
						} else {
							//ERROR
							echo '<div class="alert-container row grid-center"><div class="alert alert-danger">
								Something Went Wrong. Please Try Again</div></div>';
						}
					}
				?>
                <!---------------- NEW MENU FORM --------------->
                <form action="" class="ntm__form section" method="POST" enctype="multipart/form-data">
                    <!---------------- NAME --------------->
                    <div class="form__item form__div">
                        <!---------------- INPUT --------------->
                        <input type="text" class="form__input" name="tm_name" id="" placeholder=" " required>
                        <!---------------- LABEL --------------->
                        <label class="form__label" for="">NAME</label>
                    </div>
                    <!---------------- POSITION --------------->
                    <div class="form__item form__div">
                        <!---------------- INPUT --------------->
                        <input type="text" class="form__input" name="tm_position" id="" placeholder=" " required>
                        <!---------------- LABEL --------------->
                        <label class="form__label" for="">Position</label>
                    </div>
                    <!----------------CONTACT --------------->
                    <div class="form__item form__div">
                        <!---------------- INPUT --------------->
                        <input type="number" class="form__input" name="tm_phone" id="" placeholder=" " required>
                        <!---------------- LABEL --------------->
                        <label class="form__label" for="">Contact No</label>
                    </div>
                    <!---------------- EMAIL --------------->
                    <div class="form__item form__div">
                        <!---------------- INPUT --------------->
                        <input type="email" class="form__input" name="tm_email" id="" placeholder=" ">
                        <!---------------- LABEL --------------->
                        <label class="form__label" for="">Email</label>
                    </div>
                    <!---------------- WHATSAPP --------------->
                    <div class="form__item form__div">
                        <!---------------- INPUT --------------->
                        <input type="text" class="form__input" name="tm_wa" id="" placeholder=" ">
                        <!---------------- LABEL --------------->
                        <label class="form__label" for="">Whatsapp Link</label>
                    </div>
                    <!---------------- FACEBOOK --------------->
                    <div class="form__item form__div">
                        <!---------------- INPUT --------------->
                        <input type="text" class="form__input" name="tm_fb" id="" placeholder=" ">
                        <!---------------- LABEL --------------->
                        <label class="form__label" for="">Facebook Profile Link</label>
                    </div>
                    <!---------------- TWITTER --------------->
                    <div class="form__item form__div">
                        <!---------------- INPUT --------------->
                        <input type="text" class="form__input" name="tm_twitter" id="" placeholder=" ">
                        <!---------------- LABEL --------------->
                        <label class="form__label" for="">Twitter Profile Link</label>
                    </div>
                    <!---------------- FILE --------------->
                    <div class="file__container">
                        <div class="file__wrapper">
                            <!---------------- Image PART --------------->
                            <div class="ntm__img" id="ntm__img">
                                <img src="" alt="">
                            </div>
                            <!---------------- STATIC ICON --------------->
                            <div class="static__content">
                                <i class="fas fa-cloud-arrow-up"></i>
                                <span class="static__p">
                                    Upload A Photo(max. 1 File)
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
                        <input type="file" name="tm_image" id="default-btn" accept="image/*" hidden>
                        <!---------------- CUSTOM BUTTON --------------->
                        <p id="custom-btn">Choose A File</p>
                    </div>
                    <!---------------- SUBMIT --------------->
                    <div class="form__item">
                        <input type="submit" value="ADD" class="form__sumbit">
                    </div>
                </form>
            </section>
            <!---------------- CURRENT TEAM MEMBER SECTION --------------->
            <section class="current__team section">
                <!---------------- TITLE --------------->
                <h3 class="section-title">
                    Current Team Members
                </h3>
                <!---------------- CURRENT TEAM MEMBER --------------->
                <div class="ctm__container section grid-center">
					<!---------------- ITEM WITH PHP LOOP --------------->
					<?php
						$ctm_sql = "SELECT * FROM team";
						$ctm_result = $conn->query($ctm_sql);
						//CREATING A LOOP
						while ($ctm_row = $ctm_result->fetch_assoc()) { ?>
							<!---------------- ITEM --------------->
							<div class="ctm__item flex-col flex-center">
								<!---------------- IMAGE --------------->
								<div class="ctm__img">
									<img src="<?php echo $main_url.'/'.$ctm_row['tm_upload'];?>" alt="">
								</div>
								<!---------------- NAME --------------->
								<span class="ctm__name">
									<?php echo $ctm_row['tm_name'];?>
								</span>
								<!---------------- POSITION --------------->                        
								<span class="ctm__position">
									<?php echo $ctm_row['tm_position'];?>
								</span>
								<!---------------- PHONE --------------->                        
								<span class="ctm__phone">
									<?php echo $ctm_row['tm_phone'];?>
								</span>
								<!---------------- EMAIL --------------->                        
								<span class="ctm__email">
									<?php echo $ctm_row['tm_email'];?>
								</span>
								<!---------------- SOCIAL MEDIA --------------->
								<span class="ctm__social flex">
									<a href="https://<?php echo $ctm_row['tm_fb'];?>">
										<i class="fa-brands fa-facebook"></i>
									</a>
									<a href="https://<?php echo $ctm_row['tm_twitter'];?>">
										<i class="fa-brands fa-twitter"></i>
									</a>
									<a href="https://<?php echo $ctm_row['tm_wa'];?>">
										<i class="fa-brands fa-whatsapp"></i>
									</a>
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
        <script src="assets/js/team.js"></script>
    </body>
</html>