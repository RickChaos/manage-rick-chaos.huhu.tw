
<!--
 * Created by IntelliJ IDEA.
 * User: Rick
 * Date: 2015/11/10
 * Time: 下午 11:18
 */ -->
<html>
<head>
    <script src="<?php echo js_url("ckeditor/ckeditor.js"); ?>"></script>
</head>
<body>
         <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
         <script>
             // Replace the <textarea id="editor1"> with a CKEditor
             // instance, using default configuration.
             CKEDITOR.replace( 'editor1' );
         </script>
</body>
</html>
