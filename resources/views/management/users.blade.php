@extends('layouts.mainlayout')
@section('content')
@livewire('management.users', ['localtitle'=>$title])
@endsection
