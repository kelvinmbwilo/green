<?php

class GroupMembers extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'group_members';

    protected  $guarded = array('id');

    public function group(){
        return $this->belongsTo('Groups', 'group_id', 'id');
    }

    public function applicant(){
        return $this->belongsTo('Applicants', 'applicant_id', 'id');
    }


}
