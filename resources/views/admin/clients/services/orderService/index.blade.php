@extends('layouts.admin')

@section('content')
	@livewire('show-services-orders', ['orders' => $orders, 'slug' => $client->slug])
@endsection