<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

    /**
     * Remove special character from phone value and store only digit.
     *
     * @return int
     */
    if (!function_exists('setPhone')) {
        function setPhone($value)
        {
            $phone = '';
            if ($value) {
                $phone = preg_replace("/[^0-9]+/", "", $value);
            }

            return $phone;
        }
    }

    /**
     * Change default phone format to USA phone format (xxx) xxx-xxxx
     *
     * @return string
     */
    if (!function_exists('getPhone')) {
        function getPhone($value)
        {
            return  "(" . substr($value, 0, 3) . ") " . substr($value, 3, 3) . "-" . substr($value, 6);
        }
    }

    /**
     * Change date format.
     *
     * @return string
     */
    if (!function_exists('dateFormat')) {
        function dateFormat($value)
        {
            $date = '';
            if ($value) {
                $date = date('Y-m-d', strtotime($value));
            }

            return $date;
        }
    }

    /**
     * Change date format.
     *
     * @return string
     */
    if (!function_exists('viewDateTimeFormat')) {
        function viewDateTimeFormat($value)
        {
            $date = '';
            if ($value) {
                $date = date('m-d-Y H:i:s', strtotime($value));
            }

            return $date;
        }
    }

    /**
     * Change date format.
     *
     * @return string
     */
    if (!function_exists('viewDateHM')) {
        function viewDateHM($value)
        {
            $date = '';
            if ($value) {
                $date = date('m-d-Y H:i', strtotime($value));
            }

            return $date;
        }
    }

    /**
     * Change date format.
     *
     * @return string
     */
    if (!function_exists('viewDateFormat')) {
        function viewDateFormat($value)
        {
            $date = '';
            if ($value) {
                $date = date('m-d-Y', strtotime($value));
            }

            return $date;
        }
    }

    /**
     * Create doral id.
     *
     * @return string
     */
    if (!function_exists('createDoralId')) {
        function createDoralId()
        {
            return 'DOR-' . mt_rand(100000, 999999);
        }
    }

    /**
     * Create doral id.
     *
     * @return string
     */
    if (!function_exists('createEmployeeId')) {
        function createEmployeeId($value)
        {
            return $value. '-' . mt_rand(100000, 999999);
        }
    }


    /**
     * Create password.
     *
     * @return string
     */
    if (!function_exists('setPassword')) {
        function setPassword($value)
        {
            return Hash::make($value);
        }
    }

    /**
     * Set Gender field.
     *
     * @return int
     */
    if (!function_exists('setGender')) {
        function setGender($value)
        {
            if ($value === 'Male' || $value === 'MALE' || $value === '1') {
                $genderData = 1;
            } else if ($value === 'Female' || $value === 'FEMALE' || $value === '2') {
                $genderData = 2;
            } else {
                $genderData = 3;
            }
            return $genderData;

        }
    }

    /**
     * Remove - from ssn.
     *
     * @return string
     */
    if (!function_exists('setSsn')) {
        function setSsn($value)
        {
            $ssn = '';
            if ($value){
                $ssn = str_replace("-","",$value);
            }

            return $ssn;
        }
    }

    /**
     * Remove - from ssn.
     *
     * @return string
     */
    if (!function_exists('getSsn')) {
        function getSsn($value)
        {
            $ssnData = '';

            if ($value) {
                return 'xxx-xx-' . substr($value, -4);
            }

            return $ssnData;
        }
    }

    /**
     * Get the user's gender.
     *
     * @return string
     */
    if (!function_exists('getGender')) {
        function getGender($value)
        {
            if ($value === '1') {
                $genderData = 'Male';
            } else if ($value === '2') {
                $genderData = 'Female';
            } else {
                $genderData = 'Other';
            }
            return $genderData;
        }
    }

    /**
     * Get the user's gender.
     *
     * @return string
     */
    if (!function_exists('isBoolean')) {
        function isBoolean($value)
        {
            $boolValue = '';
            if ($value == '1') {
                $boolValue = 'True';
            } else if ($value == '2') {
                $boolValue = 'False';
            }
            return $boolValue;
        }
    }

    if (!function_exists('begin')) {
        function begin() {
            DB::beginTransaction();
        }
    }

    if (!function_exists('commit')) {
        function commit() {
            DB::commit();
        }
    }

    if (!function_exists('rollback')) {
        function rollback() {
            DB::rollBack();
        }

    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('selection')) {
        function selection(Selection $selection)
        {
            $gender = $selection->where('name','Gender')->get();
            $maritalStatus = $selection->where('name','Marital Status')->get();
            $ethnicity = $selection->where('name','ethnicity')->get();

        }
    }

    /**
     * Change default phone format to USA phone format (xxx) xxx-xxxx
     *
     * @return string
     */
    if (!function_exists('getstatus')) {
        function getstatus($status)
        {
            $statusData = '';
            if ($status === '1') {
                $statusData = '<p class="text-secondary">Verified</p>';
            } else if ($status === '2') {
                $statusData = '<p class="text-success">Approved</p>';
            } else if ($status === '3') {
                $statusData = '<p class="text-danger">Reject</p>';
            }

            return $statusData;
        }
    }

