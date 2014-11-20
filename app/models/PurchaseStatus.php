<?php

/**
 * Created by PhpStorm.
 * User: Goros
 * Date: 06.11.2014
 * Time: 1:07
 */
namespace Goros6\Purchases\Models;
use Eloquent;

class PurchaseStatus extends Eloquent
{
	public $timestamps = false;
	protected $table = 'purchaseStatuses';
} 