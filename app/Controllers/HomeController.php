<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        echo __METHOD__;
    }

    public static function notFound()
    {
       echo "<h1>Not Found</h1>";
    }
}