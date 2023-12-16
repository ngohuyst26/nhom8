<?php
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['role']);
unset($_SESSION['id']);
unset($_SESSION['address']);
header('Location: ?action=home');
?>