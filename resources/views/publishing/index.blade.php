@extends('layouts.mainlayout')
@section('content')
@livewire('publishing.index', ['localtitle'=>$title])
@endsection
