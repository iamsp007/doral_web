<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <title>Welcome to Doral</title>
   <style>
		@page {
			footer: page-footer;
			header: page-header;
				margin: 15px;
				margin-footer: 18pt;
			marks: crop cross;
			/* size: A4 landscape; */
		}
      	@font-face {
            font-family: 'robotoblack';
            src: url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.eot')}}");
            src: url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.eot?#iefix')}}") format('embedded-opentype'),
                  url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.woff2')}}") format('woff2'),
                  url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.woff')}}") format('woff'),
                  url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.ttf')}}") format('truetype'),
                  url("{{asset('fonts/roboto_black_macroman/Roboto-Black-webfont.svg#robotoblack')}}") format('svg');
            font-weight: normal;
            font-style: normal;
      	}
      	body {
			margin: 0;
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
			font-size: 12pt;
		}
        table, tr, td {
			border-collapse: separate;
            border-spacing: 0;
		}
		table { width: 100%; }
		td { vertical-align: middle; }
		.page-break { page-break-before: always; }
        #tblfirst td {padding: 35px 0 0 0;text-align:center}
   </style>
</head>
<body style='padding: 0;margin: 0;margin: 0;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;text-align: left;background-color: #fff;'>
	<table style="width: 100%;" id="tblfirst">
		<thead style="background-color: #07737A;padding:0;margin: 0 auto;justify-content: center;align-items: center;">
			<tr>
				<td>
					<a href="index.html" title="Welcome to Doral">
						<img style="width:150px;height:92.28px;" src="{{ asset('assets/img/green_logo.jpg') }}" alt="Welcome to Doral">
					</a>
				</td>
			</tr>
		</thead>
	</table>
	@if ($dea)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">DEA INFORMATION</div>
			@foreach ($dea as $deaData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($deaData->created_at) }}">
						</td>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Name</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $deaData->name }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $deaData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $deaData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($omig)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">OMIG INFORMATION</div>
			@foreach ($omig as $omigData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($omigData->created_at) }}">
						</td>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Provider Name</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $omigData->provider_name }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $omigData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $omigData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($oig)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">OIG INFORMATION</div>
			@foreach ($oig as $oigData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($oigData->created_at) }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $oigData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $oigData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($npdb)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">NPDB INFORMATION</div>
			@foreach ($npdb as $npdbData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($npdbData->created_at) }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $npdbData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $npdbData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($samgov)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">SAMGOV INFORMATION</div>
			@foreach ($samgov as $samgovData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($samgovData->created_at) }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $samgovData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $samgovData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($nys)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">NYSED INFORMATION</div>
			@foreach ($nys as $nysData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($nysData->created_at) }}">
						</td>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Name</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $nysData->name }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $nysData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $nysData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($abim)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">ABIM INFORMATION</div>
			@foreach ($abim as $abimData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($abimData->created_at) }}">
						</td>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Certification Status</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $abimData->certification_status }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $abimData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $abimData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($abfm)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">ABFM INFORMATION</div>
			@foreach ($abfm as $abfmData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($abfmData->created_at) }}">
						</td>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Certification Status</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $abfmData->cert_status }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $abfmData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $abfmData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($everify)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">E-VERIFY INFORMATION</div>
			@foreach ($everify as $everifyData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($everifyData->created_at) }}">
						</td>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Verification Number</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $everifyData->verification_num }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $everifyData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $everifyData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($ecfmg)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">ECFMG INFORMATION</div>
			@foreach ($ecfmg as $ecfmgData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($ecfmgData->created_at) }}">
						</td>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Request Status</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $ecfmgData->request_status }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $ecfmgData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $ecfmgData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($nccpa)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">NCCPA INFORMATION</div>
			@foreach ($nccpa as $nccpaData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($nccpaData->created_at) }}">
						</td>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Nccpa Detail</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $nccpaData->nccpa_detail }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $nccpaData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $nccpaData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($aanp)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">AANP INFORMATION</div>
			@foreach ($aanp as $aanpData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($aanpData->created_at) }}">
						</td>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Order Number</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $aanpData->order_num }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $aanpData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $aanpData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($ama)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">AMA INFORMATION</div>
			@foreach ($ama as $amaData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($amaData->created_at) }}">
						</td>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Order Id</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $amaData->order_id }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $amaData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $amaData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
	@if ($nursingWorld)
		<div style="width: 100%; background-color: rgba(0, 108, 118, 0.08);padding: 10px;border: 1px solid rgba(0,0,0,.125);border-radius: 5px;">
			<div style="padding: 0;font-size: 24px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600; text-align:center">Nursing World INFORMATION</div>
			@foreach ($nursingWorld as $nursingWorldData)
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Date</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ viewDateHM($nursingWorldData->created_at) }}">
						</td>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Order Id</label>
							<input type="text" placeholder="" name="" style="display:block;width: 100%;padding: 0;font-size: 1.2rem;color: #006C76;border:none;background: none!important;background-clip: padding-box;font-weight: 600;outline: none;" value="{{ $nursingWorldData->order_id }}">
						</td>
					</tr>
				</table>
				@php
					$actual_link = 'http://3.132.211.119'
				@endphp
				<table style="width:100%" cellpadding="5">
					<tr>
						<td style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px">
							<label>Screenshot</label>
							<img src="{{ $actual_link }}/{{ $nursingWorldData->screenshot }}" alt="Welcome to Doral" srcset="{{ $actual_link }}/{{ $nursingWorldData->screenshot }}" width="100%" height="700px" class="img-fluid img-100">
						</td>
					</tr>
				</table>
				<div class="page-break"></div>
			@endforeach
		</div>
	@endif
</body>
</html>
