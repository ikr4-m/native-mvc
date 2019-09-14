<?php

class Controller
{
    public function view($view, $data = [])
    {
        require './app/views/' . $view . '.php';
    }

    public function model($models)
    {
        require './app/models/' . $models . '.php';
        $m = new $models;
        return $m;
    }

    public function spawn_error($code, $desc)
    {
        $this->view('view_error', [
            'code' => $code,
            'desc' => $desc
        ]);
    }
}
