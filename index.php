<?php

/* nkmt.dev */

?>
<html>
<head>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script type="text/javascript" src="script.js"></script>
  <script>
  $(function() {

    $('.button').click(function(e) {
        $('#popup, #layer').show(function(){
            $('#popup').fadeOut(1000);
    });
    });
    });
  </script>

  <style type="text/css">
  #layer {
    display: none;
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    background-color: #FFFFFF;
    z-index: 30000;
}
#popup {
    display: none;
    position: fixed;
    left: 50%;
    top: 50%;
    width: 300px;
    height: 100px;
    margin-left: -150px;
    margin-top: -100px;
    background-color: #0E8A16;
    color: #FFFFFF;
    border-radius: 5px;
    text-align: center;
    z-index: 30010;
}
.sk {
  margin-top: 40px;
}
   </style>

</head>

<body>
  <?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>

  <form action="./pull.php">
    <input type="submit" value="pull">
  </form>
  <button class="button"type="button">button</button>
  <div id="popup">
      <div class="sk">処理完了</div>

  </div>
</body>
</html>
