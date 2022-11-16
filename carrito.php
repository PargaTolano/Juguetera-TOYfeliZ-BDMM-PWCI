<?php
include('./templates/header.php');
include('./paypal/config.php');
$productName = "Producto demostración";
$currency = "EUR";
$productPrice = 10;
$productId = 587965;
$orderNumber = 567;
?>

<section>

<div id="paypal-button"></div>
<h2>Demo Paypal Express Checkout Demo con PHP</h2>  
    <br>
    <table class="table">
        <tr>
          <td style="width:150px"><img src="demo_product.jpg" style="width:50px" /></td>
          <td style="width:150px"><?php echo $productPrice; ?> €</td>
          <td style="width:150px">
          <?php include 'paypal/paypalCheckout.php'; ?>
          </td>
        </tr>
    </table>    
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
paypal.Button.render({
  env: '<?php echo PayPalENV; ?>',
  client: {
    <?php if(ProPayPal) { ?>  
    production: '<?php echo PayPalClientId; ?>'
    <?php } else { ?>
    sandbox: '<?php echo PayPalClientId; ?>'
    <?php } ?>  
  },
  payment: function (data, actions) {
    return actions.payment.create({
      transactions: [{
        amount: {
          total: '<?php echo $productPrice; ?>',
          currency: '<?php echo $currency; ?>'
        }
      }]
    });
  },
  onAuthorize: function (data, actions) {
    return actions.payment.execute()
      .then(function () {
        window.location = "<?php echo PayPalBaseUrl ?>orderDetails.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=<?php echo $productId; ?>";
      });
  }
}, '#paypal-button');
</script>


    <br>
    <div class="container bg-light" >
        <h2 class="Titulos"> Carrito </h5>
        <div id = "Contenido_carrito">
            <!-- Productos se llenan con un for-->
            <div class="container-fluid separadorDoble">
                <div class="row">
                    <div class="col-3 text-center" >
                        <img src="images/LOGO - copia.png" class="img-thumbnail" width="200px" alt="">                         
                    </div>
                    <div class="col-5 bg-info separador">
                        <p> Categoria </p>
                        <p> Nombre producto </p>
                        <p> Descripcion dsdasdasdsadasdsddddddddddddddddddddddddddddd </p>
                    </div>
                    <div class="col-2 bg-info text-center" style="padding: 40px;">
                        <input type="number" id="cantidad" name="cantidad" min="1" max="100" value="1">
                        <p class="py-4">Total</p>
                    </div>
                    <div class="col-2 bg-info separador">
                        <div>
                            <button type="button" id="Ver" class="btn btn-primmary bg-warning" style="right: 10px;"> Ver </button>
                            <button type="button" id="Quitar" class="btn btn-primmary bg-danger" style="right: 10px;"> Quitar </button>
                        </div>
                    </div>
                </div>                    
            </div>

            <hr>

            <div class="container-fluid separadorDoble">
                <div class="row">
                    <div class="col-3 text-center" >
                        <img src="images/wallpaper2.png" class="img-thumbnail" width="200px" alt="">                         
                    </div>
                    <div class="col-5 bg-info separador">
                        <p> Categoria </p>
                        <p> Nombre producto </p>
                        <p> Descripcion dsdasdasdsadasdsddddddddddddddddddddddddddddd </p>
                    </div>
                    <div class="col-2 bg-info text-center" style="padding: 40px;">
                        <input type="number" id="cantidad" name="cantidad" min="1" max="100" value="1">
                        <p class="py-4">Total</p>
                    </div>
                    <div class="col-2 bg-info separador">
                        <div>
                            <button type="button" id="Ver" class="btn btn-primmary bg-warning" style="right: 10px;"> Ver </button>
                            <button type="button" id="Quitar" class="btn btn-primmary bg-danger" style="right: 10px;"> Quitar </button>
                        </div>
                    </div>

                </div>                    
            </div>

            <hr>

            <div class="container-fluid separadorDoble" >
                <div class="row">
                    <div class="col-3 text-center" >
                        <img src="imagenes/wallpaper3.jpg" class="img-thumbnail" width="200px" alt="">                         
                    </div>
                    <div class="col-5 bg-info separador">
                        <p> Categoria </p>
                        <p> Nombre producto </p>
                        <p> Descripcion dsdasdasdsadasdsddddddddddddddddddddddddddddd </p>
                    </div>
                    <div class="col-2 bg-info text-center" style="padding: 40px;">
                        <input type="number" id="cantidad" name="cantidad" min="1" max="100" value="1">
                        <p class="py-4">Total</p>
                    </div>
                    <div class="col-2 bg-info separador">
                        <div>
                            <button type="button" id="Ver" class="btn btn-primmary bg-warning" style="right: 10px;"> Ver </button>
                            <button type="button" id="Quitar" class="btn btn-primmary bg-danger" style="right: 10px;"> Quitar </button>
                        </div>
                    </div>

                </div>                    
            </div>

            <hr>

            <div style="display:flex;  background-color: pink;" >                     
                <h3 class="Titulos text-center"> TOTAL: </h3>
                <h3 class="Titulos text-center"> $4545 </h3>
            </div>

            <br>

            <div class="text-center">
                <button type="button" id="quitarTodo" class="btn btn-primmary bg-danger" style="right: 10px; "> Vaciar carrito </button>
                <button type="button" id="Comprar" class="btn btn-primmary bg-info" style="right: 10px;" data-bs-toggle="modal" data-bs-target="#registroModal" > Comprar </button>
            </div>

            <br>

        </div>
        
        <p id="No_hay"></p>

        
        <div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="inicio.php" method="POST" id="form_cotizacion">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title Titulos" id="exampleModalLabel"> Selecciona el método de pago </h5>
                    </div>
                <div class="modal-body">
                    <select name="" id="">
                        <option value="Tarjeta"> Tarjeta  </option>
                        <option value="Vender"> Pago contra envío </option>
                    </select>
                    <br> <br>
                    <p> Ingresa el número de tarjeta </p>
                    <input type="text">
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-warning" data-dismiss="modal"> Cerrar </button>
                        <input type="submit" id="Crear_Lista" class="btn btn-primary btn-info" value="Pagar" name="">
                    </div>
                </div>
            </form>
        </div>

    </div>
</section>

<?php
include('./templates/footer.php');
?>