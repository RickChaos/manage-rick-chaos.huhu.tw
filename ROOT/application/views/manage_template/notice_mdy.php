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
        <?php if(isset($rtnmdy)){ ?>
                    alert('<?php echo $rtnmdy ?>');
        <?php }?>
    </script>
</head>

<body style="background-color:white">

        <?php
        $attributes = array('class' => 'form col-md-12 center-block', 'name' => 'notice_mdy_form');
        echo form_open('content/notice_mdy', $attributes);
        ?>
            <input type="hidden" name="MdyId" value="<?php echo $MdyId ?>"/>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <button type="submit" class="btn btn-lg btn-success" onclick="javascript:document.notice_mdy_form.submit();" >儲存</button>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                    <h2>待辦事項維護</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">

                            <tbody>
                            <tr>
                                 <tr>
                                      <td>
                                          承接者:
                                      </td>
                                      <td>
                                           <select name="Class_Id">
                                               <?php for($i=0;$i< count($NoticeClass);$i++){ ?>
                                               <option value="<?php echo $NoticeClass[$i]['Class_Id'] ?>" <?php echo $MdyClassId==$NoticeClass[$i]['Class_Id']?'selected':'' ?>><?php echo $NoticeClass[$i]['Subject'] ?></option>
                                               <?php }?>
                                           </select>
                                      </td>
                                 </tr>
                                <tr>
                                    <td>
                                        標題:
                                    </td>
                                    <td>
                                        <input type="text" name="Subject" value="<?php echo $MdySubject ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        標題:
                                    </td>
                                    <td>
                                        <input type="radio" name="Complete" value="Y" <?php echo $MdyComplete=='Y'?'checked':''?> />完成
                                        <input type="radio" name="Complete" value="N" <?php echo $MdyComplete=='N'?'checked':''?> />未完成
                                    </td>
                                </tr>

                            </tr>
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
