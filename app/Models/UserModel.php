<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    protected $allowedFields    = ['username', 'mobile' , 'first_name', 'last_name', 'password'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [
        'id' => 'int'
    ];
    
    // Dates
    protected $useTimestamps = true; 
    protected $dateFormat    = 'datetime'; 
    protected $createdField  = 'created_at'; 
    protected $updatedField  = 'updated_at'; 
    protected $deletedField  = 'deleted_at'; 

    // Validation
    // protected $validationRules = [
    //     'username'      => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
    //     'first_name'    => 'required|min_length[3]|max_length[50]',
    //     'last_name'     => 'required|min_length[3]|max_length[50]',
    //     'mobile'        => 'required|is_unique[users.mobile]|min_length[10]|max_length[15]',
    //     'password'      => 'required',
    //     'confirm_password' => 'required|matches[password]',
    // ];
    
    // protected $validationMessages = [
    //     'username' => [
    //         'is_unique' => 'این نام کاربری قبلاً ثبت شده است.',
    //     ],
    //     'mobile' => [
    //         'is_unique' => 'این شماره موبایل قبلاً ثبت شده است.',
    //     ],
    //     'confirm_password' => [
    //         'matches' => 'رمز عبور و تأیید رمز عبور مطابقت ندارند.',
    //     ],
    // ];
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
}
