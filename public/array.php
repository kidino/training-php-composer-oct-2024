<?php 

$data = [
    'a','b','c'
];

$data2 = [
    'nama' => 'Iszuddin',
    'jawatan' => 'Guru Besar',
    'organisasi' => 'Kelas Programming'
];

echo '<pre>';
var_dump($data);
var_dump($data2);
echo '</pre>';

echo '<h1>'. $data2['nama'] .'<h1>';
echo '<h1>'. $data[2] .'<h1>';



