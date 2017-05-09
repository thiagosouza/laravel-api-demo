<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Client;
use App\Product;

class Order extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';
	protected $hidden = ['created_at', 'updated_at'];
	protected $fillable = ['id', 'clients_id'];

	public function client(){
		return $this->hasOne('App\Client', 'id', 'clients_id');
	}

	public function products(){
		return $this->belongsToMany('App\Product', 'orders_has_products', 'orders_id', 'products_id');
	}
}
