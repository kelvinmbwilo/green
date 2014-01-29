<?php

class GroupApplication extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'group_application';
                
                protected  $guarded = array('id');
 
                public function granted(){
                    return $this->hasOne('GroupGranted', 'application_id', 'id');
                }
                
                public function group(){
                    return $this->belongsTo('Groups', 'group_id', 'id');
                }
                
                public function user(){
                    return $this->belongsTo('User', 'user_id', 'id');
                }

}

