@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Xat turi</div>
                <div class="card-body">
                    <table class="table table-bordered text-center p-0 m-0" style="font-size:10px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Xat turi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($XatType as $item)
                            <tr>
                                <td>{{ $loop->index+1}}</td>
                                <td>{{ $item['type']}}</td>
                                <td>
                                    <form action="{{ route('settings_del',$item['id']) }}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <input type="hidden" name="type" value="XatType">
                                        <button class="btn btn-danger p-0 px-1 m-0" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=3 class="text-center">Xat turlari mavjud emas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <hr>
                    <form action="{{ route('settings_create') }}" method="post">
                        @csrf 
                        <label for="">Yangi xat turi</label>
                        <input type="hidden" name="type" value="XatType">
                        <input type="text" name="name" class="form-control" required>
                        <button type="submit" class="btn btn-primary w-100 mt-2">Xat turini saqlash</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tashkilotlar</div>
                <div class="card-body">
                    <table class="table table-bordered text-center p-0 m-0" style="font-size:10px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tashkilotlar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($Tashkilot as $item)
                            <tr>
                                <td>{{ $loop->index+1}}</td>
                                <td>{{ $item['tashkilot']}}</td>
                                <td>
                                    <form action="{{ route('settings_del',$item['id']) }}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <input type="hidden" name="type" value="Tashkilot">
                                        <button class="btn btn-danger p-0 px-1 m-0" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=3 class="text-center">Tashkilotlar mavjud emas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <hr>
                    <form action="{{ route('settings_create') }}" method="post">
                        @csrf 
                        <label for="">Yangi Tashkilotlar</label>
                        <input type="hidden" name="type" value="Tashkilot">
                        <input type="text" name="name" class="form-control" required>
                        <button type="submit" class="btn btn-primary w-100 mt-2">Yangi Tashkilotni saqlash</button>
                    </form>
                </div>
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Bo'limlar</div>

                <div class="card-body">
                    <table class="table table-bordered text-center p-0 m-0" style="font-size:10px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bo'limlar</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($Bolim as $item)
                            <tr>
                                <td>{{ $loop->index+1}}</td>
                                <td>{{ $item['bolim']}}</td>
                                <td>
                                    <form action="{{ route('settings_del',$item['id']) }}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <input type="hidden" name="type" value="Bolim">
                                        <button class="btn btn-danger p-0 px-1 m-0" type="submit"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan=3 class="text-center">Bo'limlar mavjud emas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <hr>
                    <form action="{{ route('settings_create') }}" method="post">
                        @csrf 
                        <label for="">Yangi Bo'lim</label>
                        <input type="hidden" name="type" value="Bolim">
                        <input type="text" name="name" class="form-control" required>
                        <button type="submit" class="btn btn-primary w-100 mt-2">Yangi Bo'limni saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
