<?php
function text_get(){//функция которая возращает содержимое файла в $text

return file_get_contents('data/text.txt');
//от куда берет файл
}

function text_set($text){//функция которая возращает содержимое файла в $text

       file_put_contents('data/text.txt', $text);//добавляет новый текст в файл
    //от куда берет файл
    }

