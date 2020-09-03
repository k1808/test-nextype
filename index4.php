<?php
setcookie('user', 123);
require_once 'functions.php';
$filename = __DIR__ . "/data14.json";
$result = [];
if (file_exists($filename))
    $result = json_decode (file_get_contents ($filename), true);
?>
<?php
foreach ($result as $key=>$item){
    if($item['id']==$_GET['set_viewed']){
        if($_COOKIE['set_viewed']!==$item['id']){
            $cookie_id = 'cookie_'.$_GET['set_viewed'];
            if(!isset($_COOKIE[$cookie_id])){
                setcookie($cookie_id, $cookie_id);$result[$key]['viewed'] = $item['viewed'] + 1 ;
                setcookie('set_viewed', $item['id']);
                $enc = json_encode($result);
                file_put_contents($filename, $enc);
            }


        }

    }
}?>

<? foreach ($result as $item): ?>
    <div>
        <b><?=$item['name']?></b><br>
        <small>Viewed: <?=$item['viewed']?></small><br>
        <?=$item['text']?><br><br>
        <a href="?set_viewed=<?=$item['id']?>">I watched</a>
        <hr>
    </div>
<? endforeach; ?>