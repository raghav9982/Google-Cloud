<?php
// $var1 =(new \ DateTime())->format('i:s');

$var1 = microtime(true);

echo $var1;

// echo (new \DateTime())->format('Y-m-d H:i:s');

sleep(61);

$var2 =(new \ DateTime())->format('i:s');

echo "<br/>";
echo $var2;
echo "<br/>";

$var2 = microtime(true);
echo $var2-$var1;
$var3=$var2-$var1;

$object_public_url="https://venkat123.storage.googleapis.com/NewMaxTemperature.java";
$thatfile="hbv.tct";


$db = new pdo('mysql:host=173.194.240.255:3306;dbname=g1',
    'venkat',
    'Newuser@123'
);

$stmt=$db->prepare("select * from another;");
$stmt->execute();
echo "<table border='2'>";





echo '<tr>';
echo '<th>ID:</th>';
echo '<th>FileName:</th>';
echo '<th>FileSize:</th>';
echo '<th>FileURL:</th>';
echo '<th>Tie Taken to upload:</th>';


echo '</tr>';

while($row = $stmt->fetch()) {
    $id = $row['id'];
    $filename = $row['filename'];
    $filesize = $row['filesize'];
    $fileurl1 = $row['fileurl'];
    $timediff = $row['timediff'];

    echo '<tr>';
echo '<td>'.$id.'</td>';
    echo '<td>'.$filename.'</td>';
    echo '<td>'.$filesize.'</td>';
    echo '<td>'.$fileurl1.'</td>';
    echo '<td>'.$timediff.'</td>';







    echo '</tr>';

   // echo '<tr><td><b>id:</b>' . $id . "<br/><b>Filename:</b>" . $filename . '</td>';


}
echo '</table>';



?>

