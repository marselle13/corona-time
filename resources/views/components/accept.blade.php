@props(['link','button','info'])
<style>
    html, body {
        font-family: 'inter', sans-serif;
        width: 100%;
        overflow-x: hidden;
    }

    img {
        width: 100%;
    }

    .wrapper {
        max-width: 520px;
        margin: 12rem auto;
        background: white;

    }

    .info {
        margin: 0 64px;
    }

    .text-div {
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        margin-top: 3.5rem;
    }

    .text-div h1 {
        margin: 0 auto;
        font-weight: 900;
        font-size: 24px;
    }

    .text-div p {
        margin: 0 auto;
        font-size: 20px;
        color: #808189;
    }

    .button {
        text-align: center;
        margin-top: 2.5rem;
        background-color: #0FBA68;
        border-radius: 12px;
    }

    .button-text {
        text-align: center;
        text-decoration: none;
        font-weight: 900;
        color: white;
        text-transform: uppercase;
        display: inline-block;
        width: 100%;
        padding: 20px 0;
    }

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
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>email</title>
</head>
<html lang="en">
<body>
<div class="wrapper">
    <img src="{{asset('./images/worldwide.png')}}" alt="worldwide"/>
    <div class="info">
        <div class="text-div">
            <h1>{{$slot}}</h1>
            <p>{{$info}}</p>
        </div>
        <div class="button">
            <a class="button-text" href="{{$link}}"><span>{{$button}}</span></a>
        </div>
    </div>
</div>
</body>
</html>
