<?php
require 'lib/autoload.php';
    // дописать логику lib/User.php
    // дописать логику lib/autoload.php
$user1 = new User('ssfgagegegvawefgaew', 'email@email.joc', 'r3feRFWEFEfef4','http://ejheller.jalbum.net/Eric%20J%20Heller%20Gallery/hi-res/Random%20synthesis.jpg');
// var_dump($user1);
// $user1->save();

$user1->load('2019-07-01');
    // создать 1 пользователя и сохранить его в JSON
?>