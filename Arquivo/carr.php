
<?php 
    session_start();
    require_once "functions/product.php";
    require_once "functions/cart.php";

    $pdoConnection = require_once "connection.php";

    if(isset($_GET['acao']) && in_array($_GET['acao'], array('add', 'del', 'up'))) {
        
        if($_GET['acao'] == 'add' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
            addCart($_GET['id'], 1);            
        }

        if($_GET['acao'] == 'del' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
            deleteCart($_GET['id']);
        }

        if($_GET['acao'] == 'up'){ 
            if(isset($_POST['prod']) && is_array($_POST['prod'])){ 
                foreach($_POST['prod'] as $id => $qtd){
                        updateCart($id, $qtd);
                }
            }
        } 
        header('location: carrinho.php');
    }

    $resultsCarts = getContentCart($pdoConnection);
    $totalCarts  = getTotalCart($pdoConnection);


?>
<!DOCTYPE html>

<html lang="Pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrinho</title>
    
   <!-- fontes google -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> Minha Conta</a></li>
                            <li><a href="carrinho.html"><i class="fa fa-user"></i> Meu carrinho</a></li>
                             <li><a href="index.php"><i class="fa fa-user"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="logo">
                        <h1><a href="./"><img src="img/tas.jpeg">Tas camisetas</a></h1>
                    </div>    
                 </div>

             </div>
               
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="shop.html">Produtos</a></li>
         
                        <li class="active"><a href="carrinho.html">Carrinho</a></li>
                     
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Carrinho </h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
              
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            
                            <form method="post" action=acao-up">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Produto</th>
                                            <th class="product-price">Valor</th>
                                            <th class="product-quantity">Quantidade</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                 

                                        ?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="#">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="shop.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/c4.jpg"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="shop.html">Camiseta</a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">R$ 20</span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="minus" value="-">
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" min="0" step="1">
                                                    <input type="button" class="plus" value="+">
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">R$ </span> 
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>


   
    
      
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>