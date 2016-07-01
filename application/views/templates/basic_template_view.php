<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SKIT Class Tests</title>
        <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo BASE_URL; ?>assets/css/sb-admin-2.css" rel="stylesheet">
        <link href="<?php echo BASE_URL; ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets2/img/skit.ico">
        
        <?php
        foreach($css as $key=>$value) { ?>
           <link href="<?php echo BASE_URL; ?>assets/css/<?php echo $value; ?>" rel="stylesheet" type="text/css">
        <?php } ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <script>
            var BASE_URL = '<?php echo BASE_URL; ?>';
        </script>
    </head>
    <body>
        <div class="container">
            <?php echo $main; ?>
        </div>
        <div style="display: none;"><a href="http://www.rajatgoel.in">Designed and Developed by Rajat Goel</a></div>
        <script src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/metisMenu.min.js"></script>
        <script src="<?php echo BASE_URL; ?>assets/js/sb-admin-2.js"></script>
        <?php
        foreach($js as $key=>$value) { ?>
           <script src="<?php echo BASE_URL; ?>assets/js/<?php echo $value; ?>"></script>
        <?php } ?>
    </body>
</html>
