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
        <link rel="stylesheet" href="./css/add_page_styles.css">
    </head>

    <body>

        <!-- Header -->
        <header>
            <h2 id="title">Product List</h2>
            <button type="submit" id="save-product-btn" form="product_form" onclick="checkFields()">Save</button>
            <button id="cancel-btn" onclick="location.href='./'">Cancel</button>
        </header>

        <!-- Main content -->
        <main>
            <form action="create_product.php" method="post"  onsubmit="checkFields();" id="product_form">
                
                <div id="content">
                    <div id="skuNamePriceDiv">         
                            <label id="errorMsg">SKUError:</label>
                            <div>
                                <label class="lb">SKU:</label>
                                <input type="text" name="sku" id="sku" class="checkEmptyString" pattern="[a-zA-Z0-9-]+"  
                                       title="Please, provide the data of indicated type!" placeholder="Only letters and numbers">                         
                            </div>
                            <div> 
                                <label class="lb">Name:</label>
                                <input type="text" name="name" id="name" class="checkEmptyString" placeholder="Product name" >       
                            </div>
                            <div> 
                                <label class="lb">Price($):</label>
                                <input type="text" name="price" id="price" class="checkEmptyString" pattern="[0-9]*\.?[0-9]*$"  
                                       title="Please, provide the data of indicated type!" placeholder="Only numbers">
                            </div>                       
                    </div>
                    <div id="divTypeSwitcher">
                        <label id="lbTypeSwitcher">Type Switcher:</label>                     
                        <?php
                            // Read product type
                            $typeObj = SqlData::readTypes();

                            // Input types in droplist
                            echo '<select id="productType" name="productType" onchange="handleSelectChange(event)">';
                            echo "<option>Type switcher...</option>";
                            while ($row_type = $typeObj->fetch_assoc()) {
                                echo "<option value=$row_type[id]>$row_type[name]</option>";
                            }
                            echo "</select>";          
                        ?>
                    </div>

                    <!-- attributes form -->
                    <div id = "attribDiv">
                        <div class="formVariant" id = "Book" style="display: none;">
                            <label class="attribName">Weight(KG): </label><input type="text" name="weight" id="weight" pattern="[0-9]*\.?[0-9]*$"  
                                   title="Please, provide the data of indicated type!" placeholder="Only numbers"><br>
                            <label class="attribErrorMsg">Please, provide weight</label>
                        </div>

                        <div class="formVariant" id = "Dvd" style="display: none;">
                            <label class="attribName">Size(MB): </label><input type="text" name="size" id="size" class="" pattern="[0-9]*"  
                                   title="Please, provide the data of indicated type!" placeholder="Only numbers"><br>
                            <label  class="attribErrorMsg">Please, provide size</label>
                        </div>

                        <div class="formVariant" id ="Furniture" style="display: none;">
                            <label class="attribName">Height(CM):</label>
                            <input type="text" name="height" class="" id="height" pattern="[0-9]*"  
                                   title="Please, provide the data of indicated type!" placeholder="Only numbers">
                            <label class="attribName">Width(CM):</label>
                            <input type="text" name="width" class="" id="width" pattern="[0-9]*"  
                                   title="Please, provide the data of indicated type!" placeholder="Only numbers">
                            <label class="attribName">Length(CM):</label>
                            <input type="text" name="length" class="" id="length" pattern="[0-9]*"  
                                   title="Please, provide the data of indicated type!" placeholder="Only numbers">
                            <label class="attribErrorMsg">Please, provide dimensions in HxWxL format</label>
                        </div>
                    </div>
                </div> 
            </form>       
            <?php
                // Read existing sku and save to browser local storage
                $skuList = SqlData::readExistingSku();
                echo "
                    <script language='javascript'>
                        let skuValuesArr = '".json_encode($skuList)."';
                        saveSkuToStorage(skuValuesArr);                                   
                    </script>";
            ?>
        </main>

        <!-- Footer -->
        <footer>
            <h5 id="footer-title">Scandiweb Test assignment</h5>
        </footer>

    </body>

</html>
