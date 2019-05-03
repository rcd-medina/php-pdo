<?php

use app\models\User;

$user = new User();
$users = $user->all();

dd($users);

require "../app/views/index.php";

