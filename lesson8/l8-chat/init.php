<?php

const HOST = 'http://localhost';
const BASE_URL = '/php1/l8-chat/';

const DB_HOST = 'localhost';
const DB_NAME = 'php1simple';
const DB_USER = 'root';
const DB_PASS = '';

include_once('core/arr.php');
include_once('core/db.php');
include_once('core/system.php');
include_once('core/auth.php');

include_once('model/messages.php');
include_once('model/users.php');
include_once('model/sessions.php');