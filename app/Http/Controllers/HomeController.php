<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogtitle;
use App\Document;
use App\Gallery;
use App\Paragraph;
use App\Storycategory;
use App\Comment;
use App\Category;
use DB;

use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        // dd($categories);
        
        $lastblog = Blogtitle::where('status','=',1)->orderBy('id','desc')->first();
        $lasttwo = Paragraph::where('blog_id','=',$lastblog->id)->take(2)->get();
        $lastimage = Gallery::where('blog_id','=',$lastblog->id)->first()->image;
        $categoriesforlast = DB::table('categories')
                            ->join('storycategory','categories.id','=','storycategory.category_id')
                            ->select('storycategory.blog_id as bid','storycategory.category_id as cid','categories.category as category','categories.id as cateid')
                            ->where('storycategory.blog_id','=',$lastblog->id)
                            ->get();

        $lastlife = Storycategory::where('category_id','=',2)->orderBy('id','desc')->first();
        $lastlifetitle = Blogtitle::where('id','=',$lastlife->blog_id)->first()->title;
        $lastonelife = Paragraph::where('blog_id','=',$lastlife->blog_id)->take(1)->get();
        $lastlifeimage = Gallery::where('blog_id','=',$lastlife->blog_id)->first()->image;

        $lastpeople = Storycategory::where('category_id','=',3)->orderBy('id','desc')->first();
        $lastpeopletitle = Blogtitle::where('id','=',$lastpeople->blog_id)->first()->title;
        $lastonepeople = Paragraph::where('blog_id','=',$lastpeople->blog_id)->take(1)->get();
        $lastpeopleimage = Gallery::where('blog_id','=',$lastpeople->blog_id)->first()->image;

        $lastgrowing = Storycategory::where('category_id','=',3)->orderBy('id','desc')->first();
        $lastgrowingtitle = Blogtitle::where('id','=',$lastgrowing->blog_id)->first()->title;
        $lastonegrowingup = Paragraph::where('blog_id','=',$lastgrowing->blog_id)->take(1)->get();
        $lastgrowingimage = Gallery::where('blog_id','=',$lastgrowing->blog_id)->first()->image;

        $lastbooks = Storycategory::where('category_id','=',4)->orderBy('id','desc')->first();
        $lastbookstitle = Blogtitle::where('id','=',$lastbooks->blog_id)->first()->title;
        $lastonebooks = Paragraph::where('blog_id','=',$lastbooks->blog_id)->take(1)->get();
        $lastbooksimage = Gallery::where('blog_id','=',$lastbooks->blog_id)->first()->image;

        $lasttravels = Storycategory::where('category_id','=',5)->orderBy('id','desc')->first();
        $lasttravelstitle = Blogtitle::where('id','=',$lasttravels->blog_id)->first()->title;
        $lastonetravels = Paragraph::where('blog_id','=',$lasttravels->blog_id)->take(1)->get();
        $lasttravelsimage = Gallery::where('blog_id','=',$lasttravels->blog_id)->first()->image;

        $lastrelationships = Storycategory::where('category_id','=',6)->orderBy('id','desc')->first();
        $lastrelationshipstitle = Blogtitle::where('id','=',$lastrelationships->blog_id)->first()->title;
        $lastonerelationships = Paragraph::where('blog_id','=',$lastrelationships->blog_id)->take(1)->get();
        $lastrelationshipsimage = Gallery::where('blog_id','=',$lastrelationships->blog_id)->first()->image;

        $lastbonfire = Storycategory::where('category_id','=',1)->orderBy('id','desc')->first();
        $lastbonfiretitle = Blogtitle::where('id','=',$lastbonfire->blog_id)->first()->title;
        $lastonebonfire = Paragraph::where('blog_id','=',$lastbonfire->blog_id)->take(1)->get();
        $lastbonfireimage = Gallery::where('blog_id','=',$lastbonfire->blog_id)->first()->image;

        $archives = Blogtitle::where('status','=',1)->take(10)->get();


        return view('index',compact(['lastblog','lasttwo','lastimage', 'categoriesforlast', 'lastlife','lastlifetitle','lastlifeimage','lastonelife','lastpeople','lastpeopletitle','lastpeopleimage','lastonepeople','lastgrowing','lastgrowingtitle','lastgrowingimage','lastonegrowingup','lastbooks','lastbookstitle','lastbooksimage','lastonebooks','lasttravels','lasttravelsimage','lasttravelstitle','lastonetravels','lastrelationships','lastrelationshipstitle','lastrelationshipsimage','lastonerelationships','lastbonfire','lastbonfireimage','lastbonfiretitle','lastonebonfire','archives']));

    }

    public function read(Request $request)
    {
        $categories = DB::table('categories')
                        ->join('storycategory','categories.id','=','storycategory.category_id')
                        ->select('storycategory.blog_id as bid','storycategory.category_id as cid','categories.category as category','categories.id as cateid')
                        ->where('storycategory.blog_id','=',$request->id)
                        ->get();
        $paragraphs = Paragraph::where('blog_id','=',$request->id)->get();
        $blog = Blogtitle::where('id','=',$request->id)->first();
        $documents = Document::where('blog_id','=',$request->id)->get();
        $comments = Comment::where('blog_id','=',$request->id)->get();

        return view('readblog',compact(['paragraphs','blog','documents','comments']));
    }

    public function bonfire()
    {
        $archives = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title')
                    ->where('storycategory.category_id','=',1)
                    ->orderBy('blogtitles.id','asc')
                    ->take(10)
                    ->get();

        $stories = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->join('gallery','blogtitles.id','=','gallery.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title','blogtitles.created_at as created_at','gallery.image as image')
                    ->where('storycategory.category_id','=',1)
                    ->get();
        return view('bonfire', compact(['stories','archives']));
    }

    
    public function life()
    {
        $archives = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title')
                    ->where('storycategory.category_id','=',2)
                    ->orderBy('blogtitles.id','asc')
                    ->take(10)
                    ->get();

        $stories = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->join('gallery','blogtitles.id','=','gallery.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title','blogtitles.created_at as created_at','gallery.image as image')
                    ->where('storycategory.category_id','=',2)
                    ->get();
        return view('life', compact(['stories','archives']));
    }


    public function people()
    {
        $archives = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title')
                    ->where('storycategory.category_id','=',3)
                    ->orderBy('blogtitles.id','asc')
                    ->take(10)
                    ->get();

        $stories = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->join('gallery','blogtitles.id','=','gallery.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title','blogtitles.created_at as created_at','gallery.image as image')
                    ->where('storycategory.category_id','=',3)
                    ->get();
        return view('people', compact(['stories','archives']));
    }


    public function growingup()
    {
        $archives = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title')
                    ->where('storycategory.category_id','=',7)
                    ->orderBy('blogtitles.id','asc')
                    ->take(10)
                    ->get();

        $stories = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->join('gallery','blogtitles.id','=','gallery.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title','blogtitles.created_at as created_at','gallery.image as image')
                    ->where('storycategory.category_id','=',7)
                    ->get();
        return view('growingup', compact(['stories','archives']));
    }


    public function books()
    {
        $archives = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title')
                    ->where('storycategory.category_id','=',4)
                    ->orderBy('blogtitles.id','asc')
                    ->take(10)
                    ->get();

        $stories = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->join('gallery','blogtitles.id','=','gallery.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title','blogtitles.created_at as created_at','gallery.image as image')
                    ->where('storycategory.category_id','=',4)
                    ->get();
        return view('books', compact(['stories','archives']));
    }

    public function travel()
    {
        $archives = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title')
                    ->where('storycategory.category_id','=',5)
                    ->orderBy('blogtitles.id','asc')
                    ->take(10)
                    ->get();

        $stories = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->join('gallery','blogtitles.id','=','gallery.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title','blogtitles.created_at as created_at','gallery.image as image')
                    ->where('storycategory.category_id','=',5)
                    ->get();
        return view('travel', compact(['stories','archives']));
    }

    public function relationships()
    {
        $archives = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title')
                    ->where('storycategory.category_id','=',6)
                    ->orderBy('blogtitles.id','asc')
                    ->take(10)
                    ->get();

        $stories = DB::table('blogtitles')
                    ->join('storycategory','blogtitles.id','=','storycategory.blog_id')
                    ->join('gallery','blogtitles.id','=','gallery.blog_id')
                    ->select('blogtitles.id as bid','blogtitles.title as title','blogtitles.created_at as created_at','gallery.image as image')
                    ->where('storycategory.category_id','=',6)
                    ->get();
        return view('relationships', compact(['stories','archives']));
    }

    public function about()
    {
        return view('about');
    }

    public function submitcomments(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'comment'=>'required|string',
        ]);

        $newcomment = new Comment;
        $newcomment->name = $request->name;
        $newcomment->blog_id = $request->blogid;
        $newcomment->comment = $request->comment;
        if($newcomment->save())
        {
            return Redirect::back()->with('message','Thank You for Posting your comment');
        }
        else{
            return Redirect::back()->with('message','Unable to post the pubic comment');
        }
    }
}
