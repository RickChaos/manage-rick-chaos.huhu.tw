<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ketaifeng
 * Date: 2015/11/5
 * Time: 上午 01:58
 */
?>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>員工帳號維護功能</title>
    <!-- Bootstrap Core Css -->
    <!-- jQuery -->
    <link href="<?php echo css_url("bootstrap.min.css");?>" rel="stylesheet">
    <script src="<?php echo js_url("bootstrap.min.js"); ?>"></script>
    <!-- 月曆套件 -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js" ></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" ></script>
    <script src="<?php echo js_url("jquery-ui-i18n.js");?>" charset = "utf-8"></script>
    <script type="text/javascript">
        $().ready(function(){
            $( "#date" ).datepicker({
                dateFormat: 'yy-mm-dd',
                showOn: "button",
                buttonImage: "<?php echo img_url("icon-calendar.gif");?>",
                buttonImageOnly: true,
                changeYear: true
            });
        });
    </script>
    <script>
    <?php if(isset($response)){?>
        <?php if($response=="帳號為空"){?>
            alert('帳號為空，請重新輸入!');
        <?php }else if($response=="帳號重複"){?>
            alert('帳號重複，請重新輸入!');
    <?php }}?>
    </script>
</head>
<body>
<?php
echo form_open('content/member_add_save','id="save"');
?>
<div class="container-fluid" style="width:100%;padding:20px">
    <div class="row">
        <div class="col-lg-5 col-md-5">
            <h2>個人資料新增</h2>
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
                        <td><input type="text" class="form-control" name="user_id" value=""/></td>
                    </tr>
                    <tr>
                        <td>密碼:</td>
                        <td><input type="text" class="form-control" name="user_password" value=""/></td>
                    </tr>
                    <tr>
                        <td>姓名:</td>
                        <td><input type="text" class="form-control" name="user_name" value=""/> </td>
                    </tr>
                    <tr>
                        <td>生日:</td>
                        <td><input size="20" type="text" class="form-control" name="birthday" value=""  id="date" readonly="readonly" style="width:80%;margin-top:10px;display: initial;" /></td>
                    </tr>
                    <tr>
                        <td>單位:</td>
                        <td><input type="text" class="form-control" name="user_title" value=""/></td>
                    </tr>
                    <tr>
                        <td>部門:</td>
                        <td><input type="text" class="form-control" name="unit" value=""/></td>
                    </tr>
                    <tr>
                        <td>家電:</td>
                        <td><input type="text" class="form-control" name="tel" value=""/></td>
                    </tr>
                    <tr>
                        <td>手機:</td>
                        <td><input type="text" class="form-control" name="phone" value=""/></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" class="form-control" name="email" value=""/></td>
                    </tr>
                    <tr>
                        <td>地址:</td>
                        <td><input type="text" class="form-control" name="address" value=""/></td>
                    </tr>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <button type="submit" class="btn btn-lg btn-success" name="save" value="儲存" >儲存</button>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
</body>
</html>
