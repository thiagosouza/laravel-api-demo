<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	public function orders(){
		return $this->belongsToMany('App\Order', 'orders_has_products', 'products_id', 'orders_id');
	}

}
