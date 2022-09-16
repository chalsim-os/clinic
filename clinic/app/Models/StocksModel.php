<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 *
 */
class StocksModel extends Model
{
  protected $table = 'StockLogs';
  protected $primaryKey = 'sid';
  protected $allowedFields = [
    'name',
    'medID',
    'oldq',
    'type',
    'quantity',
    'validity'

  ];
}

 ?>
