<link rel="stylesheet" href=style.css>

<?php
    require_once "ConnectDB.php";
?>

<body>
<button type="button" class="glow-on-hover"><a class= buttontxt href="NewProduct.php">ADD NEW PRODUCT</a></button>
<table class = "styled-table">
    <tr>

        <th>Product ID</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>

    <?php
        $sqlQuery = "SELECT product.product_id,product.product_name,category.category_id FROM product
        inner join category on product.category = category.category;";
        $res = $conn->query($sqlQuery);
        while($row =mysqli_fetch_object($res)){
            ?>
                <tr>
                    <td><?php echo $row->product_id?></td>
                    <td><?php echo $row->product_name?></td>
                    <td><?php echo $row->category_id?></td>
                    <td>
                        <a href="UpdateProduct.php?id=<?php echo $row->product_id?>">Update</a>
                         | 
                        <a href="DeleteProduct.php?id=<?php echo $row->product_id?>">Delete</a>
                    </td>
                </tr>
        <?php
            }   
        ?>
</table>
</body>