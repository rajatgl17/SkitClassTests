<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>            
        </div>  
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <?php if (isset($success_message) && $success_message != '') { ?>
                    <div class="alert alert-success" role="alert">
                        <span class="fa fa-check" aria-hidden="true"></span>
                        <?php echo $success_message; ?>
                    </div>
                <?php } ?>

                <?php if (isset($error_message) && $error_message != '') { ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="fa fa-ban" aria-hidden="true"></span>
                        <?php echo $error_message; ?>
                    </div>
                <?php } ?>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Question
                    </div>

                    <div class="panel-body">
                        <?php echo form_open(BASE_URL . 'admin/question/add/'.$test_id, array('role' => 'form')); ?>
                        
                        <div class="form-group">
                            <label>Question</label>
                            <textarea rows="5" class="form-control" placeholder="" name="ques"></textarea>
                            <p> <?php echo form_error('ques', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                        <div class="form-group">
                            <label>Option 1 (Right Answer)</label>
                            <input type="text" class="form-control" name="op1">
                            <p> <?php echo form_error('op1', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                        <div class="form-group">
                            <label>Option 2</label>
                            <input type="text" class="form-control" name="op2">
                            <p> <?php echo form_error('op2', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                        <div class="form-group">
                            <label>Option 3</label>
                            <input type="text" class="form-control" name="op3">
                            <p> <?php echo form_error('op3', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                        <div class="form-group">
                            <label>Option 3</label>
                            <input type="text" class="form-control" name="op4">
                            <p> <?php echo form_error('op4', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                        
                        <div class="col-xs-1">
                            <button type="submit" name="redirect" value="0" class="btn btn-primary">Save only</button>
                        </div>
                        <div class="col-xs-3  col-xs-offset-1">
                            <button type="submit" name="redirect" value="1" class="btn btn-primary">Save and add new question</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>