<?php 
    require_once "Model/DbModel.php";
    session_start(); 

    class Controller extends Model{
        public function MainControl(){
            $categories = $this->GetCategories();
            $products = $this->GetProducts();
            $dataUser = $this->GetDataUser();
            $dataUserRole = $this->GetDataUserRole();
            $cart = $this->GetCart();
            $bill = $this->GetBill();
            if(isset($_GET['action'])){
                $action = $_GET['action'];
                switch($action){

                    /** User */
                    case 'login':{
                        if(isset($_POST['login'])){
                            $count = 0;
                            $user = $_POST['username'];
                            $pass = $_POST['password'];
                            foreach ($dataUser as $value) {
                                if($value['username'] == $user && $value['pass'] == $pass){
                                    $_SESSION['username'] = $user;
                                    $_SESSION['role'] = $value['id_role'];
                                    $count++;
                                    break;
                                }
                            }
                        }
                        require_once('View/login/login.php');
                        break;
                    }
                    case 'signup':{
                        if(isset($_POST['register'])){
                            $check = 0;
                            $user = $_POST['username'];
                            $pass = $_POST['password'];
                            $repass = $_POST['repassword'];
                            $len = strlen($pass);
                            if($pass != $repass){
                                $check = -1;
                            }
                            if($len < 8){
                                $check = 1;
                            }
                            foreach ($dataUser as $value) {
                                if($value['username'] == $user){
                                    $check = 2;
                                    break;
                                }
                            }
                            if($check == 0){
                                $this->RegisterUser($user, $pass);
                            }
                        }
                        require_once('View/signup.php');
                        break;
                    }
                    case 'account':{
                        if(isset($_SESSION['username'])){
                            $username = $_SESSION['username'];
                            $billUser = $this->GetBillUser($username);
                        }
                        require_once('View/account.php');
                        break;
                    }
                    case 'changepass':{
                        if(isset($_POST['changepass'])){
                            $check = 0;
                            $user = $_SESSION['username'];
                            $passold = $_POST['passwordold'];
                            $passnew = $_POST['passwordnew'];
                            $repassnew = $_POST['repasswordnew'];
                            $len = strlen($passnew);
                            if($passnew != $repassnew){
                                $check = -1;
                            }
                            if($len < 8){
                                $check = 1;
                            }
                            foreach ($dataUser as $value) {
                                if($value['username'] == $user){
                                    if($value['pass'] != $passold){
                                        $check = 2;
                                        break;
                                    }
                                    if($value['pass'] == $passnew){
                                        $check = 3;
                                        break;
                                    }                                    
                                }
                            }
                            if($check == 0){
                                $this->ChangePass($user, $passnew);
                            }
                        }
                        require_once('View/changepass.php');
                        break;
                    }
                    case 'logout':{
                        unset($_SESSION['username']);
                        unset($_SESSION['role']);
                        header('location: http://localhost/milktea');
                        break;
                    }


                    /** Manager */
                    case 'manager':{
                        if(isset($_GET['add_categories'])){
                            if(isset($_POST['add_category'])){
                                $name = $_POST['name'];
                                $img = $_POST['image'];
                                if($this->AddCategory($name, $img)){
                                    header('location: http://localhost/milktea/?action=manager&categories_manager');
                                }
                            }
                            require_once('View/manager/addcategories.php');
                            break;
                        }elseif(isset($_GET['update_categories'])){
                            if(isset($_GET['id'])){
                                $id_cate = $_GET['id'];
                                $categoryID = $this->GetCategoryID($id_cate);
                                if(isset($_POST['update_category'])){
                                    $name = $_POST['name'];
                                    $img = $_POST['image'];
                                    if($this->UpdateCategory($id_cate,$name, $img)){
                                        header('location: http://localhost/milktea/?action=manager&categories_manager');
                                    }
                                }
                            }
                            require_once('View/manager/updatecategories.php');
                            break;
                        }elseif(isset($_GET['delete_categories'])){
                            if(isset($_GET['id'])){
                                $id_cate = $_GET['id'];
                                if($this->DeleteCategory($id_cate)){
                                    header('location: http://localhost/milktea/?action=manager&categories_manager');
                                }
                            }
                            break;
                        }elseif(isset($_GET['add_products'])){
                            if(isset($_POST['add_product'])){
                                $check = true;
                                $title = $_POST['title'];
                                $regular_price = $_POST['regular_price'];
                                $sale_price = $_POST['sale_price'];
                                if($sale_price > $regular_price){
                                    $check = false;
                                }
                                if($sale_price != null){
                                    $price = $sale_price;
                                }else{
                                    $price = $regular_price;
                                }
                                $img = $_POST['image'];
                                $descrip = $_POST['descrip'];
                                $id_category = $_POST['cate'];
                                if($check){
                                    if($this->AddProduct($title, $regular_price, $sale_price, $price, $img, $descrip, $id_category)){
                                        header('location: http://localhost/milktea/?action=manager&products_manager');
                                    }
                                }
                            }
                            require_once('View/manager/addproducts.php');
                            break;
                        }elseif(isset($_GET['update_products'])){
                            if(isset($_GET['id'])){
                                $id_product = $_GET['id'];
                                $productID = $this->GetProductID($id_product);
                                if(isset($_POST['update_product'])){
                                    $check = 1;
                                    $title = $_POST['title'];
                                    $regular_price = $_POST['regular_price'];
                                    $sale_price = $_POST['sale_price'];
                                    if($sale_price > $regular_price){
                                        $check = 0;
                                    }
                                    if($sale_price != null){
                                        $price = $sale_price;
                                    }else{
                                        $price = $regular_price;
                                    }
                                    $img = $_POST['image'];
                                    $descrip = $_POST['descrip'];
                                    $id_category = $_POST['cate'];
                                    if($check == 1){
                                        if($this->UpdateProduct($id_product, $title, $regular_price, $sale_price, $price, $img, $descrip, $id_category)){
                                            header('location: http://localhost/milktea/?action=manager&products_manager');
                                        }
                                    }
                                }
                            }
                            require_once('View/manager/updateproducts.php');
                            break;
                        }elseif(isset($_GET['delete_products'])){
                            if(isset($_GET['id'])){
                                $id_product = $_GET['id'];
                                if($this->DeleteProduct($id_product)){
                                    header('location: http://localhost/milktea/?action=manager&products_manager');
                                }
                            }
                            break;
                        }
                        else{
                            require_once('View/manager/index.php');
                            break;
                        }
                    }

                    

                    /** Detail product */
                    case 'product':{
                        if(isset($_GET['id'])){
                            $id_product = $_GET['id'];
                            $productID = $this->GetProductID($id_product);
                            if(isset($_POST['add_to_cart'])){
                                $check = 0;
                                $title = $_POST['title'];
                                $img = $_POST['image'];
                                $quantity = $_POST['quantity'];
                                $price = $_POST['price'];
                                $username = $_POST['username'];
                                $id_product = $_POST['id_product'];
                                if($username == null){
                                    header('location: http://localhost/milktea/?action=login');
                                }

                                if(isset($_SESSION['username'])){
                                    $username = $_SESSION['username'];
                                    $cartUser = [];
                                    if(($cart) != 0){
                                        foreach ($cart as $key => $value) {
                                            # code...
                                            if($value['username'] == $username){
                                                array_push($cartUser, $value);
                                                // break;
                                            }
                                        }
                                    }

                                }
                                $id_cart = 0;
                                $quantity_cart = 0;
                                foreach ($cartUser as $key => $value) {
                                    # code...
                                    if($value['id_product'] == $id_product){
                                        $check = 2;
                                        $id_cart = $value['id'];
                                        $quantity_cart = $value['quantity'];
                                        break;
                                    }
                                }
                                if($check == 2 && $id_cart != 0){
                                    $quantity_cart = $quantity_cart + $quantity;
                                    if($this->UpdateCartAdd($id_cart, $title, $img, $quantity_cart, $price, $username, $id_product)){
                                        $check = 1;
                                    }
                                }else{
                                    if($this->AddCart($title, $img, $quantity, $price, $username, $id_product)){
                                        $check = 1;
                                    }
                                }
                            }
                        }
                        require_once('View/product.php');
                        break;
                    }

                    /** Cart */
                    case 'cart':{
                        if(isset($_SESSION['username'])){
                            $username = $_SESSION['username'];
                            $cartUser = [];
                            if($cart != 0){
                                foreach ($cart as $key => $value) {
                                    # code...
                                    if($value['username'] == $username){
                                        array_push($cartUser, $value);
                                        // break;
                                    }
                                }
                            }
                        }
                        require_once('View/cart/index.php');
                        break;
                    }
                    case 'delete_cart':{
                        if(isset($_GET['id'])){
                            $id_cart = $_GET['id'];
                            if($this->DeleteItemCart($id_cart)){
                                header('location: http://localhost/milktea/?action=cart');
                            }
                        }
                        break;
                    }

                    /**Checkout */
                    case 'checkout':{
                        if(isset($_SESSION['username'])){
                            $username = $_SESSION['username'];
                            $cartUser = [];
                            foreach ($cart as $key => $value) {
                                # code...
                                if($value['username'] == $username){
                                    array_push($cartUser, $value);
                                    // break;
                                }
                            }
                            if(isset($_POST['order'])){
                                $check = false;
                                $fullname = $_POST['full_name'];
                                $andress = $_POST['andress'];
                                $phone = $_POST['phone'];
                                $total_bill = $_POST['sum'];
                                $now = date("Y/m/d");
                                $data_order = [
                                    'title' => $_POST['title'],
                                    'quantity' => $_POST['quantity'],
                                    'summ' => $_POST['summ']
                                ];
                                $data_order = json_encode($data_order, JSON_UNESCAPED_UNICODE);
                                if($this->AddBill($fullname, $andress, $phone, $now ,$data_order, $total_bill, $username)){
                                    if($this->DeleteUserCart($username)){
                                        $check = true;
                                    } 
                                }
                            }
                        }
                        require_once('View/checkout.php');
                        break;
                    }
                }
            }else{
                require_once('View/homepage.php');
            }
        }
    }
?>