<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function religion()
    {
      return $this->belongsTo('App\Religion');
    }
    public function bank()
    {
      return $this->belongsTo('App\Bank');
    }
    public function grade()
    {
      return $this->belongsTo('App\Grade');
    }
    public function guardians()
    {
      return $this->hasMany('App\Guardian');
    }
    public function medicalRecords()
    {
      return $this->hasMany('App\MedicalRecord');
    }
    public function absentRecords()
    {
      return $this->hasMany('App\AbsentRecord');
    }
}
