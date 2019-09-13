<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once './app/views/' . $view . '.php';
    }

    public function model($models)
    {
        require_once './app/models/' . $models . '.php';
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
