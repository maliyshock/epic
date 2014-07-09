<!DOCTYPE html>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
  $( document ).ready(function() 
    {
      $(".big_btn").click( function()
      {
        $(this).next().slideToggle(300);
      }); 

      $(".remove").click( function()
        {
          var id = $(this).attr('title');
          $.post( "delete.php", {id: id} ).done(function(data) 
          {
            $("#spisok").remove();
            $(".add_wrapper").append(data);
            console.log(data);
          });
        }); 
    });
</script>
  <title>Scrubs</title>
</head>
<body>