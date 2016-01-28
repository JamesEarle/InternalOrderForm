<?php

  echo var_dump($_POST);
  echo "<br>";
  
  $to = "orders@bluewirecs.com";
  
  $to_test = "j_earle@hotmail.com";
  
  $subject = "PHP mail test from BlueWire";
  
  $message = "this is a test";
  
  $header = 'From: me@jamesearle.ca';
  
//   echo mail($to_test, $subject, $message, $header);

?>