@extends('layouts.mainlayout')
@section('content')
@livewire('publishing.topics', ['localtitle'=>$title])
@endsection
