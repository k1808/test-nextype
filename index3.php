<?php
require_once 'functions.php';

$array = [
  [
    'sort' => '20',
    'name' => 'Mike'
  ],
  [
    'sort' => '10',
    'name' => 'Adam'
  ],
  [
    'sort' => '40',
    'name' => 'Stive'
  ],
  [
    'sort' => '300',
    'name' => 'Jane'
  ],
];

debug(customMultiSort($array,'sort'));