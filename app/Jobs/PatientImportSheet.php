<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use GuzzleHttp\Client;

class PatientImportSheet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file = null;
    public $referral_id = null;
    public $request = [];
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file,$referral_id,$request)
    {
        $this->file = $file;
        $this->referral_id = $referral_id;
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
        $file_path = $this->file->getPathname();
        $file_mime = $this->file->getmimeType();
        $file_org  = $this->file->getClientOriginalName();

        $client = new Client();
        $response = $client->request(
            'POST',
            env('API_URL').'/auth/patient-referral/store',
            [
                'multipart' => [
                    [
                        'name'=>'referral_id',
                        'contents'=>$this->referral_id
                    ],
                    [
                        'name'=>'service_id',
                        'contents'=>$this->request->service_id
                    ],
                    [
                        'name'=>'file_type',
                        'contents'=>$this->request->vbc_select
                    ],
                    [
                        'name'=>'form_id',
                        'contents'=>isset($this->request->formSelect) ? $this->request->formSelect : NULL
                    ],
                    [
                        'name'     => 'file_name',
                        'filename' => $file_org,
                        'Mime-Type'=> $file_mime,
                        'contents' => fopen( $file_path, 'r' ),
                    ]
                ],
                'headers' => [
                    'X-Requested-With' => 'XMLHttpRequest',
                    'Access-Control-Allow-Origin' => 'http://localhost'
                ]
            ]
        );
        $resp = json_decode($response->getBody()->getContents());

        return $resp;
    }
}
