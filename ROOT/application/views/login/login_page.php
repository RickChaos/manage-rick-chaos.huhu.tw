<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="<?php echo css_url("bootstrap.min.css");?>" rel="stylesheet">
    <link href="<?php echo css_url("styles.css");?>" rel="stylesheet">
    <script>
        function show_message(){
            <?php
                if($validate_message != null){
                    echo "alert('".$validate_message."');";
                }
            ?>
        }
        show_message();
    </script>
</head>
<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1 class="text-center">管理系統</h1>
            </div>
            <div class="modal-body">
                <?php 
					$attributes = array('class' => 'form col-md-12 center-block', 'id' => 'loginform');
					echo form_open('login/check', $attributes);
				?>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" name="user" placeholder="帳號">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg" name="password" placeholder="密碼">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block" onclick="javascript:document.getElementById('loginform').submit()">登入</button>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button class="btn" data-dismiss="modal" aria-hidden="true" onclick="javascript:document.getElementById('loginform').reset()">清除</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- script references -->
<script src="<?php echo js_url("jquery2.0.2.js");?>"></script>
<script src="<?php echo js_url("bootstrap.min.js");?>"></script>
</body>
</html>