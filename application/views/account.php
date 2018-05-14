

	<?
		include('header.php');
	?>


<body>
<div id="particles-js"></div>
<div class="main-web">
	<h1>My Account</h1>

	<? echo $this->session->flashdata('registered');?>
	<i style="color:red;"><? echo validation_errors();?></i>

	<div class="register-form" style="color:#fff">

		<p><i><? echo $this->input->post('email');?> </i></p>

    <div class="row">
    <div class="col-md-6 grid">
      <img src="<?php echo base_url(); ?>assets/images/acc.png" alt="" />
				<div>
					<mark>Balance = 
						$
						<?
 								$query = $this->db->query("SELECT amount FROM register WHERE email = '$email'");
		                     $result = $query->row();
												 echo $result->amount;

													?>

					</mark>
				</div>
      <h4><strong> My Account </strong></h4>
    </div>

    <div class="col-md-6 grid">
      <a href="#"><img src="<?php echo base_url(); ?>assets/images/send.png" alt="" />
      <h4><strong>Send Money </strong></h4></a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid">
      <a href="#"><img src="<?php echo base_url(); ?>assets/images/out.png" alt="" />
      <h4><strong>Withdraw Money </strong></h4></a>
    </div>
    <div class="col-md-6 grid">
      <a href="#"><img src="<?php echo base_url(); ?>assets/images/air.png" alt="" />
      <h4><strong>Buy Airtime </strong></h4></a>
    </div>
  </div>
		<div style="float:right;">
			<a href="<?php echo base_url();?>index.php/Main/logout" class="btn btn-success" role="button" >Logout</a>
		</div>
    	<div class="clear"></div>
	</div>
</div>



	<?
		include('footer.php');
	?>
