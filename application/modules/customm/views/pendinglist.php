<head>
    <style>
        #bbody {
            padding-top: 1em;
        }

        .bs-example {
            margin: 0px;
        }

        /* panel style */
        .highlight-date {
            color: red;
        }

        .pending-count {
            border: 2px solid blue;
            border-radius: 5px;
            background-color: blue;
            color: white;
            padding: 2px 4px;
            margin-left: 5px;
        }

        .tab-pane {
            margin-top: 5px;
        }

        .panel {
            margin-bottom: 5px;
            /* spacing between panels */
        }
    </style>
</head>

<div id="bbody">

    <div class="bs-example">

        <!-- Tabs -->
        <ul class="nav nav-tabs">
            <?php
            include './config.php';
            $idx = 1;
            $result = mysqli_query($conn, "
                SELECT product_sku, family.family_id, family.family_name
                FROM ip_products AS product
                JOIN ip_families AS family ON family.family_id = product.family_id
                JOIN ip_po AS po ON po.partid = product.product_id
                GROUP BY family.family_id
            ");
            while ($row = mysqli_fetch_array($result)) {
                $active = ($idx == 1) ? 'class="active"' : '';
                echo '<li ' . $active . '><a href="#' . $row["family_name"] . '" data-toggle="tab">' . $row["family_name"] . '</a></li>';
                $idx++;
            }
            mysqli_close($conn);
            ?>
        </ul>

        <!-- Tab content -->
        <div class="tab-content">
            <?php
            include './config.php';
            $idx = 1;
            $result1 = mysqli_query($conn, "
                SELECT product_sku, family.family_id, family.family_name
                FROM ip_products AS product
                JOIN ip_families AS family ON family.family_id = product.family_id
                JOIN ip_po AS po ON po.partid = product.product_id
                GROUP BY family.family_id
            ");
            while ($row1 = mysqli_fetch_array($result1)) {
                $active = ($idx == 1) ? 'in active' : '';
                echo '<div class="tab-pane fade ' . $active . '" id="' . $row1["family_name"] . '">';
                $idx++;

                // Fetch pending items for this family
                $result = mysqli_query($conn, "
                    SELECT GROUP_CONCAT(val ORDER BY po_rx_date SEPARATOR '<br>') AS items,
                           product_sku,
                           LEFT(product_name,20) AS product_name,
                           SUM(pending_qty) AS total_pending
                    FROM (
                        SELECT
                            CASE 
                                WHEN IFNULL(potable.quantity - SUM(inv.qty), potable.quantity) > 0 THEN
                                    CASE WHEN DATEDIFF(potable.po_rx_date, DATE(NOW())) < 10 THEN
                                        CONCAT('<span class=\"highlight-date\">', DATE_FORMAT(potable.po_rx_date,'%d-%b-%y'), ' - ', potable.PoNo, ' - ', RIGHT(potable.lineno,3), ' - ', LEFT(potable.customerloc,3), ' (', IFNULL(potable.quantity - SUM(inv.qty), potable.quantity), ')</span>')
                                    ELSE
                                        CONCAT(DATE_FORMAT(potable.po_rx_date,'%d-%b-%y'), ' - ', potable.PoNo, ' - ', RIGHT(potable.lineno,3), ' - ', LEFT(potable.customerloc,3), ' (', IFNULL(potable.quantity - SUM(inv.qty), potable.quantity), ')')
                                    END
                            END AS val,
                            product.product_sku,
                            product.product_name,
                            potable.po_rx_date,
                            IFNULL(potable.quantity - SUM(inv.qty), potable.quantity) AS pending_qty
                        FROM ip_po AS potable
                        JOIN ip_products AS product ON potable.partid = product.product_id
                        LEFT JOIN ip_inv AS inv ON inv.po_id = potable.id
                        WHERE product.family_id = " . $row1['family_id'] . "
                        GROUP BY CONCAT(potable.pono, potable.lineno)
                        ORDER BY val ASC, product.product_name ASC
                    ) AS tmptable
                    WHERE val IS NOT NULL
                    GROUP BY product_name
                    ORDER BY COUNT(val) DESC
                ");

                echo '<div class="flex-container" style="display: flex; flex-wrap: wrap; gap: 16px;">';

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    // Always give ~33% width, with a max width to prevent stretching
                    echo '<div class="flex-item" style="flex: 0 0 calc(25% - 16px); box-sizing: border-box;">';
                    echo '<div class="panel panel-default">';
                    echo '<div class="panel-heading">';
                    echo $row["product_name"] . ' (' . $row["product_sku"] . ')';
                    echo '<span class="pending-count">' . $row["total_pending"] . '</span>';
                    echo '</div>';
                    echo '<div class="panel-body">';
                    echo $row["items"];
                    echo '</div>'; // panel-body
                    echo '</div>'; // panel
                    echo '</div>'; // flex-item
                }

                echo '</div></div>';
            }

            mysqli_close($conn);
            ?>
        </div>

    </div>

</div>