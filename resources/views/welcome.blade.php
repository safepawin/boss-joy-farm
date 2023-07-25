@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12">
                <div class="row gy-3">
                    @foreach ($farms as $item)
                        <div class="col-12 col-md-4">
                            <a class="h-100 w-100 bg-dark rounded p-5 d-block text-decoration-none text-white text-center"
                                href="{{ route('sub-farms.index', ['farm_id' => $item->id]) }}">
                                <h3>{{ $item->name }}</h3>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-12 col-md-4">
                        <a class="h-100 w-100 bg-dark rounded p-5 d-block text-decoration-none text-white text-center"
                            href="{{ route('farms.create') }}">
                            <h3>+</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
