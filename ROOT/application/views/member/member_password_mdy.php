<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ketaifeng
 * Date: 2015/11/4
 * Time: 下午 05:10
 */
?>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>員工帳號維護功能</title>
    <!-- Bootstrap Core Css -->
    <link href="<?php echo css_url("bootstrap.min.css");?>" rel="stylesheet">
    <script src="<?php echo js_url("jquery2.0.2.js");?>"></script>
    <script src="<?php echo js_url("authority_menu/authority.js");?>"></script>
    <!-- jQuery -->
    <script src="<?php echo js_url("jquery2.0.2.js"); ?>"></script>
    <script src="<?php echo js_url("bootstrap.min.js"); ?>"></script>
    <script src="<?php echo js_url("authority_menu/authority_tree.js"); ?>"></script>
    <script src="<?php echo js_url("authority_menu/authority_menu_setting.js"); ?>"></script>
    <script>
        <?php if(isset($rtnmdy)){ ?>
            alert('<?php echo $rtnmdy ?>');
            <?php if($rtnmdy=="修改成功!請重新登入!"){
                    $this->session->set_userdata('user_sessionid', '');
            ?>
                parent.parent.window.location.replace("<?php echo base_url("login")?>");
            <?php }else if($rtnmdy=="修改失敗"){
                    $userid = $user_id;
                  }?>
        <?php }else{
                 $user = array();
                  foreach($user_id as $row){
                    array_push($user,$row);
                  }
                  $userid = $user[0];
              }?>
    </script>
    <script>
        $(document).ready(function(){
            $("#send").click(function(){
                var mdy_password = document.getElementById("mdy_password").value;
                var mdy_password_check = document.getElementById("mdy_password_check").value;
                if(mdy_password != mdy_password_check)
                {
                    alert("新密碼輸入不相同，請重新輸入!");
                    document.getElementById("mdy_password").value = "";
                    document.getElementById("mdy_password_check").value = "";
                    document.getElementById("mdy_password").focus();
                    return;
                }else{
                    document.getElementById("send").type = 'submit';
                }
            });

        });
    </script>
</head>
<body>
<?php
echo form_open('content/member_password_save','id="save"');
?>
<div class="container-fluid" style="width:100%;padding:50px">
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
                        <td><input type="hidden" class="form-control" name="user_id" value="<?php echo $userid?>"/><?php echo $userid?></td>
                    </tr>
                    <tr>
                        <td>新密碼:</td>
                        <td><input id="mdy_password" type="password" class="form-control" name="mdy_password" value=""/></td>
                    </tr>
                    <tr>
                        <td>新密碼確認:</td>
                        <td><input id="mdy_password_check" type="password" class="form-control" name="mdy_password_check" value=""/></td>
                    </tr>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <button id="send" type="button" class="btn btn-lg btn-warning" name="send" value="送出" >送出</button>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
</body>
</html>