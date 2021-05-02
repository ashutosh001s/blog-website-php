<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Verify Password</title>
	<link rel="shortcut icon" href="/assets/img/cover/favicon.png" style="filter: drop-shadow(2px 4px 6px black);">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/assets/css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">
					<div class="brand">
					<img src="/assets/img/cover/logo2.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Verify Email</h4>
							<?php
							$email = $_GET['email'];	
							
							echo'<form method="POST" action="/partials/_verifyEmail.php" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="otp">Enter OTP</label>
									<input id="otp" type="number" class="form-control" name="otp" required autofocus data-eye>
									<input type="hidden" value="'.$email.'" name="email">
									<div class="invalid-feedback">
										OTP is required
									</div>
									<div class="form-text text-muted">
										Enter Otp you received on email.
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Verify
									</button>
								</div>
							</form>';
							?>
						</div>
					</div>
					<div class="footer">
					<?php  $date = date("Y");
						echo'Copyright &copy; '.$date.' &mdash; Blogg Bat';
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="/assets/js/my-login.js"></script>
</body>
</html>