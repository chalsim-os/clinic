<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 *
 */
class UserModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'aid';
  protected $allowedFields = [
    'name',
    'email',
    'password',
    'token',
    'type',
    'status',

  ];
}

 ?>
