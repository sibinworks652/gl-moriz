<?php

namespace App\Models;

use CodeIgniter\Model;

class Subcategory extends Model
{
    protected $table         = 'subcategories';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['category_id', 'name', 'slug', 'thumbnail', 'status'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
