<?php

require_once 'controllers/template.controller.php';
require_once 'controllers/user.controller.php';

require_once 'models/user.model.php';

$index = new TemplateController();
$index -> index();