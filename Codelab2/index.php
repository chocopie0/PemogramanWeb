<?php

    include "Controllers/ProductControllers.php";

    use Controller\ProductController;

    $productController = new ProductController;

    echo $productController->getAllProduct();