
<!doctype html>
<html ⚡>
<head>
  <title>Webjump | Backend Test | Products</title>
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
<!-- Header --><body>
  <!-- Main Content -->
  <main class="content">
    <div class="header-list-page">
      <h1 class="title">Products</h1>
      <a href="addProduct.php" class="btn-action">Add new Product</a>
    </div>
    <?php
            
      if (isset($_SESSION['alerta'])) {
          echo $_SESSION['alerta'];
          unset($_SESSION['alerta']);
      }
    ?>
    <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">SKU</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Price</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Quantity</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Categories</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">description</span>
        </th>

        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>
      <?php 
      include 'controller/produtosController.php';
        foreach ($listar as $valor){ 
          ?>
            <tr class="data-row">
              <td class="data-grid-td">
                <span class="data-grid-cell-content"><?=$valor['name']?></span>
              </td>
              <td class="data-grid-td">
                <span class="data-grid-cell-content"><?=$valor['sku']?></span>
              </td>
              <td class="data-grid-td">
                <span class="data-grid-cell-content"><?=$valor['price']?></span>
              </td>
              <td class="data-grid-td">
                <span class="data-grid-cell-content"><?=$valor['quantity']?></span>
              </td>
              <td class="data-grid-td">
                <span class="data-grid-cell-content"><?=$valor['category']?></span>
              </td>
              <td class="data-grid-td">
                <span class="data-grid-cell-content"><?=$valor['description']?></span>
              </td>
             
            
             

            
              <td class="data-grid-td">
                <div class="actions">
                  <div class="action edit">
                    <span>
                    <button type="button" class="ti-pencil-alt btn btn-warning btn-circle btn-lg" data-toggle="modal" 
                      data-target="#largeModal" data-id="<?=$valor['codProduto']; ?>"
                      data-name="<?=$valor['name']; ?>"        
                      data-sku="<?=$valor['sku']; ?>"        
                      data-price="<?=$valor['price']; ?>"        
                      data-quantity="<?=$valor['quantity']; ?>"        
                      data-category="<?=$valor['category']; ?>"        
                      data-description="<?=$valor['description']; ?>"        
                      >
                      Editar
                      </button>
                    </span>
                  </div>
                  <div class="action delete"><span>
                    <?php echo"<a href='controller/produtosController.php?codProduto=".$valor['codProduto']."' data-confirm=''>Delete</a>" ?>
                  </span></div>
                </div>
              </td>
            </tr>
          <?php 
        } 
      ?>
      
    </table>
  </main>
  <!-- Main Content -->

  <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form   method="POST" action="controller/produtosController.php">
                    
                    <div class="col-6" >
                        <label for="inputAddress" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="name">
                    </div>

                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">sku</label>
                        <input type="text" name="sku" class="form-control" id="sku">
                    </div> 
                    <div class="col-6" >
                        <label for="inputAddress" class="form-label">Price</label>
                        <input name="price" type="text" class="form-control" id="price">
                    </div>

                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Quantity</label>
                        <input type="text" name="quantity" class="form-control" id="quantity">
                    </div> 
                    <div class="col-6">
                        <br>
                        <input name="id" type="hidden" class="form-control" id="id">

                        <button type="submit" id="salvarEdit"  name="salvarEdit"class="btn btn-primary">
                            <span class="ti-save"></span>
                            SALVAR EDIÇÃO
                        </button>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script src="js/delet.js"></script>
    <script src="js/products.edit.js"></script>
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
