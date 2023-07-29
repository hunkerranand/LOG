<?php
 $con=mysqli_connect("localhost","root","","testing");


 if (mysqli_connect_error())
 {
    echo"<script>alert('connect to th e database');</script>";
    exit();
 }
 
?>