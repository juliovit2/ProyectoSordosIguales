<div class="container">
    <div class="col -md-6 col-md-offset-3">
        <h2> Pago con WebPay</h2>
        <p><b>Valor</b>:{{$amount}} </p>
        <p><b>Orden de compra {{$formAction}}</b>: {{$buyOrder}}</p>

        <form action="{{$formAction}}" method="POST" class="form-inline" role="form">
            {{ csrf_field() }}
            <input type="hidden" name="token_ws" value="{{$tokenWs}}">

            <button type="submit" class="btn btn-primary">Donar</button>
        </form>
    </div>
</div>