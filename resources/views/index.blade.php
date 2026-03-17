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

    <!--<div class="animBg">
        {{-- we can change the background to something more fitting this is tempoary --}}
        <img src="{{ asset('images/Mint.png') }}">
    </div>-->

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
                            and more. 
                            <br> These can be viewed below along with our community:
                        </p>
                    </div>
                </div>
            </section>

            <section class="scroll-section ">
                <!-- This section exists just to give scroll space -->
                <div class="blockUno">
                    <div class="card shadow-lg border-0 mb-4 text-center">
                        <h1 class = "display-3 fw-bold "> Hear the communities thoughts</h1>
                    </div>
                 <img id="first" src="{{ asset('images/blockOne.png') }}">
                 <br>
                 <br>
                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <div class="blockDos">
                 <div class="card shadow-lg border-0 mb-4 text-center">
                    <h1 class = "display-3 fw-bold "> Meet The Mascot </h1>
                 </div>
                 <img id="second" src="{{ asset('images/blockTwo.png') }}">
                 <br>
                 <br>
                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                {{-- <div>
                <h3> get back to monkey business </h3> 
                <img class = "blocktres" src="{{ asset('images/blockThree.png') }}">
                 <br>
                 <br>
                </div> --}}
                <div class = "blocktres" >
                    {{-- <h3> get back to monkey business </h3> --}}
                    <h1 class = "display-3 fw-bold "> Product of the Month </h1>
                    
                    <div class="row align-items-center g-5">
                        <div class="col-md-5 text-center">
                            <img id ="third" src="{{ asset('images/products/Suja the Goat.png') }}">
                        </div>
                        <div class="col-md-7 g-5">
                                <h3> THE SUJA THE GOAT </h3><br>
                                <p class="lead">
                                    A roots favourite, Suja the Goat has officially claimed the title of 
                                    <em>Greatest Of All Time</em>.
                                    Dressed in a stunning coat of emerald green fluff, Suja isn't 
                                    just a plush, he is a friend, a icon, a cuddly sensation taking the toy world by storm.
                                </p> <br>
                                <div class="card shadow-sm rounded-3 border-0 mb-4 text-center">
                                    <p class="mb-0"><strong>REPORTER'S NOTE:</strong> Sources confirm that Suja is 100% squishable and 
                                    highly likely to steal your heart (and your favorite spot on the sofa). Get the full story 
                                    before he sells out!</p>
                                </div>
                        </div>
                    </div>
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