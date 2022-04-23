<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
<div class="orders">
    <?php
    require_once 'connect.php';
    global $pdo;
    $sql = "SELECT * FROM prices ORDER BY name";

    try{
        $prc = $pdo->query($sql);
        echo "<div class='jumbotron'>";
        while($prices = $prc->fetch()){
            echo "<div><a href='#'".
                "data-id='".$prices['id']."'>".
                $prices['name'].
                "</a></div>";
        }
        echo "</div>";
    }catch (PDOException $e){
        echo $e->getMessage();
    }
    ?>
</div>
<div class="hidden" id="info"></div>
<script type="text/javascript">
    $(function (){
        $('.jumbotron > div > a').on('click', function (){
           var url = 'price.php?id=' + $(this).data('id');
           $.ajax({
              url: encodeURI(url),
              method: "GET",
              success: function (data){
                  $('#info').html(data).removeClass('hidden');
              }
           });
        });
    });
</script>
</body>
</html>