
@extends('store.store')


@section('content')

    <section id="cart_items">

        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">preço</td>
                        <td class="price">Quantidade</td>
                        <td class="price">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cart->all() as $k=>$item)

                    <tr>
                        <td class="cart_product">
                            <a href="#">
                                Imagem
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="#">{{ $item['name'] }}</a></h4>
                        </td>
                        <td class="cart_price">{{ $item['price'] }}</td>
                        <td class="cart_quantity"> <a href="{{ route('cart.decrement', ['id'=>$k]) }}">-</a> {{ $item['qtd'] }} <a href="{{ route('cart.increment', ['id'=>$k]) }}">+</a> </td>
                        <td class="cart_total"><p class="cart_total_price">
                                R$ {{ $item['price'] * $item['qtd'] }}
                        </p></td>
                        <td class="cart_delete">
                            <a href="{{ route('cart.destroy', ['id'=>$k]) }}" class="cart_quantity_delete">DELETE</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            Nenhum item encontrado.
                        </td>
                    </tr>
                    @endforelse
                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right"><span>TOTAL: R$ {{ $cart->getTotal() }}</span>
                                <a href="#" class="btn btn-success">Fechar a conta</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

@stop