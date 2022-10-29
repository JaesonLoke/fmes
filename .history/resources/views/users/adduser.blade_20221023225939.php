@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')

<div class="container mx-auto">
    <br />
    <div class="flex items-center markdown">
        <h1 style="font-size: 2em;"><b>Datatables with Livewire in Laravel 8</b></h1>
    </div>
    <br />
    <div class="flex mb-4">
        <livewire:livewire-datatables searchable="name, email, gender" exportable />
    </div>
        
</div>
@endsection
