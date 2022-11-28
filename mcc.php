<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Hello, world!</title>
</head>
<body>

	<div id="bottomContainer">
		<div id="content">
			<div class="d-flex justify-content-center ">
				<div class="card mt-3 mb-5 login">
					<div class="card-body">
						<h3 class="my-3">Registrati</h3>

						<form method="POST" class="my-login-validation" novalidate="" action="admin/mcc/mngZip.php">
							<div class="form-group">
								<label for="email">Email</label>
								<input id="email" class="form-control" name="email" value="" required autofocus>
							</div>

							<div class="form-group">
								<label for="website">Website</label>
								<input id="website" type="text" class="form-control" name="website" required data-eye>
							</div>
							<input type="hidden" name="recaptcha_response" id="recaptchaResponse">

							<br>

							<div class="form-group m-0">
								<button type="submit" class="btn btn-primary btn-block">
									Registra
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
					
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>