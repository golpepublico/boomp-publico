<div class="center">
    <div id="controle-info">
        @if (isset($paginator) && $paginator->lastPage() > 1)
            <div id="nitens-pagina">
                <form class="form-inline" method="get" action="{{ url()->current() }}">
                    <div class="form-group">
                        <label for="itens_page">Itens por página: </label>
                        <select class="itens_page" name="perPage" onchange='if(this.value != 0) { this.form.submit(); }'>
                            <option value="5"{{ $paginator->perPage() == '5' ? 'selected' : '' }}>5</option>
                            <option value="10"{{ $paginator->perPage() == '10' ? 'selected' : '' }}>10</option>
                            <option value="25"{{ $paginator->perPage() == '25' ? 'selected' : '' }}>25</option>
                            <option value="50"{{ $paginator->perPage() == '50' ? 'selected' : '' }}>50</option>
                            <option value="100"{{ $paginator->perPage() == '100' ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                </form>
            </div>

            <div id="indicador-itens">
                <p>Listando de <span id="first-item"> {{ $paginator->firstItem() }} </span> a <span id="limite-itens">
                        {{ $paginator->lastItem() }}
                    </span> de <span id="total-itens"> {{ $paginator->total() }} </span> </p>
            </div>

            <div id="controls-page">

                <?php
                $interval = isset($interval) ? abs(intval($interval)) : 3;
                $from = $paginator->currentPage() - $interval;
                if ($from < 1) {
                    $from = 1;
                }

                $to = $paginator->currentPage() + $interval;
                if ($to > $paginator->lastPage()) {
                    $to = $paginator->lastPage();
                }
                ?>

                <!-- first/previous -->
                @if ($paginator->currentPage() > 1)
                    <a href="{{ $paginator->url(1) }}" aria-label="First">
                        <span class="material-icons-outlined">first_page</span>
                    </a>
                    <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" aria-label="Previous">
                        <span class="material-icons-outlined">chevron_left</span>
                    </a>
                @endif

                <!-- next/last -->
                @if ($paginator->currentPage() < $paginator->lastPage())
                    <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" aria-label="Next">
                        <span class="material-icons-outlined">chevron_right</span>
                    </a>
                    <a href="{{ $paginator->url($paginator->lastpage()) }}" aria-label="Last">
                        <span class="material-icons-outlined">last_page</span>
                    </a>
                @endif
        @endif
    </div>
</div>
