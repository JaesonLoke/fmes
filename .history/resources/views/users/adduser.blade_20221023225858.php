@extends('layouts.pages', ['background' => 'bg-dark'])

@section('content')

<livewire:livewire-datatables searchable="name, email, gender" exportable />

@endsection
