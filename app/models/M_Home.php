<?php

class M_Home extends Model
{
    protected $nama = 'orang';

    public function tampil_nama($nama = '')
    {
        if ($nama == '') $nama = $this->nama;
        return $nama;
    }
}
