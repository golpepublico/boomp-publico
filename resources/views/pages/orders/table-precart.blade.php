<div id="container-abandonados" class="card">
    <div id="abandonados" class="scroll-different">
        <table>
            <thead>
            <tr>
                <th> Data </th>
                <th> E-mail </th>
                <th> Total </th>
                <th> Status </th>
                <th> Link </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td id="abandonado-dataHora">
                        <p> {{ $order->created_at_order }} </p>
                    </td>
                    <td> {{ $order->customer->email }} </td>
                    <td> R$ {{ Number::formatToCurrency($order->value) }} </td>
                    <td>
                        <div class="status-box pendente">
                            <span class="material-icons-outlined">
                                lens
                            </span>
                            <p> Pendente </p>
                        </div>
                    </td>
                    <td>
                        <a href="{{ URL::to('/checkout/' . $order->store->slug . '/' . $order->product->slug . '/' . $order->uuid) }}" target="new" class="item-produto-link">
                            <span class="material-icons-outlined">link</span>
                            <p>
                                Link de compra
                            </p>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@section('pagination')
    {{ $orders->links('layouts.pagination') }}
@endsection
