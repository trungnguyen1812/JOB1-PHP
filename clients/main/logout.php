<?php
include '../../lib/session.php';
Session::destroy();
header("Location:login.php");