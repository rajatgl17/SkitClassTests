<?php echo form_open(BASE_URL . 'home/check_test/' . $test_id); ?>
<h2><?php echo $test_details->name; ?></h2>

<?php if ($test_details->description != '') { ?>
    <pre><?php echo $test_details->description; ?></pre>
<?php } ?>

<label for="name">Name</label>
<input type="text" id="name" name="name" placeholder="Enter your name" required>
<?php echo form_error('name', '<p class="red">', '</p>'); ?>

<label for="rollno">Roll No.</label>
<input type="text" id="rollno" name="rollno" placeholder="Enter your roll no." required>
<?php echo form_error('rollno', '<p class="red">', '</p>'); ?>

<label for="key">Security Key</label>
<input type="text" id="key" name="key" placeholder="Enter security key" required>
<?php echo form_error('key', '<p class="red">', '</p>'); ?>

<?php if (isset($error_message) && $error_message != '') { ?>
    <p class="red">
        <?php echo $error_message; ?>
    </p>
<?php } ?>

<button type="submit">Start Test</button>
<?php echo form_close(); ?>
