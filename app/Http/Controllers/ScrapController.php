<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ScrapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $request->all();
        $curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://20.106.235.102/user/run?categoryid='.$input['categoryid'].'&userid='.$input['userid'].'&siteid='.$input['siteid'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Cookie: XSRF-TOKEN=eyJpdiI6IlRZOXlsVTNobGVZTHVOSjA3SU0rbWc9PSIsInZhbHVlIjoieHRqcytLK3l5S0t0TmgwMkh0akoyd0lpdzNlN0IzUUdmOVZ0QnJpM1phM1U2N1RqWWlTYVpFVDJWcVJ4Q0w1QWoxOUdYd0tSYnd3UXJYb2JJOE1DVzc2aGxQRjdsTUpTdkYxUUoyR0czbXFjbXUwVy9MSjZxcTNCaEpRK05JejUiLCJtYWMiOiJiYzE0YjM2NTdiYTJkYzFhNjRhMjExOGQ5ZTAzODA0Mzc3NjY0NWE0MTQ2YmViNDY4NDUxYWI5NWE4ZWVjMzkzIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IkJZNGFFTFRBaFVDOGJyZFRYRGNmVGc9PSIsInZhbHVlIjoiNk40WlNvSm1qeUtaVTBKSlA4V1BTYkMwVjJ0L3Fkd0tBQ1pJUjFFN3RMQ2wxelpkdy9RNmhVak9JZkI2L2NqSE1ZTnpFNkcyTlg1K3hPbGtEVlFpRlg0UnNacWgxd1ZSYUNTWjVqby9GellkQ1V6ekhocTZoTjNaME94czVXRmsiLCJtYWMiOiIwYTAyOWU4NzZkYzk3MWY3ZTkxM2U2OGFkOGE4OTg3MGE5ODBkOWNiNjk2NDlhMmRiYzEyN2M4MDM0NTA4ODFkIiwidGFnIjoiIn0%3D'
			),
		));

		$response = curl_exec($curl);
		dd($response);
		curl_close($curl);
		
		return $this->generateResponse(true, 'Site has been started', $response, 200);
   }

   	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        $input = $request->all();
        $curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://20.106.235.102/approvment?id='.$input['id'].'&status='.$input['status'].'&site='.$input['site'].'&user_id='.$input['user_id'].'&cat_id='.$input['cat_id'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Cookie: XSRF-TOKEN=eyJpdiI6IlRZOXlsVTNobGVZTHVOSjA3SU0rbWc9PSIsInZhbHVlIjoieHRqcytLK3l5S0t0TmgwMkh0akoyd0lpdzNlN0IzUUdmOVZ0QnJpM1phM1U2N1RqWWlTYVpFVDJWcVJ4Q0w1QWoxOUdYd0tSYnd3UXJYb2JJOE1DVzc2aGxQRjdsTUpTdkYxUUoyR0czbXFjbXUwVy9MSjZxcTNCaEpRK05JejUiLCJtYWMiOiJiYzE0YjM2NTdiYTJkYzFhNjRhMjExOGQ5ZTAzODA0Mzc3NjY0NWE0MTQ2YmViNDY4NDUxYWI5NWE4ZWVjMzkzIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IkJZNGFFTFRBaFVDOGJyZFRYRGNmVGc9PSIsInZhbHVlIjoiNk40WlNvSm1qeUtaVTBKSlA4V1BTYkMwVjJ0L3Fkd0tBQ1pJUjFFN3RMQ2wxelpkdy9RNmhVak9JZkI2L2NqSE1ZTnpFNkcyTlg1K3hPbGtEVlFpRlg0UnNacWgxd1ZSYUNTWjVqby9GellkQ1V6ekhocTZoTjNaME94czVXRmsiLCJtYWMiOiIwYTAyOWU4NzZkYzk3MWY3ZTkxM2U2OGFkOGE4OTg3MGE5ODBkOWNiNjk2NDlhMmRiYzEyN2M4MDM0NTA4ODFkIiwidGFnIjoiIn0%3D'
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
				
		return $this->generateResponse(true, 'Status has changed successfully', $response, 200);
   }
   
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateApplicantStatus(Request $request)
    {
        $input = $request->all();
        $curl = curl_init();
		
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://20.106.235.102/change_status?category='.$input['category'].'&userid='.$input['userid'].'&status='.$input['status'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Cookie: XSRF-TOKEN=eyJpdiI6IlRZOXlsVTNobGVZTHVOSjA3SU0rbWc9PSIsInZhbHVlIjoieHRqcytLK3l5S0t0TmgwMkh0akoyd0lpdzNlN0IzUUdmOVZ0QnJpM1phM1U2N1RqWWlTYVpFVDJWcVJ4Q0w1QWoxOUdYd0tSYnd3UXJYb2JJOE1DVzc2aGxQRjdsTUpTdkYxUUoyR0czbXFjbXUwVy9MSjZxcTNCaEpRK05JejUiLCJtYWMiOiJiYzE0YjM2NTdiYTJkYzFhNjRhMjExOGQ5ZTAzODA0Mzc3NjY0NWE0MTQ2YmViNDY4NDUxYWI5NWE4ZWVjMzkzIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IkJZNGFFTFRBaFVDOGJyZFRYRGNmVGc9PSIsInZhbHVlIjoiNk40WlNvSm1qeUtaVTBKSlA4V1BTYkMwVjJ0L3Fkd0tBQ1pJUjFFN3RMQ2wxelpkdy9RNmhVak9JZkI2L2NqSE1ZTnpFNkcyTlg1K3hPbGtEVlFpRlg0UnNacWgxd1ZSYUNTWjVqby9GellkQ1V6ekhocTZoTjNaME94czVXRmsiLCJtYWMiOiIwYTAyOWU4NzZkYzk3MWY3ZTkxM2U2OGFkOGE4OTg3MGE5ODBkOWNiNjk2NDlhMmRiYzEyN2M4MDM0NTA4ODFkIiwidGFnIjoiIn0%3D'
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $this->generateResponse(true, 'update status!', $response, 200);
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateScrappStatus(Request $request)
    {
        $input = $request->all();
        
        $curl = curl_init();
		
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://20.106.235.102/scrapping_status?category='.$input['category'].'&userid='.$input['userid'].'&status='.$input['status'],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Cookie: XSRF-TOKEN=eyJpdiI6IlRZOXlsVTNobGVZTHVOSjA3SU0rbWc9PSIsInZhbHVlIjoieHRqcytLK3l5S0t0TmgwMkh0akoyd0lpdzNlN0IzUUdmOVZ0QnJpM1phM1U2N1RqWWlTYVpFVDJWcVJ4Q0w1QWoxOUdYd0tSYnd3UXJYb2JJOE1DVzc2aGxQRjdsTUpTdkYxUUoyR0czbXFjbXUwVy9MSjZxcTNCaEpRK05JejUiLCJtYWMiOiJiYzE0YjM2NTdiYTJkYzFhNjRhMjExOGQ5ZTAzODA0Mzc3NjY0NWE0MTQ2YmViNDY4NDUxYWI5NWE4ZWVjMzkzIiwidGFnIjoiIn0%3D; laravel_session=eyJpdiI6IkJZNGFFTFRBaFVDOGJyZFRYRGNmVGc9PSIsInZhbHVlIjoiNk40WlNvSm1qeUtaVTBKSlA4V1BTYkMwVjJ0L3Fkd0tBQ1pJUjFFN3RMQ2wxelpkdy9RNmhVak9JZkI2L2NqSE1ZTnpFNkcyTlg1K3hPbGtEVlFpRlg0UnNacWgxd1ZSYUNTWjVqby9GellkQ1V6ekhocTZoTjNaME94czVXRmsiLCJtYWMiOiIwYTAyOWU4NzZkYzk3MWY3ZTkxM2U2OGFkOGE4OTg3MGE5ODBkOWNiNjk2NDlhMmRiYzEyN2M4MDM0NTA4ODFkIiwidGFnIjoiIn0%3D'
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		return $this->generateResponse(true, 'update status!', $response, 200);
   }
   
   public function generateResponse($status = false, $message = NULL,  $data = array(), $statusCode = 200, $error = array(), $url = '')
    {
        $response["status"] = $status;
        $response["code"] = $statusCode;
        $response["message"] = $message;
        $response["data"] = $data;

        return response()->json($response, $statusCode);
    }
}


