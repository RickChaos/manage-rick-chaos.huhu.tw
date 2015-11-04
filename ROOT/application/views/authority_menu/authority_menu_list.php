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
    <script src="<?php echo js_url("jquery2.0.2.js"); ?>"></script>
    <script src="<?php echo js_url("authority_menu/authority.js"); ?>"></script>

</head>

<body>

<div style="width:100%;padding:50px">
    <?php
    $attributes = array('class' => 'form col-md-12 center-block', 'name' => 'authority_form');
    echo form_open('authority_menu/index', $attributes);
    ?>
    <?php echo form_hidden($hidden_item) ?>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <input class="form-control" name="user_name" placeholder="依姓名查詢" value="<?php if($user_name!=null) echo $user_name ?>" style="width:30%;margin-top:10px;display: initial;">
            單位:
            <select name="unit_select" id="unit_select">
                <option value="">----請選擇----</option>
            </select>
            <button type="button" class="btn btn-info" onclick="javascript:document.authority_form.submit()">搜尋</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8"">
            <h2>選單權限設定</h2>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-1">項次</th>
                        <th class="col-md-2">單位</th>
                        <th class="col-md-6">姓名</th>
                        <th class="col-md-3">職稱</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=0;$i< count($all_user);$i++){
                        $user = $all_user[$i];
                        $tr_style="";
                        if($i %2 !=0){
                            $tr_style = "style=\"background-color: #BBBABA\"";
                        }
                    ?>
                    <tr <?php echo $tr_style?>>
                        <td><?php echo $i+1?></td>
                        <td><?php echo xss_clean($user["Unit"])?></td>
                        <td><a href="<?php echo base_url("authority_menu/authority/")?>/<?php echo xss_clean($user["User_Id"])?>"><?php echo xss_clean($user["User_Name"])?></td>
                        <td><?php echo xss_clean($user["User_Title"])?></td>
                    </tr>
                <?php } ?>
                    </tbody>
                </table>
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>

    </div>
<?php echo form_close(); ?>
</div>
</body>

</html>
