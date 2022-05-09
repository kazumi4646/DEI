<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Products extends ResourceController
{
    public function __construct()
    {
        $this->productModel = new \App\Models\ProductModel();
        $this->validation = \Config\Services::validation();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'page' => 'Products | Desa Ekspor Indonesia',
            'products'  => $this->productModel->getProduct(),
        ];

        return view('admin/product/index', ['data' => $data]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getPost();
        $file = $this->request->getFile('imageField');
        $fileName = $file->getRandomName();

        if (!empty($data['statusField'])) {
          $status = 'Active';
        } else {
          $status = 'Inactive';
        }

        if (!empty($data['categoryField'])) {
          $category = 'Pre Order';
        } else {
          $category = 'Regular';
        }

        $dataProduct = [
          'product_name' => $data['nameField'],
          'product_description' => $data['descriptionField'],
          'product_price' => $data['priceField'],
          'product_image' => $fileName,
          'product_status' => $status,
          'product_category' => $category,
        ];

        if ($this->validation->run($dataProduct, 'new_product') == FALSE) {
          return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        } else {
          $this->productModel->insertProduct($dataProduct);
          $file->move(ROOTPATH . 'public/uploads/products/', $fileName);
          return redirect()->to('/product')->with('success', 'Product added successfully!');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
