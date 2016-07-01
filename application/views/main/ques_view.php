<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header"><?php echo $test->name; ?></h1>
        </div> 
        <div class="col-lg-4">
            <a href="<?php echo BASE_URL . 'admin/question/add_ques/'.$this->encrypt->encode($test->pk_test_id); ?>">
                <button type="button" class="page-header btn btn-primary btn-lg btn-block">Add new question</button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Question Bank
                </div>

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="user_table" style="table-layout: fixed; overflow:hidden;">
                            <thead>
                                <tr>
                                    <th style="width:6%">S.No.</th>
                                    <th style="width:20%">Question</th>
                                    <th style="width:17%">Right Answer</th>
                                    <th style="width:13%">Option 1</th>
                                    <th style="width:13%">Option 2</th>
                                    <th style="width:13%">Option 3</th>
                                    <th style="width:10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($ques as $key => $value) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value->ques; ?></td>
                                        <td><?php echo $value->op1; ?></td>
                                        <td><?php echo $value->op2; ?></td>
                                        <td><?php echo $value->op3; ?></td>
                                        <td><?php echo $value->op4; ?></td>
                                        <td>
                                            <a href="<?php echo BASE_URL.'admin/question/edit?q='.$this->encrypt->encode($value->pk_ques_id).'&t='.$this->encrypt->encode($test->pk_test_id); ?>"> Edit</a> |
                                            <a href="<?php echo BASE_URL.'admin/question/delete?q='.$this->encrypt->encode($value->pk_ques_id).'&t='.$this->encrypt->encode($test->pk_test_id); ?>"> Delete</a>
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