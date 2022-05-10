<?php

namespace App\Models;

use CodeIgniter\Model;

class RegencyModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'regencies';
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

    public function getCity($province)
    {
        $name = str_replace('_', ' ', $province);

        $builder = $this->db->table('regencies');
        $builder->select('regencies.name');
        $builder->join('provinces', 'provinces.id = regencies.province_id');
        $builder->where('provinces.name', $name);

        return $builder->get();
    }
}
