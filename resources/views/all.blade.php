<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact V8</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{URL::asset('images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

<div class="alert alert-success" id="success_msg" style="display: none">
    تم الحذف بنجاح
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Language
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <a class="dropdown-item"  rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>

                    @endforeach

                </div>
            </li>

        </ul>

    </div>
</nav>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">{{trans('messages.offer name')}}</th>
        {{--<th scope="col">{{trans('messages.offer name ar')}}</th>--}}
        <th scope="col">{{trans('messages.offer price')}}</th>
        {{--<th scope="col">{{trans('messages.offer details en')}}</th>--}}
        <th scope="col">{{trans('messages.offer details')}}</th>

        <th scope="col">photo</th>
        <th scope="col">{{trans('messages.options')}}</th>
    </tr>
    </thead>
    <tbody>

    @foreach($offers as $offer)
    <tr class="offerRow{{$offer -> id}}">
        <th scope="row">{{$offer -> id}}</th>
        {{--<td>{{$offer -> name_en}}</td>--}}
        <td>{{$offer -> name}}</td>
        <td>{{$offer -> price}}</td>
        <td>{{$offer -> details}}</td>
        <td><img src="/images/offers/{{$offer -> photo}}" height="60px" width="60px" border="5px" alt="null"/> </td>
        <td><a href="{{route('delete.offer',['offer_id' => $offer -> id])}}" type="button" class="btn btn-danger">
            {{trans('messages.delete')}}</a> - <a href="{{route('edit.offer',['offer_id' => $offer -> id])}}" type="button" class="btn btn-primary">{{trans('messages.edit')}}</a> -  <a href="" type="button"  offer_id="{{$offer -> id}}" class="edit_btn btn btn-danger">{{trans('messages.deleteajax')}}</a>-<a  href="{{route('ajax.offers.edit',$offer -> id)}}" type="button"   class=" btn btn-info">{{trans('messages.edtiajax')}}</a>
               </td>
        {{--<td>{{$offer -> details_ar}}</td>--}}
    </tr>
        @endforeach

    </tbody>
</table>


<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
<script src="{{URL::asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::asset('vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{URL::asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::asset('vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{URL::asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
<script src="{{URL::asset('js/map-custom.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::asset('js/main.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

<script>

    $(document).on('click', '.delete_btn', function (e) {
        e.preventDefault();

        var offer_id = $(this).attr('offer_id');

        $.ajax({
            type: 'post',

            url: "{{route('ajax.offers.delete')}}",
            data: {
                '_token': "{{csrf_token()}}",
                'id': offer_id
            },

            success: function (data) {
                if (data.status == true) {
                    $('#success_msg').show();
                    $('.offerRow'+data.id).remove();

                    //alert(data.msg);
                }
            },
            error: function (reject) {

            }
        });
    });

</script>

</body>
</html>
