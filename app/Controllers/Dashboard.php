<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Transaksi;

class Dashboard extends BaseController
{
    protected $barang;
    protected $supplier;
    protected $transaksi;

    public function __construct()
    {
        $this->barang = new Barang();
        $this->supplier = new Supplier();
        $this->transaksi = new Transaksi();
    }
    
    public function index()
    {
        $jml_supplier = $this->supplier->countAllResults();
        $jml_barang = $this->barang->countAllResults();
        $jml_transaksi = $this->barang->countAllResults();
        return view('dashboard/index', ['jml_supplier' => $jml_supplier, 'jml_barang' => $jml_barang, 'jml_transaksi' => $jml_transaksi]);
    }
}
