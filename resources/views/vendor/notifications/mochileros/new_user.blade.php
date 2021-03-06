@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', [
            'url' => 'https://tienda.mochileros.com.mx/',
            'img' => 'https://media-mochileros.s3.us-east-2.amazonaws.com/upload/small_jR_SW1eGqCdQQsORSwdwv3m57W6SXrzB27Aeu9.png'
            ])
            <img src="https://media-mochileros.s3.us-east-2.amazonaws.com/upload/small_jR_SW1eGqCdQQsORSwdwv3m57W6SXrzB27Aeu9.png"
                 height="40px" alt="">
        @endcomponent
    @endslot

    <div>
        <h1 style="text-align: center;font-size: 28px;">¡Bienvenido a Mochileros Shop!</h1>
        <br>
        <h2>¡Hola! {{$user->name}}</h2>
        <p>Si lo tuyo es viajar, esta es tu sección. En Tienda Mochileros hemos diseñado una linea de productos pensados especialmente para los aventureros y amantes de los viajes.</p>
        <br>
        <p>Con cada compra tienes a tu disposición ofertas increíbles en muchos de nuestros productos. No te compliques comienza tu lista de compras ahora.</p>
        <br>
        <p>¡Qué sí, qué si! Que la compra es segura y no almacenamos tus tarjetas, tus conexiónes bancarias son encriptadas gracias al protocolo SSL.</p>
        <div>
            <div>
                @component('mail::button', ['url' => 'https://tienda.mochileros.com.mx/'])
                    ¿Ver ofertas!
                @endcomponent
            </div>
        </div>


    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <!-- footer here -->
@endcomponent
@endslot
@endcomponent