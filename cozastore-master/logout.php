<?php
session_start();
unset($_SESSION['sessionEmail']);
echo "<script>alert('logout successfully');
location.assign('index.php')
</script>";
