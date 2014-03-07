<?php

class SavingsTrans extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'savings_trans';
                
                protected  $guarded = array('id');
 
                public function applicant(){
                    return $this->belongsTo('Applicants', 'applicant_id', 'id');
                }
                
                public function savings(){
                    return $this->belongsTo('Savings', 'saving_id', 'id');
                }
                

}
