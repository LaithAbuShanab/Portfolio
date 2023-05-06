<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Carbon;
use Image;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    }

    public function AddBlog()
    {
        $category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_add', compact('category'));
    }

    public function StoreBlog(Request $request)
    {
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::class::make($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_image' => $save_url,
            'blog_description' => $request->blog_description,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog')->with($notification);
    }

    public function EditBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_edit', compact('blogs', 'category'));
    }

    public function UpdateBlog(Request $request)
    {
        $blog_id = $request->id;

        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::class::make($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/' . $name_gen;

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Blog Updated With Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog')->with($notification);
        } else {
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
            ]);

            $notification = array(
                'message' => 'Blog Updated Without Image Successfully ',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog')->with($notification);
        }
    }

    public function DeleteBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $img = $blogs->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DetailsBlog($id)
    {
        $allblogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::findOrFail($id);
        $category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog_details', compact('blogs', 'allblogs', 'category'));
    }

    public function CategoryBlog($id)
    {
        $category_name = BlogCategory::find($id);
        $allblogs = Blog::latest()->limit(5)->get();
        $category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $blogpost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        return view('frontend.cat_blog_details', compact('blogpost', 'allblogs', 'category', 'category_name'));
    }

    public function HomeBlog()
    {
        $allblogsresent = Blog::latest()->limit(5)->get();
        $allblogs = Blog::latest()->paginate(3);
        $category = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog', compact('allblogs', 'category', 'allblogsresent'));
    }
}
