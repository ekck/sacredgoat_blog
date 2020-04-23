<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogtitle;
use App\Paragraph;
use App\Document;
use App\Gallery;
use App\Category;
use App\Storycategory;
use Illuminate\Support\Facades\Redirect;
use DB;

class AdminController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	return view('admin.index');
    }

    public function newblog()
    {
        $anyundoneblogs = Blogtitle::all()->where('status','=',NULL)->count();
        if($anyundoneblogs>0)
        {
            $undoneblogs = Blogtitle::all()->where('status','=',NULL);
            $categories = DB::table('categories')
                            ->join('storycategory','categories.id','=','storycategory.category_id')
                            ->select('storycategory.blog_id as bid','storycategory.category_id as cid','categories.category as category','categories.id as cateid')
                            ->get();
            return view('admin.choosecomplete',compact('undoneblogs','categories'));
        }
        else{
            $categories = Category::all();
            return view('admin.settitle',compact('categories'));
        }
        dd($anyundoneblogs);

    	$title = Blogtitle::WhereNull('status')->first();  
        if ($title) { 
                $title = $title->title;       
            } 
        else{
            $title = '';
        }
    	$blogpost = Blogtitle::where('title','=',$title)->first();
    	$blogpostid = $blogpost->id;
    	$paragraphs = Paragraph::where('blog_id','=',$blogpostid);
    	$documents = Document::where('blog_id','=',$blogpostid);
    	return view('admin.createblog',compact(['title','paragraphs','documents','blogpostid']));
    }

    public function newblogtitle()
    {
       $categories = Category::all();
       return view('admin.settitle',compact('categories')); 
    }

    public function newtitle(Request $request){

    	$title = new Blogtitle;
    	$title->title = $request->title;
    	if($title->save())
        {
         $id = DB::getPdo()->lastInsertId();
         foreach ($request->data as $value) {             
             $newcategoryblog = new Storycategory;
             $newcategoryblog->blog_id = $id;
             $newcategoryblog->category_id = $value;
             $newcategoryblog->save(); 

        }

        }
    	return 'done';
    }

    public function editblog(Request $request)
    {
        if(Blogtitle::where('id','=',$request->id)->update(['status'=>NULL]))
            {
                return Redirect::to('admin/newblog')->with('message','Continue Editing the blog');
            }
        else{
            return Redirect::back()->with('message','Unable to edit the blog');
        }
    }

    public function deletepost(Request $request)
    {
        if(Paragraph::where('blog_id','=',$request->blogid)->count()>0){

            if(Paragraph::where('blog_id','=',$request->blogid)->delete())
                {
                    Storycategory::where('blog_id','=',$request->blogid)->delete();
                    if(Blogtitle::where('id','=',$request->blogid)->delete())
                        {
                            return Redirect::back()->with('message','The blog has been deleted');
                        }
                }
        }

        else{
            Storycategory::where('blog_id','=',$request->blogid)->delete();
            
            if(Blogtitle::where('id','=',$request->blogid)->delete())
                    {
                        return Redirect::back()->with('message','The blog has been deleted');
                    }
        }
    }

    public function continueedit(Request $request){
        // $blogpost = Blogtitle::where('id','=',$request->id)->first();
        $blogpostid = $request->id;
        $title = Blogtitle::where('id','=',$request->id)->first()->title;
        $categories = DB::table('categories')
                            ->join('storycategory','categories.id','=','storycategory.category_id')
                            ->select('storycategory.blog_id as bid','storycategory.category_id as cid','categories.category as category','categories.id as cateid')
                            ->where('storycategory.blog_id','=',$request->id)
                            ->get();
        $paragraphs = Paragraph::all()->where('blog_id','=',$request->id);
        // $documents = Document::all()->where('blog_id','=',$blogpostid); ,'documents'
        $galleries = Gallery::all()->where('blog_id','=',$request->id);
        return view('admin.createblog',compact(['title','paragraphs','blogpostid','categories','galleries']));
    }

    public function newparagraph(Request $request){
    	$newparagraph = new Paragraph;
    	$newparagraph->paragraph = $request->paragraph;
    	$newparagraph->blog_id = $request->blogpostid;

    	$newparagraph->save();


    }

    public function newdocument(Request $request){
    	dd($request->all());
    }

    public function editcomplete(Request $request){
    	//complete the editing function
        $id = $request->id;

        Blogtitle::where('title','=',$id)->update(['status'=>1]);

        return Redirect::to('admin')->with('message','You have completed Editing the blog. The blog will be displayed on the blog');

    }



    public function categories(){
        $blogtitles = Blogtitle::all();
        $documents = Document::all();
        $paragraphs = Paragraph::all();

        $categories = Blogtitle::distinct()->get(['category']);

        return view('admin.categories',compact(['blogtitles','documents','paragraphs','categories']));
    }

    public function blogs()
    {
        $categories = DB::table('categories')
                            ->join('storycategory','categories.id','=','storycategory.category_id')
                            ->select('storycategory.blog_id as bid','storycategory.category_id as cid','categories.category as category','categories.id as cateid')
                            ->get();

        $blogs = Blogtitle::orderBy('id','desc')->paginate(1);
        $paragraphs = Paragraph::all();
        $documents = Document::all();

        return view('admin.blogs',compact(['blogs','paragraphs','documents','categories']));
    }

    public function testing()
    {
        return view('admin.settitle');
        $counts = Paragraph::where('id','<',6)->count();
        return $counts;
    }

    public function gallery()
    {
        $galleries = DB::table('gallery')
                        ->join('blogtitles','gallery.blog_id','=','blogtitles.id')
                        ->select('gallery.image as image','blogtitles.title as title')
                        ->get();

        return view('admin.gallery',compact(['galleries']));
    }

    public function storeimage(Request $request)
    {

        $check = Gallery::where('blog_id','=',$request->blogpostide)->count();
        if($check>0)
        {
            return Redirect::back()->with('message','There is already an existing image for this blog. You may delete the existing one to add another one!');
        }
        else{            
            $this->validate($request,[
                'image'=>'required|mimes:jpeg,png,gif,jpg',  
                'blogpostide' => 'required|integer',
            ]);
            $imageext = $request->image->extension();
            $imagenameshallbe = $request->blogpostide.".".$imageext;

            $request->image->storeAs('public/gallery',$imagenameshallbe);

            $newGallery = new Gallery;
            $newGallery->blog_id = $request->blogpostide;
            $newGallery->image = $imagenameshallbe;
            

            if($newGallery->save())
            {
                return Redirect::back()->with('message','Image Has been uploaded to the database');
            }
            else{
                return Redirect::back()->with('message','Failed to upload Image to the database');
            }
        }
    }

    public function comments()
    {
        $blogs = Blogtitle::all();
        return view('admin.comments',compact('blogs'));
    }
}
