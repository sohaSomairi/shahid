@extends('layouts.mainlayout')
@section('content')
@livewire('publishing.titles', ['localtitle'=>$title])
@endsection
