<!DOCTYPE html>
<html >

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo css_url("bootstrap.min.css");?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo css_url("manage_template/sb-admin.css");?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo css_url("manage_template/font-awesome/css/font-awesome.min.css");?>" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <link href="<?php echo css_url("manage_template/plugins/morris.css");?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>

    </script>
    <script>
        <?php if(isset($rtnmdy)){ ?>
            alert('<?php echo $rtnmdy ?>');
            <?php if($rtnmdy=="修改成功!請重新登入!"){
                $this->session->set_userdata('user_sessionid', '');
            ?>
                parent.parent.window.location.replace("<?php echo base_url("login")?>");
            <?php }?>
        <?php }?>
    </script>
</head>

<body style="background-color:white">

<?php
$attributes = array('class' => 'form col-md-12 center-block', 'name' => 'employee_mdy_password_form');
echo form_open('content/employee_mdy_password', $attributes);
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-5 col-md-5">
            <h2>密碼修改</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>項目</th>
                            <th>內容</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <tr>
                            <td>帳號:</td>
                            <td><?php echo $User_Id?></td>
                        </tr>
                        <tr>
                            <td>密碼:</td>
                            <td><input type="password" class="form-control" name="password" value=""/></td>
                        </tr>
                        <tr>
                            <td>新密碼:</td>
                            <td><input type="password" class="form-control" name="mdy_password" value=""/></td>
                        </tr>
                        <tr>
                            <td>新密碼確認:</td>
                            <td><input type="password" class="form-control" name="mdy_password_check" value=""/></td>
                        </tr>
                    </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <button type="submit" class="btn btn-lg btn-warning" name="send" value="送出" >送出</button>

        </div>
    </div>

</div>
<?php echo form_close(); ?>



<!-- jQuery -->
<script src="<?php echo js_url("manage_template/jquery.js");?>"></script>
<!-- 月曆套件 -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js" ></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" ></script>
<script src="<?php echo js_url("jquery-ui-i18n.js");?>" charset = "utf-8"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo js_url("manage_template/bootstrap.min.js");?>"></script>
</body>

</html>
