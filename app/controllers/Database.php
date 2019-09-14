<?php

class Database extends Controller
{
    private $databaseM;
    public function __construct()
    {
        $this->databaseM = $this->model('M_Database');
    }

    public function index()
    {
        $this->view('database/index', [
            'database' => $this->databaseM->test_panggil()
        ]);
    }
}
