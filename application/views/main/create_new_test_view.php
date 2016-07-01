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
                        Create a new Test
                    </div>

                    <div class="panel-body">
                        <?php echo form_open(BASE_URL . 'admin/tests/add_test', array('role' => 'form')); ?>
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" class="form-control" placeholder="" name="name">
                            <p> <?php echo form_error('name', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                        <div class="form-group">
                            <label>Description/Rules (Optional)</label>
                            <textarea rows="5" class="form-control" placeholder="" name="description"></textarea>
                            <p> <?php echo form_error('description', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                        <div class="form-group">
                            <label>Key *</label>
                            <input type="text" class="form-control" placeholder="Students will have to enter this key to start the test." name="key">
                            <p> <?php echo form_error('key', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                        <div class="form-group">
                            <label>Number of Questions to be attempted *</label>
                            <input type="number" class="form-control" value="20" name="number">
                            <p> <?php echo form_error('number', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                        <!--div class="form-group">
                            <label>Time (in minutes) *</label-->
                            <input type="hidden" class="form-control" value="30" name="time">
                            <!--p> <?php //echo form_error('time', '<p class="text-danger">', '</p>'); ?></p>
                        </div-->
                        
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary">Create a new Test</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>