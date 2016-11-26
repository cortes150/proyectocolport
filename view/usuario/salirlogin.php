<?php
session_start();
session_destroy();
//session_unregister("usuario");
echo "<script>window.location.assign('http://localhost/Colport/?c=inicio&a=Index')</script>";
?>