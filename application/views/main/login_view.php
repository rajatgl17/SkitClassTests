<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">


            <?php if (isset($error_message) && $error_message != '') { ?>
                <div class="alert alert-danger" role="alert">
                    <span class="fa fa-ban" aria-hidden="true"></span>
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>
            
            <div class="panel-heading">
                <h3 class="panel-title">Please Log In</h3>
            </div>
            <div class="panel-body">
                <?php echo form_open(BASE_URL . 'admin/auth/login', array('role' => 'form')); ?>
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
                        <span class="required-server"><?php echo form_error('email','<p style="color:#F83A18">','</p>'); ?></span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Password" name="password" type="password" required>
                        <span class="required-server"><?php echo form_error('password','<p style="color:#F83A18">','</p>'); ?></span>
                        
                    </div>

                    <div class="form-group">
                        <label for="captcha">
                            <?php echo $captcha['image']; ?>
                        </label><br>
                        <input class="form-control" type="text" autocomplete="off" name="userCaptcha" placeholder="Enter above text" value="<?php if (!empty($userCaptcha)) {
                                echo $userCaptcha;
                            } ?>" />
                        <span class="required-server"><?php echo form_error('userCaptcha','<p style="color:#F83A18">','</p>'); ?></span>
                    </div>

                    <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                </fieldset>
<?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>