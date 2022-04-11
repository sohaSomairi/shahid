@extends('layouts.mainlayout')
@section('content')
@livewire('management.index', ['localtitle'=>$title])
@endsection
