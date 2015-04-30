<?php

class IncomeStatement extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'income_statement';

    protected  $guarded = array('id');


    public function applicant(){
        return $this->belongsTo('Applicants', 'applicant_id', 'id');
    }

}
