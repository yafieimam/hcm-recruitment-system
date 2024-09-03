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
						<h5 class="text-center">Change your password for</h5>
						<p><?php echo $this->session->userdata('reset_email') ?></p>
						<div class="panel-body">
							<form autocomplete="off" class="form" method="post" action="<?= base_url() ?>Auth/changePassword">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-key"></i></span>
										<input id="password" type="password" name="Password" placeholder="Type new password" class="form-control" required>
										<small class="text-danger"><?php echo form_error('Password') ?></small>
									</div>
								</div>
								<button class="btn btn-lg btn-danger btn-block" type="submit">Change Password</button>
							</form>
							<!-- <a class="btn btn-lg btn-primary btn-block" href="../auth">Back to Login</a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!---------------------------------style-------------------------->
<style>
	.form-gap {
		margin-top: 40px;
	}

	.form-gap {
		padding-top: 70px;
		marg in-top: 40px;
	}
</style>