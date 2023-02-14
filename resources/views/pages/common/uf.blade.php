<div>
    <label for="estadp">Estado *</label>
    <select name="uf" id="uf">
        <option> Selecione </option>
        @foreach (App\Models\UFs::getGroupingByRegion() as $regiao => $r)
            <optgroup label="{{ $regiao }}">
            @foreach ($r as $uf)
            <option value="{{ $uf->sigla }}" {{ isset($endereco) && $endereco->uf == $uf->sigla  ? 'selected' : '' }}> {{ $uf->nome }} </option>
            @endforeach
        @endforeach
    </select>
</div>
