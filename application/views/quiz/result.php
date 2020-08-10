<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Results</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/styles.css">
</head>
<body>

<div id="container">
	<h1 class="text-center">Results</h1>
    <div class="row">
        <div id="body" class="col-md-10 offset-2">


            <ol type="1">
                    <?php foreach ($questions as $question):?>

                        <li> 
                            <?php echo $question->body;?> 
                            <ol type="a">
                            <?php foreach ($this->Question_model->getAnswerByQuestion($question->id) as $answer):?>
                                <li>
                                    <?php if($answer->body == $this->session->userdata('correct')):?>
                                        <p><span style="background-color: #FF9C9E"><?=$answer->body;?></span></p>
                                    <?php endif;?>
                                    <?php if($answer->body == $this->session->userdata('selected')):?>
                                        <p><span style="background-color: #ADFFB4"><?=$answer->body;?></span></p>
                                    <?php endif;?>
                                    <?php echo $answer->body;?>
                                </li>
                            <?php endforeach;?>
                            </ol>
                    </li>

                    <?php endforeach;?>
                </ol>
                <h3><?php echo ($this->session->userdata('name'));?></h3>
                <h3>Date:<?= date('Y-m-d H:i:s') ?><h3>
                <h3> Your Score is:<?php echo $result;?>/20</h3>
                <a href="<?php echo site_url('quiz');?>" class="btn btn-primary">Try again</a>
                <a href="<?php echo site_url('user/logout');?>" class="btn btn-danger">Logout</a>
            
        </div>
    </div>

</div>

</body>
</html>