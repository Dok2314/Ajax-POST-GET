<?php
require_once 'connect.php';
global $pdo;

$sql = "SELECT * FROM catalogs 
        WHERE parent_id = :id AND
        is_active = 1
        ORDER BY pos";
$cat = $pdo->prepare($sql);
$cat->execute([
   'id' => $_GET['id']
]);
echo "<option value='0'>Выберите подраздел</option>";
while($catalog = $cat->fetch()){
    echo "<option value='{$catalog['id']}'>{$catalog['name']}</option>";
}