<?php
session_start();

$_SESSION = []; //tidak wajib biar yakin aj
session_unset(); // tidak wajib

session_destroy();

header("Location: login.php");
exit;
