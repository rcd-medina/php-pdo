
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dentro da Views</title>
</head>
<body>
    <h1>Dentro de app/views/index.php</h1>

    <?php
    /*
        foreach ($users as $user) {
            echo $user->id . "<br>";
            echo $user->name . "<br>";
        }
    */

        echo "<pre>";
        print_r($users);
        echo "<pre>";
    ?>
</body>
</html>


