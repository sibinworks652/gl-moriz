<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductImage extends Model
{
    protected $table         = 'product_images';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['product_id', 'image', 'sort_order'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
