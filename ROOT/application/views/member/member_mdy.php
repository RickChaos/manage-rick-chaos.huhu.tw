<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ketaifeng
 * Date: 2015/10/29
 * Time:
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
        <?php if(isset($rtnmdy)){
                if($rtnmdy=="修改成功!"){ ?>
        alert('<?php echo $rtnmdy ?>');
        <?php }else if($rtnmdy=="修改失敗!"){?>
        alert('<?php echo $rtnmdy+"請連絡管理員!" ?>');
        <?php }?>
        <?php }?>
    </script>
    <style>
        .div-block{
            padding-left: 30px;
        }
    </style>
</head>
<body>
<div style="width:100%;padding:50px">
    <?php
    echo form_open('content/member_search','id="save" name="member_form"');
    ?>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            員工姓名:
            <select id="User_Name_Select" name="User_Name_Select">
                <option value="全部">----全部----</option>
                <?php
                for($i=0;$i< count($all_user);$i++) {
                $user_select = $all_user[$i];
                ?>
                <option value="<?php echo $user_select["User_Name"]?>"><?php echo $user_select["User_Name"]?></option>
                <?php }?>
            </select>
            <button id="send" type="button" class="btn btn-info" onclick="javascript:document.member_form.submit();">搜尋</button>
        </div>
    </div>
    <?php echo form_close(); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h2>員工帳號維護功能</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead style="white-space:nowrap;">
                    <tr>
                        <th class="col-md-1">員工帳號</th>
                        <th class="col-md-1">員工密碼</th>
                        <th class="col-md-1">員工姓名</th>
                        <th class="col-md-1">員工家裡電話</th>
                        <th class="col-md-2">員工住址</th>
                        <th class="col-md-1">員工電子郵件</th>
                        <th class="col-md-1">員工手機</th>
                        <th class="col-md-1">員工生日</th>
                        <th class="col-md-1">員工部門</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        for($i=0;$i< count($all_user);$i++) {
                        $user = $all_user[$i];
                        ?>
                        <tr>
                            <td><a href="<?php echo base_url("content/member_all_mdy/")?>/<?php echo xss_clean($user["User_Id"])?>" class="btn btn-default"><?php echo $user["User_Id"]?></td>
                            <td><a href="<?php echo base_url("content/member_password_mdy/")?>/<?php echo xss_clean($user["User_Id"])?>" class="btn btn-md btn-danger">密碼修改</a></td>
                            <td><?php echo $user["User_Name"]?></td>
                            <td><?php echo $user["Tel"]?></td>
                            <td><?php echo $user["Address"]?></td>
                            <td><?php echo $user["Email"]?></td>
                            <td><?php echo $user["Phone"]?></td>
                            <td><?php echo $user["Birthday"]?></td>
                            <td><?php echo $user["Unit"]?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
