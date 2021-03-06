<?php

class Applicants extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'applicants';
                
    protected  $guarded = array('id');

    public function savingtrans(){
        return $this->hasMany('SavingsTrans', 'applicant_id', 'id');
    }

    public function savings(){
        return $this->hasOne('Savings', 'applicant_id', 'id');
    }

    public function returns(){
        return $this->hasMany('Returns', 'applicant_id', 'id');
    }

     public function granted(){
        return $this->hasOne('GrantedLoans', 'applicant_id', 'id');
    }

    public function business(){
        return $this->hasMany('Busssiness', 'apllicant_id', 'id');
    }

    public function application(){
        return $this->hasMany('Applications', 'applicant_id', 'id');
    }

    public function group(){
        return $this->hasOne('GroupMembers', 'applicant_id', 'id');
    }

    public function balance(){
        return $this->hasMany('BalanceSheet', 'applicant_id', 'id');
    }

    public function cashflow(){
        return $this->hasMany('CashFlow', 'applicant_id', 'id');
    }

    public function income(){
        return $this->hasMany('IncomeStatement', 'applicant_id', 'id');
    }


}
