<section id="open-mode">
    <div id="nova-conta">
        <h3 id="nova-titulo"> Cadastrar conta </h3>     
        <form method="post" action="{{ route('wallet.create-bank-account') }}" enctype="multipart/form-data">
            @csrf
            @include('pages.wallet._form-bank-account')
        </form>
    </div>
</section>
