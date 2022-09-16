<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 *
 */
class ClinicStaffModel extends Model
{
  protected $table = 'ClinicStaff';
  protected $primaryKey = 'csid';
  protected $allowedFields = [
    'name',
    'type',
    'picture',
    'schedule',
    'status'
  ];
}

 ?>
