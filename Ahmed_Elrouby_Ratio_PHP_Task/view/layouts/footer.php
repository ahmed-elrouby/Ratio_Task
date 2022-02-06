</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
<script>
    $(document).ready(function()
    {
        var i =1;
        // console.log(i);
        $('#add').click(function()
        {
            i++;
            $('#dynamic_field').append('<tr><td><select class="custom-select form-control" name="product-'+i+'"> <option <?php if (empty($_POST)) { echo "selected";} ?> >Select Prodcut</option> <?php foreach ($Read_products as $productItem) { $selected = ''; if (isset($_POST["product-'+i+'"])) { if ($_POST["product-'+i+'"] == $productItem['product_id']) { $selected = "selected"; } } echo "<option value=" . $productItem['product_id'] . " $selected>" . $productItem['name'] . "</option>"; } ?> </select> </td> <td> <input type="number" name="quantity-'+i+'"> </td></tr>');
        
        });
            
    }
    );
</script>
</body>

</html>