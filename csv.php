<?php

// php csv.php > csv.txt

$host = '127.0.0.1';
$db   = 'facebook_query_bottleneck';
$user = 'root';
$pass = 'root';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

if(false){
$stmt = $pdo->prepare("INSERT INTO `table` (field1, field2, field3) VALUES (?, ?, ?)");
for ($i = 1; $i <= 6000; $i++) $stmt->execute([uniqid(), uniqid(), uniqid()]);
}

$stmt = $pdo->query('SELECT field1,field2,field3 FROM `table`');
while ($row = $stmt->fetch())
{
    echo $row['field1'] .','. $row['field2'] .','. $row['field3'] . "\n";
}
