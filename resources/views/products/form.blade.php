

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">General</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">ទីតាំង</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">លក្ខណសម្បត្តិ</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">រូបភាព</a>
    </li>
</ul><!-- Tab panes -->
<div class="tab-content p-3">
    <div class="tab-pane active" id="tabs-1" role="tabpanel">
        <div class="form-group">
            {!! Form::label('name_kh','ឈ្មោះអចលនទ្រព្យ') !!}
            {!! Form::text('name_kh',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('status','ស្ថានភាព') !!}
            {!! Form::select('status',['published'=>'Published','unpublished'=>'Unpublished'],null,['class'=>'form-control']) !!}
        </div>
        @php
            $type=\App\Models\Type::pluck('name_kh','id');
            $category=\App\Models\Category::pluck('name_kh','id');
        @endphp
        <div class="form-group">
            {!! Form::label('category_id','ប្រភេទអចលនទ្រព្យ') !!}
            {!! Form::select('category_id',$category,null,['class'=>'form-control','placeholder'=>'ជ្រើសរើសអចលនទ្រព្យ']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type_id','ជួល/លក់') !!}
            {!! Form::select('type_id',$type,null,['class'=>'form-control','placeholder'=>'ជ្រើសរើសជួល/លក់']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description','លម្អិត') !!}
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('bedroom','បន្ទប់គេង') !!}
            {!! Form::text('bedroom',null,['class'=>'form-control','placeholder'=>'Ex: 1']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('bath','បន្ទប់ទឹក') !!}
            {!! Form::text('bath',null,['class'=>'form-control','placeholder'=>'Ex: 1']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('livingroom','បន្ទប់ទទួលផ្ញៀវ') !!}
            {!! Form::text('livingroom',null,['class'=>'form-control','placeholder'=>'Ex: 1']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('parking','ចំណតរថយន្ត') !!}
            {!! Form::text('parking',null,['class'=>'form-control','placeholder'=>'Ex: 1']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('land_area','ទំហំដី') !!}
            {!! Form::text('land_area',null,['class'=>'form-control','placeholder'=>'Ex: 5m x 20m']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('floor_number','ចំនួនជាន់') !!}
            {!! Form::text('floor_number',null,['class'=>'form-control','placeholder'=>'Ex: 1']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price','តម្លៃ') !!}
            {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'Ex: 10000']) !!}
        </div>
    </div>
    <div class="tab-pane" id="tabs-2" role="tabpanel">

        @php
            $provinces=\App\Models\Province::pluck('name_kh','id');
            $district=\App\Models\District::pluck('name_kh','id');
            $commune=\App\Models\Commune::pluck('name_kh','id');
            $village=\App\Models\Village::pluck('name_kh','id');
        @endphp
        <div class="form-group">
            {!! Form::label('province_id','ខេត្ត/ក្រុង') !!}
            {!! Form::select('province_id',$provinces,null,['class'=>'form-control','placeholder'=>'ជ្រើសរើសខេត្ត/ក្រុង']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('district_id','ខណ្ឌ/ស្រុក៖') !!}
            {!! Form::select('district_id',$district,null,['class'=>'form-control','placeholder'=>'ជ្រើសរើសខណ្ឌ/ស្រុក']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('commune_id','សង្កាត់/ឃុំ') !!}
            {!! Form::select('commune_id',$commune,null,['class'=>'form-control','placeholder'=>'ជ្រើសរើសសង្កាត់/ឃុំ']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('village_id','ភូមិ') !!}
            {!! Form::select('village_id',$village,null,['class'=>'form-control','placeholder'=>'ជ្រើសរើសភូមិ']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('street','ផ្លូវលេខ') !!}
            {!! Form::text('street',null,['class'=>'form-control','placeholder'=>'ផ្លូវលេខ']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address','អាសយដ្ឋាន') !!}
            {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'អាសយដ្ឋាន']) !!}
        </div>


    </div>
    <div class="tab-pane" id="tabs-3" role="tabpanel">

        <h5 class="mb-3 mt-3">គ្រឿងបរិក្ខារ</h5>
        @php
            $amenities=\App\Models\Amenity::all()
        @endphp

        @foreach($amenities as $item)
            @php
                $prod_amenity=\App\Models\ProductAmenity::where('product_id',$product->id)->where('amenity_id',$item->id)->count();
            @endphp

            <div class="form-check">
                <input class="form-check-input" name="amenity[]" type="checkbox" @if($prod_amenity==1) checked @endif value="{!! $item->id !!}" id="amenity{!! $item->id !!}">
                <label class="form-check-label" for="amenity{!! $item->id !!}">
                    {!! $item->name_kh !!}
                </label>
            </div>
        @endforeach
        <h5 class="mb-3 mt-3">លក្ខណសម្បត្តិ</h5>
        @php
            $features=\App\Models\Feature::all()
        @endphp

        @foreach($features as $item)
            @php
                $prod_feature=\App\Models\ProductFeature::where('product_id',$product->id)->where('feature_id',$item->id)->count();
            @endphp


            <div class="form-check">
                <input class="form-check-input" name="feature[]" type="checkbox"  @if($prod_feature==1) checked @endif value="{!! $item->id !!}" id="Feature{!! $item->id !!}">
                <label class="form-check-label" for="Feature{!! $item->id !!}">
                    {!! $item->name_kh !!}
                </label>
            </div>
        @endforeach

        <h5 class="mb-3 mt-3">សន្តិសុខ</h5>
        @php
            $security=\App\Models\Security::all()
        @endphp

        @foreach($security as $item)
            @php
                $prod_security=\App\Models\ProductSecurity::where('product_id',$product->id)->where('security_id',$item->id)->count();
            @endphp
            <div class="form-check">
                <input class="form-check-input" name="security[]" type="checkbox"  @if($prod_feature==1) checked @endif value="{!! $item->id !!}" id="Security{!! $item->id !!}">
                <label class="form-check-label" for="Security{!! $item->id !!}">
                    {!! $item->name_kh !!}
                </label>
            </div>
        @endforeach
        <h5 class="mb-3 mt-3">View</h5>
        @php
            $views=\App\Models\View::all()
        @endphp

        @foreach($views as $item)
            @php
                $prod_view=\App\Models\ProductView::where('product_id',$product->id)->where('view_id',$item->id)->count();
            @endphp

            <div class="form-check">
                <input class="form-check-input" name="view[]" type="checkbox"  @if($prod_view==1) checked @endif value="{!! $item->id !!}" id="View{!! $item->id !!}">
                <label class="form-check-label" for="View{!! $item->id !!}">
                    {!! $item->name_kh !!}
                </label>
            </div>
        @endforeach

    </div>
    <div class="tab-pane" id="tabs-4" role="tabpanel">
        <div class="form-group">
            {!! Form::label('photo','រូបថត') !!}
            {!! Form::file('photo',['class'=>'form-control','placeholder'=>'ផ្លូវលេខ']) !!}
        </div>

        <div class="row mb-3 mt-3">
            <div class="col-md-1">
                <div class="product-thumb" style="background: url({!! asset('image/product/'.$product->photo) !!})">
                </div>

            </div>
        </div>
        <div class="form-group">
            {!! Form::label('photo_details','រូបថតច្រើនទៀត') !!}
            {!! Form::file('photo_details[]',['class'=>'form-control','multiple'=>'multiple','placeholder'=>'']) !!}
        </div>

        @php

            $photos=\App\Models\ProductPhoto::where('product_id',$product->id)->get()

        @endphp
        <div class="row  mb-3 mt-3">
            @foreach($photos as $ph)
                <div class="col-md-1 mb-3">
                    <div class="product-thumb" style="background: url({!! asset('image/product/'.$ph->photo) !!})">
                        <a href="{!! route('products.product.removephoto',$ph->id) !!}" onclick="return confirm(&quot;Click Ok to delete photo .&quot;)" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('remark','ផ្សេងៗ') !!}
        {!! Form::textarea('remark',null,['class'=>'form-control','placeholder'=>'ផ្សេងៗ']) !!}
    </div>
</div>



@section('css')

    <link rel="stylesheet" href="{!! asset('vendor/select2/css/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
@stop
@section('js')
    <!-- Select2 -->
    <script src="{!! asset('vendor/select2/js/select2.full.min.js') !!}"></script>
    <script>
        $(document).ready(function () {
            $('select').select2({
                theme: 'bootstrap4'
            });
            $('#province_id').on('change',function () {
                var province=$(this).val();
                $.get('{!! route('opt-district') !!}',{province_id:province},function (data) {
                    $('#district_id').html(data)
                })
            });
            $('#district_id').on('change',function () {
                var province=$(this).val();
                $.get('{!! route('opt-commune') !!}',{province_id:province},function (data) {
                    $('#commune_id').html(data)
                })
            })
            $('#commune_id').on('change',function () {
                var province=$(this).val();
                $.get('{!! route('opt-village') !!}',{province_id:province},function (data) {
                    $('#village_id').html(data)
                })
            })


        })
    </script>

    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        var route_prefix = "/filemanager";
        $('#textarea').ckeditor({
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });

    </script>

@stop
