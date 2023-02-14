<header>
    <!-- <img src="./assets/IMG/logo-recortada.png" alt="logo" class="itensHeader"> -->
    <img src="{{URL::to('assets/pages/img/logo-recortada.png')}}" alt="logo" class="itensHeader">
    <div id="progressBar" class="itensHeader">
        <span class="progress"><i class="fa-regular fa-circle"></i><span> Carrinho</span></span>
        <span class="progress"><i class="fa-regular fa-circle"></i><span> Informações</span></span>
        <span class="progress atualProgress"><i class="fa-regular fa-circle-dot"></i><span> Finalização</span></span>
    </div>
    <!-- Meta Pixel Code -->
    <script>
        @if (count($pixels) > 0)
            <?php $pixelIds = ''; ?>

            <?php
                $cont = strlen($pixelIds);
                $gal = substr($pixelIds, 0, $cont - 1);
            ?>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            @foreach ($pixels as $pixel)
            @if(($order->billingType->key === 'PIX' && $pixel->fl_pixel_pix) || ($order->billingType->key === 'CREDIT_CARD' && $pixel->fl_pixel_cred)
            || ($order->billingType->key === 'BOLETO' && $pixel->fl_pixel_boleto))
               <?php //$pixelIds .= "{$pixel->pixel_key},"; ?>
               fbq('init', '{{$pixel->pixel_key}}');
            @endif
            @endforeach
            fbq('track', 'Purchase', {
                content_name: '{{$product->name}}',
                currency: "BRL",
                value: {{$order->value}},
                billing_type: '{{$order->billingType->key}}',
                num_items: 1
            });
        @endif
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1020965841907054&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</header>
<div class="module-border">border</div>
