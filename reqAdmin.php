<?php
session_start();
    if (!isset($_SESSION['userUid'])||$_SESSION['userUid']!=="dshop") {
        header('Location: ../CateringApp/form.php?error=noaccess');
        exit();
    }
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    session_unset();
    session_destroy();
    header("Location:../CateringApp/login_page.php?sessiontimeout");
}
$_SESSION['LAST_ACTIVITY'] = time();
?>