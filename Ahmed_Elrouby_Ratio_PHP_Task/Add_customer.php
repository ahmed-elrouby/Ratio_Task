<?php
$title="Customer";
include_once('app/database/model/Customer.php');
$customer=new customer();
if ($_POST) {
    if (empty($_POST['name'])) {
        $error['name'] = "<div class='alert alert-warning'>Name is required</div>";
    }
    if (empty($_POST['address'])) {
        $error['address'] = "<div class='alert alert-warning'>Address is required</div>";
    }
    if (empty($_POST['phone'])) {
        $error['phone'] = "<div class='alert alert-warning'>Phone is required</div>";
    }
    if (empty($error)) {
        $customer->setName($_POST['name']);
        $customer->setAddress($_POST['address']);
        $customer->setPhone($_POST['phone']);
        $exist_customer = $customer->PhoneExist();
        if (empty($exist_customer)) {
            $insert_customer=$customer->update();
            if ($insert_customer)
            {
                $pass['pass']="<div class='alert alert-success col-8 offset-2 text-center'>Customer Adding Successfully</div>";
            }
            else
            {
                $error['wrong'] = "<div class='alert alert-danger col-8 offset-2 text-center'>Some Thing Went Wrong</div>";    
            }
        } else {
            $error['exist'] = "<div class='alert alert-danger col-8 offset-2 text-center'>This Customer Already Exist!</div>";
        }
    }
}
include_once('view/layouts/header.php');
?>
        <form class="form-gird" method="post">
            <div class="row">
                <h1 class="col-12 text-center m-5">
                    Adding New Customer
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
                        <label for="a" class="col-12 col-form-label text-danger">Address</label>
                        <div class="col-sm-1-12">
                            <input type="text" class="form-control" name="address" id="p" placeholder="">
                        </div>
                        <?php if (isset($error['address'])) echo $error['address']; ?>
                    </div>
                    <div class="form-group col-12">
                        <label for="ph" class="col-12 col-form-label text-danger">Phone</label>
                        <div class="col-sm-1-12">
                            <input type="tel" class="form-control" name="phone" id="ph" placeholder="">
                        </div>
                        <?php if (isset($error['phone'])) echo $error['phone']; ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-8 offset-2 ">
                            <button type="submit" class="btn btn-primary form-control">Add Customer</button>
                        </div>
                    </div>
                </div>
            </div>


        </form>
<?php
include_once('view/layouts/footer.php');
?>