<?php

    /*
    *  Copyright (c) Codiad & Kent Safranski (codiad.com), distributed
    *  as-is and without warranty under the MIT License. See
    *  [root]/license.txt for more. This information must remain intact.
    */

    require_once('../../config.php');

    //////////////////////////////////////////////////////////////////
    // Verify Session or Key
    //////////////////////////////////////////////////////////////////

    checkSession();

    //////////////////////////////////////////////////////////////////
    // Get Action
    //////////////////////////////////////////////////////////////////

    /*if(!empty($_GET['action'])){ $action = $_GET['action']; }
    else{ exit('{"status":"error","data":{"error":"No Action Specified"}}'); }*/

    if (isset($_POST["action"]) && !empty($_POST["action"])) {
        $data = json_decode($_POST["action"]);
        /*touch(BASE_PATH . "/data/pipi");
        touch(BASE_PATH . "/data/" . $data['filename'] . '_' . $_SESSION['user']);*/
        echo json_encode($data);
    }

    if (isset($_POST["change"]) && !empty($_POST["change"])) {
        $data = json_decode($_POST["change"]);
        echo json_encode($data);
    }

    if (isset($_POST["cursor"]) && !empty($_POST["cursor"])) {
        $data = json_decode($_POST["cursor"]);
        echo json_encode($data);
    }

?>

