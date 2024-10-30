<?php

namespace Controller;

class Controller

{

// Variable Attributes var $controllerName;

    var $controllerName;
    var $controllerMethod;

    public function getControllerAttribute()
    {
        return [
            "ControllerName" => $this->controllerName,
            "Method" => $this->controllerMethod,
        ];
        }

}
