<!-- Section 4: Blogs Section -->
<section id="section-blogs" class="section bg-gray-100">
    <div class="container mx-auto text-center">
        <h3 class="text-4xl font-bold gradient-text mb-6">Latest Insights & Blogs</h3>
        <p class="text-lg text-gray-600 mb-8">Explore insights on financial strategies, market trends, and investment tips.</p>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <!-- Dynamically generated blog cards using Blade -->
            @foreach ($blogs as $blog)
                <div class="blog-card bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ $blog->image_url }}" alt="Blog Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h4 class="text-xl font-bold mb-2">{{ $blog->title }}</h4>
                        <p class="text-gray-700 text-sm mb-4">{{ $blog->summary }}</p>
                        <p class="text-gray-500 text-xs">By {{ $blog->author }} • {{ $blog->post_date->format('M d, Y') }}</p>
                        <a href="/blog/{{ $blog->slug }}" class="block mt-4 text-yellow-500 font-semibold hover:underline">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


</div>

<!-- Internal Styles -->
<style>
    .section {
        padding: 4rem 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .container {
        width: 100%;
        max-width: 1280px; /* Adjust width as needed */
        margin: 0 auto;
        padding: 0 1rem;
    }

    #blogs-container, #magazines-container {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* 4 columns */
        gap: 20px;
    }

    @media (max-width: 1024px) {
        #blogs-container, #magazines-container {
            grid-template-columns: repeat(2, 1fr); /* 2 columns for smaller screens */
        }
    }

    @media (max-width: 768px) {
        #blogs-container, #magazines-container {
            grid-template-columns: 1fr; /* 1 column for mobile screens */
        }
    }
</style>


<!-- Internal Scripts -->
<script>
public function showBlogs()
{
    $blogs = Blog::all(); // Fetch all blogs or perform any filtering needed
    return view('your_view_name', ['blogs' => $blogs]);
}

</script>
