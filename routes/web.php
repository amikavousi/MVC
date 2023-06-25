<?php

return  FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/users', 'Users@index');
    $r->addRoute('GET', '/users/{id}', 'Users@show');
});
