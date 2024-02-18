<?php

//////////////////////////////////////////////////////////////////////////////80
// FileManager Controller
//////////////////////////////////////////////////////////////////////////////80
// Copyright (c) Atheos & Liam Siira (Atheos.io), distributed as-is and without
// warranty under the MIT License. See [root]/docs/LICENSE.md for more.
// This information must remain intact.
//////////////////////////////////////////////////////////////////////////////80
// Authors: Codiad Team, @Fluidbyte, Atheos Team, @hlsiira
//////////////////////////////////////////////////////////////////////////////80

require_once("class.filemanager.php");

$dest = POST("dest");
$name = POST("name");
$path = POST("path");
$type = POST("type");

$modifyTime = POST("modifyTime");
$content = POST("content");
$patch = POST("patch");
$type = POST("type");

//////////////////////////////////////////////////////////////////////////////80
// Security Check
//////////////////////////////////////////////////////////////////////////////80
$path = Common::getWorkspacePath($path);
$dest = Common::getWorkspacePath($dest);

//////////////////////////////////////////////////////////////////////////////80
// Handle Action
//////////////////////////////////////////////////////////////////////////////80
$Filemanager = new Filemanager();

switch ($action) {
	//////////////////////////////////////////////////////////////////////////80
	// Create
	//////////////////////////////////////////////////////////////////////////80
	case "create":
		$Filemanager->create($path, $type);
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Delete
	//////////////////////////////////////////////////////////////////////////80
	case "delete":
		$Filemanager->delete($path);
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Duplicate
	//////////////////////////////////////////////////////////////////////////80
	case "duplicate":
		$Filemanager->duplicate($path, $dest);
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Extract
	//////////////////////////////////////////////////////////////////////////80
	case "extract":
		$name = POST("fileName");
		$Filemanager->extract($path, $name);
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Index
	//////////////////////////////////////////////////////////////////////////80
	case "index":
		$Filemanager->index($path);
		break;

	//////////////////////////////////////////////////////////////////////////80
	// loadURL for file preview
	//////////////////////////////////////////////////////////////////////////80
	case "loadURL":
		$Filemanager->loadURL($path);
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Move
	//////////////////////////////////////////////////////////////////////////80
	case "move":
		$Filemanager->move($path, $dest);
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Open
	//////////////////////////////////////////////////////////////////////////80
	case "open":
		$Filemanager->open($path);
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Rename
	//////////////////////////////////////////////////////////////////////////80
	case "rename":
		$Filemanager->rename($path, $name);
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Save
	//////////////////////////////////////////////////////////////////////////80
	case "save":
		$Filemanager->save($path, $modifyTime, $patch, $content);
		break;

	//////////////////////////////////////////////////////////////////////////80
	// Default: Invalid Action
	//////////////////////////////////////////////////////////////////////////80
	default:
		Common::send(416, "Invalid action.");
		break;
}