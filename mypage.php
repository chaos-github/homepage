<?php

?>
<!DOCTYPE html>
<html>
<head>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.js"></script>
<script>


$(function(){

  var app = new Vue({
    el:'#app',
    data:{
      message: 'hello world!!'
    }
  });

})
        
</script>
<body>
<h1>Welcome to my page.</h1>
<div id="app">
  {{message}}
</div>


</body>
</html>