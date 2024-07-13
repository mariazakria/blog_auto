<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('app.admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('app.admin.blog.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|mimes:jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'summary' => 'nullable|string',
            'slug' => 'required|string|unique:blogs,slug',
        ]);

        $blog = new Blog();
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];
        $blog->summary = $validatedData['summary'];
        $blog->slug = $validatedData['slug'];
        $blog->user_id = Auth::id(); 

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/blogs','public');
            $blog->image = $imagePath;
            $blog->path = $imagePath; 
        }

        $blog->save();

        // Redirect to the blogs.show route with the slug parameter
        return redirect()->route('blogs.show', ['slug' => $blog->slug])->with('success', 'Blog created successfully!');
    }




    public function edit($id)
    {
        $blog = Blog::findOrFail($id); 
        return view('app.admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        // Validate the input data
        $validatedData = $request->validate([
            'image' => 'nullable|mimes:jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'summary' => 'nullable|string',
            'slug' => 'required|string|unique:blogs,slug,' . $id,
        ]);

        // dd($validatedData);
        // Find the blog by ID
        $blog = Blog::findOrFail($id);

        // Update text fields
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];
        $blog->summary = $validatedData['summary'];
        $blog->slug = $validatedData['slug'];

        // Check if a new image file is uploaded
        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($blog->image && \Storage::disk('public')->exists($blog->image)) {
                \Storage::disk('public')->delete($blog->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('uploads/blogs', 'public');
            $blog->image = $imagePath;
        }

        // Save the updated blog record
        $blog->save();

        // Redirect back with a success message
        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
    }




    public function destroy($id)
    {
        $blog = Blog::findOrFail($id); 
        $blog->delete();

    return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully!');
    }
    // tb3 elslug 
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('app.guest.blog_index', compact('blog'));
    }

}
