<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="/public/images/favicon.png" type="">
    <title><?php echo $title ?></title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="/public/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/public/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="/public/css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                    <?php require_once('Views/Layouts/nav.php')  ?>
            </div>
        </header>
        <!-- end header section -->
    </div>
    <main>
        <?php require_once($view); ?>
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="full">
                        <div class="logo_footer">
                            <a href="#"><img width="210" src="/public/images/logo.png" alt="#" /></a>
                        </div>
                        <div class="information_f">
                            <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                            <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                            <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="widget_menu">
                                        <h3>Menu</h3>
                                        <ul>
                                            <?php foreach($menu2 as $item):?>

                                            <li><a href="/<?php echo $item['slug'] ?>"><?php echo $item['name'];?></a>
                                            </li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="widget_menu">
                                        <h3>Account</h3>
                                        <ul>
                                            <li><a href="#">Account</a></li>
                                            <li><a href="#">Checkout</a></li>
                                            <li><a href="#">Login</a></li>
                                            <li><a href="#">Register</a></li>
                                            <li><a href="#">Shopping</a></li>
                                            <li><a href="#">Widget</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="widget_menu">
                                <h3>Newsletter</h3>
                                <div class="information_f">
                                    <p>Subscribe by our newsletter and get update protidin.</p>
                                </div>
                                <div class="form_sub">
                                    <form>
                                        <fieldset>
                                            <div class="field">
                                                <input type="email" placeholder="Enter Your Mail" name="email" />
                                                <input type="submit" value="Subscribe" />
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>

    <!-- jQuery -->
    <script src="/public/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="/public/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <!-- custom js -->
    <script src="/public/js/custom.js"></script>
</body>

</html>