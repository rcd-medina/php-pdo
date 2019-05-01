<?php

use app\models\User;

$user = new User();
$users = $user->all();

require "../app/views/index.php";

