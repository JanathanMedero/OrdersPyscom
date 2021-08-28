@extends('layouts.admin')

@section('content')
	@livewire('show-services-orders-site', ['orders' => $orders, 'slug' => $client->slug])
@endsection