@extends('layout.app')

@section('title', 'Menu Makanan')

@section('style')
<style>
    body {
        text-align: center;
    }
    .card {
        width: 15vw;
        height: 15vw;
        margin: 1vw;
        display: inline-flex;
        text-align: left;
    }

    .card-header {
        height: 70%;
    }

    button {
        position: sticky;
        bottom: 0;
        z-index: 30;
    }

    h3 {
        margin: 5vw 0 5vw 0;
        padding: 3vw 0 3vw;
        border-bottom: 1px solid rgb(48, 48, 48);
    }

    input[type=number] {
        width: 80%;
        display: block-inline;
    }
</style>
@endsection
    
@section('content')
{{-- <div id="id-1">Waw</div> --}}
<form action="" method="POST">
    @csrf
    <h3>Makanan</h3>
    @foreach ($foods as $food)
    @if ($food->type == 'food')
    <div class="card" id="-{{ $food->id }}">
        <div class="card-header">
            <h5>{{ $food->name}}</h5>
            <p>Rp. {{ number_format($food->price) }}</p>
        </div>
        <div class="card-body">
            <input type="checkbox" name="" id="id-{{ $food->id }}" value="{{ $food->id }}">
            <input type="number" name="food[{{ $food->id }}][total]" id="num-id-{{ $food->id }}" min="0" disabled>
        </div>
    </div>
    @endif
    @endforeach

    <h3>Minuman</h3>
    @foreach ($foods as $food)
    @if ($food->type == 'drink')
    <div class="card" id="-{{ $food->id }}">
        <div class="card-header">
            <h5>{{ $food->name}}</h5>
            <p>Rp. {{ number_format($food->price) }}</p>
        </div>
        <div class="card-body">
            <input type="checkbox" name="" id="id-{{ $food->id }}" value="{{ $food->id }}">
            <input type="number" name="food[{{ $food->id }}][total]" id="num-id-{{ $food->id }}" min="0" disabled>
        </div>
    </div>
    @endif
    @endforeach
    
    <button class="btn btn-primary btn-lg btn-block" type="submit">Buy</button>
    </form>
@endsection

@section('script')
<script>
$(document).ready(function(){
    $('input[type=checkbox]').click(function() {
        var id = $(this).attr('id');
        if(this.checked)
        {
            // console.log(id);
            $('#num-'+id).removeAttr('disabled');
        }
        else if(!(this.checked))
        {
            $('#num-'+id).attr('disabled', 'disabled');
        }

    });

    // $('.card').click(function() {
        // var id = $(this).attr('id');

        // if($('#id'+id).prop('checked'))
        // {
            // console.log(id);
            // $('#id'+id).removeAttr('checked');
            // $('#num-'+id).removeAttr('disabled');
        // }

    // });
});
</script>
@endsection