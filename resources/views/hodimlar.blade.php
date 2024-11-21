@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Barcha hodimlar') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered text-center" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hodimning FIO</th>
                                <th>Hodimning bo'limi</th>
                                <th>Hodim ruxsat turi</th>
                                <th>Email</th>
                                <th>Ro'yhatga olingan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($User as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['bolim'] }}</td>
                                <td>{{ $item['type'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                                <th>
                                    <form action="{{ route('hodim_del',$item['id']) }}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <button class="btn btn-danger p-0 px-1 m-0" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </th>
                            </tr>
                            @empty
                            <tr>
                                <td colspan=6 class="text-center">Hodimlar mavjud emas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Yangi hodim qo\'shish') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('hodim_create') }}" method="post">
                        @csrf 
                        <label for="name">Hodimning FIO</label>
                        <input type="text" name="name" required class="form-control">
                        <label for="bolim">Hodim bo'limi</label>
                        <select name="bolim" required class="form-select">
                            <option value="">Tanlang ...</option>
                            @foreach($Bolim as $item)
                            <option value="{{$item['bolim']}}">{{$item['bolim']}}</option>
                            @endforeach
                        </select>
                        <label for="email">Hodimning Email adresi</label>
                        <input type="email" name="email" required class="form-control">
                        <label for="type">Hodim ruxsat turi</label>
                        <select name="type" required class="form-select">
                            <option value="">Tanlang ...</option>
                            <option value="admin">Admin</option>
                            <option value="ijro_hodim">Ijro hodimi</option>
                            <option value="Bo'lim raxbari">Bo'lim raxbari</option>
                            <option value="hodim">Hodim</option>
                        </select>
                        <button type="submit" class="btn btn-primary w-100 mt-2">Yangi hodimni saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
