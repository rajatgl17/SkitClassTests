<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Tests</h1>
        </div> 
        <div class="col-lg-4">
            <a href="<?php echo BASE_URL . 'admin/tests/create_new'; ?>">
                <button type="button" class="page-header btn btn-primary btn-lg btn-block">Create New Test</button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tests List
                </div>

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="user_table" style="table-layout: fixed; overflow:hidden;">
                            <thead>
                                <tr>
                                    <th style="width:7%">S.No.</th>
                                    <th style="width:31%">Name</th>
                                    <th style="width:12%">No. of Ques.</th>
                                    <th style="width:15%">Time (in minutes)</th>
                                    <th style="width:10%">Key</th>
                                    <th style="width:25%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($tests as $key => $value) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i.'.' ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo $value->number; ?></td>
                                        <td><?php echo $value->time; ?></td>
                                        <td><?php echo $value->key; ?></td>
                                        <td>
                                            <a href="<?php echo BASE_URL.'admin/tests/edit/'.$this->encrypt->encode($value->pk_test_id); ?>">Edit </a> |
                                            <a href="<?php echo BASE_URL.'admin/question/ques_bank/'.$this->encrypt->encode($value->pk_test_id); ?>"> Question bank </a> |
                                            <?php if($value->status == 1){ ?>
                                                <a href="<?php echo BASE_URL.'admin/tests/activate/'.$this->encrypt->encode($value->pk_test_id); ?>"> Activate</a> |
                                            <?php } else { ?>
                                                <a href="<?php echo BASE_URL.'admin/tests/deactivate/'.$this->encrypt->encode($value->pk_test_id); ?>"> Deactivate</a> |
                                            <?php } ?>
                                            <!--a href="<?php echo BASE_URL.'admin/tests/delete/'.$this->encrypt->encode($value->pk_test_id); ?>"> Delete</a-->
                                            <a href="<?php echo BASE_URL.'admin/tests/marks/'.$this->encrypt->encode($value->pk_test_id); ?>"> Marks</a>
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