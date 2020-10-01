<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $category = [
		'category_name' => 'required',
		'category_status' => 'required'
	];

	public $category_errors = [
		'category_name' => [
			'required' => 'Nama wajib diisi.'
		],
		'category_status' => [
			'required' => 'Status wajib diisi.'
		]
	];

	public $menu = [
		'menu_name' => 'required',
		'menu_stock' => 'required',
		'menu_price' => 'required',
		'menu_category' => 'required'
	];

	public $menu_errors = [
		'menu_name' => [
			'required' => 'Nama Menu wajib diisi.'
		],
		'menu_stock' => [
			'required' => 'Stock Menu wajib diisi.'
		],
		'menu_price' => [
			'required' => 'Harga Menu wajib diisi.'
		],
		'menu_category' => [
			'required' => 'Kategori Menu wajib diisi.'
		]
	];

	public $customer = [
		'customer_name' => 'required',
		'customer_phone' => 'required',
		'lat' => 'required',
		'long' => 'required',
		'street' => 'required',
		'city' => 'required',
		'country' => 'required',
	];

	public $customer_errors = [
		'customer_name' => [
			'required' => 'Nama Customer wajib diisi.'
		],
		'customer_phone' => [
			'required' => 'Nomor Telpon wajib diisi.'
		],
		'lat' => [
			'required' => 'Data latitude wajib diisi.'
		],
		'long' => [
			'required' => 'Data longitude wajib diisi.'
		],
		'street' => [
			'required' => 'Data street wajib diisi.'
		],
		'city' => [
			'required' => 'Data city wajib diisi.'
		],
		'country' => [
			'required' => 'Data country wajib diisi.'
		],
	];

	public $supplier = [
		'supplier_name' => 'required',
		'supplier_phone' => 'required',
		'lat' => 'required',
		'long' => 'required',
		'street' => 'required',
		'city' => 'required',
		'country' => 'required',

	];

	public $supplier_errors = [
		'supplier_name' => [
			'required' => 'Nama Supplier wajib diisi.'
		],
		'supplier_phone' => [
			'required' => 'Nomor Supplier wajib diisi.'
		],
		'lat' => [
			'required' => 'Data latitude wajib diisi.'
		],
		'long' => [
			'required' => 'Data longitude wajib diisi.'
		],
		'street' => [
			'required' => 'Data street wajib diisi.'
		],
		'city' => [
			'required' => 'Data city wajib diisi.'
		],
		'country' => [
			'required' => 'Data country wajib diisi.'
		],
	];
}
