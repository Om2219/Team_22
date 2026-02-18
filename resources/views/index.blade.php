<x-layout>
   
    {{-- <div class="home-master">
        <div class="home-banner">
            <img src="/images/logo_updated.png">
            <div class="business-description">
                <h1>Roots, where creativity comes to thrive</h1> <!--slogan-->
                <p>At Roots, we sell products such as books, toys, stationery, and more. These can be viewed below:</p> <!--website description-->
                <a href="/products" class="allProducts">Shop All Products</a>
            </div>
        </div>
        
        <h2>Browse Our Collections</h2>

        <section class="category-section">
            <div class="categories">
                <a href="/products/ArtCraft" class="category-box">
                    <h3>Arts & Crafts</h3>
                    <p>Arts & Crafts for artists and painters to work with, and for people to enjoy their hobbies.</p>
                </a>
            
                <a href="/products/Toys" class="category-box">
                    <h3>Toys</h3>
                    <p>Toys such as action figures and toy cars for children to play with.</p>
                </a>

                <a href="/products/Stationery" class="category-box">
                    <h3>Stationery</h3>
                    <p>Stationery for students, to help with their studies.</p>
                </a>

                <a href="/products/Books" class="category-box">
                    <h3>Books</h3>
                    <p>Books by Roots, for people to read through in their own time.</p>
                </a>

                <a href="/products/Office" class="category-box">
                    <h3>Office Supplies</h3>
                    <p>Office supplies so workers never miss out on their necessary supplies.</p>
                </a>
            </div>
        </section>
    </div> --}}

{{-- <div class="liveBg">
    <video 
        src="{{ asset('videos/Monkeys.mp4') }}" 
        id="bg-video" 
        muted 
        playsinline
        preload="auto"
    ></video>
</div>

<div class="scroll-spacer"></div> --}}

    <div class="animBg">
        {{-- we can change the background to something more fitting this is tempoary --}}
        <img src="{{ asset('images/Mint.png') }}">
    </div>

    <img id="pen" src="{{ asset('images/Pen.png') }}">
    {{-- <img id="holder" src="{{ asset('images/hold.png') }}"> --}}

    <div class="dos">
        {{-- all things for the scroller needs to be in dos  --}}
        <div class="home-master">

            <section class="hero">
                <div class="home-banner">
                    <img src="/images/logo_updated.png">

                    <div class="business-description">
                        <h1>Roots, where creativity comes to thrive</h1>
                        <p>
                            At Roots, we sell products such as books, toys, stationery, 
                            and more. These can be viewed below:
                        </p>
                    </div>
                </div>
            </section>

            <section class="scroll-section ">
                <!-- This section exists just to give scroll space -->
                <div class="blockUno">

                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <div class="blockDos">

                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <div class = "blocktres">
                </div>
            </section>



            <section class="collections">
                <h2>Browse Our Collections</h2>

                <div class="categories">
                    <a href="/products/ArtCraft" class="category-box">
                        <h3>Arts & Crafts</h3>
                        <p>Arts & Crafts for artists and painters.</p>
                    </a>

                    <a href="/products/Toys" class="category-box">
                        <h3>Toys</h3>
                        <p>Toys such as action figures and toy cars.</p>
                    </a>

                    <a href="/products/Stationery" class="category-box">
                        <h3>Stationery</h3>
                        <p>Stationery for students.</p>
                    </a>

                    <a href="/products/Books" class="category-box">
                        <h3>Books</h3>
                        <p>Books by Roots.</p>
                    </a>

                    <a href="/products/Office" class="category-box">
                        <h3>Office Supplies</h3>
                        <p>Office supplies for workers.</p>
                    </a>
                </div>
            </section>

        </div>
        
    </div>

</x-layout>