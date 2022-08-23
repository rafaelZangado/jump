<?php
 session_start();  
    ini_set('display_errors','off');
    require_once 'conn.php';
    //class produtos
    Class Produto extends Conn {
         //metodo para add produtos
        function salvar_produto () {
            if(isset($_POST['addProduct'])) {
                $salvar = $_POST;            
                $insert = "INSERT INTO produtos 
                (sku, name, price, quantity, category, description)
                VALUE (?, ?, ?, ?, ?, ?)
                ";
    
                $stmt = $this->conn->prepare($insert);
                $params = [
                    $salvar['sku'],
                    $salvar['name'],
                    str_replace(",",".",$salvar['price']),
                    $salvar['quantity'],
                    $salvar['category'],
                    $salvar['description']
                ];
                $stmt->bind_param("ssssss",...$params);
                $stmt->execute();
            }
           
           
        }

        //metodo para editar os produtos
        function editar_produto () {
          
            $id = $_POST['id'];
              
            if(isset($id)) {
                $sku = mysqli_real_escape_string($this->conn, $_POST['sku']);        
                $name = mysqli_real_escape_string($this->conn, $_POST['name']);        
                $price = mysqli_real_escape_string($this->conn, $_POST['price']);        
                $quantity = mysqli_real_escape_string($this->conn, $_POST['quantity']);        
                $category = mysqli_real_escape_string($this->conn, $_POST['category']);        
                $description = mysqli_real_escape_string($this->conn, $_POST['description']);           
                           
                
                $sql_update = "UPDATE produtos 
                SET sku='$sku',
                name='$name',
                price='$price',
                quantity ='$quantity',     
                category='$category',     
                description='$description'                       
                WHERE codProduto  =  $id";
                $sqlQueri = mysqli_query($this->conn, $sql_update); 
                if(mysqli_affected_rows($this->conn) != 0){
    
                   $_SESSION['alerta'] = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <div class="icon">
                        <i class="fa fa-check"></i>
                            alteração feita com sucesso
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                </div>';
                 header("Location: ../products.php");
                }else{
                    $_SESSION['alerta'] = '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <div class="icon">
                        <i class="fa fa-check"></i>
                        Erro na solicitação
                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                </div>';
                header("Location: ../products.php");
                }
            }
        
           
        }

        //metodo para listar os produtos
        function listar_produtos(){
            $select = "SELECT * FROM produtos";
            $result = $this->conn->query($select);
            while ($row = $result->fetch_array()) {
                $tabela [] = $row;
                
            }
            return $tabela;
        }
        //metodo para deletar os produtos
        function delet(){
          $id = filter_input(INPUT_GET, 'codProduto', FILTER_SANITIZE_NUMBER_INT);
            if(isset( $id)){
                $sqlDelet = "DELETE FROM produtos  WHERE codProduto = $id";
                $sqlQuery= mysqli_query($this->conn, $sqlDelet);
        
                if ($sqlQuery) {
                    $_SESSION['alerta'] = '<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                    <div class="icon">
                        <i class="fa fa-check"></i>
                        O item foi excluido com sucesso 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                </div>';
                header("Location: ../products.php");

                }  
            }
        }

    }


   $Produto = new Produto();
   $Produto->salvar_produto();
   $Produto->editar_produto();
   $Produto->delet();
   $listar = $Produto->listar_produtos();