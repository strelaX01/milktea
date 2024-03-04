<?php 
    require_once "Db.php";

    class Model extends Db{


        /** USER */
        public function GetDataUser(){
            $sql = "SELECT * FROM user";
            $con = $this->connect();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function GetDataUserRole(){
            $sql = "SELECT * FROM role_user";
            $con = $this->connect();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($ketqua)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function RegisterUser($user, $pass){
            $sql = "INSERT INTO user(id, username, pass, id_role) VALUES(NULL,'$user', '$pass', 2)";
            $conn = $this->connect();
            return $conn->query($sql);
        }

        public function ChangePass($user, $pass){
            $sql = "UPDATE user SET pass = '$pass' WHERE username = '$user'";
            $conn = $this->connect();
            return $conn->query($sql);
        }




        /* CATEGORIES */
        public function GetCategories(){
            $sql = "SELECT * FROM categories";
            $con = $this->connect();
            $result = $con->query($sql);
            if($result->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($result)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function AddCategory($name, $img){
            $sql = "INSERT INTO categories(id, title, img) VALUES(NULL,'$name', '$img')";
            $conn = $this->connect();
            return $conn->query($sql);
        }
        public function UpdateCategory($id_cate, $title, $img){
            $sql = "UPDATE categories SET title='$title', img='$img' WHERE id='$id_cate'";
            $conn = $this->connect();
            return $conn->query($sql);
        }
        public function GetCategoryID($id_cate){
            $sql = "SELECT * FROM categories WHERE id = $id_cate";
            $con = $this->connect();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows!=0){
                $data = mysqli_fetch_array($ketqua);
            }else{
                $data = 0;
            }
            return $data;
        }
        public function DeleteCategory($id_cate){
            $sql = "DELETE FROM categories WHERE id = '$id_cate'";
            $conn = $this->connect();
            return $conn->query($sql);
        }



        /** PRODUCTS */
        public function GetProducts(){
            $sql = "SELECT * FROM products";
            $con = $this->connect();
            $result = $con->query($sql);
            if($result->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($result)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function AddProduct($title, $regular_price, $sale_price, $price, $img, $descrip, $id_category){
            $sql = "INSERT INTO products(id, title, regular_price, sale_price, price, img, descrip, id_category)
            VALUES(NULL,'$title', '$regular_price', '$sale_price', '$price', '$img','$descrip', '$id_category')";
            $conn = $this->connect();
            return $conn->query($sql);
        }
        public function GetProductID($id_product){
            $sql = "SELECT * FROM products WHERE id = $id_product";
            $con = $this->connect();
            $ketqua = $con->query($sql);

            if($ketqua->num_rows!=0){
                $data = mysqli_fetch_array($ketqua);
            }else{
                $data = 0;
            }
            return $data;
        }
        public function UpdateProduct($id_product, $title, $regular_price, $sale_price, $price, $img, $descrip, $id_category){
            $sql = "UPDATE products SET title = '$title', regular_price = '$regular_price', sale_price = '$sale_price', price = '$price', img = '$img', descrip = '$descrip', id_category = '$id_category' WHERE id='$id_product'";
            $conn = $this->connect();
            return $conn->query($sql);
        }
        public function DeleteProduct($id_product){
            $sql = "DELETE FROM products WHERE id = '$id_product'";
            $conn = $this->connect();
            return $conn->query($sql);
        }


        /** Cart */
        public function GetCart(){
            $sql = "SELECT * FROM cart";
            $con = $this->connect();
            $result = $con->query($sql);
            if($result->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($result)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function AddCart($title, $img, $quantity, $price, $username, $id_product){
            $sql = "INSERT INTO cart(id, title, img, quantity, price, username, id_product)
            VALUES(NULL,'$title', '$img', '$quantity', '$price', '$username', $id_product)";
            $conn = $this->connect();
            return $conn->query($sql);
        }
        public function UpdateCartAdd($id_cart, $title, $img, $quantity_cart, $price, $username, $id_product){
            $sql = "UPDATE cart SET title='$title', img='$img', quantity='$quantity_cart',price='$price', username='$username', id_product='$id_product' WHERE id='$id_cart'";
            $conn = $this->connect();
            return $conn->query($sql);
        }
        public function DeleteItemCart($id_cart){
            $sql = "DELETE FROM cart WHERE id = '$id_cart'";
            $conn = $this->connect();
            return $conn->query($sql);
        }
        public function DeleteUserCart($username){
            $sql = "DELETE FROM cart WHERE username = '$username'";
            $conn = $this->connect();
            return $conn->query($sql);
        }



        /**Checkout Order */
        public function GetBill(){
            $sql = "SELECT * FROM bill";
            $con = $this->connect();
            $result = $con->query($sql);
            if($result->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($result)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function GetBillUser($username){
            $sql = "SELECT * FROM bill WHERE username = '$username'";
            $con = $this->connect();
            $result = $con->query($sql);
            if($result->num_rows==0){
                $data = 0;
            }else{
                while($datas = mysqli_fetch_assoc($result)) {
                    $data[] = $datas;
                }
            }
            return $data;
        }
        public function AddBill($fullname, $andress, $phone, $now ,$data_order, $total_bill, $username){
            $sql = "INSERT INTO bill(id, fullname, andress, phone, date_order ,data_order, total_bill, username) VALUES(NULL,'$fullname', '$andress', '$phone', '$now','$data_order', '$total_bill','$username')";
            $conn = $this->connect();
            return $conn->query($sql);
        }
    }
?>