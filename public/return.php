<?php

use Transbank\Webpay\Configuration;
use Transbank\Webpay\Webpay;

require_once 'C:/laragon/www/ProyectoSordosIguales/vendor/autoload.php';

$result = $transaction->getTransactionResult($request->input("token_ws"));
$output = $result->detailOutput;

if ($output->responseCode == 0) {
    // Transaccion exitosa, puedes procesar el resultado con el contenido de
    // las variables result y output.
    echo '<script>window.localStorage.clear();</script>';
    echo '<script>window.localStorage.setItem("authorizationCode",'. $output->authorizationCode .')</script>';
    echo '<script>window.localStorage.setItem("amount",'. $output->amount .')</script>';
    echo '<script>window.localStorage.setItem("responseCode",'. $output->responseCode .')</script>';
}
?>

<?php if($output->responseCode == 0):?>


    <form action="<?php echo $result->urlRedirection ?>" method="post" id="return-form">
        <input type="hidden" name="token_ws" value="<?php echo $tokenWs?>">
    </form>

    <script>
        document.getElementById("return-form").submit();
    </script>

<?php endif; ?>