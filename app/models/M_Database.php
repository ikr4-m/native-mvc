<?php

class M_Database extends Model
{
    public function test_panggil()
    {
        return $this->read('*', 'obat', [['kode_obat', '=', '5']]);
    }
}
