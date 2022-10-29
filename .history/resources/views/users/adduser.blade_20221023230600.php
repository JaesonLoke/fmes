@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')


        <livewire:admin-table searchable="name, email" exportable />



@endsection
