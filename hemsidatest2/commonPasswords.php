<?php

function checkPassword($password){
  $myfile = fopen("commonPasswords.txt", "r") or die("Unable to open file!");

  while(!feof($myfile)){
  if(strcmp(fgets($myfile), $password)) {
    fclose($myfile);
    return true;
  }
}

  fclose($myfile);
  return false;
}



 ?>