<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Cart extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        if (!logged_in()) {
            return redirect()->to(base_url('/login'));
        }

        $data = $this->cartModel->getAllId(user()->id)->getResultArray();

        $page = [
            'title' => 'My Cart | Desa Ekspor Indonesia',
            'cart' => $this->cartModel->getCartProduct(user()->id)->getResultArray(),
            'items' => $this->cartModel->getItems(user()->id)->getResultArray(),
            'total' => $this->cartModel->getTotal(user()->id)->getResultArray(),
            'id' => $data,
        ];

        return view('user/cart', ['page' => $page]);
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
        $id = $this->request->getPost('product_id');
        $cart = $this->cartModel->checkProductCart($id)->getResultArray();

        if (count($cart) > 0) {
            $this->cartModel->save([
                'id' => $cart[0]['id'],
                'items' => $cart[0]['items'] + 1,
            ]);
        } else {
            $this->cartModel->insert([
                'user_id' => user()->id,
                'product_id' => $id,
            ]);
        }

        return redirect()->to(base_url('/cart'));
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
        $this->cartModel->deleteCartItem($id, user()->id);

        return redirect()->to(base_url('/cart'));
    }

    public function min_product()
    {
        $id = $this->request->getPost('product_id');
        $cart = $this->cartModel->checkProductCart($id)->getResultArray();

        $this->cartModel->save([
            'id' => $cart[0]['id'],
            'items' => $cart[0]['items'] - 1,
        ]);

        return redirect()->to(base_url('/cart'));
    }
}
