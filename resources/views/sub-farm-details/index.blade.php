@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row gap-3">
            <div class="col-12">
                <h3>รายระเอียด ฟามย่อย : {{ $subFarm->name }}</h3>
            </div>
            <div class="col-3">
                <a href="{{ route('sub-farms.index') }}" class="btn btn-warning w-100">กลับ</a>
            </div>
            <div class="col-3">
                <a href="{{ route('sub-farm-details.create', ['sub_farm_id' => $subFarm->id]) }}"
                    class="btn btn-primary w-100">อัปเดทรายวัน</a>
            </div>
            <div class="col-12 justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('common.qty') }}</th>
                            <th>{{ __('common.died_qty') }}</th>
                            <th>{{ __('common.remaining_qty') }}</th>
                            <th>{{ __('common.description') }}</th>
                            <th>{{ __('common.release') }}</th>
                            <th>{{ __('common.created_at') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subFarmDetails as $item)
                            <tr>
                                <td>{{ $item['qty'] }}</td>
                                <td>{{ $item['died_qty'] }}</td>
                                <td>{{ $item['remaining_qty'] }}</td>
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
@endsection
