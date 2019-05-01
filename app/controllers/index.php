<?php

use app\models\User;

$user = new User();
dd($user->all());

require "../app/views/index.php";

