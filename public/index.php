<?php
session_start();
require '../app/autoload.php';

require_once '../app/Views/includes/header.php';
new Core();
require_once '../app/Views/includes/footer.php';