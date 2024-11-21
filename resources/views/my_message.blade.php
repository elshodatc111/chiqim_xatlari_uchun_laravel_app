@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mening xatlarim</div>
                <div class="card-body">
                    <table class="table table-bordered text-center" srtle="font-size:14px;">
                        <thead>
                            <th>#</th>
                            <th>Chiqim turi</th>
                            <th>Tashkilot</th>
                            <th>Chiqim raqami</th>
                            <th>Nushalar soni</th>
                            <th>Sahifalar soni</th>
                            <th>Chiqim vaqti</th>
                        </thead>
                        <tbody>
                            @forelse($Xatlar as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['type'] }}</td>
                                <td>{{ $item['where'] }}</td>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['nushalar'] }}</td>
                                <td>{{ $item['page'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                            </tr>
                            @empty 
                                <tr>
                                    <td colspam=7 class="text-center">Chiqim xarlari mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
