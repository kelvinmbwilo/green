<?php

class Savings extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'savings';
                
                protected  $guarded = array('id');
 
                public function savingtrans(){
                     return $this->hasMany('SavingsTrans', 'saving_id', 'id');
                }
                
                public function applicant(){
                    return $this->belongsTo('Applicants', 'applicant_id', 'id');
                }
                

}

