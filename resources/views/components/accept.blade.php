@props(['verify','button','info'])
<style>
    .wrapper {
        background: white;
        display: grid;
        place-content: center;
        justify-content: center;
        height: 100%;
        width: 100%;
        padding: 1rem;
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
        padding: 1rem;
    }

    .button a {
        text-decoration: none;
        font-weight: 900;
        color: white;
        text-transform: uppercase;
    }
</style>
<x-layout>
    <div class="wrapper">
        <div>
            <img src="{{asset('./images/worldwide.png')}}" alt="worldwide"/>
        </div>
        <div class="text-div">
            <h1>{{$slot}}</h1>
            <p>{{$info}}</p>
        </div>
        <div class="button">
            <a href="{{$verify}}">{{$button}}</a>
        </div>
    </div>
</x-layout>
