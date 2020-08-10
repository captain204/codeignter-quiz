<html>
<head>
	<title>User Creation</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/styles.css">
</head>
<body>
<div>   
        <?php echo validation_errors('<div class ="alert alert-danger">','</div>');?>
        <form action="<?php echo site_url('user/createid');?>" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Create ID</h1>
                        <hr class="mb-3">
                        <label for="name"><b>Name</b></label>
                        <input class="form-control" id="name" type="text" name="name" placeholder="Enter Your Fullname">
                        <input class="btn btn-primary" type="submit" id="create" name="create" value="Create ID">
                    </div>
                </div>
            </div>
        </form>
</div>
</body>