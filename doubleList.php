<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Double List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
<?php
require_once 'connect.php';
global $pdo;
$sql = "SELECT * FROM catalogs
        WHERE parent_id = 0 AND is_active = 1
        ORDER BY pos";
echo "<select id='fst'>";
echo "<option value='0'>Выберите раздел</option>";
$com = $pdo->query($sql);
while($catalog = $com->fetch()){
    echo "<option value='{$catalog['id']}'>{$catalog['name']}</option>";
}
echo "</select>";
?>
<select id="snd" disabled="disabled">
    <option value="0">Выберите подраздел</option>
</select>
<script type="text/javascript">
    $(function (){
       $('#fst').on('change', function (){
           $.ajax({
              url: 'select.php?id=' + $('#fst').val(),
               success: function (data){
                  $('#snd').html(data)
                   $('#snd').prop('disabled',false);
               }
           })
       })
    });
</script>
</body>
</html>