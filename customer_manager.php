<?php

$data = file_get_contents("php://input");

$objData = json_decode($data);

$event = $objData->event;
if($event == "login"){
$email = $objData->loginemail;
$pwd = $objData->loginpassword;

include 'conn.php';
$query = "select count(*) from customers where email='".$email."' and password='".$pwd."'";
$rs = mysql_query($query);
$row = mysql_fetch_row($rs);
$count = $row[0];

if($count > 0){
echo "success";
}else{
echo "failure";
}
}

if($event == "signup"){
$name = $objData->name;
$phone = $objData->phone;
$email = $objData->email;
$address = $objData->address;
$password = $objData->password;

include 'conn.php';

$query = "INSERT INTO customers (`cid`, `name`, `email`, `address`, `phone`, `password`) VALUES (NULL, '$name', '$email', '$address', '$phone', '$password')";
$result = mysql_query($query);

if($result){
echo "success";
}else{
echo "failure";
}


}


?>
