<?php

class Applications extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'applications';
                
                protected  $guarded = array('id');
 
                public function returns(){
                    return $this->hasMany('Returns', 'application_id', 'id');
                }
                
                public function sponsor(){
                    return $this->hasMany('Sponsor', 'application_id', 'id');
                }
                
                 public function granted(){
                    return $this->hasOne('GrantedLoans', 'application_id', 'id');
                }
                
                public function applicant(){
                    return $this->belongsTo('Applicants', 'applicant_id', 'id');
                }
                
                public function bussiness(){
                    return $this->belongsTo('Busssiness', 'bussiness_id', 'id');
                }
                
                public function user(){
                    return $this->belongsTo('User', 'user_id', 'id');
                }

}
