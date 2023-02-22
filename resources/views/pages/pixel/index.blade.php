@extends('layouts.layout')

@section('title-page', 'Marketing')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}"> -->
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/mkt.css') }}">
@section('content')
<div class="contents">
    <div id="facebook-pixels">
        <div class="space-between container-add">
            <div class="titulo">
                <i class="fab fa-facebook" id="icon-config"></i>
                <h2 class="text-title">Pixel Facebook</h2>
            </div>
            <div class="new-item">
                <a href="{{ route('pixel.create') }}"> <span class="material-icons">add</span>
                    <p> Adicionar Pixel </p>
                </a>
            </div>
        </div>
        <span class="text-config">Configure seus pixels do facebook </span>
        @if (count($pixels) > 0)
        @foreach ($pixels as $pixel)
        <div class="card">
            <div class="info-pixels">
                <p> Pixel: <b> {{$pixel->pixel_key}} </b> </p>
                <p> Marcar compras no PIX: <b>{{$pixel->fl_pixel_pix ? 'Sim' : 'Não'}}</b></p>
                <p> Marcar compras no Cŕedito: <b>{{$pixel->fl_pixel_cred ? 'Sim' : 'Não'}}</b></p>
                <p> Marcar compras no Boleto: <b>{{$pixel->fl_pixel_boleto ? 'Sim' : 'Não'}}</b></p>
            </div>
            <div class="space-between ed-options">
                <div>
                    <form method="post" action="{{ url('/app/pixel', $pixel->id) }}" id="pixel_{{$pixel->id}}">
                        {{ method_field('GET') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">{{ trans('Delete') }}</button>
                    </form>
                </div>
                <div>
                    <a href="{{ route('pixel.edit', ['id' => $pixel->id]) }}">
                        <button> Editar </button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="item-produto card">
            <p>Não há pixel cadastrados.</p>
        </div>
        @endif
    </div>
</div>
@endsection
