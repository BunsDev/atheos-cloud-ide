<?php

//////////////////////////////////////////////////////////////////////////////80
// Analytics Controller
//////////////////////////////////////////////////////////////////////////////80
// Copyright (c) Atheos & Liam Siira (Atheos.io), distributed as-is and without
// warranty under the MIT License. See [root]/docs/LICENSE.md for more.
// This information must remain intact.
//////////////////////////////////////////////////////////////////////////////80
// Authors: Atheos Team, @hlsiira
//////////////////////////////////////////////////////////////////////////////80

require_once("class.analytics.php");

$Analytics = new Analytics();

switch ($action) {

	//////////////////////////////////////////////////////////////////////////80
	// Initialize the Analytic Module
	//////////////////////////////////////////////////////////////////////////80
	case "init":
		$Analytics->init();
		break;

	//////////////////////////////////////////////////////////////////////////80
	// OptOut of Athoes Analytics
	//////////////////////////////////////////////////////////////////////////80
	case "changeOpt":
		if (Common::checkAccess("configure")) {
			$value = POST("enabled");
			$Analytics->changeOpt($value);
		} else {
			Common::send(403, "User does not have access.");
		}
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Save session duration
	//////////////////////////////////////////////////////////////////////////80
	case "saveDuration":
		$duration = POST("duration");
		$Analytics->saveDuration($duration);
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Default: Invalid Action
	//////////////////////////////////////////////////////////////////////////80
	default:
		Common::send(416, "Invalid action.");
		break;
}