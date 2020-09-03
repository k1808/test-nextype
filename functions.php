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
