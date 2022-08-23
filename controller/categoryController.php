<?php

//função para ocultar os erros que são exibidos por causa do metodo "salvar_category"
ini_set('display_errors','off');
    require_once 'conn.php';
    
    Class Produto extends Conn {

        //metodo para salvar as categorias 
        function salvar_category () {
            if(isset($_POST['addCategory'])) {            
                $salvar = $_POST;            
                $insert = "INSERT INTO category 
                (category_name, category_code)
                VALUE (?, ?)
                ";

                $stmt = $this->conn->prepare($insert);
                $params = [
                    $salvar['category_name'],
                    $salvar['category_code'],
                
                ];
                $stmt->bind_param("ss",...$params);
                $stmt->execute();
            }

            
        }
        //metodo para listar categorias
        function listar_category () {
                      
           $select = "SELECT * FROM category";
           $query = $this->conn->query($select);
           while ($row = $query->fetch_array()){
            $tabela [] = $row;
           }
           return $tabela;
        }
        //metodo para editar categorias
        function editar_category(){
            $codCategory = $_POST['id'];
            if(isset($codCategory)) {
                $category_name = mysqli_real_escape_string($this->conn, $_POST['category_name']);        
                $category_code = mysqli_real_escape_string($this->conn, $_POST['category_code']);        
                           
                
                $sql_update = "UPDATE category 
                SET category_name='$category_name',          
                category_code='$category_code'                    
                WHERE codCategory  =  $codCategory ";
                $sqlQueri = mysqli_query($this->conn, $sql_update); 
                if(mysqli_affected_rows($this->conn) != 0){
    
                 
                    
                header("Location: ../categories.php");
                }else{
                 
                    
                 header("Location: ../categories.php");
                }
                
            }
            
           
           
        }       
        //metodo para deletar a categoria
        function dow(){
            $codCategory = filter_input(INPUT_GET, 'codCategory', FILTER_SANITIZE_NUMBER_INT);
            if(isset( $codCategory)){
                $sqlDelet = "DELETE FROM category  WHERE codCategory = '".$_GET['codCategory']."'";
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
                header("Location: ../categories.php");

                }  
            }
        }       
    }

   $Produto = new Produto();
   $Produto->salvar_category();
   $Produto->dow();
   $Produto->editar_category();
   $listar = $Produto->listar_category();