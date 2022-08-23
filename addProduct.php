
<!doctype html>
<html ⚡>
<head>
  <title>Webjump | Backend Test | Add Product</title>
  <meta charset="utf-8">

<link  rel="stylesheet" type="text/css"  media="all" href="css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
<meta name="viewport" content="width=device-width,minimum-scale=1">
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script></head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
crossorigin="anonymous">

<!-- JS Bootrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>    
<!-- Header -->
<amp-sidebar id="sidebar" class="sample-sidebar" layout="nodisplay" side="left">
  <div class="close-menu">
    <a on="tap:sidebar.toggle">
      <img src="images/bt-close.png" alt="Close Menu" width="24" height="24" />
    </a>
  </div>
  <a href="dashboard.html"><img src="images/menu-go-jumpers.png" alt="Welcome" width="200" height="43" /></a>
  <div>
    <ul>
      <li><a href="categories.php" class="link-menu">Categorias</a></li>
      <li><a href="products.php" class="link-menu">Produtos</a></li>
    </ul>
  </div>
</amp-sidebar>
<header>
  <div class="go-menu">
    <a on="tap:sidebar.toggle">☰</a>
    <a href="dashboard.html" class="link-logo"><img src="images/go-logo.png" alt="Welcome" width="69" height="430" /></a>
  </div>
  <div class="right-box">
    <span class="go-title">Administration Panel</span>
  </div>    
</header>  
<!-- Header -->
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">New Product </h1>
    
<div class="alert" id="alert" role="alert"></div>
    <form id="formCadastro">
      <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input type="text" id="sku" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" id="name" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type="text" id="price" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="text" id="quantity" class="input-text" /> 
        

      </div>
      <div class="input-field">
        <label for="category" class="label">Categories</label>
        
        <select multiple id="category" class="input-text">
          <?php 
            include 'controller/categoryController.php';
            foreach ($listar as $valor) { 
              ?>
                  <option><?=$valor['category_name']?></option>             
              <?php 
            } 
          ?>
         </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" class="input-text"></textarea>
      </div>
      <div class="actions-form">
        <a href="products.php" class="action back">Back</a>
        <input class="btn-submit btn-action" id="addProduct" type="submit" value="Save Product" />
      </div>      
    </form>
  </main>
  <!-- Main Content -->

  <script type="text/javascript">    
    $(document).ready(function() {
        $("#addProduct").click(function() {            
            var sku = $('#sku').val();
            var name = $('#name').val();
            var price = $('#price').val();
            var quantity = $('#quantity').val();
            var category = $('#category').val();
            var description = $('#description').val();
            var addProduct = $('#addProduct').val();
            
            $('#alert').html('');
            if(sku == '') {
                $('#alert').html('o Campo esta [sku] vazio');
                $('#alert').addClass('alert-danger');
                return false;
            }
            $('#alert').html('');
            if(name == '') {
                $('#alert').html('o Campo esta [Produto] vazio');
                $('#alert').addClass('alert-danger');
                return false;
            }
            $('#alert').html('');
            if(price == '') {
                $('#alert').html('o Campo do [$0,00] esta vazio');
                $('#alert').addClass('alert-danger');
                return false;
            }
            $('#alert').html('');
            if(quantity == '') {
                $('#alert').html('o Campo da [quantity] esta vazio');
                $('#alert').addClass('alert-danger');
                return false;
            }
            $('#alert').html('');
            if(category == '') {
                $('#alert').html('o Campo [category] esta vazio');
                $('#alert').addClass('alert-danger');
                return false;
            }
            $('#alert').html('');
            if(description == '') {
                $('#alert').html('o Campo da [description] esta vazio');
                $('#alert').addClass('alert-danger');
                return false;
            }
           
            $.ajax({
                url:'controller/produtosController.php',
               
                method: 'POST',
                data: {
                    sku:sku,
                    name: name, 
                    price:price,
                    quantity: quantity,
                    category:category,
                    description:description,
                    addProduct:addProduct,
                },
                success: function(result){
                    $('form').trigger('reset');
                    $('#alert').addClass('alert-success');
                    $('form').fadeIn().html(result);
                    setTimeout(function(){
                        $('#alert').fadeOut('Slow');
                    },30000);
                }
            });
           
        }); // quando eu clicar no botao com o id='pagar'
    });
    </script>
    
  <!-- Footer -->
<footer>
	<div class="footer-image">
	  <img src="images/go-jumpers.png" width="119" height="26" alt="Go Jumpers" />
	</div>
	<div class="email-content">
	  <span>go@jumpers.com.br</span>
	</div>
</footer>
 <!-- Footer --></body>
</html>
