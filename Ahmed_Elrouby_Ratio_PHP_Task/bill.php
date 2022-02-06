<?php
include_once("app/database/model/Customer.php");
include_once("app/database/model/Product.php");
$customer = new customer();
$product = new product();
$Read_customers = $customer->read();
$Read_products = $product->read();
if(isset($_POST))
{
    $arrSize=(sizeof($_POST)-1)/2;
    $table="<table class='table'>
    <thead>
        <tr>
            <th>Customer Name</th>
            <th>Prodcut Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Cost</th>
        </tr>
    </thead>
    <tbody>";
    foreach ($Read_customers as $customerItem) {
        if (isset($_POST['customer'])) {
            if ($_POST['customer'] == $customerItem['customer_id']) {
                $table .="<tr>
                <td scope='row'>".$customerItem['name'];
            }
        }
    }
    $table.=" </td></tr>";
    $totalcost=0;
    for($i=1;$i <= $arrSize;$i++)
    {
        foreach ($Read_products as $productItem) {
            if (isset($_POST['product-'.$i])) {
                if ($_POST['product-'.$i] == $productItem['product_id']) {
                    $totalcost+=$_POST['quantity-'.$i]*$productItem['price'];
                    $table .="<tr><td scope='row'>---</td>
                    <td>".$productItem['name']."</td><td>".$productItem['price']."</td>
                    <td>".$_POST['quantity-'.$i]."</td><td>".($_POST['quantity-'.$i]*$productItem['price'])."</td>";
                    
                }
            }
        }
    }
    $table.="<tr><td>Total Cost</td><td>$totalcost</td></tr></tbody>
    </table>";
}
include_once("view/layouts/header.php");
?>
<div class="col-8 offset-2 my-5">
    <h1 class="col-12 text-center">
        Calculating Bill
    </h1>
</div>
<div class="col-8 offset-2">
    <div class="container">
        <form method="post">
            <div class="form-group col-12 text-center">
                <label for="c">Customer Name</label>
                <select class="custom-select form-control" name="customer" id="c">

                    <option value='' <?php
                                        if (empty($_POST)) {
                                            echo "selected";
                                        }
                                        ?>>Select Customer</option>
                    <?php
                    foreach ($Read_customers as $customerItem) {
                        $sel = '';
                        if (isset($_POST['customer'])) {
                            if ($_POST['customer'] == $customerItem['customer_id']) {
                                $sel = "selected";
                            }
                        }
                        echo "<option value=" . $customerItem['customer_id'] . " $sel>" . $customerItem['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <table class="table" >
                <thead>
                    <tr>
                        <th>Prodcut Name</th>
                        <!-- <th>Price</th> -->
                        <th>Quantity</th>
                        <!-- <th>Cost</th> -->
                    </tr>
                </thead>
                <tbody id="dynamic_field">
                    <tr>
                        <td scope="row">
                            <select class="custom-select form-control" name="product-1">
                                <option value='' <?php
                                                    if (empty($_POST)) {
                                                        echo "selected";
                                                    }
                                                    ?>>Select Prodcut</option>
                                <?php
                                foreach ($Read_products as $productItem) {
                                    $selected = '';
                                    if (isset($_POST["product-1"])) {
                                        if ($_POST["product-1"] == $productItem['product_id']) {
                                            $selected = "selected";
                                        }
                                    }
                                    echo "<option value=" . $productItem['product_id'] . " $selected>" . $productItem['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <!-- <td><?php echo $productItem['price']?></td> -->
                        <td>
                        <input type="number" name="quantity-1" >
                        </td>
                       
                    </tr>
                </tbody>
            </table>
            <div class="form-group row">
                <div class="col-6">
                    <button class="btn btn-primary form-control" name="add"  id="add" onclick="return false">Add Produt to bill</button>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary form-control">Calculate Bill</button>
                </div>
            </div>
        </form>
        <?php
        if(!empty($table))
        {
            echo $table;
        }
        ?>
    </div>
</div>
<?php
include_once("view/layouts/footer.php");
?>