@extends('fronts.master')
@section('title', 'Basket')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th>Ürün</th>
                    <th>Ürün Adı</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    <th>İşlem</th>
                </tr>
{{--                <tr>--}}
{{--                    <td colspan="5">Henüz sepette ürün yok</td>--}}
{{--                </tr>--}}
                @foreach($products as $productCartItem)

                <tr>
                    <td> <img src="http://lorempixel.com/120/100/food/2"> </td>
                    <td>{{$productCartItem->product->product_name}}</td>
                    <td>{{$productCartItem->product->price}}</td>
                    <td>
                        <a href="#" class="btn btn-xs btn-default">-</a>
                        <span style="padding: 10px 20px">{{$productCartItem->number}}</span>
                        <a href="#" class="btn btn-xs btn-default">+</a>
                    </td>
{{--                    <td>{{$productCartItem->getTotal}}</td>--}}
                    <td>
                        <form action="{{route('basket/delete')}}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$productCartItem->id}}">
                            <input type="submit" class="btn btn-theme" value="Sil">
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>
            <div>
                <a href="#" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
            </div>
        </div>
    </div>
@endsection