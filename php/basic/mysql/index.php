<?php
require_once 'benchmark.php';

$bm = new benchmark(true);

echo $bm->elapsed() . '<br>';
$db = mysqli_connect("localhost", "root", "Kotipelto.46", "meteoastrologia");
echo $bm->elapsed() . '<br>';
$db->query('SET CHARACTER SET utf8');
//var_dump($db);
echo $bm->elapsed() . '<br>';
$q = $db->query("SELECT * FROM aspectariums LIMIT 10000");
echo $bm->elapsed() . '<br>';
$arr = array();
while ($row = $q->fetch_assoc()) {
    //var_dump($row);
    array_push($arr, $row);    
};
echo $bm->elapsed() . '<br>';
$q->free();
echo $bm->elapsed() . '<br>';
//var_dump($arr);

$test = utf8_encode(json_encode($arr, JSON_PRETTY_PRINT));
echo $bm->elapsed() . '<br>';
echo $test;
//echo json_last_error_msg();

/**/
?>