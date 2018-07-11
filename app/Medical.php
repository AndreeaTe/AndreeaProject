<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model {
	protected $table = 'medicalfile';

	protected $fillable = ['nameCompany', 'type', 'recommendations', 'medicalOpinion'];

	public function user() {
		return $this->hasOne('App\User', 'id', 'idUser');
	}

	public function patient() {
		return $this->hasOne('App\Patient', 'id', 'idPatient');
	}

	public function company() {
		return $this->hasOne('App\Company', 'id', 'idCompany');
	}

}
