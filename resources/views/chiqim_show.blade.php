@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header w-100 text-center">Chiqim raqami: {{ $Xatlar['id'] }}</div>
                <div class="card-body">
                    <label for="type">Xatning turini</label>
                    <input type="text" disabled value="{{ $Xatlar['type'] }}" class="form-control">
                    <label for="where">Tashkilot</label>
                    <input type="text" disabled value="{{ $Xatlar['where'] }}" class="form-control">
                    <div class="row">
                        <div class="col-6 mt-2">
                            <label for="">Bo'lim</label>
                            <input type="text" disabled value="{{ $Xatlar['section'] }}" class="form-control">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="">Ijrochi</label>
                            <input type="text" disabled value="{{ $Xatlar['fio'] }}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mt-2">
                            <label for="">Nusxalar soni</label>
                            <input type="text" disabled value="{{ $Xatlar['nushalar'] }}" class="form-control">
                        </div>
                        <div class="col-6 mt-2">
                            <label for="">Ilova sahifalar soni</label>
                            <input type="text" disabled value="{{ $Xatlar['page'] }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
