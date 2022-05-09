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
    protected $allowedFields    = ['product_name', 'product_price', 'product_description', 'product_image', 'product_status', 'product_category', 'product_by'];

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

    public function getProduct($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['product_id' => $id]);
        }
    }

    public function getActiveProduct()
    {
        return $this->getWhere(['product_status' => 'Active']);
    }

    public function getBidProduct()
    {
        return $this->getWhere(['product_category' => 'Pre Order']);
    }

    public function insertProduct($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateProduct($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['product_id' => $id]);
    }

    public function deleteProduct($id)
    {
        return $this->db->table($this->table)->delete(['product_id' => $id]);
    }
}


