
	<?
		include('header.php');
	?>


<body>
<div id="particles-js"></div>
<div class="main-web">
	<h1><br></h1>

	<div class="register-form">

		<p style="color:red;"><? echo $this->session->flashdata('login_fail');?></p>
		<i style="color:red;"><? echo validation_errors();?></i>

		<p style="color:green;"><? echo $this->session->flashdata('registered');?></p>
		<p style="color:green;"><? echo $this->session->flashdata('code');?></p>

		<p><b>Fill in your credentials to login :</b></p>

		<form action="<?php echo base_url();?>index.php/Main/login" method="post">

			<input type="email" name="email" required="" placeholder="Email" />
			<input type="text" name="otp" required="" placeholder="Verification Code" />
			<div style="width:30%;">
				<input type="submit" value="LOGIN" />
			</div>

			<div class="clear"></div>

		</form>

		<div style="float:right;">
			<i style="color:gray;">Don't have an account?</i>
			<a href="<?php echo base_url();?>index.php/Main/index" class="btn btn-success" role="button" >Register</a>
		</div>

	</div>


	<?
		include('footer.php');
	?>
