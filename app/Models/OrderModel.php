<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'trx_id', 'product_id', 'items', 'total_items', 'total_price', 'order_date', 'payment_date', 'status', 'shipping_number', 'status_message'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllOrders()
    {
        $builder = $this->db->table('orders');
        $builder->select('orders.*, users.email');
        $builder->join('users', 'users.id = orders.user_id');
        $builder->where('orders.status !=', 'Success');
        $builder->where('orders.status !=', 'Canceled');

        return $builder->get();
    }

    public function getOrderHistory()
    {
        $builder = $this->db->table('orders');
        $builder->select('orders.*, users.email');
        $builder->join('users', 'users.id = orders.user_id');
        $builder->where('orders.status', 'Success');
        $builder->orWhere('orders.status', 'Canceled');

        return $builder->get();
    }
}
