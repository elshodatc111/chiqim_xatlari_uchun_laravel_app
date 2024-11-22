@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            <b>Hisobot</b>
                        </div>
                        <div class="col-4" style="text-align:right">
                            <b>Chiqim boshlanish vaqti:</b> {{ $Start }}
                        </div>
                        <div class="col-4" style="text-align:right">
                            <b>Chiqim yakunlanish vaqti:</b> {{ $End }}
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <button class="btn btn-outline-primary w-50" id="moveTableButton">Print HTML</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-primary w-50" id="exportBtn">Print Excel</button>
                        </div>
                    </div>

                    <table class="table table-bordered mt-3 text-center" border=1 id="myTable" style="font-size:12px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Bo'lim</th>
                                <th>Hodim</th>
                                <th>Chiqim turi</th>
                                <th>Tashkilot</th>
                                <th>Chiqim raqami</th>
                                <th>Nusxalar soni</th>
                                <th>Sahifalar soni</th>
                                <th>Chiqim vaqti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($Xatlar as $item)
                            <tr>
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
                                    <td colspan=9 class="text-center">Tanlangan sanada malumot topilmadi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
    document.getElementById('exportBtn').addEventListener('click', function () {
        var table = document.getElementById('myTable');
        var workbook = XLSX.utils.table_to_book(table, {sheet: "Sheet 1"});
        XLSX.writeFile(workbook, 'table-data.xlsx');
    });

    document.getElementById("moveTableButton").addEventListener("click", function() {
        const table = document.getElementById("myTable");
        const tableHTML = table.outerHTML;
        const newWindow = window.open("", "_blank");
        if (newWindow) {
            newWindow.document.write(`
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Jadval</title>
                </head>
                <body>
                    ${tableHTML}
                </body>
                </html>
            `);
            newWindow.document.close(); // Sahifani to'liq yuklash
        } else {
            alert("Yangi oyna ochilmadi! Brauzer sozlamalarini tekshiring.");
        }
    });
</script>
@endsection
