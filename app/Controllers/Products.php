<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Products extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        if (in_groups('mitra')) {
            $data = [
                'title' => 'My Products | Desa Ekspor Indonesia',
                'status' => $this->mitraModel->select('pembayaran_koperasi')->where('username', user()->username)->get()->getResultArray(),
                'products' => $this->productModel->where('seller_id', user()->id)->get()->getResultArray(),
            ];

            return view('products/index', ['data' => $data]);
        }

        $data = [
            'title' => 'My Products | Desa Ekspor Indonesia',
            'products' => $this->productModel->where('seller_id', user()->id)->get()->getResultArray(),
        ];

        return view('products/index', ['data' => $data]);
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
        if (in_groups('mitra')) {
            $mitra = [
                'status' => $this->mitraModel->select('pembayaran_koperasi')->where('username', user()->username)->get()->getResultArray(),
            ];

            foreach ($mitra['status'] as $status) {
                if ($status['pembayaran_koperasi'] != 'Lunas') {
                    return redirect()->to(base_url('/products'));
                }
            }
        }

        $data = [
            'title' => 'New Product | Desa Ekspor Indonesia',
        ];

        return view('products/new', ['data' => $data]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'name'     => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'This field is required.',
                ]
            ],
            'price'     => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'This field is required.',
                    'numeric' => 'Product Price should only contain numeric characters.',
                ]
            ],
            'description'     => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'This field is required.',
                ]
            ],
            'status'     => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'This field is required.',
                ]
            ],
            'image' => [
                'rules' => 'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]',
                'errors' => [
                    'uploaded' => 'This field is required.',
                    'mime_in' => 'Only file with this extension are allowed: .jpg, .jpeg, .png, .gif.',
                    'max_size' => 'The file is too large. Allowed maximum size is 2 MB.'
                ]
            ],
        ];

        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');
        $filename = $image->getRandomName();
        $image->move('uploads/', $filename);

        if (in_groups('admin')) {
            $request = 'Approved';
            $shop = 'Showed';
        } else {
            $request = 'Not Requested';
            $shop = 'Not Shown';
        }

        $this->productModel->insert([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'image' => $filename,
            'status' => $this->request->getPost('status'),
            'request' => $request,
            'shop' => $shop,
            'seller_id' => user()->id,
        ]);

        return redirect()->to(base_url('/products'))->with('success', 'Product added successfully!');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Product | Desa Ekspor Indonesia',
            'product' => $this->productModel->where('id', $id)->first(),
        ];

        return view('products/edit', ['data' => $data]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = [
            'name'     => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'This field is required.',
                ]
            ],
            'price'     => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'This field is required.',
                    'numeric' => 'Product Price should only contain numeric characters.',
                ]
            ],
            'description'     => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'This field is required.',
                ]
            ],
            'status'     => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'This field is required.',
                ]
            ],
            'new_image' => [
                'rules' => 'max_size[new_image,2048]|mime_in[new_image,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                    'max_size' => 'The file is too large. Allowed maximum size is 2 MB.',
                    'mime_in' => 'Only file with this extension are allowed: .jpg, .jpeg, .png, .gif.',
                ]
            ],
        ];

        if (! $this->validate($rules))
        {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $new_image = $this->request->getFile('new_image');
        $old_image = $this->request->getPost('old_image');

        if ($new_image->getError() == 4) {
            $filename = $this->request->getPost('old_image');
        } else {
            $filename = $new_image->getRandomName();
            $new_image->move('uploads/', $filename);
            
            if (file_exists('uploads/' . $old_image)) {
                unlink('uploads/' . $old_image);
            }
        }

        $this->productModel->save([
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'image' => $filename,
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('/products'))->with('success', 'Product updated successfully!');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $product = $this->productModel->find($id);
        $path = 'uploads/' . $product['image'];

        if (file_exists($path)) {
            unlink($path);
        }

        $this->productModel->delete($id);

        return redirect()->to(base_url('/products'))->with('success', 'Product deleted successfully!');
    }
}
