<?php

class Outflow extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'outflow';

    protected  $guarded = array('id');


    public function applicant(){
        return $this->belongsTo('Applicants', 'applicant_id', 'id');
    }

    public function parameter(){
        return $this->belongsTo('Parameters', 'parameter_id', 'id');
    }
}
