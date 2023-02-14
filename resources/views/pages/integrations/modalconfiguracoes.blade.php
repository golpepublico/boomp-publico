<!--MODAL CONFIGURAÇÃO-->
<div class="containerModalInte hideInte2" id="modalConfig">
    <form method="post" id="form-modal-config" action="{{ route('integrations.store', isset($postbacks->id) ? $postbacks->id : 0) }}" >
        @csrf
        <div class="flexRow divTitleModalInte">
            <span id="titleModalInte">Configuração</span>
            <i id="close-modalInte2" class="fa-solid fa-xmark"></i>
        </div>

        <div class="containerColumnInte">
            <label for="urlConfig" class="questionTitle">URL de retorno <span id="asterisk">*</span></label>
            <input type="text" name="callbackurl" id="urlConfig" placeHolder="http://exemplo.com.br/" class="inputModalInte" required>
        </div>

        <div class="containerColumnInte">
            <label for="produtoConfig" class="questionTitle">Produto</label>
            <select name="product_id" id="product" class="inputModalInte" required>
                <option value="">Todos os produtos</option>
                @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="containerEventos">
            <span class="questionTitle">Eventos</span>

            @foreach($eventsAvailable as $event => $eventValue)
                <div>
                    <label>
                        <input type="checkbox" id="ev_{{$event}}" name="events[{{$event}}]">{{ $eventValue }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="containerColumnInte">
            <label for="produtoConfig" class="questionTitle">Método HTTP</label>
            <select name="methodtype" class="inputModalInte">
                <option value="post" selected>POST</option>
            </select>
        </div>

        <div class="containerEventos">
            <div>
                <label>
                    <input type="checkbox" id="active" name="active">Ativo
                </label>
            </div>
        </div>

        <div class="containerBtnModal">
            <button class="btnSave"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
        </div>
    </form>
</div>

