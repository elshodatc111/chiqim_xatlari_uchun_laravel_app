@extends('layouts.app')

@section('content')
<link href="https://atko.tech/NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Bo'lim xatlari</div>
                <div class="card-body">
                    <table class="table text-center datatable" srtle="font-size:12px;">
                        <thead>
                            <th>#</th>
                            <th>Bo'lim</th>
                            <th>Hodim</th>
                            <th>Chiqim turi</th>
                            <th>Tashkilot</th>
                            <th>Chiqim raqami</th>
                            <th>Nusxalar soni</th>
                            <th>Sahifalar soni</th>
                            <th>Chiqim vaqti</th>
                        </thead>
                        <tbody>
                            @forelse($Xatlar as $item)
                            <tr class="text-center">
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['section'] }}</td>
                                <td>{{ $item['fio'] }}</td>
                                <td>{{ $item['type'] }}</td>
                                <td>{{ $item['where'] }}</td>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['nushalar'] }}</td>
                                <td>{{ $item['page'] }}</td>
                                <td>{{ $item['created_at'] }}</td>
                            </tr>
                            @empty 
                                <tr>
                                    <td colspan=9 class="text-center">Chiqim xarlari mavjud emas.</td>
                                </tr>
                            @endforelse
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
