<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css"> <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo-Photoroom" alt="Logo" style="width: 200px;">
            </a>

            <form class="d-flex mx-lg-3 my-2 my-lg-0 me-3 flex-grow-1 flex-lg-grow-0">
                <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search" style="min-width: 150px; width: 100%;">
                <button class="btn btn-success" style="background-color: pink;" type="submit"><i
                            class="ri-search-line"></i></button>
            </form>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jordan</a> </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Palestine</a> </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Morocco</a> </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Italy</a> </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Japan</a> </li>
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="navbarContent">

                <ul class="navbar-nav ms-auto list-unstyled">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="ri-user-fill"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=cart"><i class="ri-shopping-cart-2-fill"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="ri-heart-fill"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="ri-customer-service-fill"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Products List</h1> <div class="row">
            <?php foreach ($productsData as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                            <p class="card-text">Price: <?php echo htmlspecialchars(number_format($product['price'], 2)); ?>$</p> <a href="?page=add_to_cart&product_id=<?php echo htmlspecialchars($product['id']); ?>&quantity=1" class="btn btn-primary">Add to Cart</a> </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h3>People Tells</h3>
                    <p class="text-justify">Discover the world through culture at People Tells. We specialize in bringing you authentic, unique products from Jordan, Palestine, Morocco, Italy, and Japan. Each item tells a story, reflecting the rich heritage and traditions of its origin. Shop with us to experience the beauty of global craftsmanship right at your doorstep.</p>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 text-center">
                    <h3>Quick Links</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <h3>Follow Us</h3>
                    <div class="social-icons mb-4">
                        <a href="#"><i class="ri-mail-fill"></i> contact@peopletells.com</a> <br>
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-facebook-fill"></i></a>
                        <a href="#"><i class="ri-linkedin-fill"></i></a>
                    </div>

                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter to get the latest updates, exclusive offers, and more.</p>
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="Your email">
                        <button type="submit" class="btn btn-success" style="background-color: pink; border: solid 3px ; color:black;">SignUp</button>
                    </form>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>