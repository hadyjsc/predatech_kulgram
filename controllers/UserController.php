<?php
require 'models/UserModel.php';

class UserController
{
    public $loadView;
    function __construct() {
        $this->loadView = new Load();
    }

    public function index()
    {
        $data = new UserModel();
        $results = $data->getAll();
        return $this->loadView->view('user/index',$results);
    }

    public function create()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = new UserModel();
            $results = $data->insert([
                'fname' => $_POST['fname'],
                'uname' => $_POST['uname'],
                'password' => password_hash("rasmuslerdorf",PASSWORD_BCRYPT,['cost' => 10]),
                'level' => $_POST['level'],
                'status' => $_POST['status'],
                'createdAt' => date('Y-m-d H:i:s'),
            ]);
            return header('location:index.php?page=user/view/'.$results);
        }
        return $this->loadView->view('user/create');
    }

}


?>