<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;//KHai bao thu vien nay de su dung ham ma hoa Hash hon MD5 rat nhieu
use App\postcat;
use App\post;
class AdminPostController extends Controller
{
    function __construct(){
        $this->middleware(function($request,$next){
                    // Su dung middleware toi uu cho active module_active
            //  Su dung middleware de rang buoc cai session khi di vao moi module, sesion se duoc thay doi theo thiet lap o moi module
            // Neu khong co middleware thi session luon lay cai dau tien la dashbord->khong dung yeu cau bai toan dat ra->HAY
            Session(['module_active'=>'post']);
            return $next($request);
        });
    }


        //Xay dung module post
        function list(Request $request){
            $postcatrac=postcat::onlyTrashed()->get();
            // return $postcatrac;
            $postswith=postcat::withTrashed()->get();
            // return $postswith;
            $status=request()->input('status');
            // Phan 24 bai 277 : Xoa vinh vien user
            $list_act = [
                'delete'=>'Xóa tạm thời'
            ];
            if($status=='trash'){
                $list_act = [
                    'restore'=>'Khôi phục',
                    'forceDelete'=>'Xóa vĩnh viễn',
                ];
                // $users=User::all(); //loi vi da su dung thung rac
                // $users=User::withoutTrashed()->paginate(5); //ElequentORM : lay nhung ban ghi ngoai thung rac
                $posts=post::onlyTrashed()->paginate(8); //ElequentORM : lay nhung ban ghi trong thung rac

            }else{
                // Phan 24 bai 269 : viet chuc nang tim kiem nguoi dung
                $keyword="";
                if($request->input('keyword')){
                    $keyword=$request->input('keyword');
                }
                $posts=post::where('name','LIKE',"%{$keyword}%")->paginate(8);
    // "%{$keyword}%" : Cach lay bang users theo toan tu LIKE

                //$users=User::withTrashed()->where('name','LIKE',"%{$keyword}%")->paginate(5);//xuat ca nhung thang da xoa tam thoi
                //dd($users);//In du lieu print
                //dd($users->total());//In du lieu print
                // Phan 24 bai 268
                // $users=User::all();
               // $users=User::paginate(1);//Thuc hien phan trang( de 10 user tren 1 ban ghi chang han)
                // return $user;
            }
            $count_user_active=post::count(); //phuong thuc lay so luong cua ORM->HAY
            $count_user_trash=post::onlyTrashed()->count();//phuong thuc lay so luong cua ORM->HAY
            $count=[$count_user_active,$count_user_trash];
            // $posts=post::paginate(3);
            // return $posts;
            // foreach($posts as $key=>&$post){
            //     $post['title'] = post::find($post->id)
            //     ->postcat->name;
            //     // return $post->postcat;
            // }
            // return $posts;
            // echo "<pre>";
            // print_r($posts);
            // echo "</pre>";
             // * Kiểm tra xem thử 1 bài viết do user nào tạo ra
    //   $title=post::find(3) // 5 là id của bảng post,từ id này lấy ra postcats_id sang bảng postcat lấy postcat có id=user_id bên bảng post
    //   ->postcat; //Truy cạp vào thằng user(phương thức user của post model)
    //   return $title;
            // $posts=postcat::find(1)
            // ->posts;
            // return $posts;

            return view('admin.post.list',compact('posts','count','list_act'));
        }

// Them bai viet
        function addpost(){
            $postcats=postcat::all();
            // foreach($postcats as $name){
            //     echo $name->name."<br>";
            // }
            return view('admin.post.postadd',compact('postcats'));
        }
// Xu ly them bai viet
        function store(Request $request){

            $input=$request->all();
            // return $input;
            // $postcat=$request->postcat;
            // return  $postcat;
            // return $request->file;
            // return $request->input('file');
            // return $input['file']->getClientOriginalName();
            // if($request->hasFile('file')){
            //     //    echo "Có file"."<br>";
            //         $file=$request->file; //Gán biến file vào $request:$request->file goi đến cái thuộc tính trong $request
            //         // echo $file;
            //         // Lấy tên file
            //               $fileName=$file->getClientOriginalName();
            //             //   echo $file->getClientOriginalName();
            //              $path=$file->move('public/uploads',$file->getClientOriginalName());//Chuyển file lên server(trong folder public/uploads)
            //             // echo $path;
            //              $thumbnail='public/uploads/'.$fileName; //Đường dẫn của file lưu vào database
            //             //  echo $thumbnail;
            //              $input['thumbnail']=$thumbnail;
            //             //  echo $input['thumbnail'];
            //         }
            $request->validate(
                [
                    'name' => 'required|string|max:255|min:8|unique:posts',
                    'file'=>'required|image',
                    // 'file' => 'required', 'string','max:255',
                    'content' => 'required|string|min:8|max:255',
                    'postcat'=>'required|string|max:255',
                ],
                [
                    'required'=>':attribute không được để trống',
                    'min'=>':attribute có độ dài ít nhât :min ký tự',
                    'max'=>':attribute có độ dài tối đa :max ký tự',
                    'string'=>':attribute phải dạng chuỗi ký tự',
                    'unique'=>':attribute phải là duy nhất',
                    'image'=>':attribute có dạng file ảnh'
                ],
                [
                    'name' => 'Tiêu đề bài viết',
                    'file' => 'Ảnh',
                    // 'file' => 'Ảnh bài viết',
                    'content' => 'Nội dung bài viết',
                    'postcat'=>'Danh mục bài viết'
                ]);

                if($request->hasFile('file')){
                        $file=$request->file;
                        // echo $file;
                         // $thoigian=time();
                        // Lấy tên file
                              $fileName=$file->getClientOriginalName();

                            // Xu ly trung ten file
                             if(!file_exists('public/image/posts/'.$fileName)){
                                $path=$file->move('public/image/posts',$file->getClientOriginalName());//Chuyển file lên server(trong folder public/uploads)
                                $thumbnail='public/image/posts/'.$fileName; //Đường dẫn của file lưu vào database
                             }else{
                                $newfileName=pathinfo($fileName, PATHINFO_FILENAME)."-".time().".".$file->getClientOriginalExtension();
                                $path=$file->move('public/image/posts',$newfileName);//Chuyển file lên server(trong folder public/uploads)
                                $thumbnail='public/image/posts/'.$newfileName; //Đường dẫn của file lưu vào database
                            }

                            // echo $path;
                            //  $thumbnail='public/products/'.$fileName; //Đường dẫn của file lưu vào database
                            //  echo $thumbnail;
                             $input['thumbnail']=$thumbnail;
                            //  echo $input['thumbnail'];
                        }

            post::create(
                [
                    //   $request->input(),
                      'name'=>$request->input('name'),
                      'thumbnail'=>$input['thumbnail'],
                    //   'thumbnail'=>$input['thumbnail'],
                      'content'=>$request->input('content'),
                      'postcat_id'=>$request->postcat,
                   ]
                );
            return redirect('admin/post/list')->with('status','Đã thêm bài viết thành công');

        }

        // Edit bai viet
        function edit($id){
            // return $id;
            $post=post::find($id);
            $postcats=postcat::all();
            $postcat=postcat::find($post->postcat_id);
            return view('admin.post.edit',compact('post','postcats','postcat'));
        }
        // Cap nhat bai viet
        public function update(Request $request,$id){
            // if($request->input()){
                // dd($request->all());
                //  return $request->input();//xem tat ca
                //  return $request->all();//xem tat ca
            //  }
            $request->validate(
                [
                    'name' => 'required|string|max:255|min:8|unique:posts',
                    'file'=>'required|image',
                    'content' => 'required|string|min:8|max:255',
                    'postcat'=>'required|string|max:255',
                ],
                [
                    'required'=>':attribute không được để trống',
                    'min'=>':attribute có độ dài ít nhât :min ký tự',
                    'max'=>':attribute có độ dài tối đa :max ký tự',
                    'string'=>':attribute phải dạng chuỗi ký tự',
                    'unique'=>':attribute phải là duy nhất',
                    'image'=>':attribute có dạng file ảnh'
                ],
                [
                    'name' => 'Tiêu đề bài viết',
                    'file' => 'Ảnh',
                    'content' => 'Nội dung bài viết',
                    'postcat'=>'Danh mục bài viết'
                ]);

            if($request->hasFile('file')){
                $file=$request->file;
                // echo $file;
                 // $thoigian=time();
                // Lấy tên file
                      $fileName=$file->getClientOriginalName();
                    // Xu ly trung ten file
                     if(!file_exists('public/image/posts/'.$fileName)){
                        $path=$file->move('public/image/posts',$file->getClientOriginalName());//Chuyển file lên server(trong folder public/uploads)
                        $thumbnail='public/image/posts/'.$fileName; //Đường dẫn của file lưu vào database
                     }else{
                        $newfileName=pathinfo($fileName, PATHINFO_FILENAME)."-".time().".".$file->getClientOriginalExtension();
                        $path=$file->move('public/image/posts',$newfileName);//Chuyển file lên server(trong folder public/uploads)
                        $thumbnail='public/image/posts/'.$newfileName; //Đường dẫn của file lưu vào database
                    }

                    // echo $path;
                    //  $thumbnail='public/products/'.$fileName; //Đường dẫn của file lưu vào database
                    //  echo $thumbnail;
                     $input['thumbnail']=$thumbnail;
                    //  echo $input['thumbnail'];
                }
                $path_image_post=post::find($id);
                @unlink($path_image_post->thumbnail);
            post::where('id',$id)->update(
                [
                    'name' => $request->input('name'),
                    'thumbnail'=>$input['thumbnail'],
                    'content' => $request->input('content'),
                    'postcat_id' =>$request->input('postcat'),
                ]
                );
                    return redirect('admin/post/list')->with('status','Đã cập nhật bài viết thành công');

            }
        // Xoa bai viet
        function delete($id){
                $post=post::find($id);
                $post->delete(); //phuong thuc xoa cua ELEQUENT ORM
                return redirect('admin/post/list')->with('status','Đã xóa tạm thời bài viết thành công');
            }
 // Thuc hien tac vu tren nhieu ban ghi cung 1 luc
        function actionpost(Request $request){
            $list_check=$request->input('list_check');
            // <input type="checkbox" name ="list_check[]" value={{$post->id}}>
            // name ="list_check[]" : quy tac dat ten cho checkbox trong php
            // $list_check=$request->all();
            // return $list_check;
            // echo "<pre>";
            // print_r($list_check);
            // echo "</pre>";
           if(isset($list_check)){//Kiem tra $list_check da duoc tao thi
                    // return $request->input('list_check');
                    // return $request->all();
                    if(!empty($list_check)){
                        $test=post::onlyTrashed()
                        ->whereIn('id',$list_check)
                        ->get();
                        $list_post_id=array();
                        foreach($test as $item ){
                            $list_post_id[]=$item->postcat_id;
                        }
                        // return $list_post_id;
                        $act=$request->input('act');
                        if($act=='delete'){
                            post::destroy($list_check);
                            // return redirect('admin/post/list')->with('status','Bạn đã xóa tạm thời bài viết thành công');
                        }
                        if($act=='restore'){
                            // Cau truc lay 1 phan tu trong thung rac theo id
                            // $test=postcat::onlyTrashed()
                            // ->where('id',69)->get();
                            // return $test;
                            if(postcat::onlyTrashed()->get()->count() > 0){
                                postcat::onlyTrashed()
                                ->whereIn('id',$list_post_id) //Khoi phuc danh muc theo mang $list_productcat_id lay o tren
                               ->restore();
                            }
                                post::onlyTrashed()
                                ->whereIn('id',$list_check) //đk:id co thuoc tap hop $list_check hay khong : da hoc cau truc nay trong elequent ORM
                                ->restore();
                            return redirect('admin/post/list')->with('status','Bạn đã khôi phục bài viết thành công');
                        }
                        // Phan 24 bai 277 : Xoa vinh vien user
                        // Cau truc dieu kien cung tuong tu cua mysql phan WHERE IN)
                        if($act=='forceDelete'){
                            $test=post::onlyTrashed()->get();
                            foreach($test as $item){
                                // echo $item->thumbnail."<br>";
                                @unlink($item->thumbnail);
                            }
                            post::onlyTrashed()
                            ->whereIn('id',$list_check) //đk:id co thuoc tap hop $list_check hay khong : da hoc cau truc nay trong elequent ORM
                            ->forceDelete();
                            return redirect('admin/post/list')->with('status','Bạn đã xõa vĩnh viễn bài viết thành công');
                        }
                    }
                    return redirect('admin/post/list')->with('status','Bạn phải chọn hình thức xóa tạm thời, xóa vĩnh viễn hoặc khôi phục');
           }else{
                 return redirect('admin/post/list')->with('status','Bạn cần chọn phần tử cần thực hiện');
           }

    }
        // Them danh muc
        function addcat(){
            $catposts=postcat::all();
            // return $catposts;
            return view('admin.post.addcat',compact('catposts'));
        }
        // Xu ly them danh muc
        function storeaddcat(Request $request){
            // $input=$request->all();
            // return $request->all();

            $request->validate(
                [
                    'name' => 'required|string|max:255|min:5|unique:postcats',
                    // 'file' => 'required'| 'string'|'max:255',

                ],
                [
                    'required'=>':attribute không được để trống',
                    'min'=>':attribute có độ dài ít nhât :min ký tự',
                    'max'=>':attribute có độ dài tối đa :max ký tự',
                    'string'=>':attribute phải dạng chuỗi ký tự',
                    'unique'=>':attribute phải là duy nhất',
                ],
                [
                    'name' => 'Danh mục bài viết',

                ]);
            postcat::create(
                [
                    //   $request->input(),
                      'name'=>$request->input('name'),
                    //   'thumbnail'=>$input['thumbnail'],

                   ]
                );
            return redirect('admin/post/cat/addcat')->with('status','Đã thêm danh mục bài viết thành công');
        }
// Chinh sua danh muc bai viet
        function editcat($id){
            $editcat=postcat::find($id);
            // return $editcat;
            $catposts=postcat::all();
            return view('admin.post.editcat',compact('catposts','editcat'));
        }
// Cập nhat danh mục bài viết
function updatecat(Request $request,$id){
    // return $id;
    $request->validate(
        [
            'name' => 'required|string|max:255|min:5|unique:postcats',
        ],
        [
            'required'=>':attribute không được để trống',
            'min'=>':attribute có độ dài ít nhât :min ký tự',
            'max'=>':attribute có độ dài tối đa :max ký tự',
            'string'=>':attribute phải dạng chuỗi ký tự',
            'unique'=>':attribute phải là duy nhất',
        ],
        [
            'name' => 'Danh mục bài viết',
        ]);
    postcat::where('id',$id)->update(
        [
            'name' => $request->input('name'),
        ]
        );
            return redirect('admin/post/cat/addcat')->with('status','Đã cập nhật danh mục bài viết thành công');
    }
// Xóa danh muc bai viet
        function deletecat($id){
            $deletecat=postcat::find($id);
            // return $deletecat;
            $deletecat->delete(); //phuong thuc xoa cua ELEQUENT ORM

            $deletepost=post::where('postcat_id','=',$id)->delete();
            return redirect('admin/post/cat/addcat')->with('status',"Đã xóa tạm thời danh mục bài viết có id={$id} thành công, bên bảng posts các bản ghi có liên quan postcat_id cũng xóa luôn");
        }

// Xử lý route bai viet phía người dùng
        function post(){
            $listposts=post::all();
            $listcatposts=postcat::all();
            return view('post',compact('listposts','listcatposts'));
        }
        function detailpost($id){
            $post=post::find($id);
            $catpost=postcat::find($post->postcat_id);
            return view('detailpost',compact('post','catpost'));
        }
        function catpost($id){
            $catpost=postcat::find($id);
            // return$catpost;
            $posts=post::where('postcat_id',$id)->get();
            // return $posts;
            return view('catpost',compact('catpost','posts'));
        }

}
