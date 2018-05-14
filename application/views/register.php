
	<?
		include('header.php');
	?>


<body>
<div id="particles-js"></div>
<div class="main-web">
	<h1>REGISRATION</h1>


	<i style="color:red;"><? echo validation_errors();?></i>

	<div class="register-form">

		<p><b>Fill in your details below :</b></p>

		<form action="<?php echo base_url();?>index.php/Main/register" method="post">

			<input type="text" name="name" required="" placeholder="User-Name" />
			<input type="email" name="email" required="" placeholder="Email" />
			<input type="text" name="phone" required="" placeholder="Phone Number (+254)" />

			<div style="width:30%;">
				<input type="submit" value="REGISTER" />
			</div>

			<div class="clear"></div>

		</form>

		<div style="float:right;">
			<i style="color:gray;">Already have an account?</i>
			<a href="<?php echo base_url();?>index.php/Main/loginpage" class="btn btn-success" role="button" >LogIn</a>
		</div>

	</div>


	<?
		include('footer.php');
	?>
