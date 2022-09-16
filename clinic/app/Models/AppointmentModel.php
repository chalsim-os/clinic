<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 *
 */
class AppointmentModel extends Model
{
  protected $table = 'appointment';
  protected $primaryKey = 'scid';
  protected $allowedFields = [
    'ClientID',
    'name',
    'phone',
    'department',
    'type',
    'date',
    'time',
    'aptype',
    'apstatus',
    'notes',
    'findings'
  ];
}

 ?>
