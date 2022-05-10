<?php

namespace App\Models;

use CodeIgniter\Model;

class VillageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'villages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name'];

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

    public function getVillage($district)
    {
        $name = str_replace('_', ' ', $district);

        $builder = $this->db->table('villages');
        $builder->select('villages.name');
        $builder->join('districts', 'districts.id = villages.district_id');
        $builder->where('districts.name', $name);

        return $builder->get();
    }
}
