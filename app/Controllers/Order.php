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
        $orders = $this->orderModel->find($id);

        $detailName = explode(',', $orders['product_id']);
        $detailPrice = explode(',', $orders['items_price']);
        $detailImage = explode(',', $orders['items_image']);
        $detailQty = explode(',', $orders['items']);

        $page = [
            'title' => 'Order Detail | Desa Ekspor Indonesia',
            'orders' => $orders,
            'detailName' => $detailName,
            'detailPrice' => $detailPrice,
            'detailImage' => $detailImage,
            'detailQty' => $detailQty,
        ];

        if (in_groups('admin')) {
            return view('admin/order_detail', ['data' => $page]);
        }

        if (in_groups('user')) {
            return view('user/order_detail', ['page' => $page]);
        }
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
            'items_price' => $data['items_price'],
            'items_image' => $data['items_image'],
            'total_items' => $data['total_items'],
            'total_price' => $data['total_price'],
            'order_date' => date('Y-m-d H:i:s'),
            'shipping_address' => user()->address,
            'customer_name' => user()->fullname,
            'customer_email' => user()->email,
            'customer_phone' => user()->telp,
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
        } else if ($status == 'Delivered') {
            $this->orderModel->where('id', $id)->set([
                'status' => $status,
                'shipping_number' => $this->request->getPost('shippingNumber'),
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
            return redirect()->to(base_url('/order/history'))->with('success', 'Order status updated!');
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

    public function detail($id)
    {
        $orders = $this->orderModel->find($id);

        $productName = explode(',', $orders['product_id']);
        $productQty = explode(',', $orders['items']);

        $orderDetail = array_combine($productName, $productQty);

        $data = '';

        foreach ($orderDetail as $product => $items) {
            $data = '<div class="row"><div class="col-4">' . $product . '</div><div class="col-8">: ' . $items . 'Items.</div></div>';
        }

        echo $data;
    }

    public function history()
    {
        $data = [
            'title' => 'Order History | Desa Ekspor Indonesia',
            'histories' => $this->orderModel->getOrderHistory()->getResultArray(),
        ];

        return view('admin/order_history', ['data' => $data]);
    }
}
