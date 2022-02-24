<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Corcel\Model\Post;
use Corcel\Model\Taxonomy;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   

    protected function index(){
       $result = array(); 
       $posts = Post::type('medicalbrochure')->status('publish')->get();
       // $posts = Post::published()->newest()->paginate(200);

         if ( $posts ) {
                foreach ( $posts as $key => $post ) {
                    $first_letter = substr($post->post_title,0,1);
                    if( ! empty( $first_letter ) ) {
                        $result[$first_letter][] = array(
                            'ID' => $post->ID,
                            'title' => $post->post_title,
                        );
                    }
                }
            }


        if( ! empty( $result ) ) {
            ksort( $result );
        }

        $categories = Taxonomy::where('taxonomy', 'category')->get();

        // $cat->each(function($category) {
        //     echo $category->name;
        // });

        // foreach ($categories as $cat) {
        //     var_dump($cat) ;
        // }

        

        $viewShareVars = ['result','categories'];
        return view('home',compact($viewShareVars));
    }

   




}


