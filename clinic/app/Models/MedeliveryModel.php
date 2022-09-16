<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 *
 */
class MedeliveryController extends Model
{
  protected $table = 'medelivery';
  protected $primaryKey = 'mid';
  protected $allowedFields = [
    'medID',
    'quantity',
    'until'
  ];
}

 ?>
