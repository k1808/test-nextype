<?php
function convertFullName($string)
{
    $tempResult = explode(' ', $string);
    $result = $tempResult[0].' ';
    for($i=1;$i<count($tempResult);$i++){
        $str = mb_substr($tempResult[$i], 0,1);
        $tempRes = mb_convert_case($str, MB_CASE_UPPER, "UTF-8");
        $result .= $tempRes.'.';
    }
   return $result;  // Результат: Фамилия И.О.
}

function getItemsFromDate($date)
{
    $filename = __DIR__ . "/data.json";
    $result = [];
    if (file_exists($filename)) {
        $array = json_decode(file_get_contents($filename), true);
    }
    foreach ($array as $item){
        if(strtotime($item['created']) >= $date){
           array_push( $result, $item['created']);
        }
    }

    return $result;
}

function debug($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre><hr>';
}

function customMultiSort($array,$field) {
    $sortArr = array();
    foreach($array as $key=>$val){
        $sortArr[$key] = $val[$field];
    }

    array_multisort($sortArr,SORT_NUMERIC, SORT_DESC, $array);

    return $array;
}

function getPageByUrl ($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($curl);

    if ($result === false) {			echo "Ошибка CURL: " . curl_error($curl);
        return false;
    } else {
        return $result;
    }
}