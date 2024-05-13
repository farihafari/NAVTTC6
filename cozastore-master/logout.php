<?php
session_start();
session_unset();
echo "<script>alert('logout successfully');
location.assign('index.php')
</script>";
