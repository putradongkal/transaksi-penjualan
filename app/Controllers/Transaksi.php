<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\Transaksi as ModelsTransaksi;

class Transaksi extends BaseController
{
    protected $transaksi;
    protected $validation;
    protected $barang;

    public function __construct()
    {
        $this->transaksi = new ModelsTransaksi();
        $this->barang = new Barang();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $transaksi = $this->transaksi->select('transaksi.*, barang.nama_barang, barang.kode_barang, supplier.nama_supplier, users.username')
                                     ->join('barang', 'barang.id = transaksi.id_barang', 'left')
                                     ->join('supplier', 'supplier.id = transaksi.id_supplier', 'left')
                                     ->join('users', 'users.id = transaksi.id_user', 'left')
                                     ->orderBy('tanggal', 'desc')
                                     ->findAll();
        return view('transaksi/index', ['transaksi' => $transaksi]);
    }

    public function create(){
        $barang = $this->barang->findAll();
        return view('transaksi/create', ['barang' => $barang]);
    }

    public function store(){
        $input = $this->request->getPost();

        if($this->validation->run($input, 'transaksi') == FALSE)
        {
            return redirect()->to(base_url('transaksi/tambah'))->withInput();
        }

        $barang = $this->barang->find($input['id_barang']);
        $input['id_supplier'] = $barang['id_supplier'];
        $input['harga'] = $barang['harga'];
        $input['total'] = $barang['harga'] * $input['qty'];
        $input['id_user'] = user_id();
        $input['nomor_transaksi'] = 'TRX' . date('dmyHis');
        
        $this->transaksi->insert($input);
        session()->setFlashdata('msg', 'Data transaksi berhasil ditambahkan');
        return redirect()->to(base_url('transaksi'));
    }

    public function edit($id){
        $barang = $this->barang->findAll();
        $transaksi = $this->transaksi->find($id);
        
        if(!$transaksi){
            session()->setFlashdata('err_msg', 'Transaksi tidak ditemukan');
            return redirect()->to(base_url('transaksi')); 
        }

        return view('transaksi/edit', ['barang' => $barang, 'transaksi' => $transaksi]);
    }

    public function update($id){
        $input = $this->request->getPost();
        $transaksi = $this->transaksi->find($id);
        
        if(!$transaksi){
            session()->setFlashdata('err_msg', 'Transaksi tidak ditemukan');
            return redirect()->to(base_url('transaksi')); 
        }

        if($this->validation->run($input, 'transaksi') == FALSE)
        {
            return redirect()->to(base_url('transaksi/edit/' . $id))->withInput();
        }
        
        $barang = $this->barang->find($input['id_barang']);
        $input['id_supplier'] = $barang['id_supplier'];
        $input['harga'] = $barang['harga'];
        $input['total'] = $barang['harga'] * $input['qty'];
        $input['id_user'] = user_id();

        $this->transaksi->update($id, $input);
        session()->setFlashdata('msg', 'Transaksi berhasi diperbarui');
        return redirect()->to(base_url('transaksi/edit/' . $id)); 
    }

    public function delete($id){
        $transaksi = $this->transaksi->find($id);
        
        if(!$transaksi){
            session()->setFlashdata('err_msg', 'Transaksi tidak ditemukan');
            return redirect()->to(base_url('transaksi')); 
        }

        $this->transaksi->delete($id);
        session()->setFlashdata('msg', 'Transaksi berhasil dihapus');
        return redirect()->to(base_url('transaksi')); 
    }
}
