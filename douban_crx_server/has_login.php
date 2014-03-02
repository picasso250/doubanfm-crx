<?php

if (!isset($_SESSION['ses_has_login'])) {
    echo_json(1, 'not login');
} else {
    echo_json(!$_SESSION['ses_has_login']);
}
