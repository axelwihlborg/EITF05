<?php

function checkPassword($pass){
  $myfile = fopen("commonPasswords.txt", "r") or die("Unable to open file!");
  $password = $pass . "\n";
  while(!feof($myfile)){
  $matcher = fgets($myfile);
  //echo $matcher, " ", $password, " ", strcmp($matcher, $password), "</br>";
  if(strcmp($matcher, $password) == 0) {
    fclose($myfile);
    return false;
  }
}

  fclose($myfile);
  return true;
}



 ?>
