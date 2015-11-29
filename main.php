<?

require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;

$options = [ 'gs_bucket_name' => 'venkat123' ];
$upload_url = CloudStorageTools::createUploadUrl('/upload_handler.php', $options);



?>


<html>
<head>
    <style>
        html {
            background-color: #888888;
        }

        fieldset {
            background-color: #505050;
            color: white;
        }

        a {
            color: #F00000;
        }

        form {
            position: fixed;
            /*width: 500px;*/
            clear: both;
            top: 30%;
            left: 45%;
            margin-top: -9em; /*set to a negative number 1/2 of your height*/
            margin-left: -15em; /*set to a negative number 1/2 of your width*/
        }

        table {
            position: fixed;
            top: 60%;
            left: 45%;
            margin-top: -9em; /*set to a negative number 1/2 of your height*/
            margin-left: -15em; /*set to a negative number 1/2 of your width*/

        }

        input {
            width: 100%;
            clear: both;
        }
    </style>
    <body>

    <form action="<?php echo $upload_url?>" enctype="multipart/form-data" method="post">
    Files to upload: <br>
    <input type="file" name="uploaded_files" size="40">
    <input type="hidden" name="upload" value="1"/>
    <input type="submit" value="Send">
</form>
</body>
</head>

</html>

