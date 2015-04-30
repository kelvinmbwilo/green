<?php

class CashFlow extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cash_flow';

    protected  $guarded = array('id');


    public function applicant(){
        return $this->belongsTo('Applicants', 'applicant_id', 'id');
    }

    public function parameter(){
        return $this->belongsTo('CashParameter', 'parameter_id', 'id');
    }
}
