<link rel="stylesheet" href=style.css>


<?php
    require_once "ConnectDB.php";
    $prodID = $_GET['id'];

    $mysqli = NEW MYSQLI('Localhost','root',"","dbjeng");
    $resultSet = $mysqli->query("SELECT category FROM category");

    if($_POST){

        $prodName = $_POST['product_name'];
        $category = $_POST['category'];
        $sqlQuery = "UPDATE product SET product_name = '$prodName', category ='$category' WHERE product_id=$prodID";
        $res = $conn->query($sqlQuery);
        header('Location: index.php');
    }
?>


<html>
<body>
<div class="creatent">Update Product</div>
    <form name="form1" action="" method="post">
        <table class= "style-table-3">
            <tr>
                <td>Enter Product Name</td>
                <td><input type="text" name="product_name"></td>
            </tr>
            <tr>
                <td>Select category</td>
                <td>
                <select name="category">
                <?php
                while($rows=$resultSet->fetch_assoc())
                {
                    $category = $rows['category'];
                    echo "<option value='$category'>$category</option>";
                }
                ?>
                </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Update Product">
                </td>
            <tr>
        </table>
    </form>
</body>