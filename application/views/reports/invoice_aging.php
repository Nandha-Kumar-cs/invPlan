<!DOCTYPE html>
<html lang="<?php echo trans('cldr'); ?>">
<head>
    <title><?php echo trans('invoice_aging'); ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/<?php echo get_setting('system_theme', 'invoiceplane'); ?>/css/reports.css" type="text/css">
</head>
<body>

<h3 class="report_title"><?php echo trans('invoice_aging'); ?></h3>

<table>
    <tr>
        <th><?php echo trans('client'); ?></th>
        <th class="amount">1-60 days  </th>
        <th class="amount">61-90 days</th>
        <th class="amount">Above 90 days</th>
        <th class="amount"><?php echo trans('total'); ?></th>
    </tr>
    <?php foreach ($results as $result) { ?>
        <tr>
            <td><?php _htmlsc(format_client($result)); ?></td>
            <td class="amount"><?php echo format_currency($result->range_1); ?></td>
            <td class="amount"><?php echo format_currency($result->range_2); ?></td>
            <td class="amount"><?php echo format_currency($result->range_3); ?></td>
            <td class="amount"><?php echo format_currency($result->total_balance); ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
