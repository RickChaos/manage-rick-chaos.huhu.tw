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
</head>
<body>
<?php
    $user = array();
    foreach($user_id as $row){
        array_push($user,$row);
    }
    $userid = $user[0];
?>
<?php
echo form_open('content/member_all_save','id="save"');
?>
<div class="container-fluid" style="width:100%;padding:20px">
    <div class="row">
        <div class="col-lg-5 col-md-5">
            <h2>個人資料修改</h2>
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
                            <td><input type="hidden" class="form-control" name="user_id" value="<?php echo $all_user[0]['User_Id']?>"/><?php echo $all_user[0]['User_Id'] ?></td>
                        </tr>
                        <tr>
                            <td>單位:</td>
                            <td><?php echo $all_user[0]['User_Title'] ?></td>
                        </tr>
                        <tr>
                            <td>姓名:</td>
                            <td><input type="text" class="form-control" name="user_name" value="<?php echo $all_user[0]['User_Name']  ?>"/> </td>
                        </tr>
                        <tr>
                            <td>生日:</td>
                            <td><input size="20" type="text" class="form-control" name="birthday" value="<?php echo $all_user[0]['Birthday'] ?>"  id="date" readonly="readonly" style="width:80%;margin-top:10px;display: initial;" /></td>
                        </tr>
                        <tr>
                            <td>部門:</td>
                            <td><input type="text" class="form-control" name="unit" value="<?php echo $all_user[0]['Unit'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>家電:</td>
                            <td><input type="text" class="form-control" name="tel" value="<?php echo $all_user[0]['Tel'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>手機:</td>
                            <td><input type="text" class="form-control" name="phone" value="<?php echo $all_user[0]['Phone'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" class="form-control" name="email" value="<?php echo  $all_user[0]['Email'] ?>"/></td>
                        </tr>
                        <tr>
                            <td>地址:</td>
                            <td><input type="text" class="form-control" name="address" value="<?php echo $all_user[0]['Address'] ?>"/></td>
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
