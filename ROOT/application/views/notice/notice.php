<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>
    <script src="<?php echo js_url("authority_menu/authority.js"); ?>"></script>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo css_url("bootstrap.min.css");?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo css_url("manage_template/sb-admin.css");?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo css_url("manage_template/font-awesome/css/font-awesome.min.css");?>" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <link href="<?php echo css_url("manage_template/plugins/morris.css");?>" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script>
        <?php if(isset($rtndel)){ ?>
                    alert('<?php echo $rtndel ?>');
        <?php }?>
        function mdy(mdyid,mdyClassid,mdySubject,mdyComplete){
            document.notice_form.MdyId.value=mdyid;
            document.notice_form.MdyClassId.value=mdyClassid;
            document.notice_form.MdySubject.value=mdySubject;
            document.notice_form.MdyComplete.value=mdyComplete;
            document.notice_form.action="<?php echo base_url('content/notice_mdy') ?>";
            document.notice_form.method="post";
            document.notice_form.submit();
        }
    </script>
    <script type="text/javascript">

    </script>
</head>

<body style="background-color:white">



<?php
        $attributes = array('class' => 'form col-md-12 center-block', 'name' => 'notice_form');
        echo form_open('content/notice', $attributes);
        ?>
            <input type="hidden" name="MdyId" />
            <input type="hidden" name="MdyClassId" />
            <input type="hidden" name="MdySubject" />
            <input type="hidden" name="MdyComplete" />
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <button type="button" class="btn btn-lg btn-success" onclick="location.href='<?php echo base_url('content/notice_add')?>'" >新增</button>
                        <button type="submit" name="delete" class="btn btn-lg btn-danger" value="刪除" onclick="javascript:document.notice_form.submit();">刪除</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <input class="form-control" name="keyword" placeholder="依標題查詢" style="width:30%;margin-top:10px;display: initial;" value="<?php echo isset($Keyword)=='1'?$Keyword:'' ?>">
                        &#9;承接者:
                        <select name="classId_Select">
                            <option value="0" <?php echo isset($NoticeClass)=='1'&& $NoticeClass=='0' ?'selected':'' ?>>---請選擇---</option>
                            <?php for($i = 0 ; $i < count($NoticeClass) ; $i++){?>
                            <option value="<?php echo $NoticeClass[$i]['Class_Id'] ?>" <?php echo isset($Class_Id_Select)=='1' && $Class_Id_Select==$NoticeClass[$i]['Class_Id'] ?'selected':'' ?>>
                                <?php echo $NoticeClass[$i]['Subject'] ?>
                            </option>
                            <?php }?>
                        </select>
                        &#9;狀態:
                        <select name="complete_Select">
                            <option value="0" <?php echo isset($Complete_Select)=='1'&& $Complete_Select=='0' ?'selected':'' ?>>---請選擇---</option>
                            <option value="Y" <?php echo isset($Complete_Select)=='1'&& $Complete_Select=='Y' ?'selected':'' ?>>完成</option>
                            <option value="N" <?php echo isset($Complete_Select)=='1'&& $Complete_Select=='N' ?'selected':'' ?>>未完成</option>
                        </select>
                        &#9;　
                        <button type="submit" name="search" class="btn btn-info" value="搜尋" onclick="document.notice_form.submit();" >搜尋</button>
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
                                <td><?php echo $NoticeData[$i]['User'] ?></td>
                                <td><a href="javascript:mdy('<?php echo $NoticeData[$i]['Id'] ?>','<?php echo $NoticeData[$i]['Class_Id'] ?>','<?php echo $NoticeData[$i]['Subject'] ?>','<?php echo $NoticeData[$i]['Complete'] ?>')"><?php echo $NoticeData[$i]['Subject'] ?></a></td>
                                <td><?php echo substr($NoticeData[$i]['PostTime'],0,10) ?></td>
                                <td><?php echo $NoticeData[$i]['FinishTime']==''?'-':substr($NoticeData[$i]['FinishTime'],0,10) ?></td>
                                <td><?php echo $NoticeData[$i]['Complete']=='N'?'未完成':'完成' ?></td>

                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>


                </div>
                </div>
                <?php echo $this->pagination->create_links(); ?>
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
