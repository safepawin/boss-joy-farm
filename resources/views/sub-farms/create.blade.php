@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row gap-3">
            <div class="col-12">
                <h3>สร้าง ฟามย่อย</h3>
            </div>
            <form action="{{ $url }}" method="post" enctype="multipart/form-data" class="col-12">
                @csrf
                @method($method)
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.name') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ $subFarm->name }}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.qty') }}</label>
                            <input type="number" class="form-control" name="qty"value="{{ $subFarm->qty }}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.died_qty') }}</label>
                            <input type="number" class="form-control" name="died_qty"value="{{ $subFarm->died_qty }}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.remaining_qty') }}</label>
                            <input type="number" class="form-control"
                                name="remaining_qty"value="{{ $subFarm->remaining_qty }}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.description') }}</label>
                            <input type="text" class="form-control"
                                name="description"value="{{ $subFarm->description }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.release') }}</label>
                            <input type="text" class="form-control" name="release"value="{{ $subFarm->release }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">image</label>
                            <input type="file" class="form-control" name="img">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <img class="w-100" src="{{ $subFarm->getFirstMediaUrl() }}" alt="">
                    </div>
                    <div class="col-12 mt-3">
                        <button class="btn btn-primary">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
