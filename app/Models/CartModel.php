<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'carts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'product_id', 'items'];

    // Dates
    protected $useTimestamps = false;
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

    public function getCartProduct($user_id)
    {
        $builder = $this->db->table('carts');
        $builder->select('products.id, products.image, products.name, products.price, carts.items');
        $builder->join('products', 'products.id = carts.product_id');
        $builder->join('users', 'users.id = carts.user_id');
        $builder->where('carts.user_id', $user_id);

        return $builder->get();
    }

    public function getItems($user_id)
    {
        $builder = $this->db->table('carts');
        $builder->selectSum('items');
        $builder->where('carts.user_id', $user_id);

        return $builder->get();
    }

    public function getTotal($user_id)
    {
        return $this->db->query('SELECT carts.items, products.price, SUM(price*items) as total FROM `carts` JOIN products ON products.id = carts.product_id WHERE user_id = ' . $user_id . ';');
    }

    public function checkProductCart($product_id)
    {
        return $this->db->table($this->table)->where('user_id', user()->id)->where('product_id', $product_id)->get();
    }

    public function getAllId($user_id)
    {
        $builder = $this->db->table('carts');
        $builder->select('products.id, products.name, carts.items');
        $builder->join('products', 'products.id = carts.product_id');
        $builder->join('users', 'users.id = carts.user_id');
        $builder->where('carts.user_id', $user_id);

        return $builder->get();
    }

    public function deleteCartItem($id, $user_id)
    {
        return $this->db->table($this->table)->where('product_id', $id)->where('user_id', $user_id)->delete();
    }
}
