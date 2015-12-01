<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>選單維護</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo css_url("bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo css_url("maintain_menu/bootstrap-combined.min.css"); ?>" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo js_url("jquery2.0.2.js"); ?>"></script>
    <script src="<?php echo js_url("bootstrap.min.js"); ?>"></script>
    <script src="<?php echo js_url("public_program/classes.js"); ?>"></script>

    <script>
        <?php if(isset($rtn_message)){ ?>
        alert('<?php echo $rtn_message ?>');
        <?php } ?>
    </script>
</head>

<body>
<!-- /#wrapper -->
<div style="width:60%;margin: 50px auto;" >
    <div class='panel panel-primary dialog-panel' style="-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
        <div class='panel-heading'>
            <h5>新增類別</h5>
        </div>
        <div class='panel-body'>
                <?php
                $attributes = array('class' => 'form-horizontal','role'=>'form', 'name' => 'class_form','id'=>'class_form', 'method' => 'post');
                echo form_open('classes/add_save', $attributes);
                ?>
                <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
                <div class='form-group'>
                        <label class='control-label col-xs-6 col-md-6' for='class_name'>分類名稱</label>
                    <div class='col-md-6'>
                        <input class='form-control' id='class_name' name="class_name" placeholder='分類名稱' type='text'>
                    </div>
                </div>
                <div class='form-group' id="folder_bottom_button">
                    <div class='control-label col-xs-6 col-md-6 col-md-offset-2'>
                        <input type="button" class='btn-lg btn-primary' style='float:right' id="addsave" value="儲存">
                    </div>
                    <div class='control-label col-xs-6 col-md-6 col-md-offset-2'>
                        <input type="button" class='btn-lg btn-danger' style='float:right'
                               onclick="document.class_form.reset()" value="取消">
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

</body>

</html>
