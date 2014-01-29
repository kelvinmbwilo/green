<?php

class Groups extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'groups';
                
                protected  $guarded = array('id');
 
                public function returns(){
                    return $this->hasMany('GroupReturn', 'group_id', 'id');
                }
                
                public function applications(){
                    return $this->hasMany('GroupApplication', 'group_id', 'id');
                }
                
                public function granted(){
                    return $this->hasMany('GroupGranted', 'group_id', 'id');
                }
                
               

}
