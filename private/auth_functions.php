<?php

  // Performs actions necessary to log in a registered member
  function log_in_member($member) {  
    session_regenerate_id();
    $_SESSION['member_id'] = $member['CustomerID'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $member['UserID'];
    return true;
  }

  // Performs all actions necessary to log out a member
  function log_out_member() {
    unset($_SESSION['member_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['username']);
    return true;
  }

  // is_logged_in() contains all the logic for determining if a
  // request should be considered a "logged in" request or not.
  // It is the core of require_login() but it can also be called
  // on its own in other contexts (e.g. display one link if a member
  // is logged in and display another link if they are not)
  function is_logged_in() {
    // Having a member_id in the session serves a dual-purpose:
    // - Its presence indicates the member is logged in.
    // - Its value tells which member for looking up their record.
    return isset($_SESSION['member_id']);
  }

  // Call require_login() at the top of any page which needs to
  // require a valid login before granting acccess to the page.
  function require_login() {
    if(!is_logged_in()) {
      redirect_to(url_for('/html/login/login.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }

?>
