<?php
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['role']);
header('Location: ?action=home');
?>