<?php
$title="Product";
include_once("app/database/model/Product.php");
$product=new product();
if ($_POST) {
    if (empty($_POST['name'])) {
        $error['name'] = "<div class='alert alert-warning'>Name is required</div>";
    }
        if (empty($_POST['price'])) {
        $error['price'] = "<div class='alert alert-warning'>Price is required</div>";
    }
    if (empty($_POST['code'])) {
        $error['code'] = "<div class='alert alert-warning'>Code is required</div>";
    }
    if (empty($error)) {
        $product->setName($_POST['name']);
        $product->setPrice($_POST['price']);
        $product->setCode($_POST['code']);
        $exist_product =$product->ProductExist();
        if (empty($exist_product)) {
            $insert_product=$product->update();
            if ($insert_product)
            {
                $pass['pass']="<div class='alert alert-success col-8 offset-2 text-center'>Product Adding Successfully</div>";
            }
            else
            {
                $error['wrong'] = "<div class='alert alert-danger col-8 offset-2 text-center'>Some Thing Went Wrong</div>";    
            }
        } else {
            $error['exist'] = "<div class='alert alert-danger col-8 offset-2 text-center'>This Product Already Exist!</div>";
        }
    }
}
include_once("view/layouts/header.php");
?>

        <form class="form-gird" method="post">
            <div class="row">
                <h1 class="col-12 text-center m-5">
                    Adding New product
                </h1>
                <?php
                if (isset($error['exist'])) {
                    echo $error['exist'];
                }
                if (isset($error['wrong'])) {
                    echo $error['wrong'];
                }
                if (isset($pass['pass'])) {
                    echo $pass['pass'];
                }
                ?>
                <div class="col-8 offset-2 mt-3 text-center">
                    <div class="form-group col-12">
                        <label for="n" class="col-12 col-form-label text-danger">Name</label>
                        <div class="col-sm-1-12">
                            <input type="text" class="form-control" name="name" id="n" placeholder="">
                        </div>
                        <?php if (isset($error['name'])) echo $error['name']; ?>
                    </div>
                    <div class="form-group col-12">
                        <label for="p" class="col-12 col-form-label text-danger">Price</label>
                        <div class="col-sm-1-12">
                            <input type="number" class="form-control" name="price" id="p" placeholder="">
                        </div>
                        <?php if (isset($error['price'])) echo $error['price']; ?>
                    </div>
                    <div class="form-group col-12">
                        <label for="c" class="col-12 col-form-label text-danger">Code</label>
                        <div class="col-sm-1-12">
                            <input type="text" class="form-control" name="code" id="c" placeholder="">
                        </div>
                        <?php if (isset($error['code'])) echo $error['code']; ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-8 offset-2 ">
                            <button type="submit" class="btn btn-primary form-control">Add Product</button>
                        </div>
                    </div>
                </div>
            </div>


        </form>
<?php
include_once("view/layouts/footer.php");
?>