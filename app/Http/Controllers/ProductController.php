<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\product;
use App\productcat;
use App\sliceder;
class ProductController extends Controller
{
    function index(Request $request){

            $productcat = $request->input('id')?productcat::find($request->input('id')) : '';
        // $product=productcat::find(12)->products;  //Tim theo elequent relationship
        // return $product;
        $products=product::paginate(12);
        // $posts=post::paginate(5);
        $productcats=productcat::all();
        $the_firms=product::all()->unique('the_firm'); //hay
            // $post=request()->all();
                // return $post;
            $keyword="";
            $fillter="";
            $id="";
            $the_firm="";
            $price="";
            $brand="";
            $species="";
            if(Request()->all()){
                // Loc theo keyword
                    if($request->input('keyword')){
                        $keyword=$request->input('keyword');
                        // return $keyword;
                        $products=product::where('name','LIKE',"%{$keyword}%")->paginate(12);
                    }elseif(Request()->id){
                        // Loc theo Danh muc san phams
                        $id=Request()->id;
                        // return $catname;
                        $products=product::where('productcat_id','=',$id)->paginate(12);
                      }elseif(Request()->the_firm){
                    // Hang san pham
                        $the_firm=Request()->the_firm;
                        $products=product::where('the_firm','=',$the_firm)->paginate(12);

                     }elseif(request()->select){
                        // Loc theo sap xep
                        $fillter=request()->select;
                        if($fillter==0){
                            $products=product::paginate(8);

                        }
                        if($fillter==1){
                             $products=product::orderBy('name','desc')->paginate(12); //tăng dần

                            }
                        if($fillter==2){
                                $products=product::orderBy('name','asc')->paginate(12);

                            }
                        if($fillter==3){
                                $products=product::orderBy('price','desc')->paginate(12);

                            }
                        if($fillter==4){
                                $products=product::orderBy('price','asc')->paginate(12);

                            }
                        }elseif(Request()->price && Request()->brand && Request()->species){
                                 //Lọc theo giá, loại, hãng sản phẩm
                                $price=Request()->price;
                                $brand=Request()->brand;
                                $species=Request()->species;
                                if($price==1){
                                    $products=product::where('price','>',5000000)
                                    ->where('price','<',10000000)
                                    ->where('the_firm','LIKE',"%{$brand}%")
                                    ->where('productcat_id','=',"{$species}")
                                    ->paginate(12);

                                    //  return $products;
                                }
                                if($price==2){
                                    $products=product::where('price','>',10000000)
                                    ->where('price','<',15000000)
                                    ->where('the_firm','LIKE',"%{$brand}%")
                                    ->where('productcat_id','=',"{$species}")
                                    ->paginate(12);

                                    //  return $products;
                                }
                                if($price==3){
                                    $products=product::where('price','>',15000000)
                                    ->where('price','<',20000000)
                                    ->where('the_firm','LIKE',"%{$brand}%")
                                    ->where('productcat_id','=',"{$species}")
                                    ->paginate(12);

                                    //  return $products;
                                }
                                if($price==4){
                                    $products=product::where('price','>',20000000)
                                    ->where('the_firm','LIKE',"%{$brand}%")
                                    ->where('productcat_id','=',"{$species}")
                                    ->paginate(12);
                                    //  return $products;
                                }
                                if($price==5){
                                    $products=product::where('price','<',5000000)
                                    ->paginate(12);
                                    //  return $products;
                                }
                        }elseif(Request()->price and Request()->brand ){
                                // Lọc theo giá và hãng sản phẩm
                                    $price=Request()->price;
                                    $brand=Request()->brand;
                                    if($price==1){
                                        $products=product::where('price','>',5000000)
                                        ->where('price','<',10000000)
                                        ->where('the_firm','LIKE',"%{$brand}%")
                                        ->paginate(12);
                                    // return $count;
                                    }
                                    if($price==2){
                                        $products=product::where('price','>',10000000)
                                        ->where('price','<',15000000)
                                        ->where('the_firm','LIKE',"%{$brand}%")
                                        ->paginate(12);
                                        // return $count;
                                    }
                                    if($price==3){
                                        $products=product::where('price','>',15000000)
                                        ->where('price','<',20000000)
                                        ->where('the_firm','LIKE',"%{$brand}%")
                                        ->paginate(12);
                                        // return $count;
                                    }
                                    if($price==4){
                                        $products=product::where('price','>',20000000)
                                        ->where('the_firm','LIKE',"%{$brand}%")
                                        ->paginate(12);
                                        // return $count;
                                    }
                                    if($price==5){
                                        $products=product::where('price','<',5000000)
                                        ->where('the_firm','LIKE',"%{$brand}%")
                                        ->paginate(12);
                                        // return $count;
                                    }

                        }elseif(Request()->price && Request()->species){
                            // Lọc theo giá và loai(danh muc) sản phẩm
                                $price=Request()->price;
                                $species=Request()->species;
                                if($price==1){
                                    $products=product::where('price','>',5000000)
                                    ->where('price','<',10000000)
                                    ->where('productcat_id','=',"{$species}")
                                    ->paginate(12);
                                    //  return $products;
                                }
                                if($price==2){
                                    $products=product::where('price','>',10000000)
                                    ->where('price','<',15000000)
                                    ->where('productcat_id','=',"{$species}")
                                    ->paginate(12);
                                }
                                if($price==3){
                                    $products=product::where('price','>',15000000)
                                    ->where('price','<',20000000)
                                    ->where('productcat_id','=',"{$species}")
                                    ->paginate(12);
                                }
                                if($price==4){
                                    $products=product::where('price','>',20000000)
                                    ->where('productcat_id','=',"{$species}")
                                    ->paginate(12);
                                }
                                if($price==5){
                                    $products=product::where('price','<',5000000)
                                    ->where('productcat_id','=',"{$species}")
                                    ->paginate(12);
                                }

                        }elseif(Request()->brand && Request()->species){
                                // Lọc theo hãng và loai(danh muc) sản phẩm
                                    $brand=Request()->brand;
                                    $species=Request()->species;
                                        $products=product::where('the_firm','LIKE',"%{$brand}%")
                                        ->where('productcat_id','=',"{$species}")
                                        ->paginate(12);
                        }elseif(Request()->price){
                            // Lọc theo giá sản phẩm
                                $price=Request()->price;
                                if($price==1){
                                    $products=product::where('price','>',5000000)
                                    ->where('price','<',10000000)
                                    ->paginate(12);
                                }
                                if($price==2){
                                    $products=product::where('price','>',10000000)
                                    ->where('price','<',15000000)
                                    ->paginate(12);
                                }
                                if($price==3){
                                    $products=product::where('price','>',15000000)
                                    ->where('price','<',20000000)
                                    ->paginate(12);
                                }
                                if($price==4){
                                    $products=product::where('price','>',20000000)
                                    ->paginate(12);
                                }
                                if($price==5){
                                    $products=product::where('price','<',5000000)
                                    ->paginate(12);
                                }
                        }elseif(Request()->brand){
                            // Lọc theo hãng sản phẩm
                                $brand=Request()->brand;
                                    $products=product::where('the_firm','LIKE',"%{$brand}%")
                                    ->paginate(12);
                        }elseif(Request()->species){
                            // Lọc theo danh mục sản phẩm
                                $species=Request()->species;
                                    $products=product::where('productcat_id','=',"{$species}")
                                    ->paginate(12);
                        }
                        else{
                            $products=product::paginate(12);
                        }
                }
                $slider = sliceder::all();
        return view('index',compact('products','productcats','the_firms' , 'slider' , 'productcat'));
    }
}
