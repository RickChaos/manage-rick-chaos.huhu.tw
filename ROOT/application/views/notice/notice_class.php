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
        function mdy(mdyClassid,mdySubject){
            document.notice_form.MdyClassId.value=mdyClassid;
            document.notice_form.MdySubject.value=mdySubject;
            document.notice_form.action="<?php echo base_url('content/notice_class_mdy') ?>";
            document.notice_form.method="post";
            document.notice_form.submit();
        }
    </script>
</head>

<body style="background-color:white">

        <?php
        $attributes = array('class' => 'form col-md-12 center-block', 'name' => 'notice_form');
        echo form_open('content/notice_class', $attributes);
        ?>
            <input type="hidden" name="MdyClassId" />
            <input type="hidden" name="MdySubject" />
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <button type="button" class="btn btn-lg btn-success" onclick="location.href='<?php echo base_url('content/notice_class_add')?>'" >新增</button>
                        <button type="submit" name="delete" value="刪除"  class="btn btn-lg btn-danger" onclick="javascript:document.notice_form.submit();">刪除</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <input class="form-control" name="keyword" placeholder="依名稱查詢" style="width:30%;margin-top:10px;display: initial;" value="<?php echo isset($Keyword)=='1'?$Keyword:'' ?>">
                        &#9;名稱:
                        <select name="classId_Select">
                            <option value="0" <?php echo isset($NoticeClass)=='1'&& $NoticeClass=='0' ?'selected':'' ?>>---請選擇---</option>
                            <?php for($i = 0 ; $i < count($NoticeClassList) ; $i++){?>
                                <option value="<?php echo $NoticeClassList[$i]['Class_Id'] ?>" <?php echo isset($Class_Id_Select)=='1' && $Class_Id_Select==$NoticeClassList[$i]['Class_Id'] ?'selected':'' ?>>
                                    <?php echo $NoticeClassList[$i]['Subject'] ?>
                                </option>
                            <?php }?>
                        </select>
                        <button type="submit" name="search" class="btn btn-info" value="搜尋" onclick="document.notice_form.submit();" >搜尋</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    <h2>佈告欄類別維護</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr><th></th>
                                <th>筆數</th>
                                <th>名稱</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for($i=0;$i< count($NoticeClass);$i++){?>
                            <tr>
                                <td><input type="checkbox" name="classSelect[]" value="<?php echo $NoticeClass[$i]['Class_Id'] ?>"> </td>
                                <td><?php echo $i+1 ?></td>
                                <td><a href="javascript:mdy('<?php echo $NoticeClass[$i]['Class_Id']?>','<?php echo $NoticeClass[$i]['Subject']?>')"><?php echo $NoticeClass[$i]['Subject'] ?></td>
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
