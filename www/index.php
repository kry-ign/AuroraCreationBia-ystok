<?php

declare(strict_types=1);

namespace App;

require_once("src/View.php");

const DEFAULT_ACTION = 'list';

$action = $_GET['action'] ?? DEFAULT_ACTION;

$view = new View();

switch ($action) {
    case 'create':
        $page = 'create';
        $created = false;
        if (!empty($_POST)) {
            $created = true;
            $viewParams = [
                'title' => $_POST['title'],
                'description' => $_POST['description']
            ];
        };
        $viewParams['created'] = $created;
        break;
    case 'show':
        $viewParams = [
            'title' => 'My articles',
            'description' => 'description'
        ];
        break;
    default:
        $page = 'list';
        $viewParams['resultList'] = "Show articles";
        break;
}

$view->render($page, $viewParams);




