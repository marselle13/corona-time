@props(['link','button','info'])
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>email</title>
    <style>
        @media (max-width: 520px) {
            .wrapper {
                margin: 0;
            }
            .text-div h1 {
                margin: 0

            }
            .button-text{
                width: auto;
            }
            .info {
                margin: 0
            }
        }
    </style>
</head>
<html lang="en" style="font-family: 'inter', sans-serif; overflow-x: hidden">
<body>
<div class="wrapper" style="max-width: 520px;  margin: 12rem auto; background: white;">
    <img src="{{asset('./images/worldwide.png')}}" alt="worldwide" style="width: 100%"/>
    <div class="info" style="margin: 0 64px;">>
        <div class="text-div" style="text-align: center; margin-top: 3.5rem">
            <h1 style="margin: 0 auto; font-weight: 900; font-size: 24px;">{{$slot}}</h1>
            <p style="margin: 0 auto; font-size: 20px; color: #808189;">{{$info}}</p>
        </div>
        <div style="text-align: center; margin-top: 2.5rem; background-color: #0FBA68; border-radius: 12px;">
            <a class="button-text" style="text-align: center; text-decoration: none; font-weight: 900; color: white; text-transform: uppercase; display: inline-block; width: 100%; padding: 20px 0;" zhref="{{$link}}"><span>{{$button}}</span></a>
        </div>
    </div>
</div>
</body>
</html>
