<!-- header -->
<?php
require "header.php"
?>
<!-- header -->

<!-- body -->
<h1 style="text-align:center;">Your cart</h1>
<div class="table-style">
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
            <?php
            $finalTotal = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    foreach ($products as $valuePR) {
                        if ($key == $valuePR['id']) {
                            $total = 0;
                            $checkSale = true;
                            if ($valuePR["feature"] != 1) {
                                $checkSale = true;
                            } else {
                                $checkSale = false;
                            }
            ?>
        </tr>
        <tr>
            <td><?php ?> <a style="font-style:normal; font-weight:bold"
                    href="product.php?id=<?php echo $valuePR['id'] ?>"> <?php ?><img style="height:50px;margin:0 20px"
                        src='./img/<?php echo $valuePR["image"]; ?>'> <?php echo $valuePR['name']; ?></a></td>
            <td style="text-align:center"> <del class="product-old-price"><?php ?> <div
                        style="font-weight:bold;color: red;">
                        <?php echo $checkSale ? number_format($valuePR["price"]) : "" ?></div></del>
                <?php ?> <div style="font-weight:bold">
                    <?php echo $checkSale ? number_format($valuePR["price"] * 0.7) : number_format($valuePR["price"]) ?>
                </div>
            </td>
            <td style="text-align:center;">
                <div class="qty-label">
                    <div style="width:80px; display:inline-block;" class="input-number">
                        <span class="qty-down">-</span>
                        <input type="number" value="<?php echo $value ?>">
                        <span class="qty-up">+</span>
                    </div>
                </div>
            </td>
            <td style="text-align:center;font-weight:bold"><?php if ($checkSale == true) {
                                                                $total = ($valuePR["price"] * 0.7) * $value;
                                                                echo number_format($total);
                                                            } else {
                                                                $total = $valuePR["price"] * $value;
                                                                echo number_format($total);
                                                            } ?></td>
            <?php $finalTotal += $total; ?>
            <td style="text-align:center;"><a style="color: #00BFFF;font-weight:bold;"
                    href="delviewcart.php?id=<?php echo $valuePR['id']; ?>">Delete</a></td>
            <?php }
                    }
                }
            } ?>
        <tr>
            <th>Total Cost</th>
            <th colspan="4"><?php echo number_format($finalTotal) ?></th>
        </tr>
    </table>
</div>
<!-- body -->

<!-- footer -->
<?php
require "footer.php"
?>
<!-- footer -->