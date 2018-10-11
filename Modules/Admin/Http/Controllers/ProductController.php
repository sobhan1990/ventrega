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


        // if ($request->ajax()) {
        //     $id               = $request->get('id');
        //     $product         = Product::find($id);
        //     $category->status = $s;
        //     $category->save();
        //     echo $s;

        //     exit();
        // }

        // Search by name ,email and group
        // $search = Input::get('search');
        // $status = Input::get('status');

        // if ((isset($search) && !empty($search))) {
        //     $search = isset($search) ? Input::get('search') : '';

        //     $categories = Category::where(function ($query) use ($search,$status) {
        //         if (!empty($search)) {
        //             $query->Where('category_name', 'LIKE', "%$search%");
        //         }
        //     })->orderBy('id', 'DESC')->where('parent_id', 0)->Paginate($this->record_per_page);
        // } else {
        //     $categories = Category::orderBy('id', 'ASC')->where('parent_id', 0)->Paginate($this->record_per_page);
        // }

        $products = Product::all();
        return view('admin::product.index', compact('products', 'page_title', 'page_action'));
    }


    public function create(Product $product)
    {
        $page_title  = 'Product';

        $page_action = 'Add Product';

        $categories = Category::attr(['name' => 'product_category','class'=>'form-control form-cascade-control input-small'])
                        ->selected([1])
                        ->renderAsDropdown();

        return view('admin::product.create', compact('categories','product','page_title', 'page_action'));
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

            //product image
            $photo = $request->file('image');
            $destinationPath = storage_path('uploads/products');
            $photo->move($destinationPath, time().$photo->getClientOriginalName());
            $photo_name = time().$photo->getClientOriginalName();
            $request->merge(['photo'=>$photo_name]);


            //product multiple images
            // if($request->hasfile('images'))
            // {
            //     foreach($request->file('images') as $image)
            //     {
            //         $image->move($destinationPath, time().$image->getClientOriginalName());

            //         $name =  time().$image->getClientOriginalName();

            //         $images[] = $name;
            //     }
            //     $product->additional_images  =   $images;
            // }

            $product->product_title      =   $request->get('product_title');
            $product->slug               =   str_slug($request->get('product_title'));
            $product->product_category   =   $request->get('product_category');
            $product->description        =   $request->get('description');
            $product->price              =   $request->get('price');
            $product->discount           =   $request->get('discount');
            $product->photo              =   $photo_name;
            $product->meta_key           =   $request->get('meta_key');
            $product->meta_description   =   $request->get('meta_description');
            $product->url                =   $url;

            $product->save();

        }

        return Redirect::to(route('product'))
                            ->with('flash_alert_notice', 'New Product was successfully created !');

    }
}

