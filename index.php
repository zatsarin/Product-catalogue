<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Product list</title>

        <!-- JavaScript -->
        <script type="text/javascript" src="./js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="./css/index_styles.css">

        <!-- PHP -->
        <?php
            include_once './product.php';
        ?>

    </head>

    <body>

        <!-- Header -->
        <header>
            <h2 id="title">Product List</h2>
            <button id="add-product-btn" onclick="location.href='./add-product.php'; saveSkuToStorage();">ADD</button>
            <button id="delete-product-btn" onclick="deleteProducts()">MASS DELETE</button>
        </header>

        <!-- Main content -->
        <main>

            <!-- Create cells -->
            <?php
                $indexList = new FillndexList();
                $indexList->fillProductList();
            ?>

        </main>

        <!-- Footer -->
        <footer>
            <h5 id="footer-title">Scandiweb Test assignment</h5>
        </footer>

    </body>

</html>
