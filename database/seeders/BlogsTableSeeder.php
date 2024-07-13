<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Loop to create 60 blog records
        for ($i = 1; $i <= 60; $i++) {
            // Generate a blog record using Laravel's model factory
            $blog = Blog::factory()->create();

            // Path to the image file in the public directory
            $imagePath = public_path('que-es-un-blog-1.webp');

            // Check if the file exists
            if (file_exists($imagePath)) {
                // Generate a unique file name for storing in storage
                $uniqueFileName = Str::random(40) . '.webp';

                // Store the image in 'public/uploads/blogs' directory within the 'public' disk
                $storedPath = Storage::disk('public')->putFileAs('uploads/blogs', $imagePath, $uniqueFileName);

                // Attach the stored image path to the blog model instance
                $blog->image = $storedPath;
                $blog->save();
            } else {
                // Handle the case where the image file doesn't exist
                $this->command->info("Image file not found: $imagePath");
            }
        }
    }
}
