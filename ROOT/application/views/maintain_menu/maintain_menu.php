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
    <link href="<?php echo css_url("bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?php echo css_url("maintain_menu/bootstrap-combined.min.css");?>" rel="stylesheet">
    <link href="<?php echo css_url("maintain_menu/tree.css");?>" rel="stylesheet">
    <link href="<?php echo css_url("maintain_menu/form.css");?>" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo js_url("jquery2.0.2.js");?>"></script>
    <script src="<?php echo js_url("bootstrap.min.js");?>"></script>
    <script src="<?php echo js_url("maintain_menu/tree.js");?>"></script>
    <script src="<?php echo js_url("maintain_menu/maintain_menu.js");?>"></script>

</head>

<body>

<div class="tree" style="-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);float:left">
    <ul >
        <li>
            <span onclick="load_folder('0')"><i class="icon-th"></i> 選單維護 </span>  <a href="#"><i class="icon-plus"></i></a>
            <ul>
                <?php echo $menu?>
            </ul>
        </li>
    </ul>
</div>
<!-- /#wrapper -->

<div style="width:60%;float:left;margin-left:30px ">
    <div class='panel panel-primary dialog-panel' style="-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
        <div class='panel-heading'>
            <h5> 目錄維護 </h5>
        </div>
        <div class='panel-body'>
            <form class='form-horizontal' role='form'>
                <div class='form-group'>
                    <label class='control-label col-xs-6 .col-md-6 col-md-offset-2' for='folder_name'>名 稱</label>
                    <div class='col-md-5'>
                        <input class='form-control' id='folder_name' placeholder='資料夾名稱' type='text'>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-xs-6 .col-md-6 col-md-offset-2' for='folder_sequence'>排 序</label>
                    <div class='col-md-5'>
                        <input class='form-control' id='folder_sequence' type='text' onkeyup="value=value.replace(/[^-_0-9]/g,'')">
                    </div>
                </div>

                <div class='form-group'>
                    <div class='control-label col-xs-6 .col-md-6 col-md-offset-3'>
                        <button class='btn-lg btn-primary' >送出</button>
                    </div>
                    <div class='control-label col-xs-6 .col-md-6 col-md-offset-2'>
                        <button class='btn-lg btn-danger' style='float:right' >取消</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>
