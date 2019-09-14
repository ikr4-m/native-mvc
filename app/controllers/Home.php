<?php

class Home extends Controller
{
    private $m_home;
    public function __construct()
    {
        $this->m_home = $this->model('M_home');
    }

    public function index()
    {
        $a = $this->m_home->tampil_nama();
        $this->view('home/index', ['a' => $a]);
    }

    public function test()
    {
        echo 'It works. ';
        echo '<a href="' . BASEPATH . '">Go back.</a>';
    }
}
