<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
<div class="container h-100">
	<div class="d-flex justify-content-center h-100">
		<div class="user_card">
            <?php if($this->session->flashdata('created')):?>
                <div class="alert alert-success">
                        <?php echo ($this->session->flashdata('created'));?>
                </div>
            <?php endif;?>
            <?php if($this->session->userdata('id')):?>
                <div class="alert alert-success">
                     Your ID is:<?php echo ($this->session->userdata('id'));?> keep it safe!
                </div>     
            <?php endif;?>	
			<div class="d-flex justify-content-center form_container">
            <?php echo validation_errors('<div class ="alert alert-danger">','</div>');?>
				<form action="<?php echo site_url('user');?>" method="post">
					<div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>					
						</div>
						<input type="text" name="name" id="name" class="form-control input_user"  placeholder="Full Name">
                    </div>
                    <div class="input-group mb-3">
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>					
						</div>
						<input type="text" name="reg_id" id="reg_id" class="form-control input_user"  placeholder="Registration ID">
					</div>
            </div>
			<div class="d-flex justify-content-center mt-3 login_container">
				<button type="submit" name="submit" id="login" class="btn btn-primary">Start Quiz</button> 
			</div>
			</form>
			<div class="mt-4">
				<div class="d-flex justify-content-center links">
					Don't have a Registration number? <a href="<?php echo site_url('user/createid');?>" class="ml-2">Click here</a>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>