<?php 
$conn=mysqli_connect("localhost","root","","backendtask");

function Redirect($url) { 
       if(headers_sent()) { 
               echo "<script type='text/javascript'>location.href='$url';</script>"; 
       } else { 
               header("Location: $url"); 
       } 
}  
?>