@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>สร้างฟาม</h3>
            </div>
            <div class="col-12">
                @if (Session::has('errors'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->all()[0] }}
                    </div>
                @endif
            </div>
            <div class="col-12">
                <form action="{{ route('farms.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row gy-3">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">ชื่อ</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">{{ __('common.description') }}</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                        </div>
                        {{-- <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">จำนวน</label>
                                <input type="number" name="qty" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">ตาย</label>
                                <input type="number" name="died_qty" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">เหลือ</label>
                                <input type="number" name="remaining_qty" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">ไข่</label>
                                <input type="number" name="product_qty" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-groupe">
                                <label for="">ปลด</label>
                                <input type="text" name="release" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="">อื่นๆ</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div> --}}
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">รูป</label>
                                <input type="file" name="img" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 text-end">
                            <button class="btn btn-primary">บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
