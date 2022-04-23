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
<div id="info">
    <?php
    require_once 'comment.php';
    ?>
</div>
<div class="form">
    <div>
        Nickname: <input type="text" id="nickname">
    </div>
    <div>
        Content: <input type="text" id="content">
    </div>
    <div>
        <input type="submit" id="submit-id" value="Send">
    </div>
</div>
<script type="text/javascript">
    $(function (){
        $('#submit-id').on('click', function (){
           if($.trim($('#nickname').val()) === ""){
               alert('Заполните поле Nickname!');
               return false;
           }
            if($.trim($('#content').val()) === ""){
                alert('Заполните поле Content!');
                return false;
            }
            $.ajax({
               url: "comment.php",
                method: "POST",
                data: {
                  nickname: $('#nickname').val(),
                    content: $('#content').val()
                },
                success: function (data){
                   $('#info').html(data)
                }
            });
        });
    });
</script>
</body>
</html>