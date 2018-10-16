<?php

declare(strict_types=1);

namespace Modules\Admin\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Input;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Models\Product;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\ProductType;
use Modules\Admin\Models\ProductUnit;
use Route;
use URL;
use View;
use Validator;
use Auth;
use Paginate;
use Grids;
use HTML;
use Form;
use Hash;
use Lang;
use Session;
use Crypt;
use Illuminate\Http\Dispatcher;
use Response;

/**
 * Class AdminController
 */
class ProductController extends Controller
{
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('admin');
        View::share('viewPage', 'Product');
        View::share('helper', new Helper);
        View::share('heading', 'Products');
        View::share('route_url', route('product'));

        $this->record_per_page = Config::get('app.record_per_page');
    }


    /*
     * Dashboard
     * */

    public function index(Product $product, Request $request)
    {
        $page_title  = 'Product';

        $page_action = 'View Product';

        if ($request->ajax()) {
            $id           = $request->get('id');
            $status       = $request->get('status');
            $s            = ($status == 1) ? $status=0:$status=1;
            $product  = Product::find($id);
            $product->status = $s;
            $product->save();
            echo $s;
            exit;
        }

        //Search by name ,email and group
        $search = Input::get('search');

        //$status = Input::get('status');

        if ((isset($search) && !empty($search))) {
            $search = isset($search) ? Input::get('search') : '';

            $products = Product::with('category')->where(function ($query) use ($search) {
                if (!empty($search)) {
                    $query->Where('product_title', 'LIKE', "%$search%");
                }
            })->orderBy('id', 'ASC')->Paginate($this->record_per_page);
        } else {
            $products = Product::with('category')->orderBy('id', 'ASC')->Paginate($this->record_per_page);
        }
        
        return view('admin::product.index', compact('products', 'page_title', 'page_action'));
    }


    public function create(Product $product)
    {
        $page_title  = 'Product';

        $page_action = 'Add Product';

        $categories = Category::attr(['name' => 'product_category','class'=>'form-control form-cascade-control input-small'])
                        ->selected([1])
                        ->renderAsDropdown();

        $productunits =  ProductUnit :: where('status', 1)->pluck('name', 'id');

        $producttypes =  ProductType :: where('status', 1)->pluck('name', 'id');

        return view('admin::product.create', compact('categories','product','page_title', 'page_action','productunits','producttypes'));
    }


     public function getCategoryById($id){

        $url =  Category::where('id',$id)->first();

        return  $url->slug.'/';
    }


    public function store(ProductRequest $request, Product $product)
    {

        $cat_url    = $this->getCategoryById($request->get('product_category'));

        $pro_slug   = str_slug($request->get('product_title'));

        $url        = $cat_url.$pro_slug;

        if ($request->file('image')) {

            $photo = $request->file('image');

            $destinationPath = storage_path('uploads/products');

            $photo->move($destinationPath, time().$photo->getClientOriginalName());

            $photo_name = time().$photo->getClientOriginalName();

            $request->merge(['photo'=>$photo_name]);


            if($request->hasfile('images'))
            {
                foreach($request->file('images') as $image)
                {
                    $image->move($destinationPath, time().$image->getClientOriginalName());

                    $name =  time().$image->getClientOriginalName();

                    $images[] = $name;
                }

                $product->additional_images  = json_encode($images);
            }

            $product->product_title      =   $request->get('product_title');

            $product->slug               =   str_slug($request->get('product_title'));

            $product->product_category   =   $request->get('product_category');

            $product->description        =   $request->get('description');

            $product->price              =   $request->get('price');

            $product->discount           =   $request->get('discount');

            $product->photo              =   $photo_name;

            $product->meta_title         =   $request->get('meta_title');

            $product->meta_key           =   $request->get('meta_key');

            $product->meta_description   =   $request->get('meta_description');

            $product->url                =   $url;

            $product->unit               =   $request->get('pro_unit');

            $product->product_type       =   $request->get('pro_type');

            $product->total_stocks       =   $request->get('total_stocks');

            $product->available_stocks   =   $request->get('available_stocks');

            $product->save();

        }

        return Redirect::to(route('product'))
                            ->with('flash_alert_notice', 'New Product was successfully created !');

    }


    public function destroy(Product $product) {

        Product::where('id',$product->id)->delete();

        return Redirect::to(route('product'))
                        ->with('flash_alert_notice', 'Product was successfully deleted!');
    }

    public function edit(Product $product) {

        $page_title = 'Product';

        $page_action = 'View Product';

        $category   = Category::all();

        $cat = [];
        foreach ($category as $key => $value) {
             $cat[$value->category_name][$value->id] =  $value->sub_category_name;
        }

        $categories =  Category::attr(['name' => 'product_category','class'=>'form-control form-cascade-control input-small'])
                        ->selected(['id'=>$product->product_category])
                        ->renderAsDropdown();


        $productunits =  ProductUnit :: where('status', 1)->pluck('name', 'id');

        $producttypes =  ProductType :: where('status', 1)->pluck('name', 'id');


        if(!empty($product->additional_images)){
            $additional_images = json_decode($product->additional_images);
        }else{

            $additional_images = '';
        }

        return view('admin::product.edit', compact( 'categories','product', 'page_title', 'page_action','productunits','producttypes','additional_images'));
    }


    public function update(ProductRequest $request, Product $product)
    {

        $cat_url    = $this->getCategoryById($request->get('product_category'));

        $pro_slug   = str_slug($request->get('product_title'));

        $url        = $cat_url.$pro_slug;

        if ($request->hasfile('image')) {

            $photo = $request->file('image');

            $destinationPath = storage_path('uploads/products');

            $photo->move($destinationPath, time().$photo->getClientOriginalName());

            $photo_name = time().$photo->getClientOriginalName();

            $request->merge(['photo'=>$photo_name]);

            if($request->hasfile('images'))
            {
                foreach($request->file('images') as $image)
                {
                    $image->move($destinationPath, time().$image->getClientOriginalName());

                    $name =  time().$image->getClientOriginalName();

                    $images[] = $name;
                }

                $add_img = $request->get('add_img');

                $all_images =  array_merge($add_img,$images);

                $product->additional_images  = json_encode($all_images);
            }


            $product->product_title      =   $request->get('product_title');

            $product->slug               =   str_slug($request->get('product_title'));

            $product->product_category   =   $request->get('product_category');

            $product->description        =   $request->get('description');

            $product->price              =   $request->get('price');

            $product->discount           =   $request->get('discount');

            $product->photo              =   $photo_name;

            $product->meta_title         =   $request->get('meta_title');

            $product->meta_key           =   $request->get('meta_key');

            $product->meta_description   =   $request->get('meta_description');

            $product->url                =   $url;

            $product->unit               =   $request->get('pro_unit');

            $product->product_type       =   $request->get('pro_type');

            $product->total_stocks       =   $request->get('total_stocks');

            $product->available_stocks   =   $request->get('available_stocks');



        }else{

        if($request->hasfile('images'))
            {
                $destinationPath = storage_path('uploads/products');
                foreach($request->file('images') as $image)
                {
                    $image->move($destinationPath, time().$image->getClientOriginalName());

                    $name =  time().$image->getClientOriginalName();

                    $images[] = $name;
                }

                $add_img = $request->get('add_img');

                $all_images =  array_merge($add_img,$images);

                $product->additional_images  = json_encode($all_images);
            }

            $product->product_title      =   $request->get('product_title');

            $product->slug               =   str_slug($request->get('product_title'));

            $product->product_category   =   $request->get('product_category');

            $product->description        =   $request->get('description');

            $product->price              =   $request->get('price');

            $product->discount           =   $request->get('discount');

            $product->photo              =   $request->get('photo');

            $product->meta_title         =   $request->get('meta_title');

            $product->meta_key           =   $request->get('meta_key');

            $product->meta_description   =   $request->get('meta_description');

            $product->url                =   $url;

            $product->unit               =   $request->get('pro_unit');

            $product->product_type       =   $request->get('pro_type');

            $product->total_stocks       =   $request->get('total_stocks');

            $product->available_stocks   =   $request->get('available_stocks');

        }

        $product->save();

        return Redirect::to(route('product'))
                        ->with('flash_alert_notice', 'Product was  successfully updated !');
    }

}

