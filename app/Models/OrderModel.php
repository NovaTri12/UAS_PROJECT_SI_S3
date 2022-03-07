<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'order';
    protected $primaryKey       = 'id_order';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['quantity', 'total_price'];

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


    public function getAll()
    {
        return $this->db->table('order')
                        ->join('membership', 'membership_id = id_membership', 'inner')
                        ->join('order_details', 'id_order_details = id_order', 'inner')
                        ->join('customer', 'order_details.customer_id = customer.id_customer', 'inner')
                        ->join('project', 'project_id = id_project', 'inner')
                        ->join('project_category', 'project_category_id = id_project_category', 'inner')
                        ->get()->getResultArray();
    }
}
