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
@endsection