<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        \Myth\Auth\Authentication\Passwords\ValidationRules::class
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    /** CREATE BARANG */
    public $create_barang = [
		'kode_barang' => [
			'label' => 'Kode barang',
			'rules' => 'required|is_unique[barang.kode_barang,id,{id}]|min_length[3]|max_length[50]'
		],
		'nama_barang' => [
			'label' => 'Nama barang',
			'rules' => 'required|min_length[3]|max_length[255]'
		],
		'harga' => [
			'label' => 'Harga',
			'rules' => 'required|numeric'
		],
		'id_supplier' => [
			'label' => 'Supplier',
			'rules' => 'required'
		]
	];

    public $create_barang_errors = [
		'kode_barang' => [
			'required' => '{field} tidak boleh kosong',
			'is_unique' => '{field} sudah digunakan'
		],
		'nama_barang' => [
			'required' => '{field} tidak boleh kosong',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter'
		],
		'harga' => [
			'required' => '{field} tidak boleh kosong',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter',
			'numeric' => '{field} harus berupa angka'
		],
		'id_supplier' => [
			'required' => '{field} belum dipilih',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter'
		]
	];

    /** EDIT BARANG */
    public $edit_barang = [
        'id' => 'is_natural_no_zero',
		'kode_barang' => [
			'label' => 'Kode barang',
			'rules' => 'required|is_unique[barang.kode_barang,id,{id}]|min_length[3]|max_length[50]'
		],
		'nama_barang' => [
			'label' => 'Nama barang',
			'rules' => 'required|min_length[3]|max_length[255]'
		],
		'harga' => [
			'label' => 'Harga',
			'rules' => 'required|numeric'
		],
		'id_supplier' => [
			'label' => 'Supplier',
			'rules' => 'required'
		]
	];

    public $edit_barang_errors = [
		'kode_barang' => [
			'required' => '{field} tidak boleh kosong',
			'is_unique' => '{field} sudah digunakan'
		],
		'nama_barang' => [
			'required' => '{field} tidak boleh kosong',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter'
		],
		'harga' => [
			'required' => '{field} tidak boleh kosong',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter',
			'numeric' => '{field} harus berupa angka'
		],
		'id_supplier' => [
			'required' => '{field} belum dipilih',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter'
		]
	];

	/** SUPPLIER */
    public $supplier = [
		'nama_supplier' => [
			'label' => 'Nama supplier',
			'rules' => 'required|min_length[3]|max_length[255]'
		],
		'alamat' => [
			'label' => 'Alamat',
			'rules' => 'required|min_length[5]'
		],
		'nomor_telepon' => [
			'label' => 'Nomor telepon',
			'rules' => 'required|numeric|min_length[5]|max_length[18]'
		]
	];

    public $supplier_errors = [
		'nama_supplier' => [
			'required' => '{field} tidak boleh kosong',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter'
		],
		'alamat' => [
			'required' => '{field} tidak boleh kosong',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter'
		],
		'nomor_telepon' => [
			'required' => '{field} tidak boleh kosong',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter',
			'numeric' => '{field} harus berupa angka'
		]
	];

	/** TRANSAKSI */
    public $transaksi = [
		'tanggal' => [
			'label' => 'Tanggal transaksi',
			'rules' => 'required|valid_date[Y-m-d]'
		],
		'id_barang' => [
			'label' => 'Barang',
			'rules' => 'required'
		],
		'qty' => [
			'label' => 'Quantity',
			'rules' => 'required|integer'
		]
	];

    public $transaksi_errors = [
		'tanggal' => [
			'required' => '{field} tidak boleh kosong',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter',
			'valid_date' => '{field} tidak valid'
		],
		'id_barang' => [
			'required' => '{field} belum dipilih',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter'
		],
		'qty' => [
			'required' => '{field} tidak boleh kosong',
			'min_length' => '{field} minimal {param} karakter',
			'max_length' => '{field} maksimal {param} karakter',
			'integer' => '{field} harus berupa angka'
		]
	];
}
