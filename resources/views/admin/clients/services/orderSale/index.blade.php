@extends('layouts.admin')

@section('content')
	@livewire('show-sales-orders', ['orders' => $orders, 'slug' => $client->slug])
@endsection