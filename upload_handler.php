



<?php

// $var1 =(new \ DateTime())->format('i:s');
$var1 = microtime(true);
// print "Welcome";
$var6= $_FILES['uploaded_files']['size'];


$thisfile = $_FILES['uploaded_files']['tmp_name'];
$thatfile =  $_FILES['uploaded_files']['name'];

// echo $var6;

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP","CSV");


    require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
    use \google\appengine\api\mail\Message;
    use google\appengine\api\cloud_storage\CloudStorageTools;
$temp = explode(".", $thatfile);
$ext = end($temp);


if(in_array($ext,$valid_formats)) {


    if ($var6 < 200000) {
        echo "fil size is ";
        echo $var6;
        $fileName = 'gs://venkat123/' . $_FILES['uploaded_files']['name'];
// echo $fileName."<br>";
        $options = array('gs' => array('acl' => 'public-read', 'Content-Type' => $_FILES['uploaded_files']['type']));
        $ctx = stream_context_create($options);
        if (false == rename($_FILES['uploaded_files']['tmp_name'], $fileName, $ctx)) {
            die('Could not rename.');
        }
// $var2 =(new \ DateTime())->format('i:s');


        $object_public_url = CloudStorageTools::getPublicUrl($fileName, true);
        $var1 = date("Y-m-d H:i:s");

        $var2 = microtime(true);

        $var3 = $var2 - $var1;
        //   echo $var3;
// echo $object_public_url."<br>";


        //  print $thisfile;
        // print $thatfile;

        // var_dump($_FILES);
        $db = new pdo('mysql:unix_socket=/cloudsql/ordinal-gear-93506:testdb;dbname=g1',
            'root',  // username
            ''       // password
        );
        $stmt1 = $db->prepare("select * from another where filename='$thatfile'");
        $stmt1->execute();
        $row = $stmt1->fetch();
        if ($row > 0) {
            echo "duplicate entry";
// $db->exec("insert into users values('8975','200')");

        } else {

            $db->exec("insert into another values('','$thatfile','$var6','$object_public_url','$var1')");
            //  $db->exec("insert into finaltest values('','$thatfile','filesize($thisfile)','$object_public_url','$var3')");
            $stmt = $db->prepare("select * from another ORDER BY filesize;");
            $stmt->execute();


            echo "<table border='2'>";


            echo '<tr>';
            echo '<th>ID:</th>';
            echo '<th>FileName:</th>';
            echo '<th>FileSize:</th>';
            echo '<th>FileURL:</th>';
            echo '<th>Tie Taken to upload:</th>';


            echo '</tr>';

            while ($row = $stmt->fetch()) {
                $id = $row['id'];
                $filename = $row['filename'];
                $filesize = $row['filesize'];
                $fileurl1 = $row['fileurl'];
                $timediff = $row['timediff'];

                echo '<tr>';
                echo '<td>' . $id . '</td>';
                echo '<td>' . $filename . '</td>';
                echo '<td>' . $filesize . '</td>';
                echo '<td>';

                echo "<img src='" . $fileurl1 . "'></img>";

                echo '</td>';


                echo '<td>' . $timediff . '</td>';


                echo '</tr>';

                // echo '<tr><td><b>id:</b>' . $id . "<br/><b>Filename:</b>" . $filename . '</td>';

            }

            echo '</table>';


        }

    } else
        echo "file sizze exceeds";


}
else
echo "not a Image file";


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


