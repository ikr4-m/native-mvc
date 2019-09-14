<?php

class ControllerAPI
{
    public function func($filename)
    {
        require './app/controllers/API/Functions/' . $filename . '.php';
        $func = new $filename;
        return $func;
    }
}
