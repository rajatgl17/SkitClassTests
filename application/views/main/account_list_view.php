<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Accounts</h1>
        </div> 
        <div class="col-lg-4">
            <a href="<?php echo BASE_URL . 'admin/accounts/create_new'; ?>">
                <button type="button" class="page-header btn btn-primary btn-lg btn-block">Add new account</button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Accounts List
                </div>

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="user_table" style="table-layout: fixed; overflow:hidden;">
                            <thead>
                                <tr>
                                    <th style="width:10%">S.No.</th>
                                    <th >Name</th>
                                    <th >Email</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($accounts as $key => $value) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i.'.' ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo $value->email; ?></td>
                                        <td>
                                            <?php if($value->status == 1){ ?>
                                            <a href="<?php echo BASE_URL.'admin/accounts/deactivate/'.$this->encrypt->encode($value->pk_teacher_id); ?>">Deactivate</a>
                                            <?php } else if($value->status == 0){ ?>
                                                <a href="<?php echo BASE_URL.'admin/accounts/activate/'.$this->encrypt->encode($value->pk_teacher_id); ?>">Activate </a>
                                            <?php } ?>
                                                | <a href="<?php echo BASE_URL.'admin/accounts/change_password/'.$this->encrypt->encode($value->pk_teacher_id); ?>">Change password</a>
                                        </td>
                                        
                                    </tr> 
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>