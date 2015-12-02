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
    <script src="<?php echo js_url("public_program/message.js"); ?>"></script>
    <script>
        <?php if(isset($rtn_message)){ ?>
        alert('<?php echo $rtn_message ?>');
        <?php }?>
    </script>
</head>

<body>

<div style="width:100%;padding:50px">
    <?php
    $attributes = array('class' => 'form col-md-12 center-block', 'name' => 'classes_form', 'id'=>'classes_form','method' => 'get');
    echo form_open('classes/index', $attributes);
    ?>
    <div class="row">
        <h2>分類維護</h2>
    </div>
    <div class="row">
        <div class="progress" style="height:5px">
            <div class="progress-bar" style="width: 100%;background-color: #AB7878;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <input type="hidden" name="table_name" value="<?php echo $table_name ?>">
            <input class="form-control" name="keyword" placeholder="依分類名稱查詢"
                   value="<?php if ($subject != null) echo $subject ?>"
                   style="width:30%;margin-top:10px;display: initial;">
            <button type="button" class="btn btn-info" onclick="javascript:document.classes_form.submit()">搜尋</button>
        </div>
    </div>
    <div class="row"></br>
        <div class="col-lg-6 col-md-6">
            <button type="button" class="btn btn-sm btn-success"
                    onclick="location.href='<?php echo base_url('classes/add') ?>?table_name=<?php echo $table_name ?>'">
                新增
            </button>
            <button type="submit" value="刪除" class="btn btn-sm btn-danger" id="del">刪除</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-1"></th>
                        <th class="col-md-1">項次</th>
                        <th class="col-md-6">分類名稱</th>
                        <th class="col-md-2">建立日期</th>
                        <th class="col-md-2">更新日期</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    foreach ($classes as $class) {
                        $tr_style = "";
                        if ($i % 2 != 0) {
                            $tr_style = "style=\"background-color: #BBBABA\"";
                        }
                        ?>
                        <tr <?php echo $tr_style ?>>
                            <td><input type="checkbox" value="<?php echo xss_clean($class->Id) ?>" name="del_id[]"</td>
                            <td><?php echo $i + 1 ?></td>
                            <td>
                                <a href="<?php echo base_url("classes/mdy") ?>?table_name=<?php echo $table_name ?>&id=<?php echo $class->Id?>"><?php echo xss_clean($class->Subject) ?>
                            </td>
                            <td><?php echo xss_clean($class->CreateDate) ?></td>
                            <td><?php echo xss_clean($class->UpdateDate) ?></td>
                        </tr>
                        <?php $i++;} ?>
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
