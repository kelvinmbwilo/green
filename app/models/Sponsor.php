<?php

class Sponsor extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sponsors';
                
                protected  $guarded = array('id');
 
                public function application(){
                    return $this->belongsTo('Applications', 'application_id', 'id');
                }
}
