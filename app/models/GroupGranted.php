<?php

class GroupGranted extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'group_granted';
                
                protected  $guarded = array('id');
 
                public function savingtrans(){
                     return $this->hasMany('SavingsTrans', 'saving_id', 'id');
                }
                
                public function returns(){
                     return $this->hasMany('GroupReturn', 'granted_id', 'id');
                }
                
                public function group(){
                    return $this->belongsTo('Groups', 'group_id', 'id');
                }
                
                public function application(){
                    return $this->belongsTo('GroupApplication', 'application_id', 'id');
                }
                
                public function user(){
                    return $this->belongsTo('User', 'user_id', 'id');
                }

}

