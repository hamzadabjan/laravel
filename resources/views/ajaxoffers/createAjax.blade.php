@extends('layouts.app')

@section('content')



    <div class="container-contact100">

        <div class="alert alert-success" id="success_msg" style="display: none">
            تم الحفظ بنجاح
        </div>


        <div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422"
             data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>


        <div class="wrap-contact100">
            <form method="POST" id="OfferForm" class="contact100-form" enctype="multipart/form-data">
                @csrf
                <span class="contact100-form-title">
					Enter Data
				</span>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="file" name="photo"
                           placeholder="{{trans('messages.choose offer photo')}}">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                    {{--@error('photo')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror--}}
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="name_en"
                           placeholder="{{trans('messages.offer name en')}}">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                    {{-- @error('name_en')
                     <small class="form-text text-danger">{{$message}}</small>
                     @enderror--}}
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="name_ar"
                           placeholder="{{trans('messages.offer name ar')}}">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                    {{--@error('name_ar')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror--}}
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="price" placeholder="price">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                    {{--@error('price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror--}}
                </div>


                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="details_en"
                           placeholder="{{trans('messages.offer details en')}}"></input>
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="details_ar"
                           placeholder="{{trans('messages.offer details ar')}}"></input>
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>


                <div class="container-contact100-form-btn">
                    <button id="save_offer" class="contact100-form-btn">
                        Insert
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        $(document).on('click', '#save_offer', function (e) {
            e.preventDefault();
            var formData = new FormData($('#OfferForm')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('ajax.offers.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                        $('#success_msg').show();
                        //alert(data.msg);
                    }
                },
                error: function (reject) {

                }
            });
        });

    </script>
@endsection
