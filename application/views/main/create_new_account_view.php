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
                        Create a new account
                    </div>

                    <div class="panel-body">
                        <?php echo form_open(BASE_URL . 'admin/accounts/add_account', array('role' => 'form')); ?>
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" class="form-control" placeholder="" name="name">
                            <p> <?php echo form_error('name', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                        
                        <div class="form-group">
                            <label>E-mail *</label>
                            <input type="email" class="form-control"  name="email">
                            <p> <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="password" class="form-control" name="password">
                            <p> <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?></p>
                        </div>
                                                
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary">Create a new account</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>