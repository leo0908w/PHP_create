<?php

$uploads = $_FILES['upload'];

//    foreach ($uploads as $k => $upload){
//        echo "{$k}:";
//        foreach ($upload as $index => $v){
//            echo "<li>{$index}.{$v}</li>";
//        }
//        echo "<hr />";
//    }

foreach ($uploads['error'] as $k => $v){
    if ($v == 0){
        copy($uploads['tmp_name'][$k],"upload/{$uploads['name'][$k]}");
    }
}