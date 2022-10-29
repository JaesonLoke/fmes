@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')
<style>
    .rounded-lg, .rounded-b-none 
    {
        width: 1140px;
    }

    .form-input
    {
        width: 450px;
        height: 30px;
    }
</style>
<div class="container mx-auto">
    <br />
    <div class="flex items-center markdown">
        <h1 style="font-size: 2em;"><b>Datatables with Livewire in Laravel 8</b></h1>
    </div>
    <br />
    <div class="flex mb-4">
        <livewire:admin-table searchable="name, email, gender" exportable />
    </div>
        
</div>


@endsection
