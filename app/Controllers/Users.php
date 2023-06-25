<?php

namespace App\Controllers;

use App\Models\User;

class Users extends Controller
{
    public function index()
    {
        $user = new User();
        $users = $user->all();
        echo $this->views->render('index', compact('users'));
    }

    public function show($id)
    {
        $user = (new User())->find($id['id']);
        echo $this->views->render('show', ['user' => $user[0]] );
    }

}