<?php echo form_open(BASE_URL . 'home/test_result/'); ?>
<h2><?php echo $test_details->name; ?></h2>

<?php for ($i = 0; $i < $test_details->number; $i++) { ?>
    <p><b><?php echo $i+1; ?>. </b><?php echo $questions[$i]->ques; ?></p>
    <?php $name = base64_encode($questions[$i]->pk_ques_id); ?>
    <?php
    $options = array();
    $options[0] = '<input type="radio" name="' . $name . '" value="' . $questions[$i]->op1 . '"> ' . $questions[$i]->op1;
    $options[1] = '<input type="radio" name="' . $name . '" value="' . $questions[$i]->op2 . '"> ' . $questions[$i]->op2;
    $options[2] = '<input type="radio" name="' . $name . '" value="' . $questions[$i]->op3 . '"> ' . $questions[$i]->op3;
    $options[3] = '<input type="radio" name="' . $name . '" value="' . $questions[$i]->op4 . '"> ' . $questions[$i]->op4;
    shuffle($options);

    for ($j = 0; $j < 4; $j++) {
        echo $options[$j] . '<br>';
    }    
    echo '<input type="radio" name="' . $name . '" value=""> Don\'t know';
    echo '<br><br><br>';
    ?>

<?php } ?>

    <input type="hidden" name="name" value="<?php echo $this->encrypt->encode($values->name); ?>">
    <input type="hidden" name="rollno" value="<?php echo $this->encrypt->encode($values->rollno); ?>">
    <input type="hidden" name="test_id" value="<?php echo $this->encrypt->encode($values->test_id); ?>">
    
<button type="submit">Submit</button>
<?php echo form_close(); ?>
