<?php

class Simple extends ControllerAPI
{
    private $f_simple;
    public function __construct()
    {
        $this->f_simple = $this->func('F_Simple');
    }

    public function get()
    {
        echo '["Simple::GET"]';
    }

    public function post()
    {
        $a = $this->f_simple->a();
        echo json_encode([$a]);
    }
}
