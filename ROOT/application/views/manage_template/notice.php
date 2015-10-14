<!DOCTYPE html>
<html lang="en">

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
        <?php if(isset($rtndel)){ ?>
                    alert('<?php echo $rtndel ?>');
        <?php }?>
        function mdy(mdyid){
            document.notice_form.mdyId.value=mdyid;
            document.notice_form.action="<?php echo base_url('manage_template/notice_mdy') ?>";
            document.notice_form.method="post";
            document.notice_form.submit();
        }
    </script>
</head>

<body style="background-color:white">

        <?php
        $attributes = array('class' => 'form col-md-12 center-block', 'name' => 'notice_form');
        echo form_open('content/notice', $attributes);
        ?>
            <input type="hidden" name="mdyId" />
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <button type="button" class="btn btn-lg btn-success" onclick="location.href='<?php echo base_url('content/notice_add')?>'" >新增</button>
                        <button type="submit" class="btn btn-lg btn-danger" onclick="javascript:document.getElementById('notice_form').submit();;">刪除</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                    <h2>待辦事項維護</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr><th></th>
                                <th>筆數</th>
                                <th>承接者</th>
                                <th>標題</th>
                                <th>發布日期</th>
                                <th>完成日期</th>
                                <th>狀態</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for($i=0;$i< count($NoticeData);$i++){?>
                            <tr>
                                <td><input type="checkbox" name="noticeSelect[]" value="<?php echo $NoticeData[$i]['Id'] ?>"> </td>
                                <td><?php echo $i+1 ?></td>
                                <td><?php echo $NoticeData[$i]['Class_Id']==''?'-':$NoticeData[$i]['Class_Id'] ?></td>
                                <td><a href="javascript:mdy('<?php echo $NoticeData[$i]['Id'] ?>')"><?php echo $NoticeData[$i]['Subject'] ?></a></td>
                                <td><?php echo substr($NoticeData[$i]['PostTime'],0,10) ?></td>
                                <td><?php echo $NoticeData[$i]['FinishTime']==''?'-':$NoticeData[$i]['FinishTime'] ?></td>
                                <td><?php echo $NoticeData[$i]['Complete']=='N'?'未完成':'完成' ?></td>

                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>


                </div>
                </div>

            </div>
        <?php echo form_close(); ?>



   <!-- jQuery -->
   <script src="<?php echo js_url("manage_template/jquery.js");?>"></script>
   <!-- Bootstrap Core JavaScript -->
   <script src="<?php echo js_url("manage_template/bootstrap.min.js");?>"></script>
    <script>

    </script>

</body>

</html>
