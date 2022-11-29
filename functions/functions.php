<?php
function generatorPass($length_number)
{
    $password_rand = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?@.*";
    $password_result = "";
    $index = 0;

    while ($index < $length_number) {
        $pass_generator = rand(1, strlen($password_rand));
        $password_result .= $password_rand[($pass_generator - 1)];
        $index++;
    }
    ;
    return $password_result;
};