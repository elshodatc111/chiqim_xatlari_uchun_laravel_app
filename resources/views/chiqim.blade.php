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
                <div class="card-header">Yangi chiqim xati</div>
                <div class="card-body">
                    <form action="{{ route('chiqim_create') }}" method="post">
                        @csrf 
                        <label for="type">Xatning turini tanlang</label>
                        <select name="type" class="form-select" required>
                            <option value="">Tanlang</option>
                            @foreach($XatType as $item)
                                <option value="{{ $item['type'] }}">{{ $item['type'] }}</option>
                            @endforeach
                        </select>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <label for="where">Tashkilotni tanlang</label>
                                <select name="where" id="mySelect" required class="form-select">
                                    <option value="">Tanlang</option>
                                    @foreach($Tashkilot as $item)
                                        <option value="{{ $item['tashkilot'] }}">{{ $item['tashkilot'] }}</option>
                                    @endforeach
                                    <option value="newOption">+ Yangi qo'shish...</option>
                                </select>
                                <div id="inputContainer" style="display: none;">
                                    <label for="newOptionInput" class="mt-2">Yangi tashkilot qo'shish:</label>
                                    <div class="row">
                                        <div class="col-9">
                                        <input type="text" id="newOptionInput" class="form-control" placeholder="Yangi tashkilot nomi">
                                    
                                        </div>
                                        <div class="col-3">
                                        <button id="addOptionBtn" class="btn w-100 btn-outline-primary" type="button">Qo'shish</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <script>
                            const selectElement = document.getElementById('mySelect');
                            const inputContainer = document.getElementById('inputContainer');
                            const newOptionInput = document.getElementById('newOptionInput');
                            const addOptionBtn = document.getElementById('addOptionBtn');
                            selectElement.addEventListener('change', function () {
                                if (selectElement.value === 'newOption') {
                                    inputContainer.style.display = 'block';
                                } else {
                                    inputContainer.style.display = 'none';
                                }
                            });
                            addOptionBtn.addEventListener('click', function () {
                                const newOptionValue = newOptionInput.value.trim();
                                if (newOptionValue) {
                                    const newOption = document.createElement('option');
                                    newOption.value = newOptionValue.toLowerCase();
                                    newOption.textContent = newOptionValue;
                                    selectElement.insertBefore(newOption, selectElement.lastElementChild);
                                    newOptionInput.value = '';
                                    inputContainer.style.display = 'none';
                                    selectElement.value = newOption.value; 
                                } else {
                                    alert('Iltimos, Tashkilot nomini kiriting!');
                                }
                            });
                        </script>
                        <div class="row">
                            <div class="col-6 mt-2">
                            <label for="">Bo'lim</label>
                            <input type="text" disabled value="{{auth()->user()->name}}" class="form-control">
                            </div>
                            <div class="col-6 mt-2">
                            <label for="">Ijrochi</label>
                            <input type="text" disabled value="{{auth()->user()->bolim }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-2">
                            <label for="">Nushalar soni</label>
                            <input type="number" name="nushalar" required class="form-control">
                            </div>
                            <div class="col-6 mt-2">
                            <label for="">Ilova sahifalar soni</label>
                            <input type="number" name="page" required class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary mt-2 w-100" type="submit">Chiqim xatni saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
