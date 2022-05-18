<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Order extends ResourceController
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

        if (in_groups('admin')) {
            $data = [
                'title' => 'Product Order | Desa Ekspor Indonesia',
                'orders' => $this->orderModel->getAllOrders()->getResultArray(),
            ];

            return view('admin/orders', ['data' => $data]);
        }

        if (in_groups('user')) {
            $page = [
                'title' => 'My Orders | Desa Ekspor Indonesia',
                'orders' => $this->orderModel->where('user_id', user()->id)->orderBy('order_date', 'DESC')->findAll(),
            ];

            return view('user/orders', ['page' => $page]);
        }
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
        date_default_timezone_set('Asia/Jakarta');

        $data = $this->request->getPost();

        $this->orderModel->insert([
            'user_id' => user()->id,
            'trx_id' => '#ORD' . user()->id . '-' . date('Ymd') . '-' . date('H') . date('i'),
            'product_id' => $data['product_id'],
            'items' => $data['items'],
            'total_items' => $data['total_items'],
            'total_price' => $data['total_price'],
            'order_date' => date('Y-m-d H:i:s'),
        ]);
        $this->cartModel->where('user_id', user()->id)->delete();

        return redirect()->to(base_url('/orders'));
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
        date_default_timezone_set('Asia/Jakarta');

        $status = $this->request->getPost('status');

        if ($status == 'Paid') {
            $this->orderModel->where('id', $id)->set([
                'payment_date' => date('Y-m-d H:i:s'),
                'status' => $status,
            ])->update();
        } else if ($status == 'Cancel') {
            $this->orderModel->where('id', $id)->set([
                'status' => $status,
                'status_message' => $this->request->getPost('message'),
            ])->update();
        } else {
            $this->orderModel->where('id', $id)->set([
                'status' => $status,
            ])->update();
        }

        if ($status == 'Success' || $status == 'Cancel') {
            // TODO: add status detail message
            return redirect()->to(base_url('/orders/history'))->with('success', 'Order status updated!');
        } else {
            return redirect()->to(base_url('/orders'))->with('success', 'Order status changed to "' . $status .  '"!');
        }
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
