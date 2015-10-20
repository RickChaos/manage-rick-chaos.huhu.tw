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
    <link href="<?php echo css_url("maintain_menu/tree.css"); ?>" rel="stylesheet">
    <link href="<?php echo css_url("maintain_menu/form.css"); ?>" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo js_url("jquery2.0.2.js"); ?>"></script>
    <script src="<?php echo js_url("bootstrap.min.js"); ?>"></script>
    <script src="<?php echo js_url("maintain_menu/tree.js"); ?>"></script>
    <script src="<?php echo js_url("maintain_menu/maintain_menu.js"); ?>"></script>

</head>

<body>

<div class="tree" style="-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);float:left">
    <ul>
        <li>
            <span onclick="root_folder()"><i class="icon-th"></i> 選單維護 </span> <a href="#"><i class="icon-plus"></i></a>
            <ul>
                <?php echo $menu ?>
            </ul>
        </li>
    </ul>
</div>
<!-- /#wrapper -->
<div style="width:60%;float:left;margin-left:30px;display: none" id="folder_block">
    <div class='panel panel-primary dialog-panel' style="-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
        <div class='panel-heading'>
            <h5> <div id="folder_title">目錄維護</div> </h5>
        </div>
        <div class='panel-body'>
            <form class='form-horizontal' role='form' id="folder_form" name="folder_form">
                <input type="hidden" id="folder_id" name="folder_id" >
                <input type="hidden" id="folder_parent_id" name="folder_parent_id" >
                <input type="hidden" id="folder_method" name="folder_method" >
                <div class='form-group' id="folder_top_button">
                    <div style="float:left;padding-top: 5px;margin-left:20px" id="add_folder_button">
                        <input type="button" class='btn-sm btn-warning' style='float:right' onclick="add_new_folder()" value="新增資料夾" >
                    </div>
                    <div style="float:left;padding-top: 5px;margin-left:20px">
                        <input type="button" class='btn-sm btn-warning' style='float:right' onclick="add_new_function()" value="新增功能">
                    </div>
                    <div style="float:left;padding-top: 5px;margin-left:20px" id="del_folder_button">
                        <input type="button" class='btn-sm btn-danger' style='float:right' onclick="delete_folder_node()" value="刪除該資料夾">
                    </div>
                </div>
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

                <div class='form-group' id="folder_bottom_button">
                    <div class='control-label col-xs-6 .col-md-6 col-md-offset-3'>
                        <input type="button" class='btn-lg btn-primary' style='float:right' value="儲存" onclick="folder_save()">
                    </div>
                    <div class='control-label col-xs-6 .col-md-6 col-md-offset-2'>
                        <input type="button" class='btn-lg btn-danger' style='float:right'
                               onclick="document.folder_form.reset()" value="取消">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div style="width:60%;float:left;margin-left:30px;display: none" id="function_block">
    <div class='panel panel-primary dialog-panel' style="-webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
        <div class='panel-heading'>
            <h5> <div id="function_title">功能維護</div> </h5>
        </div>
        <div class='panel-body'>
            <form class='form-horizontal' role='form' id="folder_form" name="function_form">
                <input type="hidden" id="function_id" name="function_id" >
                <input type="hidden" id="function_parent_id" name="function_parent_id" >
                <input type="hidden" id="function_method" name="function_method" >
                <div class='form-group' id="function_top_button">
                    <div style="float:left;padding-top: 5px;margin-left:20px" id="del_folder_button">
                        <input type="button" class='btn-sm btn-danger' style='float:right' onclick="delete_function_node()" value="刪除該功能">
                    </div>
                </div>
                <div class='form-group'>
                    <label class='control-label col-xs-6 .col-md-6 col-md-offset-2' for='function_name'>名 稱</label>
                    <div class='col-md-5'>
                        <input class='form-control' id='function_name' placeholder='功能名稱' type='text'>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-xs-6 .col-md-6 col-md-offset-2' for='function_url'>功能連結</label>
                    <div class='col-md-5'>
                        <input class='form-control' id='function_url' placeholder='功能連結' type='text'>
                    </div>
                </div>

                <div class='form-group'>
                    <label class='control-label col-xs-6 .col-md-6 col-md-offset-2' for='function_sequence'>排 序</label>
                    <div class='col-md-5'>
                        <input class='form-control' id='function_sequence' type='text'onkeyup="value=value.replace(/[^-_0-9]/g,'')">
                    </div>
                </div>

                <div class='form-group'>
                    <div class='control-label col-xs-6 .col-md-6 col-md-offset-3'>
                        <input type="button" class='btn-lg btn-primary' style='float:right' value="儲存" onclick="function_save()">
                    </div>
                    <div class='control-label col-xs-6 .col-md-6 col-md-offset-2'>
                        <input type="button" class='btn-lg btn-danger' style='float:right' onclick="document.function_form.reset()" value="取消">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
