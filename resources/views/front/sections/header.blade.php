<nav>
    <section class="fixed  z-50 w-full bg-white start-0 shadow-md">
        <div id="announcement-bar"
            class=" bg-primary pt-2 pb-2 text-white md:text-sm text-xs md:py-4 px-4 w-full flex items-center justify-between  top-0 z-50">
            <p class="text-center w-full md:w-auto">
                This is our brand new website - please contact us at
                <a href="mailto:info@national-g.com" class="underline hover:text-gray-200">info@national-g.com</a>
                should you have any problems.
            </p>
            <button id="close-announcement" class="absolute right-4  text-white text-lg hover:text-gray-300"
                aria-label="Close announcement">
                &times;
            </button>
        </div>
        <div id="contact-info-header" class="bg-[#f6f7fa] border-b border-gray-200">
            <div class="container flex flex-col items-center justify-between py-4 md:flex-row">
                <div
                    class="flex flex-col items-center justify-center w-full gap-4 md:gap-5 md:justify-start md:flex-row md:w-auto">
                    <span class="flex items-center gap-2 text-sm text-[#0b1c39]">
                        <i class="w-4 h-4 fas fa-phone text-primary"></i>
                        <a href="tel:0800 246 5586" class="hover:text-primary ">0800 246 5586</a>
                    </span>

                    <span class="flex items-center gap-2 text-sm text-[#0b1c39]">
                        <i class="w-4 h-4 fas fa-envelope text-primary"></i>
                        <a href="mailto:info@national-g.com" class="hover:text-primary ">Email: info@national-g.com</a>
                    </span>
                </div>

                <div class="w-full my-4 border-t border-primary md:hidden"></div>

                <div id="contact-info-header-unique"
                    class="gap-2 group flex flex-wrap justify-center md:justify-start text-sm">

                    <a href="{{ route('product.index') }}" class="cursor-pointer hover:text-primary  px-2">Products</a>

                    <a href="#"class="pl-4 border-l border-gray-400 cursor-pointer hover:text-primary  px-2">
                        Log in
                    </a>
                </div>
            </div>
        </div>

        <div class="container flex items-center justify-between py-4 bg-white">
            <button class="text-2xl md:hidden" id="menu-button" aria-label="Toggle menu">
                <i class="fas fa-bars"></i>
            </button>
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('image/logo.jpg') }}" alt="Logo" class="w-10 h-10 rounded-full object-cover" />
                <span class="md:text-2xl text-xl font-semibold text-[#0b1c39]">National Care Group</span>
            </a>

            <ul class="hidden gap-6 text-gray-600 md:flex">
                <li class="relative group">
                    <a class="hover:text-primary  cursor-pointer flex items-center gap-1">Home
                        <i class="fas fa-chevron-down text-xs"></i>
                    </a>
                    <ul
                        class="absolute left-0 flex-col hidden gap-2 px-10 py-5 bg-white rounded-md shadow-md top-full group-hover:flex text-nowrap">
                        <li><a href="#" class="hover:text-primary ">Home 1</a></li>
                        <li><a href="#" class="hover:text-primary ">Home 2</a></li>
                        <li><a href="#" class="hover:text-primary ">Home 3</a></li>
                        <li><a href="#" class="hover:text-primary ">Home 4</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="hover:text-primary  cursor-pointer">Contact info</a>
                </li>
                <li>
                    <a href="{{ route('cart.index') }}" class="text-sm hover:underline flex items-center gap-1">
                        🛒 Cart (<span id="cart-count">{{ count(session('cart', [])) }}</span>)
                    </a>
                </li>
            </ul>

            <a href="{{ route('product.index') }}"
                class="px-6 py-2 text-white bg-teal-500 rounded-full hover:bg-teal-600 transition mob:hidden">
                Products
            </a>

            <!-- add search button -->
            <button id="search" class="hidden md:block text-gray-600 hover:text-primary " aria-label="Search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>

        <!-- Search Content -->
        <div id="content-search" class="overflow-hidden transition-all duration-300 ease-in-out bg-white max-h-0">
            <div class="container pt-3 pb-12">
                <form action="{{ route('search') }}" method="GET" class="flex items-center w-1/2 mx-auto mob:w-full">
                    <input type="text" id="headerSearchInput" name="query"
                        class="w-full border-0 border-b border-[#CECECE] text-[#6b7280] text-lg focus:outline-none focus:ring-0 focus:ring-offset-0"
                        placeholder="Search" aria-label="Search site" />
                </form>
            </div>
            <div class="container" id="headerSearchResults">
                <span class="flex p-4 border-b border-gray-200 mb-7 text-start">
                    <h3 class="text-xl font-semibold text-gray-700">Search results</h3>
                </span>
            </div>
        </div>
    </section>

    <!-- Mobile menu -->
    <div class="md:hidden">
        <div id="mobile-menu-overlay"
            class="fixed top-0 left-0 z-50 hidden w-full h-screen gap-4 bg-black bg-opacity-30"></div>
        <ul id="mobile-menu"
            class="fixed top-0 left-0 z-50 flex flex-col w-2/3 h-screen gap-4 p-4 transition-transform -translate-x-full bg-white">
            <li class="py-4 group border-y">
                <a class="hover:text-primary  cursor-pointer flex items-center gap-1">Home
                    <i class="fas fa-chevron-down text-xs"></i>
                </a>
                <ul
                    class="flex-col hidden gap-2 px-10 py-5 bg-white rounded-md shadow-md group-hover:block text-nowrap">
                    <li><a href="#" class="hover:text-primary  link">Home 1</a></li>
                    <li><a href="#" class="hover:text-primary  link">Home 2</a></li>
                    <li><a href="#" class="hover:text-primary  link">Home 3</a></li>
                    <li><a href="#" class="hover:text-primary  link">Home 4</a></li>
                </ul>
            </li>
            <li class="py-4 group border-y">
                <a class="hover:text-primary  cursor-pointer flex items-center gap-1">
                    Contact info
                    <i class="fas fa-chevron-down text-xs"></i>
                </a>
                <ul
                    class="flex-col hidden gap-2 px-10 py-5 bg-white rounded-md shadow-md group-hover:block text-nowrap">
                    <li><a href="#" class="hover:text-primary  link">Contact info 1</a></li>
                    <li><a href="#" class="hover:text-primary  link">Contact info 2</a></li>
                    <li><a href="#" class="hover:text-primary  link">Contact info 3</a></li>
                    <li><a href="#" class="hover:text-primary  link">Contact info 4</a></li>
                </ul>
            </li>
            <li class="py-4 border-y">
                <a href="#" class="hover:text-primary  link cursor-pointer">Contact info</a>
            </li>
        </ul>
    </div>

    <div id="extra-space" class="h-[177px]"></div>
</nav>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const headerSearchInput = document.getElementById('headerSearchInput');
        const headerSearchResults = document.getElementById('headerSearchResults');
        const defaultImage = '{{ asset('image/default.png') }}';

        headerSearchInput.addEventListener('input', function() {
            const query = headerSearchInput.value.trim();

            if (query.length > 0) {
                fetch(`{{ route('search') }}?query=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        headerSearchResults.innerHTML = '';
                        headerSearchResults.classList.remove('hidden');

                        if (data.products
                            .length > 0) {



                            data.products.forEach(product => {
                                headerSearchResults.innerHTML += `
                                <a href="/product/${product.slug}" class="flex items-center gap-4 p-3 hover:bg-gray-100">
                                    <img src="${product.image ? product.image : defaultImage}" class="w-12 h-12 rounded-md" alt="${product.name}" />
                                    <div>
                                        <h4 class="font-medium">${product.name}</h4>
                                        <p class="text-sm text-gray-500">${new Date(product.created_at).toLocaleDateString('en-US')}</p>
                                    </div>
                                </a>
                            `;
                            });
                        } else {
                            headerSearchResults.innerHTML =
                                '<p class="p-3 text-gray-500">No results found.</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching search results:', error);
                        headerSearchResults.innerHTML =
                            '<p class="p-3 text-red-500">An error occurred while fetching results.</p>';
                    });
            } else {
                headerSearchResults.innerHTML = '';
                headerSearchResults.classList.add('hidden');
            }
        });

        document.addEventListener('click', function(e) {
            if (!headerSearchInput.contains(e.target) && !headerSearchResults.contains(e.target)) {
                headerSearchResults.classList.add('hidden');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        const menuItems = document.querySelectorAll('.menu_item.hasHoverChild > a');

        menuItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const submenu = item.nextElementSibling;
                submenu.classList.toggle('hidden');
            });
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.menu_item')) {
                document.querySelectorAll('.menu_item ul').forEach(submenu => {
                    submenu.classList.add('hidden');
                });
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        const closeAnnouncement = document.getElementById('close-announcement');
        const bar = document.getElementById('announcement-bar');
        const extraSpace = document.getElementById('extra-space');
        closeAnnouncement.addEventListener('click', () => {
            bar.style.display = 'none';

            const header = document.querySelector('section.fixed');
            if (header) {
                header.classList.remove('top-[51px]');
                extraSpace.classList.remove('h-[177px]')
                header.classList.add('top-0');
                extraSpace.classList.add('h-[126px]')

            }
        });
    });
</script>

<style>
    .level_root li a {
        color: #4a5568 !important;
        background-color: white !important;
    }

    .level_root li a:hover {
        color: #2572ff !important;
        background-color: #f7fafc !important;
    }

    .hasHoverChild::after {
        color: #4a5568 !important;

    }
</style>
