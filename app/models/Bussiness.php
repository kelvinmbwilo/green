<?php

class Busssiness extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bussiness';
                
                protected  $guarded = array('id');
 
                public function returns(){
                    return $this->hasMany('Returns', 'bussiness_id', 'id');
                }
                
                public function granted(){
                    return $this->hasMany('GrantedLoans', 'bussiness_id', 'id');
                }
                
                public function applications(){
                    return $this->hasMany('Applications', 'bussiness_id', 'id');
                }
                
                public function applicant(){
                    return $this->belongsTo('Applicants', 'apllicant_id', 'id');
                }
                

}
