<?php

function dd($dump)
{
    echo "<h2>Para diagnóstico</h2><br>";
    echo "<h4>var_dump()</h4>";
    echo "<pre>";
    var_dump($dump);
    echo "</pre><br><br>";

    echo "<h4>print_r()</h4>";
    echo "<pre>";
    print_r($dump);
    echo "</pre><br><br>";
    die();
}

