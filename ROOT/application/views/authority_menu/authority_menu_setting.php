<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>選單權限設定</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo css_url("bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo css_url("maintain_menu/bootstrap-combined.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo css_url("maintain_menu/tree.css"); ?>" rel="stylesheet">
    <link href="<?php echo css_url("maintain_menu/form.css"); ?>" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo js_url("jquery2.0.2.js"); ?>"></script>
    <script src="<?php echo js_url("bootstrap.min.js"); ?>"></script>
    <script src="<?php echo js_url("authority_menu/authority_tree.js"); ?>"></script>
    <script src="<?php echo js_url("authority_menu/authority_menu_setting.js"); ?>"></script>

</head>

<body>
<div style="width:100%;padding:50px">
    <div class="row">

        <div class="col-lg-6 col-md-6">
            <button type="button" class="btn-small btn-primary" onclick="javascript:document.menu_setting_form.submit()">儲存</button>
            <button type="button" class="btn btn-info" onclick="checked_all()">全部選取</button>
            <button type="button" class="btn-sm btn-danger" onclick="clean_all()">全部取消</button>
        </div>
        <br>
        <br>
        <?php
        $attributes = array('class' => 'form col-md-12 center-block', 'name' => 'menu_setting_form');
        echo form_open('authority_menu/save', $attributes);
        ?>
        <?php echo form_hidden($hidden_item) ?>
        <div class="col-lg-8 col-md-8"">
        <div class="tree" style="-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);width:500px">
            <ul>
                <li>
                    <span><i class="icon-th"></i> 選單權限設定 </span> <a href="#" id="root_plus"><i class="icon-plus"></i></a>
                    <ul>
                        <?php echo $menu ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <?php echo form_close()?>
    </div>
</div>
</body>

</html>
