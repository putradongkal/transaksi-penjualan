<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang as ModelsBarang;
use App\Models\Supplier;

class Barang extends BaseController
{
    protected $barang;
    protected $supplier;
    protected $validation;

    public function __construct()
    {
        $this->barang = new ModelsBarang();
        $this->supplier = new Supplier();
        $this->validation = \Config\Services::validation(); 
    }

    public function index()
    {
        $barang = $this->barang->select('barang.*, supplier.nama_supplier, users.username')
                               ->join('supplier', 'supplier.id = barang.id_supplier', 'left')
                               ->join('users', 'users.id = barang.id_user', 'left')
                               ->orderBy('nama_barang', 'asc')
                               ->findAll();
        return view('barang/index', ['barang' => $barang]);
    }

    public function create(){
        $supplier = $this->supplier->findAll();
        return view('barang/create', ['supplier' => $supplier]);
    }

    public function store(){
        $input = $this->request->getPost();
        $input['harga'] = str_replace(',', '', $input['harga']);

        if($this->validation->run($input, 'create_barang') == FALSE)
        {
            return redirect()->to(base_url('barang/tambah'))->withInput();
        }
        
        $input['id_user'] = user_id();
        $this->barang->insert($input);
        session()->setFlashdata('msg', 'Data barang berhasil ditambahkan');
        return redirect()->to(base_url('barang')); 
    }

    public function edit($id){
        $barang = $this->barang->find($id);
        
        if(!$barang){
            session()->setFlashdata('err_msg', 'Barang tidak ditemukan');
            return redirect()->to(base_url('barang')); 
        }

        $supplier = $this->supplier->findAll();
        return view('barang/edit', ['supplier' => $supplier, 'barang' => $barang]);
    }

    public function update($id){
        $input = $this->request->getPost();
        $input['id'] = $id;
        $input['harga'] = str_replace(',', '', $input['harga']);
        
        $barang = $this->barang->find($id);
        
        if(!$barang){
            session()->setFlashdata('err_msg', 'Barang tidak ditemukan');
            return redirect()->to(base_url('barang')); 
        }

        if($this->validation->run($input, 'edit_barang') == FALSE)
        {
            return redirect()->to(base_url('barang/edit/' . $id))->withInput();
        }
        
        $input['id_user'] = user_id();
        $this->barang->update($id, $input);
        session()->setFlashdata('msg', 'Barang berhasi diperbarui');
        return redirect()->to(base_url('barang/edit/' . $id)); 
    }

    public function delete($id){
        $barang = $this->barang->find($id);
        
        if(!$barang){
            session()->setFlashdata('err_msg', 'Barang tidak ditemukan');
            return redirect()->to(base_url('barang')); 
        }

        $this->barang->delete($id);
        session()->setFlashdata('msg', 'Barang berhasil dihapus');
        return redirect()->to(base_url('barang')); 
    }
}
