<?php

spl_autoload_register(function($class) {
    // Replace \ with / in namespaced classes
    $splitClass = explode('\\', $class);
    $requireClass = implode('/', $splitClass);
    require_once "{$requireClass}.php";
});
