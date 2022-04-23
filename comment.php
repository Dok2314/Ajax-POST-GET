<?php
require_once 'connect.php';
global $pdo;

try {
    if(!empty($_POST)){
        $error = [];
        if(empty($_POST['nickname'])){
            $error[] = 'Nickname is empty!';
        }
        if(empty($_POST['content'])){
            $error[] = 'Content is empty!';
        }
        if(empty($error)){
            $sql = "INSERT INTO comments 
                    VALUES(NULL, :nickname, :content, NOW(), 1)";
            $query = $pdo->prepare($sql);
            $query->execute([
               ':nickname' => $_POST['nickname'],
                ':content' => $_POST['content']
            ]);
        }
    }
    $sql = "SELECT * FROM comments 
            WHERE is_visible = 1
            ORDER BY nickname";
    $com = $pdo->query($sql);
    while($comments = $com->fetch()){
        echo '<div style="border: 2px solid black; width: 50%; margin-bottom: 5px;">';
        echo "<div>Id: {$comments['id']} Nickname: {$comments['nickname']} Content: {$comments['content']}</div>";
        echo '</div>';
    }
}catch (PDOException $e){
    echo $e->getMessage();
}