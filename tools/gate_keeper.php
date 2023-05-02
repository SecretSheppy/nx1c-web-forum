<?php

/**
 * checks weather user is allowed to access page based on completion of certain events
 * (i.e. captcha completion or being logged in)
 *
 * @param int $gate_keeper_mode - 0 => only check for captcha, 1 => check for captcha and login
 * @param bool $allow_logged_in - true (default) => allow user only if logged-in, false => allow user only if not logged in
 * @param bool $captcha
 * @return void
 */
function gate_keeper($gate_keeper_mode, $allow_logged_in = true, $captcha = true)
{

    // check for captcha completion
    if ($captcha && !$_SESSION["captcha-completed"]) {
        header("Location: index.php");
        exit();
    }

    // prevent logged-in users from accessing page || only allow logged-in users to access page
    if ($gate_keeper_mode == 1 &&
        (
            (!$allow_logged_in && isset($_SESSION["user"])) || ($allow_logged_in && !isset($_SESSION["user"]))
        )
    ) {
        header("Location: nx1c.php");
        exit();
    }

}