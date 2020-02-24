<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public function department()
    {
      return $this->belongsToMany('App\Department')->withTimestamps()->withPivot('is_primary');
    }
    public function grades()
    {
      return $this->hasMany('App\Grade');
    }
    public function extracurriculars()
    {
      return $this->hasMany('App\Extracurricular');
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
