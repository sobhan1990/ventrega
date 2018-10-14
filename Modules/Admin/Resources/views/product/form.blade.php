
<fieldset class="step ui-formwizard-content" id="step1" style="display: block;">

<div class="row">


<div class="tabbable">
        <ul class="nav nav-tabs nav-tabs-highlight">
        <li class="active">
            <a href="#1" data-toggle="tab" aria-expanded="true">Product Details</a>
        </li>
        <li class="">
            <a href="#2" data-toggle="tab" aria-expanded="true">Product Meta Details</a>
        </li>

        <li class="">
            <a href="#3" data-toggle="tab" aria-expanded="true">Product Images</a>
        </li>

        </ul>
        <div class="tab-content">

                <div class="tab-pane active" id="1">

                <div class="col-md-12">
                        <div class="form-group {{ $errors->first('product_title', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                            <label class="control-label col-md-2">Product Title<span class="required"> * </span></label>
                            <div class="col-md-6">
                                {!! Form::text('product_title',null, ['class' => 'form-control','data-required'=>1])  !!}

                                <span class="help-block" style="color:red">{{ $errors->first('product_title', ':message') }}</span>
                            </div>
                        </div>
                </div>

                    <div class="col-md-12">
                        <div class="form-group {{ $errors->first('product_category', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                            <label class="control-label col-md-2">Select Category <span class="required"> * </span></label>
                            <div class="col-md-6">
                                {!! $categories !!}
                                <span class="help-block" style="color:red">{{ $errors->first('product_category', ':message') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                            <div class="form-group {{ $errors->first('price', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                                <label class="control-label col-md-2">Product Price<span class="required"> * </span></label>
                                <div class="col-md-6">
                                    {!! Form::text('price',null, ['class' => 'form-control','data-required'=>1])  !!}

                                    <span class="help-block" style="color:red">{{ $errors->first('price', ':message') }}</span>
                                </div>
                            </div>
                    </div>

                    <div class="col-md-12">
                            <div class="form-group {{ $errors->first('discount', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                                <label class="control-label col-md-2">Product discount (%)<span class="required"> * </span></label>
                                <div class="col-md-6">
                                        {!! Form::number('discount',null, ['class' => 'form-control form-cascade-control input-small','min'=>0])  !!}
                                <span class="help-block" style="color:red">{{ $errors->first('discount', ':message') }}</span>
                                </div>
                            </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group {{ $errors->first('pro_type', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                            <label class="control-label col-md-2">Product Type <span class="required"> * </span></label>
                            <div class="col-md-6">

                                {!! Form::select( 'pro_type', $producttypes,$product->product_type,['class' => 'form-control form-cascade-control'])  !!}

                                <span class="help-block" style="color:red">{{ $errors->first('pro_type', ':message') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                            <div class="form-group {{ $errors->first('pro_unit', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                                <label class="control-label col-md-2">Unit Description <span class="required"> * </span></label>
                                <div class="col-md-6">
                                    {!! Form::select('pro_unit',$productunits,$product->unit,['class' => 'form-control form-cascade-control'])  !!}

                                    <span class="help-block" style="color:red">{{ $errors->first('pro_unit', ':message') }}</span>
                                </div>
                            </div>
                    </div>



                    <div class="col-md-12">
                            <div class="form-group {{ $errors->first('description', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                                <label class="control-label col-md-2">Description <span class="required"> * </span></label>
                                <div class="col-md-10">
                                        {!! Form::textarea('description',null, ['class' => 'form-control summernote'])  !!}
                                        <span class="help-block" style="color:red">{{ $errors->first('description', ':message') }}</span>
                                        @if(Session::has('flash_alert_notice'))
                                        <span class="label label-danger">

                                            {{ Session::get('flash_alert_notice') }}
                                        </span>@endif
                                </div>
                            </div>
                    </div>

                    <div class="col-md-12">
                            <div class="form-group {{ $errors->first('status', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                                <label class="control-label col-md-2">Status</label>
                                <div class="col-md-6">
                                        {!! Form::select('status',array('publish' => 'Publish', 'unpublish' => 'Unpublish'),null,['class' => 'form-control form-cascade-control'])  !!}
                                </div>
                            </div>
                    </div>


                <div class="clearfix">&nbsp;</div>
                <div class="col-md-12">
                    <div class="form-group {{ $errors->first('total_stocks', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                        <label class="control-label col-md-2">Total Stocks</label>
                        <div class="col-md-6">
                            {!! Form::text('total_stocks',null, ['class' => 'form-control'])  !!}

                            <span class="help-block" style="color:red">{{ $errors->first('total_stocks', ':message') }}</span>
                        </div>
                    </div>
                </div>


                    <div class="col-md-12">
                    <div class="form-group {{ $errors->first('available_stocks', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                        <label class="control-label col-md-2">Available Stocks</label>
                        <div class="col-md-6">
                            {!! Form::text('available_stocks',null, ['class' => 'form-control'])  !!}

                            <span class="help-block" style="color:red">{{ $errors->first('available_stocks', ':message') }} </span>
                        </div>
                    </div>
                </div>
        </div>
        <div class="tab-pane" id="2">

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->first('meta_title', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                                <label class="control-label col-md-2">Meta title</label>
                                <div class="col-md-6">
                                        {!! Form::text('meta_title',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
                                        <span class="help-block" style="color:red">{{ $errors->first('meta_title', ':message') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group {{ $errors->first('meta_key', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                                <label class="control-label col-md-2">Meta Key</label>
                                <div class="col-md-6">
                                        {!! Form::text('meta_key',null, ['class' => 'form-control form-cascade-control input-small'])  !!}
                                        <span class="help-block" style="color:red">{{ $errors->first('meta_key', ':message') }}</span>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                                &nbsp; &nbsp;
                                <div class="form-group {{ $errors->first('meta_description', ' has-error') }}  @if(session('field_errors')) {{ 'has-error' }} @endif">
                                    <label class="control-label col-md-2">Meta Description</label>
                                    <div class="col-md-10">
                                            {!! Form::textarea('meta_description',null, ['class' => 'form-control summernote'])  !!}
                                            <span class="help-block" style="color:red">{{ $errors->first('meta_description', ':message') }}</span>
                                            @if(Session::has('flash_alert_notice'))
                                            <span class="label label-danger">
                                                {{ Session::get('flash_alert_notice') }}
                                            </span>@endif
                                    </div>
                                </div>
                        </div>
                </div>


                <div class="tab-pane" id="3">

                        <div class="col-md-12">
                                &nbsp;&nbsp;
                            <div class="form-group{{ $errors->first('image', ' has-error') }}">
                                    <label class="col-lg-2 col-md-2 control-label">Default Product Image <span class="required"> * </span></label>
                                    <div class="col-lg-6 col-md-6">
                                        {!! Form::file('image',null,['class' => 'form-control form-cascade-control input-small'])  !!}
                                        <span class="help-block" style="color:red">{{ $errors->first('image', ':message') }}</span>
                                        <br>
                                        @if(!empty($product->photo))
                                            <input type="hidden" name="photo" value="{!! $product->photo !!}">
                                            <div class="col-md-4">
                                                <div class="thumbnail">
                                                <div class="thumb">
                                                <img class="img-rounded" width="150" height="150" src="{!! url('storage/uploads/products/'.$product->photo) !!}">
                                                <div class="caption-overflow">
                                                <span>
                                                <a href="{!! url('storage/uploads/products/'.$product->photo) !!}" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                                                </span>
                                                </div>
                                                </div>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                        </div>

                        <div class="col-md-12">
                                &nbsp;&nbsp;
                            <div class="col-md-2">
                                    <label>Product Images</label>
                            </div>
                            <div class="col-md-10">
                                    @if(!empty($additional_images))
                                    @for ($i = 0; $i < count($additional_images); $i++)
                                    <input type="hidden" name="add_img[]" value="{!! $additional_images[$i] !!}">
                                    <div class="col-md-2">
                                        <div class="thumbnail">
                                        <div class="thumb">
                                        <img class="img-rounded" width="150" height="150" src="{!! url('storage/uploads/products/'.$additional_images[$i]) !!}">
                                        <div class="caption-overflow">
                                        <span>
                                        <a href="{!! url('storage/uploads/products/'.$additional_images[$i]) !!}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>

                                        </span>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                    @endfor
                                    @endif
                             </div>
                        </div>



                    <div class="col-md-12">
                        <div class="form-group">
                                <label class="control-label col-md-2"></label>
                                <div class="col-lg-6 col-md-6">

                                            <div class="input-group control-group increment" >
                                                {!! Form::file('images[]',null,['class' => 'form-control form-cascade-control input-small','accept'=>'image/*']) !!}
                                            <br>
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                                </div>
                                            </div>

                                            <div class="clone hide">
                                                <div class="control-group input-group" style="margin-top:10px">
                                                    {!! Form::file('images[]',null,['class' => 'form-control form-cascade-control input-small','accept'=>'image/*'])  !!}
                                                    <div class="input-group-btn">
                                                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

        &nbsp; &nbsp;
        <div class="col-md-12">

        <div class="form-group pull-right ">
        {!! Form::submit(' Save ', ['class'=>'btn  btn-primary text-white','id'=>'saveBtn']) !!}

            <a href="{{route('product')}}">
            {!! Form::button('Back', ['class'=>'btn btn-warning text-white']) !!} </a>
        </div>
    </div>

</div>

</fieldset >
