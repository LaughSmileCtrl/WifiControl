@extends('layout.app')

@section('title', 'Checkout')

@section('style')
    <style>
        table {
            text-align: center;
        }

        .food-name {
            text-align: left;
        }

        .food-price {
            text-align: right;
        }

        .row {
            padding: 1vh;
        }

    </style>
@endsection

@section('content')
    <h3>Total tagihan</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Makanan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
                $bill = 0;
            @endphp
            @foreach ($foodOrder as $item)              
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td class="food-name">{{ $item->name }}</td>
                <td>{{ $item->pivot->total }} </td>
                <td class="food-price">Rp {{ number_format($item->price) }}</td>
                <td class="food-price">Rp {{ number_format($item->price * $item->pivot->total) }}</td>
            </tr>
            @php
                $bill += $item->price * $item->pivot->total;
            @endphp
            @endforeach
            <tr id="bill">
                <td></td>
                <td colspan="3"><strong>Tagihan</strong></td>
                <td class="food-price"><strong>Rp {{ number_format($bill) }}</strong></td>
            </tr>
        </tbody>
    </table>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Bayar
    </button>
  
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-auto">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            <div class="col-sm-auto">
                                <button type="button" class="btn btn-primary">Simpan Nota</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-auto">
                                <button type="button" class="btn btn-primary">Dapatkan Akses Internet</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection