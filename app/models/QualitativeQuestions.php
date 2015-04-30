<?php

class QualitativeQuestions extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qualitative_questions';

    protected  $guarded = array('id');


    public function applicant(){
        return $this->belongsTo('Applicants', 'applicant_id', 'id');
    }

}
