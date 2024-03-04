<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./View/manager/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Quản lí</title>
</head>
<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Zay
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/milktea/">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Về chúng tôi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cửa hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1):?>
                            <li class="nav-item">
                                <a class="nav-link" href="?action=manager&categories_manager">Quản lí</a>
                            </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="?action=cart">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <!-- <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span> -->
                </a>
                <?php 
                    if(isset($_SESSION['username'])){
                        ?>
                            <a class="nav-icon position-relative text-decoration-none" href="?action=account">
                                <i class="fa fa-fw fa-user text-dark mr-3"></i>
                            </a>
                        <?php
                    }else{
                        ?>
                            <a class="nav-icon position-relative text-decoration-none" href="?action=login">
                                <i class="fa fa-fw fa-user text-dark mr-3"></i>
                            </a>
                        <?php
                    }
                ?>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>    

    <div class="container manager">
        <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
            ?>
            <h4>Xin chào, <?php echo $_SESSION['username']; ?></h4>
            <div class="action">
                <a href="http://localhost/milktea">Trang chủ</a>
                <a href="?action=logout">Đăng xuất</a>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-xs-2 col-2">
                    <h4>List quản lí</h4>
                    <ul>
                        <li>
                            <a href="?action=manager&categories_manager">
                                <i class="fa-solid fa-hand-point-right"></i> Danh mục
                            </a>
                        </li>
                        <li>
                            <a href="?action=manager&products_manager">
                                <i class="fa-solid fa-hand-point-right"></i> Sản phẩm
                            </a>
                        </li>
                        <li>
                            <a href="?action=manager&users_manager">
                                <i class="fa-solid fa-hand-point-right"></i> Người dùng
                            </a>
                        </li>
                        <li>
                            <a href="?action=manager&bills_manager">
                                <i class="fa-solid fa-hand-point-right"></i> Hoá đơn
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-10 col-md-10 col-xs-10 col-10">
                    <?php
                    if(isset($_GET['categories_manager'])){
                        ?>
                        <h3>Quản lí danh mục</h3>
                        <div class="action">
                            <a href="?action=manager&categories_manager&add_categories">Thêm danh mục mới</a>
                        </div>
                        <table>
                            <thead>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên danh mục</th>
                                <th>Hành động</th>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    foreach ($categories as $key => $value) {
                                    # code...
                                        $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td class='thumb'><img src="<?php echo $value['img']; ?>" alt=""></td>
                                        <td><?php echo $value['title']; ?></td>
                                        <td>
                                            <a href="?action=manager&categories_manager&update_categories&id=<?php echo $value['id']; ?>">Sửa</a>
                                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?action=manager&categories_manager&delete_categories&id=<?php echo $value['id']; ?>">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    }elseif(isset($_GET['products_manager'])){
                        ?>
                        <h3>Quản lí danh mục</h3>
                        <div class="action">
                            <a href="?action=manager&products_manager&add_products">Thêm sản phẩm mới</a>
                        </div>
                        <table>
                            <thead>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Giá gốc</th>
                                <th>Giá khuyến mại</th>
                                <th>Giá</th>
                                <th>Mô tả</th>
                                <th>Danh mục</th>
                                <th>Hành động</th>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    foreach ($products as $key => $value) {
                                    # code...
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td class='thumb'><img src="<?php echo $value['img']; ?>" alt=""></td>
                                            <td><?php echo $value['title']; ?></td>
                                            <td><?php echo $value['regular_price']; ?></td>
                                            <td><?php echo $value['sale_price']; ?></td>
                                            <td><?php echo $value['price']; ?></td>
                                            <td><?php echo $value['descrip']; ?></td>
                                            <?php
                                            foreach ($categories as $key => $cate) {
                                                if($cate['id'] == $value['id_category']){
                                                    ?>
                                                        <td><?php echo $cate['title']; ?></td>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <td>
                                                <a href="?action=manager&products_manager&update_products&id=<?php echo $value['id']; ?>">Sửa</a>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="?action=manager&products_manager&delete_products&id=<?php echo $value['id']; ?>">Xóa</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    }elseif(isset($_GET['users_manager'])){
                        ?>
                        <h3>Quản lí tài khoản</h3>
                        <table>
                            <thead>
                                <th>STT</th>
                                <th>Tên tài khoản</th>
                                <th>Chức vụ</th>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    foreach ($dataUser as $key => $value) {
                                    # code...
                                        $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value['username'] ?></td>
                                        <?php
                                            foreach ($dataUserRole as $key => $role) {
                                                if($value['id_role'] == $role['id']){
                                                    ?>
                                                        <td><?php echo $role['name']; ?></td>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    }elseif(isset($_GET['bills_manager'])){
                        ?>
                        <h3>Quản lí hóa đơn</h3>
                        <table>
                            <thead>
                                <th>STT</th>
                                <th>Tài khoản</th>
                                <th>Tên người đặt</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền đơn</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($bill as $key => $value) {
                                    # code...
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value['username'] ?></td>
                                        <td><?php echo $value['fullname'] ?></td>
                                        <td><?php echo $value['andress'] ?></td>
                                        <td><?php echo $value['phone'] ?></td>
                                        <td><?php echo $value['date_order'] ?></td>
                                        <td><?php echo $value['total_bill'] ?>đ</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }else{
            ?>
            <h4>Bạn không đủ quyền truy cập!!!</h4>
            <?php
            die;
        }
        ?>
    </div>
</body>
</html>