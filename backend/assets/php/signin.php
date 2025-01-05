<?php
	session_start();
	include ('../php/connection.php');
	include ('../php/path.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SIGN IN || AB FOODS</title>
		<!-- FAV ICONS -->
		<link rel="icon" type="image/x-icon" href="/favicon.ico">
		<!-- Font Awesome -->
		<script src="https://kit.fontawesome.com/15379409d8.js" crossorigin="anonymous"></script>
        <!-- === CSS STYLE === -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/signin.css">
    </head>
    <body>
        <main class="main grid-center">
            <div class="overlay"></div>
            <!---------------- SIGN IN SECTION --------------->
			<?php 
				if($_SERVER['REQUEST_METHOD'] == 'POST') {
					//GET FORM DATA
					$login_mail = $_POST['login_mail'];
					$login_pass = $_POST['login_pass'];
					//CONVERT TO STRING
					$login_mail = $conn->real_escape_string($login_mail);
					$login_pass = $conn->real_escape_string($login_pass);
					//DATABASE QUERY
					$check_mail_sql = "SELECT * FROM admin WHERE admin_mail = '$login_mail'";
					$check_mail_result = $conn->query($check_mail_sql);
					$check_mail_row = $check_mail_result->fetch_assoc();
					$mail_count = $check_mail_result->num_rows;
					//CHECKING CONDITION
					if($mail_count == 1) {
						if(isset($login_pass) and $login_pass == $check_mail_row['admin_pass']) {
							//DECLARING SOME SESSION PROPERTIES
							$_SESSION['login'] = true;
							$_SESSION['admin_id'] = $check_mail_row['admin_id'];
							//REDIRECT TO ADMIN PANEL
							header('location: ../../index.php');
							//PHP RELOAD PAGE
							echo "<meta http-equiv='refresh' content='2;url=signin.php'>";
						} else {
							//PASSWORD NOT MATCH
							echo '<div class="alert-container row grid-center"><div class="alert alert-danger">
								Password Not Matched</div></div>';
							//PHP RELOAD PAGE
							echo "<meta http-equiv='refresh' content='2;url=signin.php'>";
						}
					} else {
						//EMAIL NOT MATCH
						echo '<div class="alert-container row grid-center"><div class="alert alert-danger">
							Email Not Matched</div></div>';
						//PHP RELOAD PAGE
						echo "<meta http-equiv='refresh' content='2;url=signin.php'>";
					}
				}
			?>
			<!------------------- LOGIN FORM ------------------------>
            <div class="container">
                <div class="wrapper">
                    <!---------------- TITLE --------------->
                    <div class="section-subtitle">
                        SIGN IN TO CONTINUE
                    </div>
                    <!---------------- FORM --------------->
                    <form action="" class="signin__form flex-col" method="POST">
                        <!---------------- INPUT --------------->
                        <div class="form__part input__part">
                            <input type="email" class="form__input" name="login_mail" id="" placeholder="ENTER YOUR EMAIL" required>
                        </div>
                        <div class="form__part input__part">
                            <input type="password" class="form__input" name="login_pass" id="" placeholder="ENTER YOUR PASSWORD" required>
                        </div>
                        <!---------------- BUTTONS --------------->
                        <div class="form__part row button__part">
                            <a href="#" class="btn forgot__btn">FORGOT PASSWORD</a>
                            <input type="submit" value="SIGN IN" class="btn submit__btn">
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script src="assets/js/main.js"></script>
    </body>
</html>
