<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadDocuments extends Model
{
    use HasFactory;

    protected $appends = ['file_url','type_name'];

    /**
     * Relation with user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * Get the user's Date Of Birth.
     *
     * @return string
     */
    public function getFileUrlAttribute()
    {
        if (isset($this->file_name) && !empty($this->file_name)) {
            $directory = 'idProof';
            if ($this->type === "1") {
                $directory = 'idProof';
            } elseif ($this->type === "2") {
                $directory = 'degreeProof';
            } elseif ($this->type === "3") {
                $directory = 'medicalReport';
            } elseif ($this->type === "4") {
                $directory = 'insuranceReport';
            } elseif ($this->type === "5") {
                $directory = 'socialSecurity';
            } elseif ($this->type === "6") {
                $directory = 'professionalReferrance';
            } elseif ($this->type === "7") {
                $directory = 'mainPracticeInsurance';
            } elseif ($this->type === "8") {
                $directory = 'nycNurseCertificate';
            } elseif ($this->type === "9") {
                $directory = 'CPR';
            } elseif ($this->type === "10") {
                $directory = 'physical';
            } elseif ($this->type === "11") {
                $directory = 'forensicDrugScreen';
            } elseif ($this->type === "12") {
                $directory = 'RubellaImmunization';
            } elseif ($this->type === "13") {
                $directory = 'RubellaMeasiesImmunization';
            } elseif ($this->type === "14") {
                $directory = 'malpracticeInsurance';
            } elseif ($this->type === "15") {
                $directory = 'flu';
            } elseif ($this->type === "16") {
                $directory = 'annualPPD';
            } elseif ($this->type === "17") {
                $directory = 'chestXRay';
            } elseif ($this->type === "18") {
                $directory = 'annualTubeScreening';
            } elseif ($this->type === "19") {
                $directory = 'w4document';
            } elseif ($this->type === "20") {
                $directory = 'idProofBack';
            } elseif ($this->type === "21") {
                $directory = 'socialSecurityBack';
            } elseif ($this->type === "22") {
                $directory = 'pdfDoc';
            }  elseif ($this->type === "25") {
                $directory = 'pictureIdentification';
            }  elseif ($this->type === "26") {
                $directory = 'currentCV';
            } elseif ($this->type === "27") {
                $directory = 'ProfessionalLicense';
            } elseif ($this->type === "28") {
                $directory = 'StateRegistrationCertificate';
            } elseif ($this->type === "29") {
                $directory = 'DEALicense';
            } elseif ($this->type === "30") {
                $directory = 'ControlledSubstanceStateLicense';
            } elseif ($this->type === "31") {
                $directory = 'MalpracticeCertificateOfInsurance';
            } elseif ($this->type === "32") {
                $directory = 'ExplanationOfAllMalpractice';
            } elseif ($this->type === "33") {
                $directory = 'MedicalSchoolDiploma';
            } elseif ($this->type === "34") {
                $directory = 'ResidencyCertificate';
            } elseif ($this->type === "35") {
                $directory = 'FellowshipCertificate';
            } elseif ($this->type === "36") {
                $directory = 'InternshipCertificate';
            } elseif ($this->type === "37") {
                $directory = 'ECFMGCertificate';
            } elseif ($this->type === "38") {
                $directory = 'BoardCertificate(c)';
            } elseif ($this->type === "39") {
                $directory = 'HospitalAffiliationLetter';
            } elseif ($this->type === "40") {
                $directory = 'SanctionsQueries';
            } elseif ($this->type === "41") {
                $directory = 'MedicareWelcomeLetter';
            } elseif ($this->type === "42") {
                $directory = 'SignedW9';
            } elseif ($this->type === "43") {
                $directory = 'SignedESignatureForm';
            } elseif ($this->type === "44") {
                $directory = 'CovidCertificate';
            } elseif ($this->type === "45") {
                $directory = 'CPRACLS';
            } elseif ($this->type === "46") {
                $directory = 'passport';
            } elseif ($this->type === "47") {
                $directory = 'greencard';
            } elseif ($this->type === "48") {
                $directory = 'workpermit';
            } 

            return env('API_PUBLIC_URL').'/storage/documents/' . $this->user_id . '/' . $directory . '/' . $this->file_name;
        } else {
            return null;
        }
    }
    
     /**
     * Get the user's Date Of Birth.
     *
     * @return string
     */
    public function getFileTypeAttribute()
    {
        if (isset($this->type) && !empty($this->type)) {
            $directory = 'idProof';
            if ($this->type === "1") {
                $directory = 'idProof';
            } elseif ($this->type === "2") {
                $directory = 'degreeProof';
            } elseif ($this->type === "3") {
                $directory = 'medicalReport';
            } elseif ($this->type === "4") {
                $directory = 'insuranceReport';
            } elseif ($this->type === "5") {
                $directory = 'socialSecurity';
            } elseif ($this->type === "6") {
                $directory = 'professionalReferrance';
            } elseif ($this->type === "7") {
                $directory = 'mainPracticeInsurance';
            } elseif ($this->type === "8") {
                $directory = 'nycNurseCertificate';
            } elseif ($this->type === "9") {
                $directory = 'CPR';
            } elseif ($this->type === "10") {
                $directory = 'physical';
            } elseif ($this->type === "11") {
                $directory = 'forensicDrugScreen';
            } elseif ($this->type === "12") {
                $directory = 'RubellaImmunization';
            } elseif ($this->type === "13") {
                $directory = 'RubellaMeasiesImmunization';
            } elseif ($this->type === "14") {
                $directory = 'malpracticeInsurance';
            } elseif ($this->type === "15") {
                $directory = 'flu';
            } elseif ($this->type === "16") {
                $directory = 'annualPPD';
            } elseif ($this->type === "17") {
                $directory = 'chestXRay';
            } elseif ($this->type === "18") {
                $directory = 'annualTubeScreening';
            } elseif ($this->type === "19") {
                $directory = 'w4document';
            } elseif ($this->type === "20") {
                $directory = 'idProofBack';
            } elseif ($this->type === "21") {
                $directory = 'socialSecurityBack';
            } elseif ($this->type === "22") {
                $directory = 'pdfDoc';
            }  elseif ($this->type === "25") {
                $directory = 'pictureIdentification';
            }  elseif ($this->type === "26") {
                $directory = 'currentCV';
            } elseif ($this->type === "27") {
                $directory = 'ProfessionalLicense';
            } elseif ($this->type === "28") {
                $directory = 'StateRegistrationCertificate';
            } elseif ($this->type === "29") {
                $directory = 'DEALicense';
            } elseif ($this->type === "30") {
                $directory = 'ControlledSubstanceStateLicense';
            } elseif ($this->type === "31") {
                $directory = 'MalpracticeCertificateOfInsurance';
            } elseif ($this->type === "32") {
                $directory = 'ExplanationOfAllMalpractice';
            } elseif ($this->type === "33") {
                $directory = 'MedicalSchoolDiploma';
            } elseif ($this->type === "34") {
                $directory = 'ResidencyCertificate';
            } elseif ($this->type === "35") {
                $directory = 'FellowshipCertificate';
            } elseif ($this->type === "36") {
                $directory = 'IntershipCertificate';
            } elseif ($this->type === "37") {
                $directory = 'ECFMGCertificate';
            } elseif ($this->type === "38") {
                $directory = 'BoardCertificate(c)';
            } elseif ($this->type === "39") {
                $directory = 'HospitalAffiliationLetter';
            } elseif ($this->type === "40") {
                $directory = 'SanctionsQueries';
            } elseif ($this->type === "41") {
                $directory = 'MedicalWelcomeLetter';
            } elseif ($this->type === "42") {
                $directory = 'SignedW9';
            } elseif ($this->type === "43") {
                $directory = 'SignedESignatureForm';
            } elseif ($this->type === "44") {
                $directory = 'CovidCertificate';
            } elseif ($this->type === "45") {
                $directory = 'CPRACLS';
            } elseif ($this->type === "46") {
                $directory = 'passport';
            } elseif ($this->type === "47") {
                $directory = 'greencard';
            } elseif ($this->type === "48") {
                $directory = 'workpermit';
            } 
            return $directory;
        } else {
            return '';
        }
    }

     /**
    /**
     * Get the user's Date Of Birth.
     *
     * @return string
     */
    public function getTypeNameAttribute()
    {
        if (isset($this->type) && !empty($this->type)) {
            $directory = 'Id Proof';
            if ($this->type === "1") {
                $directory = 'Id Proof';
            } elseif ($this->type === "2") {
                $directory = 'Degree Proof';
            } elseif ($this->type === "3") {
                $directory = 'Medical Report';
            } elseif ($this->type === "4") {
                $directory = 'Insurance Report';
            } elseif ($this->type === "5") {
                $directory = 'Social Security';
            } elseif ($this->type === "6") {
                $directory = 'Professional Referrance';
            } elseif ($this->type === "7") {
                $directory = 'Main Practice Insurance';
            } elseif ($this->type === "8") {
                $directory = 'Nyc Nurse Certificate';
            } elseif ($this->type === "9") {
                $directory = 'CPR';
            } elseif ($this->type === "10") {
                $directory = 'Physical';
            } elseif ($this->type === "11") {
                $directory = 'Forensic Drug Screen';
            } elseif ($this->type === "12") {
                $directory = 'Rubella Immunization';
            } elseif ($this->type === "13") {
                $directory = 'Rubella Measies Immunization';
            } elseif ($this->type === "14") {
                $directory = 'Malpractice Insurance';
            } elseif ($this->type === "15") {
                $directory = 'Flu';
            } elseif ($this->type === "16") {
                $directory = 'Annual PPD';
            } elseif ($this->type === "17") {
                $directory = 'Chest X-Ray';
            } elseif ($this->type === "18") {
                $directory = 'Annual Tube Screening';
            } elseif ($this->type === "19") {
                $directory = 'W4 Document';
            } elseif ($this->type === "20") {
                $directory = 'Id Proof Back';
            } elseif ($this->type === "21") {
                $directory = 'Social Security Back';
            } elseif ($this->type === "22") {
                $directory = 'Pdf Doc';
            }  elseif ($this->type === "25") {
                $directory = 'Picture Identification';
            }  elseif ($this->type === "26") {
                $directory = 'Current CV';
            } elseif ($this->type === "27") {
                $directory = 'Professional License';
            } elseif ($this->type === "28") {
                $directory = 'State Registration Certificate';
            } elseif ($this->type === "29") {
                $directory = 'DEALicense';
            } elseif ($this->type === "30") {
                $directory = 'Controlled Substance State License';
            } elseif ($this->type === "31") {
                $directory = 'Mal Practice Certificate Of Insurance';
            } elseif ($this->type === "32") {
                $directory = 'Explanation Of All Malpractice';
            } elseif ($this->type === "33") {
                $directory = 'Medical School Diploma';
            } elseif ($this->type === "34") {
                $directory = 'Residency Certificate';
            } elseif ($this->type === "35") {
                $directory = 'Fellowship Certificate';
            } elseif ($this->type === "36") {
                $directory = 'Intership Certificate';
            } elseif ($this->type === "37") {
                $directory = 'ECFMG Certificate';
            } elseif ($this->type === "38") {
                $directory = 'Board Certificate(c)';
            } elseif ($this->type === "39") {
                $directory = 'Hospital Affiliation Letter';
            } elseif ($this->type === "40") {
                $directory = 'Sanctions Queries';
            } elseif ($this->type === "41") {
                $directory = 'Medical Welcome Letter';
            } elseif ($this->type === "42") {
                $directory = 'Signed W9';
            } elseif ($this->type === "43") {
                $directory = 'Signed E-Signature Form';
            } elseif ($this->type === "44") {
                $directory = 'Covid Certificate';
            } elseif ($this->type === "45") {
                $directory = 'CPRACLS';
            } elseif ($this->type === "46") {
                $directory = 'Passport';
            } elseif ($this->type === "47") {
                $directory = 'Greencard';
            } elseif ($this->type === "48") {
                $directory = 'Workpermit';
            } 
            return $directory;
        } else {
            return '';
        }
    }
}
