<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Transaksi;

class LaporanTransaksi extends BaseController
{
    protected $transaksi;

    public function __construct()
    {
        $this->transaksi = new Transaksi();
    }
    
    public function index()
    {
        $start_date = $this->request->getGet('start_date') ?? date('Y-m-d');
        $end_date = $this->request->getGet('end_date') ?? date('Y-m-d');
        $fstart_date = date('d/m/Y', strtotime((string)$start_date));
        $fend_date = date('d/m/Y', strtotime((string)$end_date));
        
        $transaksi = $this->transaksi->select('transaksi.*, barang.nama_barang, barang.kode_barang, supplier.nama_supplier, users.username')
                                     ->join('barang', 'barang.id = transaksi.id_barang', 'left')
                                     ->join('supplier', 'supplier.id = transaksi.id_supplier', 'left')
                                     ->join('users', 'users.id = transaksi.id_user', 'left')
                                     ->where(['tanggal >=' => $start_date, 'tanggal <=' => $end_date])
                                     ->orderBy('tanggal', 'desc')
                                     ->findAll();
        return view('laporan-transaksi/index', ['start_date' => $fstart_date, 'end_date' => $fend_date, 'transaksi' => $transaksi]);
    }
}
