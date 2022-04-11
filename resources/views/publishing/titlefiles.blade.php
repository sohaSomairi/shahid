@extends('layouts.mainlayout')
@section('content')
@livewire('publishing.titlefiles', ['localtitle'=>$title,'localttitle'=>$ttitle])
@endsection
