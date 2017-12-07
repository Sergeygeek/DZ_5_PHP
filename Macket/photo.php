<?php
// Функция транслитерации строк
  function translit($string) { 
      $translit = array(
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'y', 'ъ' => '', 'ь' => '', 'э' => 'eh', 'ю' => 'yu', 'я'=>'ya');

      return str_replace(' ', '_', strtr(mb_strtolower(trim($string)), $translit));
   }

   function changeImage($h, $w, $src, $newsrc, $type) {
    // Функция создания нового полноцветного изображения, заданного размера   
    $newimg = imagecreatetruecolor($h, $w);
       // Оператором switch проверяем тип изображения
    switch ($type) {
      case 'jpeg':
        // создаем новое изображение
        $img = imagecreatefromjpeg($src);
        //Функция, копирует и изменяет размеры изображения без потери четкости. imagesx - получаем ширину, imagesy - получаем высоту
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        //Создаем файл изображения
        imagejpeg($newimg, $newsrc);
        break;
      case 'png':
        // создаем новое изображение
        $img = imagecreatefrompng($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagepng($newimg, $newsrc);
        break;
      case 'gif':
        // создаем новое изображение
        $img = imagecreatefromgif($src);
        imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
        imagegif($newimg, $newsrc);
        break;
    }
   }







?>