<?php
require_once "functions.php";
require_once 'lib/phpQuery-onefile.php';
$str = getPageByUrl('https://nextype.ru/');
$pq = phpQuery::newDocument($str);
$elems = $pq->find('a');
foreach ($elems as $item){
    echo pq($item)->html();
    echo "<hr>";
}