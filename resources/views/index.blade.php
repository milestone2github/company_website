<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags and Title -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mNivesh</title>

    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    <!-- Custom Styles -->
    <!-- <style>
        /* General Styles */
        html, body {
            scroll-behavior: smooth;
            margin: 0;
            height: 100%;
            overflow: hidden; /* Prevent default scrolling */
        }

        body {
            display: flex;
            flex-direction: column;
        }

        #section-description{
            color:#fff;
            padding-bottom: 1rem;
        }

        /* Scroll container */
        .scroll-container {
            scroll-snap-type: y mandatory;
            overflow-y: scroll;
            height: 100vh; /* Full viewport height */
        }

        /* Each section */
        .section {
            scroll-snap-align: start;
            min-height: 100vh; /* Each section takes full viewport height */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 4rem 1rem;
        }

        /* Background colors for sections */
        #section-main-content {
            background-color: #101211; /* Light background */
        }

        #section-our-offerings {
            background-color: #101211; /* Gray background */
        }

        #section-stats {
            background-color: #101211; /* Light gray background */
        }

        #section-blogs {
            background-color: #101211 !important;/* Light background color for the blog section */
             /* Padding to add spacing at the top and bottom */
        }

        #section-magazine {
            background-color: #101211
        }

        /* Set width and height for image */
        #amfilogo {
            width: 100px;  /* Initial width */
            height: auto;  /* Maintain aspect ratio */
        }

        /* Media query for larger screens */
        @media (min-width: 768px) {
            #amfilogo {
                width: 150px;  /* Larger width for larger screens */
            }
        }

         /* Adjusted positioning for the AMFI logo */
         .top-right-logo {
            position: fixed; /* Use fixed positioning to align relative to the viewport */
            top: calc(4rem + 1rem); /* Adjust top position to account for header height */
            right: 1rem;
            z-index: 49; /* Ensure the logo is above other content */
        }

        .gradient-text {
            background: linear-gradient(to bottom right, #fff, #fff0d1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* set white colour to main content text description*/
        #main-content-text {
            color: #f0f0f0; /* Off-white color */
        }

        /* Button styling */
        .button {
            white-space: nowrap;
            border-radius: 0.5rem;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        /* Specific button colors */
        .button-get-started {
            background-color: #4f46e5;
            color: white;
        }

        .button-about-us {
            background-color: #3b82f6;
            color: white;
        }

        /* Hover effects */
        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.15);
        }

        /* Ensure the left and right columns are centered */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1px 3fr; /* Left column takes 2fr, right column 3fr */
            gap: 1rem;
            align-items: center; /* Vertically center-align items */
            width: 100%;
        }

        /* Ensure the left-side offerings grid is centered */
        #offering-container {
            align-self: center; /* Vertically center-align the offerings grid */
        }

        /* Ensure the dynamic-content is also centered */
        #dynamic-content {
            align-self: center; /* Vertically center-align the dynamic content */
        }

        .offerings-grid-item {
            height: calc(16.67vh - 1rem); /* Each item takes up a third of the 75% height, minus gap */
            padding: 0.5rem;
            background-color: #e5e7eb;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-weight: bold;
            white-space: normal;
            overflow-wrap: break-word;
        }

        /* Image styling */
        #frame-image {
            max-height: 300px; /* Increase image size */
            width: 100%; /* Make image responsive to column width */
            object-fit: cover; /* Ensure image fills the container while maintaining aspect ratio */
            border-radius: 0.5rem; /* Optional: Rounded corners */
            align-self: center; /* Center image horizontally */
            margin-top: 1rem;
        }
        #frame-description {
            margin-bottom: 1rem; /* Space between the description and button */
            color: #333;
            margin-top: 0; /* Text color */
        }

        .offerings-grid-item:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
        }

        .vertical-line {
            width: 2px;
            background-color: #ff0;
            height: 75%;
            align-self: center;
        }

        /* Adjust the padding to move content higher */
        /* Right Column: Dynamic Content */
        #dynamic-content {
            padding: 1.5rem;
            background-color: #f8fafc;
            border-radius: 0.75rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 50vh; /* Adjusted minimum height to match left column */
            max-height: 60vh; /* Set an upper limit to prevent overflow */
            height: 60vh; /* Fixed height for consistency */
            box-sizing: border-box;
        }

        /* Align items to the top within the grid */
        #dynamic-content .grid {
            align-items: center; /* Vertically center items within the grid */
        }

        /* Highlighted offerings grid item */
        .highlighted {
            box-shadow: 0 0 20px 5px #ffd700;
        }

        /* Stats Section */
        /* General section styling to ensure it fits within the viewport */
        .section {
            scroll-snap-align: start;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem 1rem;
            box-sizing: border-box;
        }

        /* Stats Section */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Four columns for the first row */
            gap: 0.75rem;
            width: 100%;
            max-width: 1000px;
            margin: auto;
        }

        .large-stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Two columns for the second row */
            gap: 0.5rem;
            width: 100%;
            max-width: 1000px;
            margin: 1rem auto 0 auto;
        }

        /* Stats Item Styling */
        .stats-item {
            background: linear-gradient(135deg, #ffffff, #f0f4ff);
            padding: 0.5rem; /* Reduced padding for compact fit */
            border-radius: 1rem;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            aspect-ratio: 1 / 1;
        }

        .stats-item:hover {
            transform: translateY(-3px);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
        }

        .label {
            font-size: 1.25rem; /* Adjusted font size */
            margin-bottom: 0.5rem;
            background: linear-gradient(45deg, #4f46e5, #7f93f5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .number {
            font-size: 2rem; /* Adjusted font size */
            font-weight: 900;
            background: linear-gradient(45deg, #3b82f6, #00c4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: color 0.3s ease;
        }

        /* Responsive Adjustments */
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr); /* Two columns on medium screens */
            }
            .large-stats-grid {
                grid-template-columns: 1fr; /* One column on medium screens */
            }
        }

        @media (max-width: 640px) {
            .stats-grid, .large-stats-grid {
                grid-template-columns: 1fr; /* One column on small screens */
            }
        }

        .grayscale-img {
            filter: grayscale(100%);
            max-height: 4rem;
        }

        /* Slideshow container styling */
        .slideshow-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .slideshow-image {
            opacity: 0;
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain; /* Maintain aspect ratio without cropping */
            border-radius: 0.5rem;
            transition: opacity 0.5s ease-in-out;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Center the image within the container */
        }

        .slideshow-image.active {
            opacity: 1;
        }




        /* Additional padding for third section heading */
        #third-section-heading {
            padding-top: 1rem;
            margin-bottom: 1rem;
        }

        /* Blog Section */
        .blog-card {
            transition: transform 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-5px); /* Lift effect on hover */
        }

        /* Blog and Magazine Image Styles */
        .blog-card img,
        .magazine-card img {
            width: 100%;         /* Full width of container */
            height: auto;        /* Maintain aspect ratio */
            max-height: 200px;   /* Set a max height as per your layout */
            object-fit: contain;   /* Crop to fit container without distortion */
            border-radius: 0.5rem; /* Optional rounded corners */
            display: block;
            margin: 0 auto;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            #section-blogs .grid {
                grid-template-columns: 1fr; /* Single column on small screens */
            }
        }

        #section-footer .text-gray-400 {
            color: #b8b8b8;
        }

        #section-footer .text-yellow-500:hover {
            color: #ffc44d;
        }

        #section-footer a {
            transition: color 0.3s ease;
        }

        #section-footer i {
            font-size: 1.5rem;
        }

        .button-container {
            padding-top: 1rem; /* Adds space above the button */
            padding-bottom: 1rem; /* Additional padding at the bottom */
            display: flex;
            justify-content: center; /* Center align the button */
        }

        /* Button and Image in Right Column */
        /* Button Styling */
        .button-learn-more {
            background-color: #ffd700; /* Yellow background */
            color: black;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-align: center;
            margin-top: auto; /* Keep button at the bottom */
            align-self: flex-start; /* Align button on the left */
        }
        .button-learn-more:hover {
            background-color: #ccac00; /* Darker yellow on hover */
        }




    </style> -->

    <style>
        /* Basic Resets */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            scroll-behavior: smooth;
            height: 100%;
            overflow: hidden; /* Prevent default scrolling */
        }

        body {
            display: flex;
            flex-direction: column;
        }

        /* Scroll Container */
        .scroll-container {
            scroll-snap-type: y mandatory;
            overflow-y: scroll;
            height: 100vh; /* Full viewport height */
        }

        /* Section Styling */
        .section {
            scroll-snap-align: center;
            min-height: 100vh; /* Full viewport height */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 4rem 1rem;
            background-color: #101211; /* Default dark background */
            color: #fff;
        }

        /* Section-Specific Backgrounds */
        #section-main-content,
        #section-our-offerings,
        #section-stats,
        #section-blogs,
        #section-magazine {
            background-color: #101211;
        }

        /* Content Styling */
        #section-description {
            padding-bottom: 1rem;
            color: #fff;
        }

        .gradient-text {
            background: linear-gradient(to bottom right, #fff, #fff0d1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        #main-content-text {
            color: #f0f0f0; /* Off-white color */
        }

        /* Logo */
        #amfilogo {
            width: 100px;
            height: auto;
        }

        @media (min-width: 768px) {
            #amfilogo {
                width: 150px;
            }
        }

        .top-right-logo {
            position: fixed;
            top: calc(4rem + 1rem);
            right: 1rem;
            z-index: 49;
        }

        /* Button Styling */
        .button {
            white-space: nowrap;
            border-radius: 0.5rem;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .button-get-started {
            background-color: #4f46e5;
            color: white;
        }

        .button-about-us {
            background-color: #3b82f6;
            color: white;
        }

        #third-section-heading {
            padding-top: 1rem;
            margin-bottom: 1rem;
        }


        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.15);
        }

        /* Grid Layouts */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1px 3fr; /* Left 2fr, right 3fr */
            gap: 1rem;
            align-items: center;
            width: 100%;
        }

        /* Offerings Grid */
        #offering-container {
            align-self: center;
        }

        .offerings-grid-item {
            height: calc(16.67vh - 1rem); /* Item height */
            padding: 0.5rem;
            background-color: #e5e7eb;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-weight: bold;
            white-space: normal;
            overflow-wrap: break-word;
            color: #000;
        }

        .offerings-grid-item:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
        }

        .highlighted {
            box-shadow: 0 0 20px 5px #ffd700;
        }

        /* Vertical Divider */
        .vertical-line {
            width: 2px;
            background-color: #ff0;
            height: 75%;
            align-self: center;
        }

        /* Dynamic Content */
        #dynamic-content {
            padding: 1.5rem;
            background-color: #f8fafc;
            border-radius: 0.75rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 50vh;
            max-height: 60vh;
            box-sizing: border-box;
        }

        #frame-title {
            color: #000; /* Set black color for the dynamic content title */
        }

        /* Image Styling */
        #frame-image {
            max-height: 300px;
            width: 100%;
            object-fit: cover;
            border-radius: 0.5rem;
            align-self: center;
            margin-top: 1rem;
        }

        #frame-description {
            margin-top: 0;
            margin-bottom: 1rem;
            color: #333;
        }

        /* Stats Section */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0.75rem;
            width: 100%;
            max-width: 1000px;
            margin: auto;
        }

        .large-stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
            width: 85%;
            max-width: 650px;
            margin: 1rem auto 0;
        }

        .stats-item {
            background: linear-gradient(135deg, #ffffff, #f0f4ff);
            padding: 0.5rem;
            border-radius: 1rem;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            aspect-ratio: 1 / 1;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stats-item-small {
            height: 150px; /* Reduced height */
            background: linear-gradient(135deg, #ffffff, #f0f4ff);
            padding: 0.5rem;
            border-radius: 1rem;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }


        .stats-item:hover {
            transform: translateY(-3px);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* Typography */
        .label {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            background: linear-gradient(45deg, #4f46e5, #7f93f5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .number {
            font-size: 2rem;
            font-weight: 900;
            background: linear-gradient(45deg, #3b82f6, #00c4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: color 0.3s ease;
        }

        /* Blog and Magazine Image Styles */
        .blog-card img,
        .magazine-card img {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: contain;
            border-radius: 0.5rem;
            display: block;
            margin: 0 auto;
        }

        .blog-card h4,
        .magazine-card h4 {
            color: #000; /* Set black color for the blog and magazine titles */
        }


        /* Responsive Adjustments */
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .large-stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .stats-grid, .large-stats-grid {
                grid-template-columns: 1fr;
            }
            #section-blogs .grid {
                grid-template-columns: 1fr;
            }
        }

        /* Footer */
        #section-footer .text-gray-400 {
            color: #b8b8b8;
        }

        #section-footer .text-yellow-500:hover {
            color: #ffc44d;
        }

        #section-footer a {
            transition: color 0.3s ease;
        }

        #section-footer i {
            font-size: 1.5rem;
        }

        /* Floater Styles */
        .button-container {
            padding-top: 1rem;
            padding-bottom: 1rem;
            display: flex;
            justify-content: center;
        }

        /* Button in Right Column */
        .button-learn-more {
            background-color: #ffd700;
            color: black;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-align: center;
            margin-top: auto;
            align-self: flex-start;
            transition: background-color 0.3s ease;
        }

        .button-learn-more:hover {
            background-color: #ccac00;
        }

        /* Grayscale Images */
        .grayscale-img {
            filter: grayscale(100%);
            max-height: 4rem;
        }

        /* Slideshow Container Styling */
        .slideshow-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .slideshow-image {
            opacity: 0;
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
            border-radius: 0.5rem;
            transition: opacity 0.5s ease-in-out;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .slideshow-image.active {
            opacity: 1;
        }

    </style>

    <!-- Scripts -->
    <script>

    document.addEventListener("DOMContentLoaded", function() {
        init(); // Initialize all functionalities.

        function init() {
            loadOfferings().then(() => {
                attachClickHandlersToOfferings();
                setTimeout(() => {
                    highlightInitialOffering(); // Initial delay before starting automatic highlighting
                    startAutomaticHighlighting();
                }, 5000); // 5 seconds delay before first automatic highlight
            });
        }

        async function loadOfferings() {
            const response = await fetch('/api/offerings');
            const offerings = await response.json();
            // console.log('offerings: ', offerings)
            const offeringsContainer = document.getElementById("offering-container");
            offeringsContainer.innerHTML = ''; // Clear existing entries
            offerings.forEach(offering => {
                const div = document.createElement("div");
                div.className = 'offerings-grid-item bg-white rounded-lg shadow-lg overflow-hidden';
                div.setAttribute('data-title', offering.title);
                div.setAttribute('data-description', offering.description);
                div.setAttribute('data-image', offering.image_url);
                div.setAttribute('data-slug', offering.button_link); // Assuming each offering has a direct link
                div.textContent = offering.title;
                offeringsContainer.appendChild(div);
            });
        }

        function attachClickHandlersToOfferings() {
            const offeringsContainer = document.getElementById("offering-container");
            offeringsContainer.addEventListener("click", function(event) {
                const target = event.target.closest('.offerings-grid-item');
                if (target) {
                    highlightItem(target);
                    updateDynamicContent(target);
                }
            });
        }

        function highlightItem(item) {
            document.querySelectorAll('.offerings-grid-item').forEach(offer => {
                offer.classList.remove('highlighted');
            });
            item.classList.add('highlighted');
        }

        function updateDynamicContent(item) {
            const frameTitle = document.getElementById("frame-title");
            const frameDescription = document.getElementById("frame-description");
            const frameImage = document.getElementById("frame-image");
            const learnMoreLink = document.querySelector("#dynamic-content .button-learn-more");

            frameTitle.textContent = item.getAttribute("data-title");
            frameDescription.textContent = item.getAttribute("data-description");
            frameImage.src = item.getAttribute("data-image"); // Ensure this is the correct attribute for image URL
            frameImage.alt = item.getAttribute("data-title"); // Update alt text for accessibility
            frameImage.classList.remove('hidden'); // Make sure the image is not hidden when updated
            learnMoreLink.href = item.getAttribute("data-slug");
            learnMoreLink.textContent = "Learn More"; // Ensure the button text is correct
        }

        function highlightInitialOffering() {
            const firstOffering = document.querySelector('.offerings-grid-item');
            if (firstOffering) {
                firstOffering.click(); // Trigger click to set initial content
            }
        }

        function startAutomaticHighlighting() {
            let index = 0;
            const offerings = document.querySelectorAll('.offerings-grid-item');
            highlightInterval = setInterval(() => {
                offerings[index % offerings.length].click();
                index++;
            }, 5000); // Highlight next item every 5 seconds
        }
    });

        

        // Load blogs dynamically
        async function loadBlogs() {
            const response = await fetch('/api/blogs'); // Replace with actual API endpoint
            const blogs = await response.json();
            // console.log('blogs: ', blogs)

            const blogContainer = document.querySelector("#section-blogs .grid");

            blogs.forEach(blog => {
                const blogCard = document.createElement("div");
                blogCard.classList.add("blog-card", "bg-white", "rounded-lg", "shadow-lg", "overflow-hidden");

                blogCard.innerHTML = `
                    <img src="${blog.image_url}" alt="Blog Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h4 class="text-xl font-bold mb-2">${blog.title}</h4>
                        <p class="text-gray-700 text-sm mb-4">${blog.description}</p>
                        <p class="text-gray-500 text-xs">By ${blog.author} • ${blog.post_date}</p>
                        <a href="/${blog.slug}" class="block mt-4 text-yellow-500 font-semibold hover:underline">Read More</a>
                    </div>
                `;

                blogContainer.prepend(blogCard);
            });
        }

        // Load magazine dynamically
        async function loadmagazine() {
            const response = await fetch('/api/magazines'); // Replace with actual API endpoint
            const magazines = await response.json();
            // console.log('magazine: ', magazines)
            // Sort magazines by release_date in descending order
            magazines.sort((a, b) => new Date(a.release_date) - new Date(b.release_date));

            // console.log('Sorted magazine data:', magazines); // Log sorted data

            const magazineContainer = document.querySelector("#magazine-container");

            magazines.forEach(magazine => {
                const magazinecard = document.createElement("div");
                magazinecard.classList.add("magazine-card", "bg-white", "rounded-lg", "shadow-lg", "overflow-hidden");

                magazinecard.innerHTML = `
                    <img src="${magazine.image_url}" alt="Magazine Image" class="w-full h-32 object-cover">
                        <div class="p-4">
                            <h4 class="text-xl font-bold mb-2">${magazine.issue_name}</h4>
                            <p class="text-gray-700 text-sm mb-4">${magazine.release_date}</p>
                            <a href="/${magazine.slug}" class="block mt-4 text-yellow-500 font-semibold hover:underline">Read More</a>
                        </div>
                `;
                // console.log(magazinecard);
                magazineContainer.prepend(magazinecard);
            });
        }

        

        
        document.addEventListener("DOMContentLoaded", function() {
            loadBlogs();
            loadmagazine();

            async function fetchSectionOneData() {
                try {
                    const response = await fetch('/api/section-one-new');
                    const data = await response.json();

                    //console.log(data);  // Log the response to the console

                    if (data) {
                        document.getElementById("section-title").textContent = data.title || 'Default Title';
                        document.getElementById("section-description").textContent = data.description || 'Default Description';
                        document.getElementById("section-image").src = data.image_url || '/path/to/default/image.jpg';
                    } else {
                        console.error('No data received from API');
                    }
                } catch (error) {
                    console.error('Error fetching section data:', error);
                }
            }

            fetchSectionOneData();
        });

        document.addEventListener("DOMContentLoaded", function () {
            const csrImages = [
                '{{ asset("images/csr/csr1.jpg") }}', 
                '{{ asset("images/csr/csr2.jpg") }}', 
                '{{ asset("images/csr/csr1.jpg") }}'
            ];
            const teamImages = [
                '{{ asset("images/csr/csr1.jpg") }}', 
                '{{ asset("images/csr/csr2.jpg") }}', 
                '{{ asset("images/csr/csr1.jpg") }}'
            ];

            startSlideshow('csr-slideshow-container', csrImages);
            startSlideshow('team-slideshow-container', teamImages);

            function startSlideshow(containerId, images) {
                const container = document.getElementById(containerId);
                let currentIndex = 0;
                container.innerHTML = '';

                images.forEach((src, index) => {
                    const img = document.createElement('img');
                    img.src = src;
                    img.classList.add('slideshow-image');
                    if (index === 0) img.classList.add('active');
                    container.appendChild(img);
                });

                const imgElements = container.querySelectorAll('.slideshow-image');

                function showImage(index) {
                    imgElements.forEach((img, i) => img.classList.toggle('active', i === index));
                }

                setInterval(() => {
                    currentIndex = (currentIndex + 1) % images.length;
                    showImage(currentIndex);
                }, 5000);
            }
        });

    </script>


</head>
<body class="transition-all duration-500">

    <!-- Include Header -->
    @include('includes.header')

    <!-- Include Floater -->
    @include('includes.floater')

    

    <!-- Scroll Container -->
    <div class="scroll-container">
        <!-- Section 1: Main Content Section -->
        <section id="section-main-content" class="section">
            <div class="container mx-auto relative">
                <!-- Top Right Logo -->
                <div class="top-right-logo">
                    <img src="{{ asset('images/AMFI-pageCurl.png') }}" alt="Logo" id="amfilogo" class="inline-block m-0 p-0">
                </div>
                <!-- Two Column Section Below Logo -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start mt-10">
                    <!-- Left Column -->
                    <div class="max-w-lg">
                    <h2 class="text-5xl font-bold mb-6 gradient-text" id="section-title">{{ $sectionData->title }}</h2>
                    <p id="section-description">{{ $sectionData->description }}</p>
                        <div class="flex flex-col md:flex-row gap-4 mb-10">
                            <button class="button button-get-started">Get Started</button>
                            <button class="button button-about-us">About Us</button>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-center">
                                <img src="{{ asset('images/amfi-logo.png') }}" alt="Investment Plans" class="w-full h-auto grayscale-img">
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('images/apmi-logo.png') }}" alt="Mutual Funds" class="w-full h-auto grayscale-img">
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('images/nse-logo.png') }}" alt="SIP Calculator" class="w-full h-auto grayscale-img">
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('images/bse-logo.png') }}" alt="Retirement Planning" class="w-full h-auto grayscale-img">
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="flex justify-center items-start">
                        <img src="{{ $sectionData->image_url}}" alt="Financial Growth" id="section-image" class="w-full max-w-sm md:max-w-md lg:max-w-lg">
                    </div>
                </div>
            </div>
        </section>


        <!-- Section 2: Our Offerings -->
        <section id="section-our-offerings" class="section">
            <div class="container mx-auto">
                <h3 class="text-4xl font-bold gradient-text mb-8">Our Offerings</h3>
                <div class="content-grid">
                    <!-- Left Column with Grid Items -->
                    <div class="grid grid-cols-2 gap-4" id="offering-container">
                        <div class="offerings-grid-item" data-title="Investment Plans" data-description="Choose from a variety of investment plans designed to suit your financial goals." data-image="{{ asset('images/investment_plan.png') }}" data-image="/1234">
                            Investment Plans
                        </div>
                        <div class="offerings-grid-item" data-title="Mutual Funds" data-description="Explore our wide range of mutual funds to grow your wealth." data-image="{{ asset('images/mutual_funds.png') }}" data-image="/1234">
                            Mutual Funds
                        </div>
                        <div class="offerings-grid-item" data-title="SIP Calculator" data-description="Use our SIP calculator to plan your monthly investments." data-image="{{ asset('images/sip_calculator.png') }}" data-image="/1234">
                            SIP Calculator
                        </div>
                        <div class="offerings-grid-item" data-title="Retirement Planning" data-description="Plan your retirement with our tailored solutions." data-image="{{ asset('images/retirement_planning.png') }}" data-image="/1234">
                            Retirement Planning
                        </div>
                        <div class="offerings-grid-item" data-title="Tax Saving" data-description="Save on taxes while growing your investments." data-image="{{ asset('images/tax_saving.png') }}" data-image="/1234">
                            Tax Saving
                        </div>
                        <div class="offerings-grid-item" data-title="Wealth Management" data-description="Comprehensive wealth management services for long-term success." data-image="{{ asset('images/wealth_management.png') }}" data-image="/1234">
                            Wealth Management
                        </div>
                    </div>

                    <!-- Vertical Line Between Columns -->
                    <div class="vertical-line hidden md:block"></div>

                    <!-- Right Column with Dynamic Content Frame -->
                    <div id="dynamic-content" class="p-6 border rounded-lg shadow-lg w-full">
                        <h3 class="text-3xl font-bold mb-4" id="frame-title">Select an Offering</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                            <!-- Left Side: Description and Button -->
                            <div class="flex flex-col">
                                <p class="text-lg mb-4" id="frame-description">Please select an offering from the left to see more details here.</p>
                                <a href="#" class="button button-learn-more mt-6">Learn More</a>
                            </div>
                            <!-- Right Side: Image -->
                            <img src="" alt="" id="frame-image" class="max-w-full h-auto">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3: Stats Section -->
        <section id="section-stats" class="section">
            <div class="container mx-auto">
                <h3 class="text-4xl font-bold gradient-text mb-8">Our Achievements</h3>

                <!-- Stats Grid - First Row with 4 Columns -->
                <div class="stats-grid">
                    <div class="stats-item-small" id="aum-item">
                        <div class="label">AUM (</div>
                        <div class="number" id="aum-number">550</div>
                        <div class="number" id="aum-number"></div>
                    </div>
                    <div class="stats-item-small" id="clients-item">
                        <div class="label">Clients</div>
                        <div class="number" id="clients-number">6765</div>
                    </div>
                    <div class="stats-item-small" id="team-item">
                        <div class="label">Team Members</div>
                        <div class="number" id="team-number">29</div>
                    </div>
                    <div class="stats-item-small" id="years-item">
                        <div class="label">Years in Service</div>
                        <div class="number" id="years-number">18</div>
                    </div>
                </div>

                <!-- Stats Grid - Second Row with 2 Columns -->
                <h3 class="text-4xl font-bold gradient-text mb-8" id="third-section-heading">Our CSR and Team Activities</h3>
                <div class="large-stats-grid">
                    <div class="stats-item slideshow-item" id="csr-slideshow">
                        <div class="slideshow-container" id="csr-slideshow-container">
                            <!-- Slideshow images will be added here by JavaScript -->
                        </div>
                    </div>
                    <div class="stats-item slideshow-item" id="team-slideshow">
                        <div class="slideshow-container" id="team-slideshow-container">
                            <!-- Slideshow images will be added here by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-blogs" class="section bg-gray-100">
            <div class="container mx-auto text-center">
                
                <!-- Blogs Section -->
                <h3 class="text-4xl font-bold gradient-text mb-6">Latest Insights & Blogs</h3>
                <p class="text-lg text-gray-600 mb-8">Explore insights on financial strategies, market trends, and investment tips.</p>
                
                <div id='blog-container' class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <!--blog cards will be rendered here -->
                    <!-- View All Blogs Card -->
                    <div class="blog-card bg-white rounded-lg shadow-lg overflow-hidden flex items-center justify-center">
                        <a href="/all-blogs" class="block text-center text-yellow-500 font-bold text-lg hover:underline">View All Blogs</a>
                    </div>
                </div>
        </selection>
        <section id="section-magazine" class="section bg-gray-100">
            <div class="container mx-auto text-center">
                <!-- Magazines Section -->
                <h3 class="text-4xl font-bold gradient-text mb-6">Latest Magazines</h3>
                <p class="text-lg text-gray-600 mb-8">Browse our collection of insightful magazines covering various financial topics.</p>
                
                <div id='magazine-container' class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Magazine Card 1 -->

                    <!-- View All Magazines Card -->
                    <div class="magazine-card bg-white rounded-lg shadow-lg overflow-hidden flex items-center justify-center">
                        <a href="/all-magazines" class="block text-center text-yellow-500 font-bold text-lg hover:underline">View All Magazines</a>
                    </div>
                </div>
            </div>
        </section>
        <footer id="section-footer" class="section bg-gray-900 text-white py-12">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
                
                <!-- About Us Section -->
                <div class="footer-about">
                    <h4 class="text-xl font-bold mb-4">About mNivesh</h4>
                    <p class="text-gray-400 text-sm">mNivesh is dedicated to helping individuals build a secure financial future. Explore investment plans, mutual funds, and tools tailored to your needs.</p>
                    <a href="/about-us" class="text-yellow-500 hover:underline mt-4 block">Learn More</a>
                </div>
                
                <!-- Quick Links Section -->
                <div class="footer-links">
                    <h4 class="text-xl font-bold mb-4">Quick Links</h4>
                    <ul class="text-gray-400 space-y-2">
                        <li><a href="/investment-plans" class="hover:text-yellow-500">Investment Plans</a></li>
                        <li><a href="/mutual-funds" class="hover:text-yellow-500">Mutual Funds</a></li>
                        <li><a href="/retirement-planning" class="hover:text-yellow-500">Retirement Planning</a></li>
                        <li><a href="/tax-saving" class="hover:text-yellow-500">Tax Saving</a></li>
                        <li><a href="/wealth-management" class="hover:text-yellow-500">Wealth Management</a></li>
                    </ul>
                </div>

                <!-- Important Links Section -->
                <div class="footer-important-links">
                    <h4 class="text-xl font-bold mb-4">Important Links</h4>
                    <ul class="text-gray-400 space-y-2">
                        <li><a href="/disclaimer" class="hover:text-yellow-500">Disclaimer</a></li>
                        <li><a href="/disclosure" class="hover:text-yellow-500">Disclosure</a></li>
                        <li><a href="/forms" class="hover:text-yellow-500">Forms</a></li>
                        <li><a href="/resources" class="hover:text-yellow-500">Resources</a></li>
                    </ul>
                </div>

                <!-- Contact & Social Media Section -->
                <div class="footer-contact">
                    <h4 class="text-xl font-bold mb-4">Get in Touch</h4>
                    <p class="text-gray-400 text-sm">Have questions? Reach out to us via email or connect with us on social media.</p>
                    <p class="mt-2 text-gray-400"><strong>Email:</strong> support@mnivesh.com</p>
                    <div class="flex mt-4 space-x-4">
                        <a href="https://facebook.com/mnivesh" target="_blank" class="text-gray-400 hover:text-yellow-500"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/mnivesh" target="_blank" class="text-gray-400 hover:text-yellow-500"><i class="fab fa-twitter"></i></a>
                        <a href="https://linkedin.com/company/mnivesh" target="_blank" class="text-gray-400 hover:text-yellow-500"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://instagram.com/mnivesh" target="_blank" class="text-gray-400 hover:text-yellow-500"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom Section -->
            <div class="mt-12 text-center text-gray-500 text-sm border-t border-gray-700 pt-4">
                <p>&copy; 2024 mNivesh. All rights reserved. | <a href="/terms" class="hover:underline text-yellow-500">Terms of Service</a> | <a href="/privacy" class="hover:underline text-yellow-500">Privacy Policy</a></p>
            </div>
        </footer>






    </div>
    <script src="{{ asset('js/header.js') }}"></script>
</body>
</html>