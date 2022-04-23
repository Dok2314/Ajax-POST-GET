<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



function take_all_photos($hostname)
{
    $ch = curl_init($hostname);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $content = curl_exec($ch);
    curl_close($ch);

    preg_match_all('/<img\s+[^>]*src="([^"]*)"[^>]*>/',
        $content,
        $matches);

    foreach ($matches[1] as $match) {
        echo "<img src='$match'>".'<br>';
    }
}

take_all_photos('https://site.ua/');
