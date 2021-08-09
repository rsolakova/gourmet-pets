<?php

require 'formules.php';
require 'mail.php';

$discounts = array("144");

// $weight = intval($_POST['weight']);
$weight = round(floatval(str_replace(',','.',$_POST['weight'])), 1);
// $weight = number_format($_POST['weight'], 2);

//fat normal slim
$body = $_POST['body'];
//high_active normal_active less_active
$active = $_POST['active'];
//beef pork chicken
$meat = $_POST['meat'];
$allergies = $_POST['allergies'];

$email = $_POST['email'];
$name = $_POST['name'];
$dog_name = $_POST['dog_name'];
$years = $_POST['years'];
$breed = $_POST['breed'];

$neutered = $_POST['neutered'] == "yes";

$send_mails = isset($_POST['send_mails']);

$active_index = activity($body, $neutered, $active);
$calories = calories($weight, $active_index);
$price = price($weight, $meat, $active_index);

if ($send_mails == true) {
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $moreInfo = $_POST['moreInfo'];
    $city = $_POST['city'];
    $neighbourhood = $_POST['neighbourhood'];
    $street = $_POST['street'];
    $others = $_POST['others'];
    
    $mail_body_owner = "Email: $email <br>
                  Name: $name<br>
                  Dog Name: $dog_name<br>
                  Years: $years<br>
                  Breed: $breed<br>
                  Weight: $weight<br>
                  Body: $body<br>
                  Alergies: $allergies<br>
                  Active: $active<br>
                  Meat: $meat<br>
                  Neutered: $neutered<br>
                  Active Index: $active_index<br>
                  Calories: $calories<br>
                  Price: $price<br>
                  firstname: $firstname<br>
                  surname: $surname<br>
                  phone: $phone<br>
                  city: $city<br>
                  neighbourhood: $neighbourhood<br>
                  street: $street<br>
                  others: $others<br>
                  more info: $moreInfo";

    $fileId = microtime() . "-" . $_SERVER['REMOTE_ADDR'];
    file_put_contents("../orders/{$fileId}.txt", $mail_body_owner);

    
    $mail_body_receiver = "Поръчката ви е получена успешно! В най-скоро време ще се свържем с вас, за да ви съобщим точния час на доставка на храната на $dog_name.";
    
    send_mail(array(
        'from' => $email,
        'email' => 'orders@gourmet-pets.bg',
        'name' => $name,
        'subject' => 'Order',
        'body' => $mail_body_owner,
    ));
    
    send_mail(array(
        'from' => 'orders@gourmet-pets.bg',
        'email' => 'rsolakova@yahoo.com',
        'name' => $name,
        'subject' => 'Order',
        'body' => $mail_body_owner,
    ));
    
    send_mail(array(
        'from' => 'orders@gourmet-pets.bg',
        'email' => 'ninu.iv@gmail.com',
        'name' => $name,
        'body' => $mail_body_owner,
        'subject' => 'Order',
    ));
    
    
    send_mail(array(
        'from' => 'orders@gourmet-pets.bg',
        'email' => $email,
        'name' => $name,
        'subject' => 'Направена поръчка',
        'body' => $mail_body_receiver,
    ));
} else {
	$lowPrice = $price;
	if (in_array($breed, $discounts, true)) {
		$lowPrice = floor(0.8 * $price);
	}
    echo json_encode(array('calories' => $calories, 'price' => $price, 'lowPrice' => $lowPrice), true);
}

?>