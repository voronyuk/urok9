<?php
$page_title = 'Login page';

require('base/header.php');

$user = array(
  // Логін, з яким можна зайти на сайт.
  'name' => 'admin',
  // пароль "123", але ми його не зберігаємо у відкритому вигляді, ми вписуємо тільки хеш md5.
  'pass' => '202cb962ac59075b964b07152d234b70',
);


// Якщо запис у користувача про сесію вже є, тоді пропонуємо йому розлогінитися.
// Тобто вийти з сайту.
if (!empty($_SESSION['login'])) {
  print 'Ви вже залоговані на сайті.';
  print '<a href="/logout.php">Вийти</a>';
}

// Якщо користувач відправляє форму, тоді аналізуємо дані з POST.
if (!empty($_POST['name']) && !empty($_POST['pass'])) {

  // Якщо доступи вірні, тоді робимо відповідний запис у сесії.
  if ($_POST['name'] == $user['name'] && md5($_POST['pass']) == $user['pass']) {
    $_SESSION['login'] = TRUE;
    // Направляємо користувача на головну сторінку.
    header('Location: /');

  }

}
?>

<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>

<div class="container">
	<a id="modal_trigger" href="#modal" class="btn">Click here to Login or register</a>

	<div id="modal" class="popupContainer" style="display:none;">
		<header class="popupHeader">
			<span class="header_title">Login</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>
		
		<section class="popupBody">
			<!-- Social Login -->
			<div class="social_login">
				<div class="">
					<a href="#" class="social_box fb">
						<span class="icon"><i class="fa fa-facebook"></i></span>
						<span class="icon_title">Connect with Facebook</span>
						
					</a>

					<a href="#" class="social_box google">
						<span class="icon"><i class="fa fa-google-plus"></i></span>
						<span class="icon_title">Connect with Google</span>
					</a>
				</div>

				<div class="centeredText">
					<span>Or use your Email address</span>
				</div>

				<div class="action_btns">
					<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
					<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
				</div>
			</div>

			<!-- Username & Password Login form -->
			
			<div class="user_login">
			<?php if(empty($_SESSION['login'])): ?>
			 <form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="POST" class="form-login">
				
					<label>Email / Username</label>
					<input type="text" name="name" id="name" required />
					<br />

					<label>Password</label>
					<input type="password" name="pass" />
					<br />

					<div class="checkbox">
						<input id="remember" type="checkbox" />
						<label for="remember">Remember me on this computer</label>
					</div>

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last">
						<input type="submit" name="submit" class="btn btn_red" value="Відправити"></div>
					</div>
				</form>
                <?php endif; ?>
				
				<a href="#" class="forgot_password">Forgot password?</a>
			</div>

			<!-- Register Form -->
			
			<div class="user_register">
				<form action="<?php print $_SERVER["PHP_SELF"]; ?>" method="POST" class="form-login">
					<label>Full Name</label>
					<input type="text" name="name" id="name" required />
					<br />

				

					<label>Password</label>
					<input type="password" name="pass" />>
					<br />

					<div class="checkbox">
						<input id="send_updates" type="checkbox" />
						<label for="send_updates">Send me occasional email updates</label>
					</div>

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last">
						<input type="submit" name="submit" class="btn btn_red" value="Register"></div>
					</div>
						
					</div>
				</form>
				
			</div>
		</section>
	</div>
</div>

<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#login_form").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script>




<!-- Якщо користувач немає запису у сесії, тоді виводимо йому форму. -->



<?php
// Підключаємо футер сайту.
require('base/footer.php');
?>


