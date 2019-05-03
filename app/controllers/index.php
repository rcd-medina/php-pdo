<?php

use app\models\User;

$user = new User();
//$users = $user->all();
$userEncontrado = $user->find('id', 3);

dd($userEncontrado);

require "../app/views/index.php";

