<?php
$email_first = 'firstla_..-st11@gmail.comk';
$email_second ='firstlast@11gmail,com';

function validateEmail($email) {
    $regex = "/^([a-zA-Z0-9-_\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,4})$/";
    echo preg_match($regex, $email) ? "The email is valid \n" : "The email is not valid \n";
}
validateEmail($email_first);
validateEmail($email_second);