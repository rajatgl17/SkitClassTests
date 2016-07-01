<form action="" method="post">
    <h2>List of available <span class="red"><strong>Tests</strong></span></h2>
    <table class="table">        
        <tbody>
            <?php if($available_tests == NULL){ ?>
                <tr>
                    <td>Well! There is no class test available at this moment.</td>                    
                </tr>
            <?php }else { foreach ($available_tests as $key => $value) { ?>
                <tr>
                    <td><a href="<?php echo BASE_URL . 'home/test_details/' . $this->encrypt->encode($value->id); ?>"><?php echo $value->test . ' by ' . $value->teacher; ?></a></td>                    
                </tr>
            <?php }} ?>
        </tbody>
    </table>
</form>
