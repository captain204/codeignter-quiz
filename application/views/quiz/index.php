<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Welcome Quiz App</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/styles.css">
</head>
<body>

<div id="container">
    <div class="row">
        <div id="body" class="col-md-10 offset-2">
            <h2>Start Quiz</h2>
            <form  method="post" action="<?php echo site_url('quiz/submit');?>">
                <ol type="1">
                    <?php foreach ($questions as $question):?>

                        <li> 
                            <?php echo $question->body;?> 
                            <input type="hidden" name="questionsId[]" value="<?php echo $question->id?>">
                            <ol type="a">
                            <?php foreach ($this->Question_model->getAnswerByQuestion($question->id) as $answer):?>
                                <li>
                                    <input type="radio" name="question_<?php echo $question->id?>" value="<?php echo $answer->id?>" required>
                                    <?php echo $answer->body;?>
                                </li>
                            <?php endforeach;?>
                            </ol>
                    </li>

                    <?php endforeach;?>
                </ol>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>                        
	</div>
</div>

</body>
</html>