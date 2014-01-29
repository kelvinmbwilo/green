<?php

class Applicants extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'applicants';
                
                protected  $guarded = array('id');
 
                public function savingtrans(){
                    return $this->hasMany('SavingsTrans', 'applicant_id', 'id');
                }
                
                public function savings(){
                    return $this->hasMany('Savings', 'applicant_id', 'id');
                }
                
                public function returns(){
                    return $this->hasMany('Returns', 'applicant_id', 'id');
                }
                
                 public function granted(){
                    return $this->hasOne('GrantedLoans', 'applicant_id', 'id');
                }
                
}
