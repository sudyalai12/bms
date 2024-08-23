@php
    date_default_timezone_set('Asia/Kolkata');
    $path = public_path() . '/assets/img/logo.webp';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $image = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $stamppath = public_path() . '/assets/img/stamp.png';
    $stamptype = pathinfo($stamppath, PATHINFO_EXTENSION);
    $stampdata = file_get_contents($stamppath);
    $stamp = 'data:image/' . $stamptype . ';base64,' . base64_encode($stampdata);
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18px;
    }

    .quotation-box {
        /* border: 4px solid red; */
        /* width: 1072px; */
        width: 1080px;
        /* height: 1342px; */
        /* height: 1350px; */
        height: 1300px;
        position: relative;
    }

    .page-break {
        page-break-after: always;
    }

    .block {
        display: block;
    }

    .f-16 {
        font-size: 20px;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .text-left {
        text-align: left;
    }

    .float-right {
        float: right;
    }

    .h100 {
        height: 100%;
    }

    .w100 {
        width: 100%;
    }

    .mb-1 {
        margin-bottom: 1rem;
    }

    .border {
        border-collapse: collapse;
    }

    .border td {
        border: 1px solid rgba(0, 0, 0, 0.2);
    }

    table {
        padding: 0 2rem;
    }

    td {
        text-align: left
    }

    .border td {
        padding: 6px 8px
    }

    .pb-0 {
        padding-bottom: 0
    }

    .pb-1 {
        padding-bottom: 1rem
    }

    .oneline {
        white-space: nowrap;
    }

    .footer {
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        position: fixed;
        bottom: 100px;
        left: 0;
        right: 0;
        text-align: center;
    }

    .footer td,
    .footer strong,
    .footer a {
        font-size: 10px;
    }

    .no-border {
        border: none;
    }

    .no-border td {
        border: none;
    }

    .terms td,
    .terms th,
    .terms strong {
        padding: 2px 0;
        vertical-align: top;
    }

    .terms tr {
        padding-bottom: 4px;
    }

    .terms br {
        display: block;
        margin: 2px 0;
    }
</style>

<body>
    {{-- *****
    *****
    *****
    *****
    PAGE 1
    *****
    *****
    *****
    ***** --}}
    <div class="quotation-box">

        <br>
        <br>

        {{-- LOGO --}}
        <table class="w100">
            <tbody>
                <tr>
                    <td style="height: 65px"><img style="height: 65px" class="float-right" src="{{ $image }}"
                            alt="logo"></td>
                </tr>
            </tbody>
        </table>

        <br>
        <br>

        {{-- HEADER --}}
        <table class="w100">
            <tbody>
                <tr>
                    <td>
                        <strong class="f-16">FOR THE ATTENTION OF:</strong>
                    </td>
                    <td>
                        <strong class="f-16"> PRO FORMA INVOICE</strong>
                    </td>
                </tr>

                <br>

                <tr>
                    <td style="width: 60%">{{ $quote->customer->company->name }}</td>
                    <td><strong>REF: {{ $quote->reference }}</strong></td>
                </tr>
                <tr>
                    <td>{{ $quote->customer->name }}</td>
                    <td>{{ date('m-d-Y h:i:s A') }}</td>
                </tr>
                <tr>
                    <td>{{ $quote->customer->address->address1 }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{ $quote->customer->address->address2 }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{ $quote->customer->address->city }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{ $quote->customer->address->state }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{ $quote->customer->address->country }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{ $quote->customer->address->pincode }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{ $quote->customer->phone }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <br>
        <br>

        {{-- BODY --}}
        <table class="w100">
            <tbody>
                <tr>
                    <td>Dear {{ Str::upper($quote->customer->name) }},</td>
                </tr>
                <tr>
                    <td>
                        We thank you for your valued enquiry referred to above and have pleasure in submitting our Pro
                        Forma Invoice, offered strictly under our
                        Terms of Business, as printed in our current catalogue or website.
                    </td>
                </tr>
            </tbody>
        </table>

        <br>

        {{-- Annexure - I: Commercial Offer: --}}
        <table class="w100">
            <tbody>
                <tr>
                    <td>
                        <strong>Annexure - I: Commercial Offer:</strong>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- ITEMS TABLE --}}
        <table class="w100 border">
            <tbody>
                <tr>
                    <td>
                        <strong class="oneline">Part Number</strong>
                    </td>
                    <td>
                        <strong>Description</strong>
                    </td>
                    <td>
                        <strong>Quantity</strong>
                    </td>
                    <td>
                        <strong class="oneline">Unit Price</strong>
                    </td>
                    <td>
                        <strong>Total</strong>
                    </td>
                </tr>
                @foreach ($quote->items as $item)
                    <tr>
                        <td class="oneline">{{ $item->product->name }}</td>
                        <td>{{ $item->product->description }}</td>
                        <td>{{ number_format($item->quantity, 2) }}</td>
                        <td>{{ number_format($item->product->price, 2) }}</td>
                        <td>{{ number_format($item->total(), 2) }}</td>
                    </tr>
                @endforeach
                <tr class="no-border">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong class="oneline">Total (INR) : </strong></td>
                    <td>{{ number_format($quote->total(), 2) }}</td>
                </tr>
                <tr class="no-border">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong class="oneline">GST (18%) : </strong></td>
                    <td>{{ number_format($quote->totalWithTax(), 2) }}</td>
                </tr>
                <tr class="no-border">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong class="oneline">Grand Total (INR) : </strong></td>
                    <td><strong>{{ number_format($quote->grandTotal(), 2) }}</strong></td>
                </tr>
            </tbody>
        </table>

        <br>

        {{-- CLOSING --}}
        <table class="w100">
            <tbody>
                <tr>
                    <td>
                        The above prices will be held firm for a period of 10 days. Orders placed and delivered after
                        this time however, will be charged at prices
                        ruling at date of despatch.
                    </td>
                </tr>

                <br>

                <tr>
                    <td>
                        Should you require further assistance, please contact us at <a href="tel:+91807697694">+91 80
                            7696 7694</a>
                    </td>
                </tr>

                <br>

                <tr>
                    <td>
                        Yours Sincerely,
                        <br>
                        for Neuvin Electronics Private Limited
                    </td>
                </tr>

                <br>

                <tr>
                    <td>
                        Customer Service Department
                        <br>
                        Tel: <a href="tel:+91807697694">+91 80 7696 7694</a>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Footer --}}
        <table class="w100 footer">
            <tr>
                <td>
                    <strong>Neuvin Electronics Private Limited</strong>
                    <br>
                    WZ-1258, Third Floor, Nand Gyan Bhawan
                    <br>
                    Ashram Lane, Palam Village, New Delhi – 110045
                    <br>
                    <a href="https://neuvin.com/">https://neuvin.com/</a>
                </td>
                <td>
                    Accounts
                    <br>
                    Tel <a href="tel:+91807697694">+91 80 7696 7694</a>
                    <br>
                    Fax <a href="tel:+91807697694">+91 80 7696 7694</a>
                </td>
                <td>
                    GSTIN : 07AADCN9370Q1ZO
                    <br>
                    PAN: AADCN9370Q
                </td>
            </tr>
        </table>
    </div>

    <div class="page-break">
    </div>

    {{-- ******
    ******
    ******
    ******
    PAGE 2
    ******
    ******
    ******
    ****** --}}
    <div class="quotation-box">

        <br>
        <br>

        {{-- LOGO --}}
        <table class="w100">
            <tbody>
                <tr>
                    <td style="height: 75px"><img style="height: 75px" class="float-right" src="{{ $image }}"
                            alt="logo"></td>
                </tr>
            </tbody>
        </table>

        <br>
        <br>

        {{-- HEADER --}}
        <table class="w100">
            <tbody>
                <tr>
                    <td>
                        <strong>REF: {{ $quote->reference }}</strong>
                    </td>
                    <td>
                        <strong class="float-right"> {{ date('m-d-Y h:i:s A') }}</strong>
                    </td>
                </tr>
            </tbody>
        </table>

        <br>

        {{-- Annexure - I: Commercial Offer: --}}
        <table class="w100">
            <tbody>
                <tr>
                    <td>
                        <strong>Annexure – II: Commercial Terms & Conditions:</strong>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- TERMS AND CONDITIONS --}}
        {{-- Price Basis : Ex-Works Aim-TTi Instruments India New Delhi – 110045
        Payment Terms : 100% Payment in advance with Purchase Order.
        Handling Charges : INR 1500 per shipment.
        PO to Place : The Purchase Order and Payment should be in favour:
        Neuvin Electronics Private Limited
        WZ-1258, Third Floor, Nand Gyan Bhawan
        Ashram Lane, Palam Village, New Delhi – 110045
        Phone/Fax: +91 11 25081947, +91 9910 584 666
        E-Mail: in-sales@aimtti.co.in, URL: https://aimtti.co.in/
        Banker's Details : Bank of Maharastra
        F - Block Palam Vihar, Gurgaon - 122017
        Account No: 60098352768
        IFS Code: MAHB0001308
        MICR Code: 110014034
        GSTIN/PAN/TIN : 07AADCN9370Q1ZO/AADCN9370Q/7070443384
        MSME ID : DL10D0008905
        GST/IGST : 18.00% Extra or as actual at the time of delivery.
        Delivery : 4 – 6 weeks, effective from date of receipt of confirmed PO/Payment/LC.
        P&F Charges : Packing & Forwarding @ 2.00% of the total cost of the goods.
        Freight Charges : To collect by the customer / @2.00% of the total PO value.
        Warranty : As per OEM warranty Policy 12 months without travel/transport cost.
        Validity of Quote : The Validity of Quote will be 30 days from PI date.
        PO Conditions : NC/NR (Non-Cancellable / Non-Returnable)
        We hope our offer meets your requirements and look forward to receive your valued Purchase Order.
        For any information, feel free to contact us.
        We assure you of our best services all the time.
        Best Regards,
        For Aim-TTi Instruments India
        Vinod Sharma
        Regional Manager - India
        Cell: +91 9910584666
        E-Mail: in-sales@aimtti.co.in --}}
        <table class="w100 terms">
            <tbody>
                <tr>
                    <td><strong>Price Basis : </strong></td>
                    <td><strong>Ex-Works Neuvin Electronics Private Limited New Delhi – 110045</strong></td>
                </tr>
                <tr>
                    <td><strong>Payment Terms : </strong></td>
                    <td>100% Payment in advance with Purchase Order.</td>
                </tr>
                <tr>
                    <td><strong>Handling Charges : </strong></td>
                    <td>INR 1500 per shipment.</td>
                </tr>
                <tr>
                    <td><strong>PO to Place : </strong></td>
                    <td>The Purchase Order and Payment should be in favour:
                        <br>
                        <strong>Neuvin Electronics Private Limited</strong>
                        <br>
                        WZ-1258, Third Floor, Nand Gyan Bhawan
                        <br>
                        Ashram Lane, Palam Village, New Delhi – 110045
                        <br>
                        Phone/Fax: <a href="tel:+91 11 25081947">+91 11 25081947</a>, <a href="tel:+91 9910 584 666">+91
                            9910 584 666</a>
                        <br>
                        E-Mail: <a href="mailto:info@neuvin.com">info@neuvin.com</a>, URL: <a
                            href="https://neuvin.com/">https://neuvin.com/</a>
                    </td>
                </tr>
                <tr>
                    <td><strong>Banker's Details : </strong></td>
                    <td><strong>Bank of Maharastra</strong>
                        <br>
                        F - Block Palam Vihar, Gurgaon - 122017
                        <br>
                        Account No: 60098352768
                        <br>
                        IFS Code: MAHB0001308
                        <br>
                        MICR Code: 110014034
                    </td>
                </tr>
                <tr>
                    <td><strong>GSTIN/PAN/TIN : </strong></td>
                    <td>07AADCN9370Q1ZO/AADCN9370Q/7070443384</td>
                </tr>
                <tr>
                    <td><strong>MSME ID : </strong></td>
                    <td>DL10D0008905</td>
                </tr>
                <tr>
                    <td><strong>GST/IGST : </strong></td>
                    <td>18.00% Extra or as actual at the time of delivery.</td>
                </tr>
                <tr>
                    <td><strong>Delivery : </strong></td>
                    <td>4 – 6 weeks, effective from date of receipt of confirmed PO/Payment/LC.</td>
                </tr>
                <tr>
                    <td><strong>P&F Charges : </strong></td>
                    <td>Packing & Forwarding @ 2.00% of the total cost of the goods.</td>
                </tr>
                <tr>
                    <td><strong>Freight Charges : </strong></td>
                    <td>To collect by the customer / @2.00% of the total PO value.</td>
                </tr>
                <tr>
                    <td><strong>Warranty : </strong></td>
                    <td>As per OEM warranty Policy 12 months without travel/transport cost.</td>
                </tr>
                <tr>
                    <td><strong>Validity of Quote : </strong></td>
                    <td>The Validity of Quote will be 30 days from PI date.</td>
                </tr>
                <tr>
                    <td><strong>PO Conditions : </strong></td>
                    <td>NC/NR (Non-Cancellable / Non-Returnable)</td>
                </tr>
            </tbody>
        </table>

        <br>

        {{-- CLOSING --}}
        <table class="w100">
            <tbody>
                <tr>
                    <td>
                        We hope our offer meets your requirements and look forward to receive your valued Purchase
                        Order.
                        For any information, feel free to contact us.
                    </td>
                </tr>

                <br>

                <tr>
                    <td>
                        We assure you of our best services all the time.
                    </td>
                </tr>

                <br>

                <tr>
                    <td>
                        <strong>Best Regards,
                            <br>
                            Neuvin Electronics Private Limited
                            <br>
                            <img style="height: 50px;" src="{{ $stamp }}" alt="">
                            <br>
                            Vinod Sharma
                            <br>
                            Regional Manager - India
                            <br>
                            Cell: <a href="tel:+919910584666">+91 9910584666</a>
                            <br>
                            E-Mail: <a href="mailto:info@neuvin.com">info@neuvin.com</a>
                        </strong>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Footer --}}
        <table class="w100 footer">
            <tr>
                <td>
                    <strong>Neuvin Electronics Private Limited</strong>
                    <br>
                    WZ-1258, Third Floor, Nand Gyan Bhawan
                    <br>
                    Ashram Lane, Palam Village, New Delhi – 110045
                    <br>
                    <a href="https://neuvin.com/">https://neuvin.com/</a>
                </td>
                <td>
                    Accounts
                    <br>
                    Tel <a href="tel:+91807697694">+91 80 7696 7694</a>
                    <br>
                    Fax <a href="tel:+91807697694">+91 80 7696 7694</a>
                </td>
                <td>
                    GSTIN : 07AADCN9370Q1ZO
                    <br>
                    PAN: AADCN9370Q
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
