<span class="material-icons-outlined">search</span>
<form class="form-inline" method="get" action="{{ url()->current() }}">
    <div class="form-group">
        <input onchange="this.form.submit()" type="text" class="form-control" name="search" id="search" placeholder="Pesquise pelo nome ...">
    </div>
</form>
