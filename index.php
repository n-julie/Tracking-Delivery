<?php
$file = isset($_GET['ref']) ? $_GET['ref'] : "home";

include "./files/includes/header.php";
include "./files/$file.php";
include "./files/includes/footer.php";