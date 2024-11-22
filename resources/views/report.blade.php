@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Hisobot</div>
                <div class="card-body">
                    <form action="{{ route('report_exel') }}" method="post">
                        @csrf 
                        <div class="row">
                            <div class="col-4">
                                <label for="">Chiqim boshlanish vaqti</label>
                                <input type="date" name="start" required class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="">Chiqim yakunlanish vaqti</label>
                                <input type="date" name="end" required class="form-control">
                            </div>
                            <div class="col-2">
                                <label for="">...</label>     
                                <select name="type" class="form-select">
                                    <option value="HTML">HTML</option>
                                    <option value="EXCEL">EXCEL</option>
                                </select>                       
                            </div>
                            <div class="col-2">
                                <label for="">...</label>     
                                <button type="submit" class="btn btn-primary w-100">FILTER</button>                           
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
