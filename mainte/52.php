<?php
require 'db_connection.php';

// $sql = 'select * from contacts where id = 3'; //sql
// $stmt = $pdo->query($sql); //sql実行 ステートメント

// $result = $stmt->fetchall();

// var_dump($result);

$result = $stmt->fetchall();

var_dump($result);

$pdo->beginTransaction();


try{
  $sql = 'select * from contacts where id = :id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue('id', 2, PDO::PARAM_INT);
  $stmt->execute();

  $pdo->commit();
} catch(PDOException $e) {
  $pdo->rollback();//更新のキャンセル
}