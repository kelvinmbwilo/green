<?php

class CashParameter extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cash_parameter';

    protected  $guarded = array('id');

    public function flow(){
        return $this->hasMany('CashFlow', 'parameter_id', 'id');
    }

}
