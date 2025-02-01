<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table            = 'contacts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    protected $allowedFields    = ['user_id', 'first_name', 'last_name', 'mobile'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    
    // Dates
    protected $useTimestamps = true; 
    protected $dateFormat    = 'datetime'; 
    protected $createdField  = 'created_at';  
    protected $updatedField  = 'updated_at';  
    protected $deletedField  = 'deleted_at'; 

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

    public function validateUser($mobile, $password)
    {
        $user = $this->where('mobile', $mobile)->first();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
