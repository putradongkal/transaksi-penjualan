<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Supplier as ModelsSupplier;

class Supplier extends BaseController
{
    protected $supplier;
    protected $validation;

    public function __construct()
    {
        $this->supplier = new ModelsSupplier();
        $this->validation = \Config\Services::validation(); 
    }

    public function index()
    {
        $supplier = $this->supplier->orderBy('nama_supplier', 'asc')->findAll();
        return view('supplier/index', ['supplier' => $supplier]);
    }

    public function create(){
        return view('supplier/create');
    }

    public function store(){
        $input = $this->request->getPost();

        if($this->validation->run($input, 'supplier') == FALSE)
        {
            return redirect()->to(base_url('supplier/tambah'))->withInput();
        }
        
        $this->supplier->insert($input);
        session()->setFlashdata('msg', 'Data supplier berhasil ditambahkan');
        return redirect()->to(base_url('supplier')); 
    }

    public function edit($id){
        $supplier = $this->supplier->find($id);
        
        if(!$supplier){
            session()->setFlashdata('err_msg', 'Supplier tidak ditemukan');
            return redirect()->to(base_url('supplier')); 
        }

        return view('supplier/edit', ['supplier' => $supplier]);
    }

    public function update($id){
        $input = $this->request->getPost();
        $supplier = $this->supplier->find($id);
        
        if(!$supplier){
            session()->setFlashdata('err_msg', 'Supplier tidak ditemukan');
            return redirect()->to(base_url('supplier')); 
        }

        if($this->validation->run($input, 'supplier') == FALSE)
        {
            return redirect()->to(base_url('supplier/edit/' . $id))->withInput();
        }
        
        $this->supplier->update($id, $input);
        session()->setFlashdata('msg', 'Supplier berhasi diperbarui');
        return redirect()->to(base_url('supplier/edit/' . $id)); 
    }

    public function delete($id){
        $supplier = $this->supplier->find($id);
        
        if(!$supplier){
            session()->setFlashdata('err_msg', 'Supplier tidak ditemukan');
            return redirect()->to(base_url('supplier')); 
        }

        $this->supplier->delete($id);
        session()->setFlashdata('msg', 'Supplier berhasil dihapus');
        return redirect()->to(base_url('supplier')); 
    }
}
