<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"> -->
    <script src="https://kit.fontawesome.com/8dd3b79734.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/customfrontend.css" />
</head>

<body>

    <!-- header -->
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between">
                    <div class="logo"><a href="#"><img class="img-fluid" alt="" src="{{ url('/assets/images/logo.png')}}" /></a></div>
                    <div class="navbar-menu" id="open-navbar1">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                               
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="banner-section text-center">
                    <h1>Best Quality and Tasty Food</h1>
                    <p>35 min average delivery time </p>
                </div>
            </div>
        </div>
    </div>
    <!-- header -->

    <!-- content -->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="cart-box">

                        <h2 style="margin-bottom: 20px;">Your Order status</h2>

                        <div class="table-responsive">

                            <table width="100%" cellspacing="0" cellpadding="0" class="order-status-table">


                                <thead>
                                    <tr>
                                        <th>S.No</th>

                                        <th>Item Name</th>

                                        <th>Image</th>
                                        <th>Table No</th>
                                        <th>Qty</th>

                                        <th>Order Status</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($orderdata as $data)

                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$data->item_name}}</td>
                                        <td><img src="{{ Storage::url($data->item_details->image) }}" alt="test" height="50" width="50" class="img-fluid"></td>
                                        <td>{{$data->table_id}}</td>
                                        <td>{{$data->qty}}</td>
                                        @if($data->status == 0)
                                        <td>Pending</td>
                                        @elseif($data->status == 1)
                                        <td>in-progress</td>
                                        @elseif($data->status == 2)
                                        <td>completed</td>
                                        @endif
                                        <td><button class="btn btn-success">Complete</button></td>

                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- content -->

    <!-- footer -->
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-logo"><img alt="" class="img-fluid" src="images/logo-white.png" /></div>
                    <p>We are the world class food providers with the highest quality of food services</p>
                    <div class="d-flex mt-4">
                        <a href="#" class="social-icons"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="social-icons"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="social-icons"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="social-icons"><i class="fa-brands fa-google-plus-g"></i></a>
                        <a href="#" class="social-icons"><i class="fa-brands fa-pinterest-p"></i></a>
                        <a href="#" class="social-icons"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                    <h4>Accepted Payments</h4>
                    <div><img alt="card" class="img-fluid payment-icon" src="{{ url('/assets/images/card-1.png')}}" /></div>
                    <div><img alt="card" class="img-fluid payment-icon" src="{{ url('/assets/images/card-2.png')}}" /></div>
                    <div><img alt="card" class="img-fluid payment-icon" src="{{ url('/assets/images/card-3.png') }}" /></div>
                    <div><img alt="card" class="img-fluid payment-icon" src="{{ url('/assets/images/card-4.png ')}}" /></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                    <h4>Our Links</h4>
                    <ul class="footer">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Site map</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                    <h4>Our Links</h4>
                    <ul class="footer">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">How it works</a></li>
                        <li><a href="#">Terms conditions</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="d-flex timming-row">
                        <div><i class="fa-regular fa-clock"></i></div>
                        <div><span>OPENING TIME</span>
                            <div><b>11:00 - 23:59</b></div>
                        </div>
                    </div>
                    <div class="d-flex timming-row">
                        <div><i class="fa-solid fa-phone"></i></div>
                        <div><span>CALL US</span>
                            <div><b>123456789</b></div>
                        </div>
                    </div>
                    <div class="d-flex timming-row">
                        <div><i class="fa-brands fa-android"></i></div>
                        <div><span>FOR ANDROID</span>
                            <div><b>Visit Playstore Store</b></div>
                        </div>
                    </div>
                    <div class="d-flex timming-row">
                        <div><i class="fa-brands fa-apple"></i></div>
                        <div><span>FOR IOS</span>
                            <div><b>Visit Apple Store</b></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright text-center">&#169; 2023. All Rights Reserved.</div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        function toggleTab(e) {
            var hrefVal = $(e).attr('href');
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li[data-active="' + hrefVal + '"]').addClass('active');
        }

        $qty = '';


        function getvalue($id) {

            $qty = event.target.getAttribute("qty");
            $qty = ++$qty;
            $url = window.location.href;

            $tablenumber = $url.split("/").pop();

            console.log("table id==>", $tablenumber);
            console.log("==>", $qty);
            console.log("addtocartid==>", $id);
            $.ajax({
                type: 'POST',
                url: "{{ url('/change-qty')}}",
                data: {
                    table_id: $tablenumber,
                    item_id: $id,
                    qty: $qty,

                    '_token': '{{csrf_token()}}'
                },
                success: function(result) {


                    var dd = result.obj;
                    var data = JSON.stringify(result.obj);
                    var item_idold = JSON.stringify(result.item_id);
                    var tatalgrand = JSON.stringify(result.grand_total);
                    console.log("data===>", data);
                    console.log("item id===>", item_idold);

                    for (let i = 0; i < dd.length; i++) {
                        if (dd[i].item_id == result.item_id) {
                            console.log("result===>", dd[i].qty);
                            var idcus = 'qty_' + result.item_id
                            var ptotal = '#total_ammount_' + result.item_id;

                            $(ptotal).text("$" + dd[i].qty * dd[i].item_detail['price']);
                            $('#' + idcus).val(dd[i].qty);
                            $('.grandTotal').text("$" + tatalgrand);




                            $('#inc_' + result.item_id).attr('qty', dd[i].qty);
                            console.log("inside===>");
                            return;
                        }
                    }

                },
                error: function(e) {
                    alert(e.error);
                },
            });
        }


        function getvalue1($id) {

            $qty = event.target.getAttribute("qty");
            $qty = --$qty;
            $url = window.location.href;

            if ($qty < 0) {

                alert("qty can't be -ve number");
                return;
            }


            $tablenumber = $url.split("/").pop();

            console.log("table id==>", $tablenumber);
            console.log("==>", $qty);
            console.log("addtocartid==>", $id);
            $.ajax({
                type: 'POST',
                url: "{{ url('/change-qty')}}",
                data: {
                    table_id: $tablenumber,
                    item_id: $id,
                    qty: $qty,

                    '_token': '{{csrf_token()}}'
                },
                success: function(result) {
                    var dd = result.obj;
                    var data = JSON.stringify(result.obj);
                    var item_idold = JSON.stringify(result.item_id);
                    var tatalgrand = JSON.stringify(result.grand_total);
                    console.log("data===>", data);
                    console.log("item id===>", item_idold);

                    for (let i = 0; i < dd.length; i++) {
                        if (dd[i].item_id == result.item_id) {
                            console.log("result===>", dd[i].qty);
                            var idcus = 'qty_' + result.item_id;
                            console.log("price===>", dd[i].qty * dd[i].item_detail['price']);

                            var ptotal = '#total_ammount_' + result.item_id;

                            $(ptotal).text("$" + dd[i].qty * dd[i].item_detail['price']);
                            $('.grandTotal').text("$" + tatalgrand);

                            $('#' + idcus).val(dd[i].qty);

                            $('#dec_' + result.item_id).attr('qty', dd[i].qty);
                        }
                    }

                },
                error: function(e) {
                    alert(e.error);
                },
            });
        }

        function homefun() {

            var url = window.location.href;
            var tablenumber = url.split("/").pop();
            url = 'http://127.0.0.1:8000/dispalymenu/' + tablenumber;
            console.log("url", url);
            window.location = url
        }

        function removeitem($id) {


            var url = window.location.href;
            var tablenumber = url.split("/").pop();
            console.log("table id==>", tablenumber);
            console.log("item id===>", $id);
            $.ajax({
                type: 'POST',
                url: "{{ url('/remove-item')}}",
                data: {
                    table_id: tablenumber,
                    item_id: $id,

                    '_token': '{{csrf_token()}}'
                },
                success: function(result) {
                    Swal.fire({
                        text: result.success,
                        icon: 'success',
                    });


                    url = 'http://127.0.0.1:8000/my-cart/' + tablenumber;
                    window.location = url
                },
            });
        }
    </script>

</body>

</html>