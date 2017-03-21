<?php
session_start();
unset($_SESSION['MemberLogin']);
echo "<script>window.location='index.php'</script>";
?>