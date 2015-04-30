<?php

class Parameters extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'parameter';

    protected  $guarded = array('id');

    public function balance(){
        return $this->hasMany('BalanceSheet', 'parameter_id', 'id');
    }

}
