@extends('layouts.mainlayout')
@section('content')
@livewire('user.profile', ['localtitle'=>$title,'localme' => $me])
@endsection
