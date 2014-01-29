<?php

class GroupReturn extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'group_return';
                
                protected  $guarded = array('id');
 
                public function post(){
                    return $this->hasMany('Post', 'subcategory', 'id');
                }
                
                public function group(){
                    return $this->belongsTo('Groups', 'group_id', 'id');
                }
                
                public function granted(){
                    return $this->belongsTo('GroupGranted', 'granted_id', 'id');
                }
                
                 public function user(){
                    return $this->belongsTo('User', 'user_id', 'id');
                }

}
