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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/custom.css" />
</head>

<body>

    <!-- header -->
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between">


                    <div class="logo"><a href="JavaScript:void(0)"><img class="img-fluid" alt="" src="{{ url('/assets/images/logo.png')}}" /></a></div>
                    <div class="navbar-menu" id="open-navbar1">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">


                                    <li class="nav-item">
                                        <a class="nav-link" href="#">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Contact Us</a>
                                    </li>
                                    <li class="nav-item login-btn">
                                        <a class="nav-link" href="#">Login</a>
                                    </li>
                                    <li class="nav-item">

                                        <a class="nav-link position-relative" href="/my-cart/{{$id}}">
                                            <span><i class="fa fa-shopping-cart" aria-hidden="true"></i><span id="items-count" class="fc-count">{{$count}}</span></span>
                                        </a>

                                    </li>
                                </ul>

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

    <!-- search -->
    <div class="search-wrapper position-relative">
        <div class="container">
            <div class="search-section">
                <form action="{{ route('search')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="searchbar">
                                <div class="input-group">
                                    <input type="hidden" name="table_id" value="{{$id}}">
                                    <input type="text" name="search_item" id="search_item" class="form-control searchbar-input" value="{{ old('search_item') }}" placeholder="Search for dishes or cuisines">
                                    <span class="input-group-addon">
                                        <button type="submit" class="search-btn" id="basic-addon2">
                                            <span class="hidden-xs">Search</span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <img src="{{ url('/assets/images/pizza.png') }}" alt="FoodCourt" class="img-fluid pizza-fixed-img">
            </div>
        </div>
    </div>
    <!-- search -->

    <!-- food section -->
    <div class="food-wrapper">
        <div class="container">
            <h2 class="text-center">Special food items</h2>
            <p class="text-center">We have the glory beginning in restaurant business</p>

            <ul class="nav nav-tabs">

                @foreach($category as $c)

                <li data-active="#{{$c->name}}"><a data-toggle="tab" onclick="sort( '{{$c->id}}' )" href="JavaScript:void(0)">{{$c->name}}</a></li>
                @endforeach

            </ul>
            <div class="tab-content">
                <div id="pizzas" class="tab-pane fade in active">
                    <div class="row">
                        @foreach($menudata as $m)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="cs-card mb-5 cs-product-card">
                                <div class="card-image" style="background-image:url('{{ Storage::url($m->image) }}')"></div>


                                <div class="cs-card-content clearfix">
                                    <div class="pull-left">
                                        <h4 title="Margherita "> {{$m->title}}</h4>
                                        <p>${{$m->price}}</p>
                                    </div>
                                    <div class="pull-right">
                                        <form id="item_form_856766">
                                            <input type="hidden" id="itemFrom856766" value="items">
                                            <input type="hidden" id="selected_item_id856766" value="856766">
                                            <input type="hidden" id="selected_menu_id856766" value="21">
                                            <input type="hidden" id="selected_item_cost856766" value="200.00">
                                        </form>
                                        <a onclick="addtocart('{{$m->id}}')" class="btn btn-sm btn-round btn-primary card-btn">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>

            <div class="tab-content-search">

            </div>





        </div>
    </div>
    <!-- food section -->

    <!-- howit works -->
    <div class="howit-works-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">How it works</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="howit-works-cards text-center">

                        <div class="icon"><img alt="icon" class="img-fluid" src="{{ url('/assets/images/icon-1.png ')}}" /></div>
                        <h3>Choose</h3>
                        <p>Choose a variety of food items from each food menu to ensure intake of.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="howit-works-cards text-center">

                        <div class="icon"><img alt="icon" class="img-fluid" src="{{ url('/assets/images/icon-2.png')}}" /></div>
                        <h3>Order</h3>
                        <p>Order your desired and tasty food items and pay online or offline.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="howit-works-cards text-center">
                        <div class="icon"><img alt="icon" class="img-fluid" src="{{ url('/assets/images/icon-3.png')}}" /></div>
                        <h3>Home delivery</h3>
                        <p>Everything you order at Menorah will be delivered quickly to your door.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- howit works -->

    <!-- footer -->
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-logo"><img alt="" class="img-fluid" src="{{ url('/assets/images/logo-white.png ')}}" /></div>
                    <p>We are the world class food providers with the highest quality of food services</p>
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
                        <i class="fa-solid fa-cart-shopping"></i>

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
                    <div class="copyright text-center">&#169; 2022. All Rights Reserved.</div>
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




        function addtocart($id) {

            var url = window.location.href;
            var tablenumber = url.split("/").pop();
            $.ajax({
                type: 'POST',
                url: "{{ url('add-to-cart')}}",
                data: {
                    table_id: tablenumber,
                    item_id: $id,
                    '_token': '{{csrf_token()}}'
                },
                success: function(result) {

                    console.log("result.count", result.count);
                    Swal.fire({
                        text: result.success,
                        icon: 'success',
                    })
                    $('#items-count').text(result.count);
                    // document.getElementById("items-count").text = result.count;
                    // window.location.reload();
                },
            });
        }

        function sort(catid) {

            var url = window.location.href;
            var id = url.split("/").pop();
            console.log("table id", id);
            console.log("category id", catid);
            $.ajax({
                type: 'get',
                url: "{{ route('main-menu') }}" + '/' + id + '/' + catid,

                success: function(result) {
                    $('.tab-content-search').html('');
                    console.log("result", result);

                    $('.tab-content').hide();
                    $('.tab-content-search').show();



                    if (result.menudata.length > 0) {
                        for (let i = 0; i < result.menudata.length; i++) {
                            $('.tab-content-search').append(' <div class="col-lg-3 col-md-4 col-sm-6">  <div class="cs-card mb-5 cs-product-card"> <div class="card-image"><img src="http://127.0.0.1:8000/storage/' + result.menudata[i].image + '" height="250" alt="test"></div><div class="pull-left"> <h4>' + result.menudata[i].title + '</h4><p>$' + result.menudata[i].price + '</p></div></div> <div class="pull-right"><a class="btn btn-sm btn-round btn-primary card-btn" onclick="addtocart(' + result.menudata[i].title + ')">Add to cart</a></div></div>');



                        }
                    } else {
                        $('.tab-content-search').append('No Data fount')
                    }

                }
            })
        }

        function search() {

            $search_item = document.getElementById("search_item").value;
            var url = "{{route('search', ':search_item')}}";
            url = url.replace(':search_item', $search_item);
            $.ajax({
                type: 'get',
                url: url,
                success: function(result) {
                    console.log("result", result);


                }
            })
        }
    </script>

</body>

</html>