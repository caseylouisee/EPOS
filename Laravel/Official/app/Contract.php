<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model {	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contracts';
	
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['equipment_id', 'start', 'length', 'value', 'type', 'status', 'paid', 'discount', 'notes'];
	
	public function equipment(){
			return $this->belongsTo('App\Equipment');
	}
		
}
