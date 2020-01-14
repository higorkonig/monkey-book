<?php
session_start();
if (isset($_SESSION['token_acesso'])) {
    unset($_SESSION['token_acesso']);
}
header("Location: ../");
exit;