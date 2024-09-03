<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="<?php echo base_url() ?>assets/template_home/theme/images/logoJNE.png" rel="shortcut icon" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="text-center">
						<h3><i class="fa fa-lock fa-4x"></i></h3>
						<h2 class="text-center">Forgot Password?</h2>
						<p>You can reset your password here.</p>
						<div class="panel-body">
							<form autocomplete="off" class="form" method="post" action="Auth/forgot_password_admin">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
										<input id="email" name="Email" placeholder="email address" class="form-control" required>
									</div>
								</div>
								<button class="btn btn-lg btn-danger btn-block" type="submit">Reset Password</button>
							</form>
							<a class="btn btn-lg btn-primary btn-block" href="<?= base_url('administrator') ?>">Back to Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.form-gap {
		margin-top: 40px;
	}

	.form-gap {
		padd ing-top: 70px;
		marg in-top: 40px;
	}
</style>