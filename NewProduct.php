<link rel="stylesheet" href=style.css>


<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="dbjeng"; // <--- Name of Database to connect with
    $link=mysqli_connect($servername,$username,$password,$dbname);
    $con=mysqli_select_db($link,$dbname);

    $mysqli = NEW MYSQLI('Localhost','root',"","dbjeng");
    $resultSet = $mysqli->query("SELECT category FROM category");

?>

<html>
<body>
    <form name="form1" action="" method="post">
    <div class="creatent">Create New Table</div>
        <table class="style-table-2">
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
                    <input type="submit" class="subbutton" name="submit" value="Create New Product">
                </td>
            <tr>
        </table>
    </form>
</body>

<?php
    // Insert
    if(isset($_POST["submit"]))
    {
        mysqli_query($link,"insert into product values (DEFAULT, '$_POST[product_name]','$_POST[category]')");
        header('Location: index.php');
    }
?>