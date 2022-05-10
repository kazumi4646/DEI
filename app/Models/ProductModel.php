<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'price', 'description', 'image', 'status', 'request', 'reason', 'shop', 'seller_id'];

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

    // punya order
    // public function countUnfinishedOrder()
    // {
    //     $builder = $this->db->table('products');
    //     $builder->where()
    // }

    public function getShopProduct()
    {
        $builder = $this->db->table('products'); 
        $builder->select('products.*, users.username');
        $builder->join('users', 'users.id = products.seller_id');
        $builder->where('products.request', 'Approved');

        return $builder->get();   
    }

    public function getProductRequest()
    {
        $builder = $this->db->table('products');
        $builder->select('products.*, users.username');
        $builder->join('users', 'users.id = products.seller_id');
        $builder->where('products.request', 'Requested');

        return $builder->get();
    }
}
