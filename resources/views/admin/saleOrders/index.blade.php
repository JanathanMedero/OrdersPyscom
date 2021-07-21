@extends('layouts.admin')

@section('content')
	@livewire('show-order-sale', ['folio' => $order->folio])
@endsection