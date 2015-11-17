
<!--
 * Created by IntelliJ IDEA.
 * User: Rick
 * Date: 2015/11/10
 * Time: 下午 11:18
 */ -->
<html>
<head>
    <script src="<?php echo js_url("ckeditor/ckeditor.js"); ?>"></script>
    <script src="<?php echo js_url("ckfinder/ckfinder.js"); ?>"></script>
</head>
<body>
         <textarea name="editor1" id="content" rows="10" cols="80"></textarea>
         <script>
             var editor =CKEDITOR.replace( 'content' );
             CKFinder.setupCKEditor( editor );
         </script>
</body>
</html>
