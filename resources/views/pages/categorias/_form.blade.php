<div class="form-row">
    <label for="name">Categoria: <small>*</small></label>
    <input name="name" id="name" type="text" value="{{ isset($categories->name) ?? old('name') }}" required autofocus>
</div>
