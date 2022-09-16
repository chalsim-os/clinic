<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 *
 */
class SMed extends Model
{
  protected $table = 'smed';
  protected $primaryKey = 'sid';
  protected $allowedFields = [
    'scid',
    'medID',
    'medname',
    'take'
  ];
}

 ?>
