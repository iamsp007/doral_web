<!-- page 15 start-->
<div class="break"></div>
<table width="100%">
    <tr>
        <td>
            <table style="width: 100%;" class="break">
                <thead style=" background-color: #07737A;padding: 10px;display: block;margin: 0 auto;display: flex;justify-content: center;align-items: center;">
                    <tr>
                        <td>
                            <a href="index.html" title="Welcome to Doral">
                            <img style="width: 180px; height: 84px;" src="{{ asset('assets/img/green_logo.jpg') }}" alt="Welcome to Doral" srcset="{{ asset('assets/img/logo-white.svg') }}">
                            </a>
                        </td>
                    </tr>
                </thead>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <h1 style="padding: 10px;border: 1px solid #006C76;font-size: 20px;margin: 10px 0px;text-align: center;color: #006C76;font-weight: 600;">
                Upload Documentation
            </h1>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    @php $counter = 1 @endphp
                    @foreach ($users->documents as $document)
                    <tr style="background: #f8f8f8;">
                            <td style="width: 100%;text-align: left;border-bottom: 1px solid #a5a5a5;">{{ $document->file_type }}</td>
                        </tr>
                        <tr style="background: #f8f8f8;">
                            <td style="width: 100%;text-align: left;border-bottom: 1px solid #a5a5a5;"><img style="width: 100%; height: 100%;" src="{{ $document->file_url }}" alt="Welcome to Doral" srcset="{{ $document->file_url }}"></td>
                        </tr>
                        @php $counter++ @endphp
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>
</table>
<!-- page 15 end -->
