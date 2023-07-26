@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-none d-lg-block">
            <div class="row gap-3">
                <div class="col-12">
                    <h3>ฟาม : {{ session()->get('farm_name') }}</h3>
                </div>
                <div class="col-3">
                    <a href="{{ route('home') }}" class="btn btn-warning w-100">กลับ</a>
                </div>
                <div class="col-3">
                    <a href="{{ route('sub-farms.create') }}" class="btn btn-primary w-100">สร้าง</a>
                </div>
                <div class="col-6">
                    <a href="{{ route('print-qr-all') }}" class="btn btn-danger w-100">ปริ้น Qr ทุกฟาม</a>
                </div>
                <div class="col-12 justify-content-center table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>จัดการ</th>
                                <th>{{ __('common.name') }}</th>
                                <th>{{ __('common.qty') }}</th>
                                <th>{{ __('common.died_qty') }}</th>
                                <th>{{ __('common.remaining_qty') }}</th>
                                <th>{{ __('common.product_qty') }}</th>
                                <th>{{ __('common.description') }}</th>
                                <th>{{ __('common.release') }}</th>
                                <th>{{ __('common.created_at') }}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subFarms as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column gap-2">
                                            <a href="{{ route('sub-farms.edit', $item['id']) }}"
                                                class="btn btn-warning btn-sm">
                                                แก้ไขฟามย่อย
                                            </a>
                                            <a href="{{ route('sub-farm-details.create', ['sub_farm_id' => $item['id']]) }}"
                                                class="btn btn-warning btn-sm">อัปเดทรายวัน</a>
                                            <a href="{{ route('sub-farm-details.index', ['sub_farm_id' => $item['id']]) }}"
                                                class="btn btn-info btn-sm">ดูรายระเอียด</a>
                                            <a target="_blank" class=" btn btn-success"
                                                href="{{ route('print-qr', ['sub_farm_id' => $item['id']]) }}">ปริ้น
                                                Qr</a>
                                        </div>
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['qty'] }}</td>
                                    <td>{{ $item['died_qty'] }}</td>
                                    <td>{{ $item['remaining_qty'] }}</td>
                                    <td>{{ $item['product_qty'] }}</td>
                                    <td>{{ $item['description'] }}</td>
                                    <td>{{ $item['release'] }}</td>
                                    <td>{{ $item['created_at'] ? date('d-m-Y H:i', strtotime($item['created_at'])) : 'ไม่ระบุ' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row d-lg-none">
            <div class="col-12">
                <h3>ฟาม : {{ session()->get('farm_name') }}</h3>
            </div>
            <div class="col-3">
                <a href="{{ route('home') }}" class="btn btn-warning w-100">กลับ</a>
            </div>
            <div class="col-3">
                <a href="{{ route('sub-farms.create') }}" class="btn btn-primary w-100">สร้าง</a>
            </div>
            <div class="col-6">
                <a href="{{ route('print-qr-all') }}" class="btn btn-danger w-100">ปริ้น Qr ทุกฟาม</a>
            </div>
            @foreach ($subFarms as $item)
                <div class="col-12 mb-2">
                    จัดการ ฟามย่อย : {{ $item['name'] }}
                    <p class="m-0">{{ __('common.qty') }} {{ $item['qty'] }}</p>
                    <p class="m-0">{{ __('common.died_qty') }}{{ $item['died_qty'] }}</p>
                    <p class="m-0">{{ __('common.remaining_qty') }} {{ $item['remaining_qty'] }}</p>
                    <p class="m-0">{{ __('common.description') }} {{ $item['description'] }}</p>
                    <p class="m-0">{{ __('common.release') }} {{ $item['release'] }}</p>
                    <p class="m-0">{{ __('common.created_at') }}
                        {{ $item['created_at'] ? date('d-m-Y H:i', strtotime($item['created_at'])) : 'ไม่ระบุ' }}</p>
                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('sub-farms.edit', $item['id']) }}" class="btn btn-warning btn-sm">
                            แก้ไขฟามย่อย
                        </a>
                        <a href="{{ route('sub-farm-details.create', ['sub_farm_id' => $item['id']]) }}"
                            class="btn btn-warning btn-sm">อัปเดทรายวัน</a>
                        <a href="{{ route('sub-farm-details.index', ['sub_farm_id' => $item['id']]) }}"
                            class="btn btn-info btn-sm">ดูรายระเอียด</a>
                        <a target="_blank" class=" btn btn-success"
                            href="{{ route('print-qr', ['sub_farm_id' => $item['id']]) }}">ปริ้น
                            Qr</a>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
