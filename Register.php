
<form action= "main.php" enctype="multipart/form-data" method="post">
    Enter Username:  <input type="text" name = "username">
    Enter Password:   <input type="password" name = "password" >
    <input type="hidden" name="upload" value="1"/>
    <input type="submit" value="Send">
</form>


<?php


echo "User Authentication";

$db = new pdo('mysql:host=173.194.240.255:3306;dbname=g1',
    'venkat',
    'Newuser@123'
);

$user=$_POST['username'];
$pass=$_POST['password'];

$stmt=$db->prepare("select username, password from Register where username='$user' and password='$pass'");

$stmt->execute();
$row = $stmt->fetch();

if($row>0)
{

   //  header("Location: main.php");
    echo '<meta http-equiv="refresh" content="0; URL=http://ordinal-gear-93506.appspot.com/main.php">';
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