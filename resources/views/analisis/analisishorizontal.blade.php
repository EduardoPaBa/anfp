	@extends('layouts.app')
	@section('botones')
	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')
	<h1>humilde</h1>

	@foreach($empresas as $em)
		@foreach($infin as $in)
		
		@endsection
	@endsection