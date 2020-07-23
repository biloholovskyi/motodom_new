<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
$name = $_POST['name'];
$tel = $_POST['tel'];
$token = '920757097:AAGFW-ONNZLddw_VLPCPp-PX5Fwll14Bq2o';
$chat_id = '-298597121';
$arr = array(
  'Имя: ' => $name,
  'Телефон: ' => $tel,
);

foreach ($arr as $key => $value) { 
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$multiple_to_recipients = array(
  'motodom@motodom.store'
);

wp_mail($multiple_to_recipients, "Новая заявка", "Имя: ".$name." | Номер: ".$tel);

$send = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");