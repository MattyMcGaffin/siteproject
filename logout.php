<?php
session_start();

include "dbsetup.php";



session_start();
session_destroy();
header("Location: index.php");
exit();

?>