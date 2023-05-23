<?php
$login = $_POST['login'];
$pass = $_POST['pass'];

if ($login == '' or $pass == ''){
    setcookie('login', '', time()-3600);
    echo 0;
}else 
if ($login == 'ivan' and $pass == '123'){
    setcookie('login', 'ivan', time()+3600);
    echo 1;
}else{
    setcookie('login', '', time()-3600);
}
?>