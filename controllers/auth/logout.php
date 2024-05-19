<?php

// Unset the session variable
unset($_SESSION['user']);
header('Location: /login');
