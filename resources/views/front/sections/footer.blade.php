<section class="container pt-[100px]">
    <div class="ncg-info rounded-lg mb-8">
        <div class="containerncg grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Left Column: Text -->
            <div class="holderncg space-y-4">
                <p class="text-black text-2xl font-semibold">
                    Looking for medical supplies and healthcare products?
                </p>
                <p class="text-[#626A77] text-base leading-relaxed">
                    National Care Group offers a wide range of medical and healthcare products for professionals and
                    individuals worldwide.
                    Whether you need personal protective equipment, diagnostic tools, or daily care items, we've got you
                    covered.
                </p>
                <p class="text-[#626A77] text-base leading-relaxed">
                    Explore our product catalog and connect with our customer support team for personalized assistance.
                </p>
            </div>

            <!-- Right Column: Image -->
            <div class="flex justify-center">
                <a href="{{ route('product.index') }}">
                    <img src="{{ asset('image/medical-supplies.svg') }}" class="w-64 rounded-md" alt="Medical Supplies"
                        title="National Care Group Medical Supplies">
                </a>
            </div>
        </div>
    </div>
</section>

<section class="container border-t-2">
    <div class="pt-8 pb-8 grid mintab:grid-cols-2 md:grid-cols-4 gap-5 justify-between text-start">
        <div class="flex flex-col items-start justify-between info">
            <a href="{{ route('home') }}" class="flex gap-2 items-center mb-9">
                <img src="{{ asset('image/logo.jpg') }}" alt="National Care Group Logo" class="w-16 h-16" />
                <span class="md:text-2xl text-xl font-semibold text-[#0b1c39]"> National Care Group </span>

            </a>

            <div class="w-3/4 mb-4">
                <p class="text-[#626A77]">
                    National Care Group is a leading provider of medical equipment and healthcare products, trusted by
                    healthcare professionals and institutions worldwide.
                </p>
            </div>
            <div class="footer_contact_info text-primary">
                <h3 class="mb-4">
                    <a href="tel:+1234567890">
                        <i class="fa-solid fa-phone"></i>
                        <span class="ml-1">+1 234 567 890</span>
                    </a>
                </h3>
                <h3 class="mb-4">
                    <a href="mailto:support@nationalcaregroup.com">
                        <i class="fa-regular fa-envelope"></i>
                        <span class="ml-1">support@nationalcaregroup.com</span>
                    </a>
                </h3>
            </div>
        </div>

        <div class="bg-white ">
            <h4 class="text-[#0B1C39] text-lg uppercase font-medium mb-7">Payment Options</h4>

            <p class="text-[#626A77] text-base">
                We accept all major credit cards, debit cards, PayPal, and secure bank transfers for your convenience.
            </p>
        </div>

        <div class="bg-white">
            <h4 class="text-[#0B1C39] text-lg uppercase font-medium mb-7">Return & Refund Policy</h4>
            <p class="text-[#626A77] text-base mb-4">
                Returns accepted within 30 days of purchase. Refunds processed within 7 business days upon receipt of
                returned items.
            </p>
        </div>

        <div class="bg-white">
            <h4 class="text-[#0B1C39] text-lg uppercase font-medium mb-4">National Care Group Ltd</h4>
            <p class="text-[#626A77] text-base">
                250 Healthcare Ave<br>
                Medical Park,<br>
                New York, NY 10001<br>
                United States<br>
                Registered No: 123456789
            </p>
        </div>
    </div>

    <div
        class="flex flex-col md:flex-row items-center justify-between p-8 border-t-2 copy-rights space-y-4 md:space-y-0">
        <div class="text-[#626A77] text-center md:text-left">
            <a href="#" class="text-sm font-bold mr-4">Website Terms & Conditions</a>
            <a href="#" class="text-sm font-bold">Sitemap</a>
        </div>
        <div class="text-[#626A77] ">
            <p></p>
        </div>

        <div class="text-[#626A77] text-center md:text-left">
            {{-- Optional website credits here --}}
        </div>
    </div>

    <div class="flex items-center justify-center p-8 border-t-2 mob:flex-col md:justify-between copy-rights">
        <div class="text-[#626A77] mob:mb-3 mob:text-center">
            <p>© 2025 National Care Group. All rights reserved.</p>
        </div>

        <div class="flex flex-wrap items-center justify-center social_icon">
            <a href="https://www.facebook.com/NationalCareGroup" class="footer-icon"><i
                    class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/NationalCareGroup" class="footer-icon"><i
                    class="fa-brands fa-instagram"></i></a>
            <a href="https://twitter.com/NationalCareGrp" class="footer-icon"><i class="fa-brands fa-twitter"></i></a>
        </div>
    </div>
</section>
