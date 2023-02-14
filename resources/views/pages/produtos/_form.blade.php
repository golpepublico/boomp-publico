<div id="divRow">
    <section id="sectionForm">
        <div class="divContainerForm">
            <label for="nomeProduto">Nome</label>
            <input class="inputText" name="name" id="nomeProduto" type="text" value="{{ isset($products->name) ?? old('name') }}" placeholder="Digite o nome do produto" required autofocus>

            <label for="descricaoProduto">Descrição</label>
            <textarea class="inputText" name="description" id="descricaoProduto" cols="30" rows="10" placeholder="Esta é a descrição do seu produto para seus clientes." value="{{ isset($products->description) ?? old('description') }}" required></textarea>
        </div>

        <div class="divContainerForm">
            <h2>Categoria do produto</h2>
            <p>É através dela que seus clientes encontrarão seu produto mais facilmente.</p>
            <div id="containerCategorias">
                @foreach ($categories as $category)
                <div class="categorias">
                    <input name="category_id" id="category_id" type="radio" value="{{ isset($category->id) ?? old('category_id') }}" required>
                    <span>{{ $category->name }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="divContainerForm">
            <h2>Galeria de imagens</h2>
            <p>Faça o upload das imagens do produto</p>
            <input name="image" id="image" type="file" accept="image/png, image/jpeg" multiple required />
        </div>

        <div class="divContainerForm">
            <h2>Precificação</h2>
            <label for="precoVenda">Preço de venda</label>
            <input name="price" id="precoVenda" type="text" placeholder="R$ 0,00" class="inputText price" value="{{ isset($products->price) ?? old('price') }}">
        </div>

        <div class="divContainerForm">
            <h2>Peso e medidas<span> (Necessário para cálculo do frete junto às transportadoras)</span></h2>

            <div class="containerMedidas">
                <div class="labelInput"><label for="pesoProduto">Peso (em gramas)</label>
                    <input class="inputText" name="weight" id="pesoProduto" type="number" placeholder="0" value="{{ isset($products->weight) ?? old('weight') }}">
                </div>

                <div class="labelInput"><label for="comprimentoProduto">Comprimento (mínimo 16cm)</label>
                    <input class="inputText" name="length" id="comprimentoProduto" type="number" placeholder="0" value="{{ isset($products->length) ?? old('length') }}">
                </div>
            </div>
            <div class="containerMedidas">
                <div class="labelInput"><label for="larguraProduto">Largura (mínimo 11cm)</label>
                    <input class="inputText" name="width" id="pesoProduto" type="number" placeholder="0" value="{{ isset($products->width) ?? old('width') }}">
                </div>

                <div class="labelInput"><label for="alturaProduto">Altura (mínimo 2cm)</label>
                    <input class="inputText" name="height" id="alturaProduto" type="number" placeholder="0" value="{{ isset($products->height) ?? old('height') }}">
                </div>
            </div>
        </div>

        <div class="divContainerForm">
            <h2>Página de vendas</h2>
            <label for="urlProduto">URL da página de vendas</label>
            <input class="inputText" name="url" id="urlProduto" type="url" placeholder="Informe o endereço completo..." value="{{ isset($products->url) ?? old('url') }}" required>
            <p>
                Informe o <b>endereço completo</b> da página de vendas desse produto. É importante que as
                <b>informações sobre o produto
                    estejam completas e corretas</b>, pois, nossa equipe de <i>compliance</i> analisará esta página
                para validar ou reprovar o produto.
            </p>
            <p><b>Atenção: </b>Lembre-se de, antes de ativar seu produto, <b>inserir na página de vendas os links
                    corretos para o checkout.</b></p>
        </div>

        <div class="divContainerForm">
            <div>
                <h2>Variantes</h2>
                <input type="checkbox" name="variation" value="1" {{ old('variation') ? 'checked="checked"' : '' }} /> Este produto possui várias opções, como tamanhos e/ou cores diferentes.
            </div>
            <div class="submit-row">
                <button type="submit"> Salvar </button>
            </div>
        </div>
    </section>

</div>
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script>
    $(".price").maskMoney({
        prefix: 'R$ ',
        allowNegative: false,
        thousands: '.',
        allowZero: true,
        decimal: ','
    });
</script>
@endsection
