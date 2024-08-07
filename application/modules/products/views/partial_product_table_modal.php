<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>&nbsp;</th>
            <th><?php _trans('product_sku'); ?></th>
            <th><?php _trans('family_name'); ?></th>
            <th><?php _trans('product_name'); ?></th>
            <th><?php _trans('product_description'); ?></th>
            <th class="text-right"><?php _trans('product_price'); ?></th>
        </tr>
        <?php foreach ($products as $product) { 
            if (isset($_SESSION['dept_type'])) {
                $deptType = $_SESSION['dept_type'];
                $familyName = $product->family_name;
                $showProduct = ($deptType == 1 && in_array($familyName, ['Mechanical', 'Inactive-Mechanical'])) ||
                               ($deptType == 2 && in_array($familyName, ['Electronics', 'Inactive-Electronics']));

                if ($showProduct) { ?>
                    <tr class="product">
                        <td class="text-left">
                            <input type="checkbox" name="product_ids[]" value="<?php echo $product->product_id; ?>">
                        </td>
                        <td nowrap class="text-left">
                            <b><?php _htmlsc($product->product_sku); ?></b>
                        </td>
                        <td>
                            <b><?php _htmlsc($product->family_name); ?></b>
                        </td>
                        <td>
                            <b><?php _htmlsc($product->product_name); ?></b>
                        </td>
                        <td>
                            <?php echo nl2br(htmlsc($product->product_description)); ?>
                        </td>
                        <td class="text-right">
                            <?php echo format_currency($product->product_price); ?>
                        </td>
                    </tr>
                <?php }
            }else{ ?>
            <tr class="product">
                <td class="text-left">
                    <input type="checkbox" name="product_ids[]" value="<?php echo $product->product_id; ?>">
                </td>
                <td nowrap class="text-left">
                    <b><?php _htmlsc($product->product_sku); ?></b>
                </td>
                <td>
                    <b><?php _htmlsc($product->family_name); ?></b>
                </td>
                <td>
                    <b><?php _htmlsc($product->product_name); ?></b>
                </td>
                <td>
                    <?php echo nl2br(htmlsc($product->product_description)); ?>
                </td>
                <td class="text-right">
                    <?php echo format_currency($product->product_price); ?>
                </td>
            </tr>
            <?php }
        }?>
    </table>
</div>
