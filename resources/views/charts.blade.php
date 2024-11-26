@extends('layouts.app')

@section('content')
<link href="https://atko.tech/NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Bo'limlar statistikasi</div>

                <div class="card-body">
                    <table class="table text-center table-bordered" srtle="font-size:12px;">
                        <thead>
                            <tr>
                                <th style="width:50%">Bo'limlar</th>
                                <th style="width:50%">Chiqim xatlar soni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ChartBolim as $key => $item)
                            <tr>
                                <td style="text-align:left">{{ $item['name'] }}</td>
                                <td>{{ $item['count'] }} </td>
                            </tr>
                            @endforeach
                            <tr>
                                <th>Jami</th>
                                <th>{{ $counts }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Hodimlar statistikasi</div>

                <div class="card-body">
                    <table class="table text-center table-bordered" srtle="font-size:12px;">
                        <thead>
                            <tr>
                                <th>Hodimlar</th>
                                <th>Bo'lim</th>
                                <th>Chiqim xatlar soni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ChartHodim as $key => $item)
                            <tr>
                                <td style="text-align:left">{{ $item['name'] }}</td>
                                <td>{{ $item['bolim'] }}</td>
                                <td>{{ $item['count'] }} </td>
                            </tr>
                            @endforeach
                            <tr>
                                <th>Jami</th>
                                <th>{{ $counts }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://atko.tech/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="https://atko.tech/NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="https://atko.tech/NiceAdmin/assets/js/main.js"></script>
@endsection
