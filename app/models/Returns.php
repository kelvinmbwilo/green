<?php

class Returns extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'returns';
                
                protected  $guarded = array('id');

                public function applicants(){
                    return $this->belongsTo('Applicants', 'applicant_id', 'id');
                }
                
                public function application(){
                    return $this->belongsTo('Applications', 'application_id', 'id');
                }
                
                public function granted(){
                    return $this->belongsTo('GrantedLoans', 'granted_id', 'id');
                }
                
                public function bussiness(){
                    return $this->belongsTo('Busssiness', 'bussiness_id', 'id');
                }
                

}

