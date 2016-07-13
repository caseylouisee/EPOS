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

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['equip_id', 'start', 'end', 'value', 'type', 'status', 'paid', 'discount', 'notes', 'invoice_date', 'invoice_sent'];
		
}
