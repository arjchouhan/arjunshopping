<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arj-Shopping</title>
    <style>
        body{
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                    <h1 class="text-white"><center>{{$data['title']}}</center></h1>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading"><b>Order No.</b>: ##{{$orderData->order_id}}</h2>
                    <p class="sub-heading"><b>Tracking No.</b>: ARJ-Shopping </p>
                    <p class="sub-heading"><b>Order Date</b>: {{$orderData->created_at}} </p>
                    <p class="sub-heading"><b>Email Address</b>:{{$orderData->email}} </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading"><b>Full Name</b>:{{$orderData->fullname}}</p>
                    <p class="sub-heading"><b>Address</b>:{{$orderData->Address}}</p>
                    <p class="sub-heading"><b>Phone Number</b>:{{$orderData->mobile_no}}  </p>
                    <p class="sub-heading"><b>City,State,Pincode</b>:{{$orderData->City}},{{$orderData->State}},{{$orderData->pincode}} </p>
                </div>
            </div>
        </div>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <p class="sub-heading"><b>Name</b>:Amezon.com  </p>
                    <p class="sub-heading"><b>Address</b>:Mumbai,Maharastra, pin code:34565  </p>
                    <p class="sub-heading"><b>Phone Number</b>: +91 3298945454 </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                $totalSubtotal = 0; // Initialize the total subtotal variable outside the loop
                @endphp

            @foreach($Cartdata as $cart)
                <tr>
                    <td>{{$cart->product_name}}</td>
                    <td>{{$cart->prices}}</td>
                    <td>{{$cart->qty}}</td>
                    <td>
                    @php
                        $subtotal = $cart->prices * $cart->qty;
                        $totalSubtotal += $subtotal; // Add the subtotal to the total subtotal
                    @endphp
                        {{$subtotal}} /-
                    </td>

                </tr>
            @endforeach
                    <tr>
                        <td colspan="3" class="text-right">Sub Total</td>
                        <td> {{ $totalSubtotal}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Discount</td>
                        <td> 10% (- {{ $discountINR = (($totalSubtotal)*10 / 100)}})</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">GST</td>
                        <td>5% (+{{ $GSTamount = (($totalSubtotal-$discountINR)*5 /100)}})</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td> {{ $grandTotal = (($totalSubtotal-$discountINR)*5 /100) + ($totalSubtotal-$discountINR) }}</td>
                    </tr>



                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: @if($orderData->order_status==0)<span>Pending</span> @elseif($orderData->order_status==1)<span>Successfull</span> @elseif($orderData->order_status==2)<span>Failed</span> @endif</h3>
            <h3 class="heading">Payment Mode: Cash on Delivery</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - Arj-Shopping. All rights reserved.
                <a href="https://www.fundaofwebit.com/" class="float-right">www.fundaofwebit.com</a>
            </p>
        </div>
    </div>

</body>
</html>
