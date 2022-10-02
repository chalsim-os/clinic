<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 *
 */
class MedicineModel extends Model
{
  protected $table = 'medicine';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'name',
    'type',
    'category',
    'stocks'
  ];
}

 ?>
