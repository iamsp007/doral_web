<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ ($users->user) ? $users->user->full_name : ''}}</title>
        <style>
            html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video {margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;}
            article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section {display: block;}
            body {line-height: 1;}
            ol,ul {list-style: none;font-size: 14px;}
            blockquote,q {quotes: none;}
            blockquote:before,blockquote:after,q:before,q:after {content: '';content: none;}
            table {border-collapse: collapse;border-spacing: 0;}
            label-a label{font-weight: normal;}
            body {margin: 0;font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji","Segoe UI Emoji", "Segoe UI Symbol";font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;text-align: left;background-color: #fff;}
            table {border-collapse: separate;border-spacing: 0;}
            h4{background: #07737a;color: #FFF;font-size: 18px;margin: 10px 0px;padding: 10px;}
            p {white-space: nowrap;font-weight: bold;font-size: 14px; width:100%; text-align: left;box-shadow: none; display:inline-flex}
            span {width: 100%;font-size: 1rem; display:inline-block;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;display: inline;width: inherit;border: none;border-bottom: 2px solid;border-radius: 0px;outline: none;    font-weight: normal;font-weight: normal;padding-left: 10px;}
            .break{page-break-before: always;}
            body {margin: 0px auto;font-family: Arial, Helvetica, sans-serif;}
            .Page{width: 100%;height: 100%;border-color: #000;margin: 30px auto;}
            table{width: 100%;border-collapse: collapse;border-spacing: 0;}
            ul, ol{list-style-type:square;margin: 8px 0;}
            ul li{margin-bottom: 5px;}
            ul li:last-child {margin-bottom: 0px;}
            td {font-size: 13px;border-collapse: collapse;}
            p {margin: 0 0 5px 0;font-size: 14px;}
            label {font-weight: bold;font-size: 16px;}
            .Sigdate {display: block;width: 100%;}
            .Sigdate div {display: inline-block;width: 40%;float: left;line-height: 15px;font-weight: bold;}
            .Sigdate div.Sign span {display: block;padding-bottom: 5px;margin-bottom: 5px;height: 100px;border-bottom: 2px solid #000;position: relative;}
            .Sigdate div.Sign span img {position: absolute;bottom: 5px;}
            .Sigdate div.Date p {padding-bottom: 5px;margin-bottom: 5px;border-bottom: 2px solid #000;}
            .Sigdate div.Date {margin-left: 15px;margin-top: 80px;}
            .pagebreakavoid {page-break-inside: avoid;}
            .mystyle p{white-space: normal;word-break: break-all;}
            .mystyle label{font-weight: normal;padding: 8px 0px;}
            .mystylea p, .mystylea li{white-space: normal;word-break: break-all;font-weight: normal;font-size: 12px;}
            .white-spacenone{white-space: normal;word-break: break-all;}
            b{font-weight: bold;}
            input{margin-right: 10px;}
            .myspan span { padding-left:0px} 
        </style>
    </head>
    <body style="padding: 0;margin: 0;">
        <div style="max-width: 900px; margin: 0 auto; display: block;" >
            <table width="100%">    
                <tr>
                    <td>
                        
                        <!-- Document Info Start -->
                            @include('pages.clincian.profile.documents')
                        <!-- Document Info End -->

                        <!-- Employee Info Start -->
                            @include('pages.clincian.profile.employee_info')
                        <!-- Employee Info End -->

                        <!-- Employee Info Start -->
                            @include('pages.clincian.profile.referance')
                        <!-- Employee Info End -->

                        <!-- payroll Start -->
                            @include('pages.clincian.profile.payroll')
                        <!-- payroll End -->

                        @if ($users->user->designation_id == '2')
                        <!-- Employment Verification Start -->
                            @include('pages.clincian.profile.employment_verification')
                        <!-- Employment Verification End -->
                        @endif

                        <!-- Employment Certificate Start -->
                            @include('pages.clincian.profile.employee_certificate')
                        <!-- Employment Certificate End -->

                        <!-- Upload Document Start -->
                            @include('pages.clincian.profile.upload_doc')
                        <!-- Upload Document End -->
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
