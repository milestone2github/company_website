<div id="floater-sidebar" class="fixed top-1/2 right-0 transform -translate-y-1/2 z-50 bg-gray-800 text-white rounded-lg shadow-lg w-12 h-auto flex flex-col items-center">
    <!-- Toggle Button to Collapse/Expand -->
    <button onclick="toggleSidebar()" class="bg-gray-100 p-1 rounded-full mb-2">
        <img src="{{ asset('images/icons/toggle.png') }}" alt="Toggle Sidebar" class="w-5 h-5 text-yellow-400">
    </button>

    <!-- Accessibility Options -->
    <div id="sidebar-content" class="space-y-4 hidden text-center">
        <!-- Color Blind Mode Toggle -->
        <button onclick="toggleColorBlindMode()" class="p-1 rounded-full bg-gray-100 hover:bg-yellow-500">
            <img src="{{ asset('images/icons/color-blind.png') }}" alt="Color Blind Mode" class="w-5 h-5">
        </button>
        
        <!-- Increase Font Size -->
        <button onclick="increaseFontSize()" class="p-1 rounded-full bg-gray-100 hover:bg-yellow-500">
            <img src="{{ asset('images/icons/font-increase.png') }}" alt="Increase Font Size" class="w-5 h-5">
        </button>

        <!-- Reset Font Size -->
        <button onclick="resetFontSize()" class="p-1 rounded-full bg-gray-100 hover:bg-yellow-500">
            <img src="{{ asset('images/icons/font-reset.png') }}" alt="Reset Font Size" class="w-5 h-5">
        </button>

        <!-- Decrease Font Size -->
        <button onclick="decreaseFontSize()" class="p-1 rounded-full bg-gray-100 hover:bg-yellow-500">
            <img src="{{ asset('images/icons/font-decrease.png') }}" alt="Decrease Font Size" class="w-5 h-5">
        </button>

        <!-- Dark Mode Toggle -->
        <!-- <button onclick="toggleDarkMode()" class="p-1 rounded-full bg-gray-100 hover:bg-yellow-500">
            <img src="{{ asset('images/icons/dark-mode.png') }}" alt="Dark Mode" class="w-5 h-5">
        </button> -->
    </div>
</div>

<!-- Script for Sidebar Functionality -->
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar-content');
        sidebar.classList.toggle('hidden');
    }

    function toggleColorBlindMode() {
        document.body.classList.toggle('color-blind-mode');
    }

    function increaseFontSize() {
        document.documentElement.style.fontSize = (parseFloat(getComputedStyle(document.documentElement).fontSize) + 2) + 'px';
    }

    function resetFontSize() {
        document.documentElement.style.fontSize = '100%';
    }

    function decreaseFontSize() {
        document.documentElement.style.fontSize = (parseFloat(getComputedStyle(document.documentElement).fontSize) - 2) + 'px';
    }

    // Toggle Dark Mode and save preference
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
        const isDarkMode = document.body.classList.contains('dark-mode');
        localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
    }

    // Load theme based on saved preference on page load
    document.addEventListener("DOMContentLoaded", function() {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.body.classList.add('dark-mode');
        }
    });

    let isDragging = false;
    const floater = document.getElementById('floater-sidebar');

    floater.addEventListener('mousedown', function(e) {
        isDragging = true;
        let startY = e.clientY - floater.getBoundingClientRect().top;

        function move(e) {
            if (isDragging) {
                let newY = e.clientY - startY;
                newY = Math.max(0, Math.min(newY, window.innerHeight - floater.offsetHeight));
                floater.style.top = newY + 'px';
            }
        }

        function stopDragging() {
            isDragging = false;
            document.removeEventListener('mousemove', move);
            document.removeEventListener('mouseup', stopDragging);
        }

        document.addEventListener('mousemove', move);
        document.addEventListener('mouseup', stopDragging);
    });
</script>

<!-- Custom Styles -->
<style>
    .color-blind-mode {
        filter: grayscale(100%);
    }
    .p-1 img {
        width: 1.25rem;
        height: 1.25rem;
    }
    #floater-sidebar {
        transition: top 0.3s ease;
        padding-top: 0.5rem;
    }
    .p-1:hover img {
        transform: scale(1.1);
    }
</style>
