<div class="containerIntegracoes containerTableInt2">
    <div class="flexRow">
        <h1>Configurações de postback</h1>
        <span id="containerSearch">
                <label for="searchConfig">Pesquisar</label>
                <input type="search" id="searchConfig">
            </span>
        <button id="open-modalInte2" class="btnNewIntegracoes"><i class="fa-solid fa-plus"></i> Nova configuração</button>
    </div>
    <table>
        <tr>
            <th>Código</th>
            <th>URL de retorno</th>
            <th>Produto</th>
            <th>Eventos</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
        @foreach ($postbacks as $postback)
        <tr>
            <th>{{ $postback->code }}</th>
            <th>{{ $postback->callbackurl }}</th>
            <th>{{ isset($postback->product) ? $postback->product->name : 'Todos' }}</th>
            <th>{{ $postback->eventsalias }}</th>
            <th>
                @if($postback->active)
                <i class="fa-solid fa-circle-check"></i>
                @else
                <i class="fa-solid fa-circle-xmark"></i>
                @endif
            </th>
            <th>
                <button class="btnActions" id="open-modalInteEdit" data-postbackid="{{ $postback->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
{{--                <button class="btnActions" data-postbackid="{{ $postback->id }}"><i class="fa-solid fa-paper-plane"></i></button>--}}
                <form action="{{ route('integrations.store', $postback->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btnActions"><i class="fa-solid fa-xmark"></i></button>
                </form>
            </th>
        </tr>
        @endforeach
    </table>
</div>
