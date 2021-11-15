<?php

function t1()
{
    // 1. Открываем файл в режиме чтения и, если если это true, продолжаем...
    if (($file = fopen('./one/book1.csv', 'r')) !== false) {
        // 2. Считать построчно... fgetcsv принимает указатель на файл, ограничитель длинны и сепаратор.
        while (($data = fgetcsv($file, 50, ";")) !== false) {
            $out = '';
            for ($i = 0; $i < count($data); $i++) {
                $out .= $data[$i] . ' ';
            }
            echo $out . "<br>";
        }
    }
    fclose($file);
}

function t2($path)
{
    $new_arr = [];
    if (($file = fopen($path, 'r')) !== false) {
        while (($data = fgetcsv($file, 1000, ";")) !== false) {
            $new_arr[] = $data;
        }
        fclose($file);
    }
    return $new_arr;
}

function t3($path)
{
    $new_arr = [];
    if (($file = fopen($path, 'r')) !== false) {
        while (($data = fgetcsv($file, 1000, ";")) !== false) {
            $new_arr[] = $data[2];
        }
        fclose($file);
    }
    array_shift($new_arr);
    return implode(' ', $new_arr);
}

function t4($arr, $path)
{
    if (($file = fopen($path, 'w')) !== false) {
        foreach ($arr as $line) {
            fputcsv($file, $line, ';');
        }
        fclose($file);
    }
}

function t5($path)
{
    $file = file($path);
    return count($file);
}

//РАСШИРЕННЫЙ ВАРИАНТ
//function t5($path)
//{
//    if (($file = fopen($path, 'r')) !== false) {
//        $counter = "";
//        while (($data = fgetcsv($file, 50, ";")) !== false) {
//            $counter ++;
//        }
//        return $counter;
//    }
//    fclose($file);
//}
