<?php
/**
 * Created by PhpStorm.
 * User: Venkat
 * Date: 5/6/2015
 * Time: 8:14 PM
 */

if(isset($_POST['deleted']))

{
    $var10 = $_POST['delete_files'];

    echo  $var10;
    unlink("gs://venkat123/.$var10");
}


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
</head>

</html>
