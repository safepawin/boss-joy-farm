@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row gap-3">
            <div class="col-12">
                <h3>อัปเดทรายวัน</h3>
            </div>
            <form action="{{ $url }}" method="post" enctype="multipart/form-data" class="col-12">
                @csrf
                @method($method)
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.qty') }}</label>
                            <input type="number" class="form-control" name="qty"value="{{ $subFarmDetail->qty }}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.died_qty') }}</label>
                            <input type="number" class="form-control"
                                name="died_qty"value="{{ $subFarmDetail->died_qty }}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.remaining_qty') }}</label>
                            <input type="number" class="form-control"
                                name="remaining_qty"value="{{ $subFarmDetail->remaining_qty }}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.product_qty') }}</label>
                            <input type="number" class="form-control"
                                name="product_qty"value="{{ $subFarmDetail->product_qty }}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.description') }}</label>
                            <input type="text" class="form-control"
                                name="description"value="{{ $subFarmDetail->description }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">{{ __('common.release') }}</label>
                            <input type="text" class="form-control" name="release"value="{{ $subFarmDetail->release }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="" alt="">
                    </div>
                    <input type="hidden" value="{{ $subFarmDetail->sub_farm_id }}" name="sub_farm_id">
                    <div class="col-12 mt-3">
                        <button class="btn btn-primary">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
