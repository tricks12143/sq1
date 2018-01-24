<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;

class blogcontroller extends Controller
{
    function insertblog(Request $request){
    	$this->validate($request, [
    		'blog_title'=>'required',
    		'blog_content'=>'required'
    		]);
    	$input = $request->file('blog_img');
        $destinationPath = "img/blog/"; // path to save to, has to exist and be writeable
        $contentval = $request->file('blog_img')->getClientOriginalName(); // original name that it was uploaded with
        $input->move($destinationPath,$contentval); // moving the file to specified dir with the original name
        
    	$blogs = new blog;
    	$blogs->title = $request->input('blog_title');
    	$blogs->contents = $request->input('blog_content');
    	$blogs->cover_image = $contentval;
        $blogs->status = 'active';
    	$blogs->save();
		
		return redirect("/blog")->with('info', 'Blog successfully updated');
    }

    function getblogs(){
    	$strval = "";
    	$blogs = blog::All();
    	if(!empty($blogs)){
    		foreach ($blogs as $blog) {
    			$strval .= '<tr>
    							<td><a href="./editblog/'.$blog->blogid.'">edit</a></td>
    							<td><a href="./trash/'.$blog->blogid.'">trash</a></td>
			                	<td><img width="100" src="'.asset('/img/blog').'/'.$blog->cover_image.'" /></td>
			                  	<td>'. $blog->title .'</td>
			                  	<td>'. $blog->contents .'</td>
			                  	<td>'. $blog->by .'</td>
			                  	<td>'. $blog->created_at .'</td>
			                  	<td>'. $blog->updated_at .'</td>
			                </tr>';
    		}
    	}
			echo $strval;
    }

    function editblogs($id){
    	$blogs = blog::where('blogid', $id)->get();

    	return view('/admin/editblog', ['blogs' => $blogs]);
    }

    function modifyblog(Request $request){
        if(!empty($request->file('blog_img'))){
                
            
            $input = $request->file('blog_img');
            $destinationPath = "img/blog/"; // path to save to, has to exist and be writeable
            $contentval = $request->file('blog_img')->getClientOriginalName(); // original name that it was uploaded with
            $input->move($destinationPath,$contentval); // moving the file to specified dir with the original name

            $data = array(
                'cover_image'=>$contentval,
                'title'=>$request->input('blog_title'),
                'contents'=>$request->input('blog_content')
            );
        }
        else{
            $data = array(
            'title'=>$request->input('blog_title'),
            'contents'=>$request->input('blog_content')
            );
        }
        
        blog::where('blogid', session('blogid'))
        ->update($data);

        return view('admin.blog');
    }

    function getthumbblogs(){
        $strval = '<div class="row">';
        $blogs = blog::All();
        if(count($blogs)>0){
            foreach ($blogs as $blog) {
                $strval .= '<div class="col-md-4">
                <div class="thumbnail">
                  <div class="thumb-paragraph">
                    <div class="thumb-img" style="background-image:url('.asset('img/blog') .'/'. $blog->cover_image.');">
                      
                    </div>
                    <div class="thumb-body">
                        <h4>'.$blog->title.'</h4>
                        <p>'.$blog->contents.'</p>
                    </div>
                  </div>
                </div>
              </div>';
            }
        }
        $strval .= '</div>';
            echo $strval;
    }

}
					
			                
			                
			              