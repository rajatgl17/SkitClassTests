<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Marks</h1>
        </div> 
        <div class="col-lg-4">
            <a href="<?php echo BASE_URL . 'admin/tests/download/'.$test_id; ?>">
                <button type="button" class="page-header btn btn-primary btn-lg btn-block">Download Excel Sheet</button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Marks List
                </div>

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="user_table" style="table-layout: fixed; overflow:hidden;">
                            <thead>
                                <tr>
                                    <th style="width:10%">S.No.</th>
                                    <th style="width:40%">Name</th>
                                    <th style="width:30%">Roll No.</th>
                                    <th style="width:20%">Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($marks as $key => $value) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i.'.' ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo $value->roll_no; ?></td>
                                        <td><?php echo $value->marks; ?></td>
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