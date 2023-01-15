<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Entities\GroupColoc;
use App\Factories\MySQLFactory;
use App\Managers\GroupColocManager;
use App\Managers\PaymentManager;

use App\Entities\Payment;

class GroupColocController extends BaseController
{
    public function index()
    {
        $manager = new GroupColocManager(new MySQLFactory());
        $GroupColoc = $manager->getGroupById();
        $this->render('GroupColoc', ['GroupColoc' => $GroupColoc]);
    }

    public function GroupColoc($id)
    {
        $manager = new GroupColocManager(new MySQLFactory());
        $GroupColoc = $manager->getGroupById($id);
        $this->render('GroupColoc', ['GroupColoc' => $GroupColoc]);
    }
    
    public function createGroupColoc()
    {
        $title = $_POST['title'];
        $content = $_POST['htmlcontent'];
        $PostManager = new PaymentManager(new MySQLFactory());
        $TokenManager = new TokenManager();
        $user = $TokenManager->getUserFromToken($_COOKIE["token"]);
        $Post = new Payment([
            'author' => $user,
            'title' => $title,
            'content' => $content,
            "comments" => [],
            'unix' => date_create(
                date('l H:i:s'),
                new \DateTimeZone('Europe/Paris'))->getTimestamp()
        ]);
        $PostManager->createPost($Post);
        exit(header("location: /"));

    }
}
