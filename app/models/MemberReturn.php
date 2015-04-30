<?php

class MemberReturn extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'group_member_return';

    protected  $guarded = array('id');

    public function applicant(){
        return $this->belongsTo('Applicants', 'applicant_id', 'id');
    }

    public function application(){
        return $this->belongsTo('GroupApplication', 'application_id', 'id');
    }

    public function granted(){
        return $this->belongsTo('GroupGranted', 'granted_id', 'id');
    }

    public function user(){
        return $this->belongsTo('User', 'user_id', 'id');
    }

}
