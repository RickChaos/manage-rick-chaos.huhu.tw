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
    <!-- jQuery -->
    <link href="<?php echo css_url("bootstrap.min.css");?>" rel="stylesheet">
    <script src="<?php echo js_url("jquery2.0.2.js"); ?>"></script>
    <script src="<?php echo js_url("bootstrap.min.js"); ?>"></script>
    <script>
        <?php if(isset($response)){
                if($response=="修改成功"){ ?>
                    alert('修改成功!');
                    window.location.href = "<?php echo base_url("content/member_mdy/")?>";
        <?php }else if($response=="修改失敗"){?>
                    alert('修改失敗，請重新嘗試!');
        <?php }else if($response=="刪除成功"){?>
                    alert('刪除成功!');
                    window.location.href = "<?php echo base_url("content/member_mdy/")?>";
        <?php }else if($response=="刪除失敗"){?>
                    alert('刪除失敗!');
        <?php }else if($response=="新增成功"){?>
                    alert('新增成功!');
                    window.location.href = "<?php echo base_url("content/member_mdy/")?>";
        <?php }else if($response=="帳號重複"){?>
                    alert('帳號重複，請重新輸入!');
        <?php }}?>
    </script>
    <script>
        $(document).ready(function(){
        });
        function userSelectchecked(){
            var userSelectchecked = $('input[name="userSelect[]"]:checked').length;
            if(userSelectchecked > 0){
                document.getElementById("delete").type = 'submit';
                document.member_form.submit();
            }else{
                alert("您沒有選擇任何選項!");
            }
        }
    </script>
    <style>
        .div-block{
            padding-left: 30px;
        }
    </style>
</head>
<body>
<div style="width:100%;padding:20px">
    <h2>員工帳號維護功能</h2>
    <?php
    echo form_open('content/member_search','id="save" name="member_form"');
    ?>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <button type="button" class="btn btn-lg btn-success" onclick="location.href='<?php echo base_url('content/member_add')?>'" >新增</button>
            <button type="button" name="delete" id="delete" class="btn btn-lg btn-danger" value="刪除" onclick="javascript:userSelectchecked()">刪除</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            員工帳號:
            <input class="form-control" name="keyword" placeholder="依帳號查詢" style="width:30%;margin-top:10px;display: initial;" value="<?php echo isset($Keyword)?$Keyword:'' ?>">
            <button type="submit" name="search" id="send" class="btn btn-info" value="搜尋" onclick="javascript:document.member_form.submit();">搜尋</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead style="white-space:nowrap;">
                    <tr>
                        <th></th>
                        <th class="col-md-1">員工帳號</th>
                        <th class="col-md-1">員工密碼</th>
                        <th class="col-md-1">員工姓名</th>
                        <th class="col-md-1">員工家電</th>
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
                            <td><input type="checkbox" name="userSelect[]" value="<?php echo xss_clean($user["User_Id"])?>"></td>
                            <td><a href="<?php echo base_url("content/member_all_mdy/")?>/<?php echo xss_clean($user["User_Id"])?>" class="btn btn-default"><?php echo $user["User_Id"]?></td>
                            <td><a href="<?php echo base_url("content/member_password_mdy/")?>/<?php echo xss_clean($user["User_Id"])?>" class="btn btn-md btn-danger">密碼修改</a></td>
                            <td><?php echo xss_clean($user["User_Name"])?></td>
                            <td><?php echo xss_clean($user["Tel"])?></td>
                            <td><?php echo xss_clean($user["Address"])?></td>
                            <td><?php echo xss_clean($user["Email"])?></td>
                            <td><?php echo xss_clean($user["Phone"])?></td>
                            <td><?php echo xss_clean($user["Birthday"])?></td>
                            <td><?php echo xss_clean($user["Unit"])?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
</body>
</html>
