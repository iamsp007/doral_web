<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemographicDetails extends Model
{
    use HasFactory;
    protected $table='demographic_details';
    protected $fillable = array('DoralId','PatientID', 'PatientID', 'OfficeID', 'FirstName','LastName','BirthDate','Gender','PriorityCode','ServiceRequestStartDate','AdmissionID','MedicaidNumber','MedicareNumber',
        'SSN','HomePhone','PayerID','PayerName','PayerCoordinatorID','PayerCoordinatorName','PatientStatusID','PatientStatusName','WageParity','PrimaryLanguageID','PrimaryLanguageID','PrimaryLanguageID');
}
