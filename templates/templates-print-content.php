<?php

// "wcpo" print order template
global $wcpo_template_data;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <!-- title for print page -->
        <title><?php echo $wcpo_template_data->title; ?></title>
        <!-- end of title for print page -->
    </head>

    <body>
        <!-- main info -->
        <h1><?php echo $wcpo_template_data->title . ' (' . $wcpo_template_data->status . ')'; ?></h1>
        <p><?php echo $wcpo_template_data->date; ?></p>

        <h2><?php echo $wcpo_template_data->client; ?></h2>
        <!-- end of main info -->

        <!-- client billing and shipping details -->
        <div>
            <div style="float: left; width: 50%;">
                <h3>Billing:</h3>

                <p><b>Name:</b> <?php echo $wcpo_template_data->billing->first_name . ' ' . $wcpo_template_data->billing->last_name; ?></p>
                <p><b>Company:</b> <?php echo $wcpo_template_data->billing->company; ?></p>

                <p><b>Address_1:</b> <?php echo $wcpo_template_data->billing->address_1; ?></p>
                <p><b>Address_2:</b> <?php echo $wcpo_template_data->billing->address_2; ?></p>
                <p><b>Postcode:</b> <?php echo $wcpo_template_data->billing->postcode; ?></p>
                <p><b>Country:</b> <?php echo $wcpo_template_data->billing->country; ?></p>
                <p><b>State:</b> <?php echo $wcpo_template_data->billing->state; ?></p>
                <p><b>City:</b> <?php echo $wcpo_template_data->billing->city; ?></p>

                <p><b>Email:</b> <?php echo $wcpo_template_data->billing->email; ?></p>
                <p><b>Phone:</b> <?php echo $wcpo_template_data->billing->phone; ?></p>
            </div>

            <div style="float: right; width: 50%;">
                <h3>Shipping</h3>

                <p><b>Name:</b> <?php echo $wcpo_template_data->shipping->first_name . ' ' . $wcpo_template_data->shipping->last_name; ?></p>
                <p><b>Company:</b> <?php echo $wcpo_template_data->shipping->company; ?></p>

                <p><b>Address_1:</b> <?php echo $wcpo_template_data->shipping->address_1; ?></p>
                <p><b>Address_2:</b> <?php echo $wcpo_template_data->shipping->address_2; ?></p>
                <p><b>Postcode:</b> <?php echo $wcpo_template_data->shipping->postcode; ?></p>
                <p><b>Country:</b> <?php echo $wcpo_template_data->shipping->country; ?></p>
                <p><b>State:</b> <?php echo $wcpo_template_data->shipping->state; ?></p>
                <p><b>City:</b> <?php echo $wcpo_template_data->shipping->city; ?></p>
            </div>

            <div style="clear: both;"></div>
        </div>
        <!-- client billing and shipping details -->

        <!-- order products list-->
        <h3>Products:</h3>

        <table style="border-collapse: collapse; border: 1px solid #000000; width: 100%;">
            <thead>
                <tr>
                    <th style="border: 1px solid #000000;">#</th>
                    <th style="border: 1px solid #000000;">Name</th>
                    <th style="border: 1px solid #000000;">Photo</th>
                    <th style="border: 1px solid #000000;">IDs</th>
                    <th style="border: 1px solid #000000;">Attributes</th>
                    <th style="border: 1px solid #000000;">Price</th>
                    <th style="border: 1px solid #000000;">Qty</th>
                    <th style="border: 1px solid #000000;">Total</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $product_count = 0;
                $product_total = 0;
                ?>

                <?php foreach($wcpo_template_data->products as $product) : ?>

                <tr>
                    <th style="border: 1px solid #000000;"><?php echo $product_count; ?></th>
                    <th style="border: 1px solid #000000;"><?php echo $product->name; ?></th>

                    <th style="border: 1px solid #000000;">
                        <?php if($product->image) : ?>

                        <img src="<?php echo $product->image[0]; ?>" alt="<?php echo $product->name; ?>">

                        <?php else: ?>

                        <p>No image</p>

                        <?php endif; ?>
                    </th>

                    <th style="border: 1px solid #000000;">
                        <p>Product ID: <?php echo $product->product_id; ?></p>
                        <p>Variation ID: <?php echo $product->variation_id; ?></p>
                    </th>

                    <th style="border: 1px solid #000000;">
                        <?php foreach($product->attributes as $attribute) : ?>
                        
                        <p><?php echo $attribute->label . ': ' . $attribute->value; ?></p>

                        <?php endforeach; ?>
                    </th>

                    <th style="border: 1px solid #000000;"><?php echo $wcpo_template_data->currency_symbol . $product->price;?></th>
                    <th style="border: 1px solid #000000;"><?php echo $product->quantity; ?></th>
                    <th style="border: 1px solid #000000;"><?php echo $wcpo_template_data->currency_symbol . $product->total; ?></th>
                </tr>

                <?php
                $product_count++;
                $product_total += $product->total;
                ?>

                <?php endforeach; ?>
            </tbody>
        </table>

        <p style="text-align: right;"><b>Total price:</b> <?php echo $wcpo_template_data->currency_symbol . $product_total; ?></p>
        <!-- end of order products list-->
    </body>
</html>