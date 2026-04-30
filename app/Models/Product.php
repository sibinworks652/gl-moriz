<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table         = 'products';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $protectFields = true;
    protected $allowedFields = [
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'type',
        'thumbnail',
        'product_information',
        'features',
        'status',
    ];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
