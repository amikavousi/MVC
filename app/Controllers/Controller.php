<?php

namespace App\Controllers;

use League\Plates\Engine;

class Controller
{
    protected $views;

    public function __construct()
    {
        $this->views = new Engine('../views');
    }
}