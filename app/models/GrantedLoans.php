<?php

class GrantedLoans extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'granted_loans';
                
                protected  $guarded = array('id');
 
                public function returns(){
                    return $this->hasMany('Returns', 'granted_id', 'id');
                }
                
                public function applicant(){
                    return $this->belongsTo('Applicants', 'applicant_id', 'id');
                }
                
                public function application(){
                    return $this->belongsTo('Applications', 'application_id', 'id');
                }
                
                public function bussiness(){
                    return $this->belongsTo('Busssiness', 'bussiness_id', 'id');
                }
                
               public function user(){
                    return $this->belongsTo('User', 'user_id', 'id');
                }
}
