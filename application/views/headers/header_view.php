<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?php echo BASE_URL.'admin'; ?>">SKIT Class Tests - Home</a>
</div>


<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <?php echo $this->session->userdata('username'); ?>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user"> 
            <?php if($this->session->userdata('email') ==  ADMIN_ACCOUNT){ ?>
                <li>
                    <a href="<?php echo BASE_URL; ?>admin/accounts/account_list"><i class="fa fa-wrench  fa-fw"></i> Accounts</a>
                </li>
            <?php }?>
            <li>
                <a href="<?php echo BASE_URL; ?>admin/profile/change_password"><i class="fa fa-wrench  fa-fw"></i> Change Password</a>
            </li>
            <li class="divider"></li>
            <li><a href="<?php echo BASE_URL; ?>admin/auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
    </li>
</ul>
