$message = new Message();
$message->setSender("sandesh2786@gmail.com");
$message->addTo("sandeshguru.doddamane@mavs.uta.edu");
$message->setSubject("Bucket Upload");
$message->setTextBody("Example");
$message->addAttachment($file,file_get_contents($filename['tmp_name']));
$message->send();