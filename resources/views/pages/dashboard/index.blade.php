@extends('layouts.layout')

@section('title-page', 'Dashboard')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}"> -->
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/dashboard.css') }}">
@endsection

@section('content')
    <div class="title">
        <h2>Dashboard</h2>
    </div>
    <div class="info">
        <div class="store">
            <span class="material-icons-round" id="store-icon">store</span>
            <span id="store-text">{{ $indicators->store->store }}</span>
        </div>
        <div class="date">
            <span class="material-icons-outlined" id="date-icon">date_range</span>
            <span id="date-text"> Hoje</span>
        </div>
{{--        <div class="extensive">--}}
{{--            <span id="extensive-text">comparando Março, 2021</span>--}}
{{--        </div>--}}
    </div>
    @include('pages.dashboard.cards')
    <div class="canvas">
        <canvas id="chart">

        </canvas>
    </div>
@endsection

@section('js')
    <script src="{{ URL::to('assets/pages/js/chart.js/dist/chart.js') }}"></script>
    <script>
        const labels = @json($indicators->hours);
        const data = {
            labels: labels,
            datasets: [{
                label: 'hoje',
                backgroundColor: 'rgb(77, 57, 255)',
                borderColor: 'rgb(77, 57, 255)',
                data: @json($indicators->qtdeVendasByHourToday),
            },{
                label: 'ontem',
                backgroundColor: 'rgba(188,185,252,0.82)',
                borderColor: 'rgba(188,185,252,0.82)',
                data: @json($indicators->qtdeVendasByHourYesterday),
            }],
        };
        const config = {
            type: 'line',
            data: data,
            options: {}
        };
        let myChart = new Chart(document.getElementById('chart'),
            config
        );
    </script>
@endsection
