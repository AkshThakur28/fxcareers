<?php
function numberToWords($number)
{
    $ones = array(
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen'
    );

    $tens = array(
        0 => '',
        1 => '',
        2 => 'Twenty',
        3 => 'Thirty',
        4 => 'Forty',
        5 => 'Fifty',
        6 => 'Sixty',
        7 => 'Seventy',
        8 => 'Eighty',
        9 => 'Ninety'
    );

    $number = intval($number);

    if ($number < 20) {
        return $ones[$number];
    }

    if ($number < 100) {
        return $tens[($number / 10)] . (($number % 10 !== 0) ? ' ' . $ones[$number % 10] : '');
    }

    if ($number < 1000) {
        return $ones[floor($number / 100)] . ' Hundred' . (($number % 100 !== 0) ? ' ' . numberToWords($number % 100) : '');
    }

    if ($number < 1000000) {
        return numberToWords(floor($number / 1000)) . ' Thousand' . (($number % 1000 !== 0) ? ' ' . numberToWords($number % 1000) : '');
    }

    if ($number < 1000000000) {
        return numberToWords(floor($number / 1000000)) . ' Million' . (($number % 1000000 !== 0) ? ' ' . numberToWords($number % 1000000) : '');
    }

    return 'Number is too large to convert to words';
}



if (!empty($payment)) { ?>
    <?php foreach ($payment as $data) {
        $number = $data->amount;
        $words = numberToWords($number); ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">

        </head>

        <body>
            <table style="border: 2px solid #000;padding: 20px;" cellpadding="0" cellspacing="0" width="100%">

                <tbody>
                    <tr>
                        <td>
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td style="width: 70%;">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td style="font-weight:600; border: 2px solid #000;padding: 10px;">
                                                            FUTURE FIN INSTITUTE LLC
                                                            <p style="font-size: 13px; font-weight: 400;margin: 0;">
                                                            Office no. 3207, 32nd floor, Latifa Tower, Trade Center 1, opposite Museum of the Future, Dubai, UAE
                                                            <br>
                                                            License Number: 1316351</p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td style="border: 2px solid #000;border-top:0; padding: 5px">
                                                            <p style=" margin: 0px 0px 0px 0px;font-size: 13px;">
                                                                www.fxcareers.ae
                                                            </p>
                                                            <!-- <p style="margin: 0px 0px 0px 0px;font-size: 13px;"><strong>State
                                                                    Name: </strong>
                                                                DELHI, Code : 07</p> -->
                                                            <p style=" margin: 0px 0px 0px 0px;font-size: 13px;">
                                                                <strong>E-Mail:</strong>
                                                                info@fxcareers.ae
                                                            </p>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td align="center" style="border-bottom: 2px solid #000; width :30%">
                                            <img src="<?= base_url() ?>public/assets/images/fxx.png" alt="img"
                                                style="width:150px;" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td style="border: 2px solid #000; padding: 10px; border-top: 0px; width: 60%;">
                                            <p style=" margin: 0px 0px 6px 0px;font-size: 13px;"><strong>Issued (Bill
                                                    to):</strong></p>
                                            <p style="margin: 0px 0px 6px 0px; font-size: 13px;">
                                                <strong>Name: </strong><?= $data->first_name . ' ' . $data->last_name ?>
                                            </p>

                                            <p style=" margin: 0px 0px 6px 0px;font-size: 13px;"><strong>E-mail:</strong>
                                                <?= $data->email_address ?></p>
                                            <p style=" margin: 0px 0px 0px 0px;font-size: 13px;"><strong>Phone:</strong>
                                                <?= $data->phone_number ?></p>
                                            <!-- <p style=" margin: 0px 0px 0px 0px;font-size: 13px;"><strong>GST:</strong>
                                                <?= $data->user_gst ?></p> -->
                                        </td>
                                        <td>
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td align="center"
                                                            style="padding: 10px; border: 2px solid #000; padding: 10px;border-top: 0px; border-left:0;width: 50%;">
                                                            <Strong>Invoice No.</Strong>
                                                            <p>FX/DXB/2024/<?= $data->in_id ?></p>
                                                        </td>
                                                        <td align="center"
                                                            style="padding: 10px; border: 2px solid #000; padding: 10px; border-top: 0px;border-left:0;">
                                                            <Strong>Dated</Strong>
                                                            <p><?= $data->purchase_date ?></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center"
                                                            style="padding: 10px; border: 2px solid #000; padding: 10px; border-top: 0px;border-left: 0;width: 50%;">
                                                            <Strong>Mode/Terms of
                                                                Payment</Strong>
                                                            <p style="margin-bottom: 0;margin-top: 5;">
                                                                <?= $data->payment_mode ?>
                                                            </p>
                                                        </td>
                                                        <td align="center"
                                                            style="padding: 10px; border: 2px solid #000; padding: 10px;border-top: 0px;border-left: 0;">
                                                            <Strong>Term of Delivery</Strong>
                                                            <p style="margin-bottom: 0;margin-top: 5;">Offline</p>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table cellpadding="0" cellspacing="0" width="100%" style="margin-top: 10px;" width="100%">

                                <thead>
                                    <tr>
                                        <th style="border:2px solid #000;padding: 5px;">Course Description</th>
                                        <th style="border:2px solid #000;padding: 5px;border-left: 0;">HSN</th>
                                        <th style="border:2px solid #000;padding: 5px;border-left: 0;">Rate</th>
                                        <th style="border:2px solid #000;padding: 5px;border-left: 0;">Discount</th>
                                        <th style="border:2px solid #000;padding: 5px;border-left: 0;">Amount</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td align="center" valign="top"
                                            style=" border:2px solid #000;padding: 5px;border-top: 0;height: 50px;">
                                            <?= $data->course_name ?>
                                        </td>
                                        <td align="center" valign="top"
                                            style="border:2px solid #000;padding: 5px;border-left: 0;border-top: 0;height: 50px;">
                                            999293</td>
                                        <td align="center" valign="top"
                                            style="border:2px solid #000;padding: 5px;border-left: 0;border-top: 0;height: 50px;">
                                            <?= $data->basic_amount ?>
                                        </td>
                                        <td align="center" valign="top"
                                            style="border:2px solid #000;padding: 5px;border-left: 0;border-top: 0;height: 50px;">
                                            <?= $data->dis ?> 
                                        </td>
                                        <td align="center" valign="top"
                                            style="border:2px solid #000;padding: 5px;border-left: 0;border-top: 0;height: 50px;">
                                            <?= round($data->basic_amount -  $data->dis) ?>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td align="right"
                                            style=" border:2px solid #000;padding: 5px;border-top: 0; font-weight: 600;"
                                            colspan="4">CGST@9%</td>

                                        <td align="center"
                                            style="border:2px solid #000;padding: 5px;border-left: 0;border-top: 0;"
                                            colspan="4"><?= ($data->gst_amount) / 2 ?></td>
                                    </tr>
                                    <tr>
                                        <td align="right"
                                            style=" border:2px solid #000;padding: 5px;border-top: 0; font-weight: 600;"
                                            colspan="4">SGST@9%</td>

                                        <td align="center"
                                            style="border:2px solid #000;padding: 5px;border-left: 0;border-top: 0;"
                                            colspan="4"><?= ($data->gst_amount) / 2 ?></td>
                                    </tr> -->
                                    <tr>
                                        <td align="right"
                                            style=" border:2px solid #000;padding: 5px;border-top: 0; font-weight: 600;"
                                            colspan="4">TOTAL</td>

                                        <td align="center"
                                            style="border:2px solid #000;padding: 5px;border-left: 0;border-top: 0; font-weight: 600;"
                                            colspan="4">
                                            AED
                                            <?php
                                            $fn_amount = ($data->basic_amount -  $data->dis);
                                            ?>
                                            <?= round($fn_amount) ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="margin-top: 10px;width: 100%;" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td style="padding: 6px 6px; border: 2px solid #000;">Amount (in words):
                                            <strong><?= $words ?> AED </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="margin-top: 20px;width: 100%;" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td style="padding: 8px 8px; border: 2px solid #000;">
                                            <p style="margin-top: 0;margin-bottom: 6px;">Company�s Bank Details</p>
                                            <p style="margin-top: 0;margin-bottom: 6px;"> A/c Holder name : FUTURE FIN INSTITUTE
                                                LLC</p>
                                            <p style="margin-top: 0;margin-bottom: 6px;">BANK NAME: WIO BANK PJSC</p>
                                            <p style="margin-top: 0;margin-bottom: 6px;">A/C NO: 9337287457</p>
                                            <p style="margin-top: 0;margin-bottom: 0px;">IBAN: AE770860000009337287457</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px;">
                            <table style="margin-top: 8px; " cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td style="width: 60%;">
                                            <p style="margin-top: 0px;margin-bottom: 0; font-size:12px;">
                                                <strong>NOTE:</strong>
                                            </p>
                                            <ul style="list-style:disc; margin:0;font-size: 12px;padding-left:10px;">
                                                <li style="font-size:11px;">Fees once paid will not be returnable and
                                                    transferable.
                                                </li>
                                                <li style="font-size:11px;">Refund, If permissible shall be made as per Refund
                                                    policy</li>
                                        </td>
                                        <td align="center">
                                            <p style="margin:  0px;"><Strong>FUTURE FIN INSTITUTE LLC</Strong></p>
                                            <p style="margin-top:  5px; margin-bottom: 5;">Authorized Signatory</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>

                    </tr>

                </tbody>
            </table>
            <p style="text-align:center;font-size:8px;">* This is a System Generated Invoice *</p>

        </body>

        </html>
    <?php } ?>
<?php } else { ?>
    <p>No data found for this invoice.</p>
<?php } ?>