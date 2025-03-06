<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
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
        <h1>Checkout</h1> <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Cart</span> <span class="badge bg-primary rounded-pill"><?php echo count($cartItems); ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php foreach ($cartItems as $item): ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><?php echo htmlspecialchars($item['name']); ?></h6>
                                <small class="text-muted">Quantity: <?php echo htmlspecialchars($item['quantity']); ?></small> </div>
                            <span class="text-muted"><?php echo htmlspecialchars(number_format($item['price'] * $item['quantity'], 2)); ?>$</span>
                        </li>
                    <?php endforeach; ?>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span> <strong><?php echo htmlspecialchars(number_format($cartSubtotal, 2)); ?>$</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Customer Details</h4> <form class="needs-validation" action="?page=process_checkout" method="post" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">First name</label> <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="customer_name">
                            <div class="invalid-feedback">
                                First name is required. </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label> <input type="email" class="form-control" id="email" placeholder="you@example.com" name="customer_email">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates. </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address</label> <input type="text" class="form-control" id="address" placeholder="123 Main St" required name="customer_address">
                            <div class="invalid-feedback">
                                Please enter your shipping address. </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Payment method</h4> <div class="my-3">
                        <div class="form-check">
                            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required value="credit_card">
                            <label class="form-check-label" for="credit">Credit card</label> </div>
                        <div class="form-check">
                            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required value="debit_card">
                            <label class="form-check-label" for="debit">Debit card</label> </div>
                        <div class="form-check">
                            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required value="paypal">
                            <label class="form-check-label" for="paypal">PayPal</label> </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Complete Checkout</button> </form>
            </div>
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