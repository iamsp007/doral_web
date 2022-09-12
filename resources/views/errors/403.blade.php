<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Forbidden</title>
   <style>
      .container-404 {
         display: block;
         width: 100%;
         padding: 5% 25px;
         box-sizing: border-box;
      }

      .container-404 .illustration {
         display: block;
         width: 100%;
         max-width: 500px;
         height: auto;
         margin: 0 auto 20px;
      }

      .container-404 hr {
         display: block;
         width: 100%;
         height: 1px;
         border: 0;
         border-top: 1px solid #eee;
         margin: 20px 0;
      }

      .container-404 .button {
         display: block;
         width: fit-content;
         min-width: 140px;
         height: 40px;
         margin: 0 auto;
         border: 0;
         font-size: 14px;
         color: #FFF;
         text-align: center;
         background: #006c76;
         padding: 0 20px;
         border-radius: 5px;
         box-sizing: border-box;
         line-height: 40px;
         -webkit-transition: all 0.3s ease-in-out;
         -moz-transition: all 0.3s ease-in-out;
         -ms-transition: all 0.3s ease-in-out;
         -o-transition: all 0.3s ease-in-out;
         transition: all 0.3s ease-in-out;
         cursor: pointer;
      }
      .container-404 .button:hover {
         letter-spacing: 1px;
      }
   </style>
</head>
<body>
   <div class="container-404">
      <img src="{{ asset('admin/images/404-illustration.svg') }}" alt="404 Illustration" class="illustration"/>
      <hr/>
      <a href="{{ Route('login') }}" class="button">Back To Home</a>
   </div>
</body>
</html>