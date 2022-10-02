<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 *
 */
class MedicineRequestModel extends Model
{
  protected $table = 'medrequest';
  protected $primaryKey = 'mrid';
  protected $allowedFields = [
    'clientID',
    'name',
    'phone',
    'complaints',
    'medicine',
    'quantity',
    'status'
  ];
}

 ?>
