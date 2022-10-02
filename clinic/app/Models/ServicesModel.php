<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 *
 */
class ServicesModel extends Model
{
  protected $table = 'services';
  protected $primaryKey = 'sid';
  protected $allowedFields = [
    'name',
    'description',
    'content',
    'header_photo',
    'status',

  ];
}

 ?>
