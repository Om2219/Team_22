

<x-layout>
 
    <div class="slideshow-container">

<!-- full -width images-->
<div class="mySlides fade">
    <div class="numbertext"> 1/3</div>
     <img src="{{ asset('images/img1.png') }}"  class="slide-img">
<div class="text"> <h1>Where our Story Begins</h1><p>Every great creation starts with a seed.
ROOTS was born from a simple belief - that creativity grows when it is nurtured. What began as a 
    small passion for beautiful stationery and meaningful handmade crafts soon blossomed into a space 
    where ideas, imagination and inspiration come together. At ROOTS, we believe creativity is not just 
    an activity - it is a journey that starts deep within.</p>

</div>

</div>

<div class="mySlides fade">
    <div class="numbertext"> 2/3</div>
    <img src="{{ asset('images/img1.png') }}"  class="slide-img">
<div class="text"> <h1>Growing Creativity, One Idea At a Time</h1>
<p> From thoughtfully designed notebooks to vibrant art supplies, every product we offer is chosen to 
    spark imagination and encourage self-expression. We support dreamers, makers, writers, students and 
    artists - anyone who believes in the power of creating something beautiful. Our focus is simple: quality, 
    inspiration and tools that help creativity flourish. Because when your tools feel good your ideas grow even better. </p>

</div>

</div>

<div class="mySlides fade">
    <div class="numbertext"> 3/3</div>
     <img src="{{ asset('images/img1.png') }}"  class="slide-img">
<div class="text"> <h1> Rooted in Purpose Made for You</h1>
<p> Roots is more than a brand - it's a community. A place where creativity is celebrated, individuality is 
    valued, and every creation tells a story. Whether you are crafting, learning, writing or discovering new 
    passions, we are here to help you grow deeper roots and reach higher branches.
     Together lets create a world where every idea is planted, nurtured and brought to life. </p>
    
</div>
</div>

   
<!-- next and previous -->

<a class="prev" onclick="plusSlides(-1)"> &#10094;</a>
<a class="next" onclick="plusSlides(1)"> &#10095;</a>

</div>

<!-- the dots/circles -->
 <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>

</div>


<section>
    <div class="section">
    <h2> Roots History</h2>
    <p1> Roots began as a small, family-driven passion for creativity expression and the joy of handmade artistry. 
        What started with designing simple, thoughtfully crafted notebooks and art materials quickly grew into a brand 
        dedicated to nurturing imagination in every home and classroom. Inspired by the idea that creativity starts at the 
        foundation - at our Roots - we set out to provide quality stationery and crafts supplies that empower people of all 
        ages to create, learn and explore. Today Roots continues to grow, rooted in the belief that every 
        idea deserves the chance to flourish. </p>
</div>
</section>


<div class="value_section">
    <h2>Our Value<h2>
        <div class="value_container">
            <div class="value_box">
               <img src="{{ asset('images/symbol.jpg') }}" alt= "Avatar" class ="avatar">
                <p3 class="title">Creativity</p>
            </div>

            <div class="value_container">
            <div class="value_box">
                <img src="{{ asset('images/Quality_Craftsmanship.jpg') }}" alt= "Avatar" class ="avatar">
                <p3 class="title">Quality Craftsmanship</p>
            </div>

            <div class="value_container">
            <div class="value_box">
               <img src="{{ asset('images/Eco-Friendly_mindset.jpg') }}" alt= "Avatar" class ="avatar">
                <p3 class="title">Eco-Friendly mindset</p>
            </div>

            <div class="value_container">
            <div class="value_box">
                <img src="{{ asset('images/Custome-First_aproach.jpg') }}" alt= "Avatar" class ="avatar">
                <p3 class="title">Customer-First approach</p>
            </div>
        </div>

</div>




      <style>
/** this code is for my about us page for section */
        section{
            display: block;
h1,h2, h3{
      font-family: "Times New Roman", Times, serif;
      color: green;
      font-size:30px;
}

p1{
    font-family: "Times New Roman", Times, serif;
      color: green;
      font-size:20px;
}

p3{
    font-family: "Times New Roman", Times, serif;
      color: green;
      font-size:15px;
}

/** this code is for my about us page section value */
        }

        .value_section{
            text-align:center;
            background: snow;
            padding: 40px;
            font-family: Arial, sans-serif;
        }

        .value_section h2{
            color: #1d7d2c;
            margin-bottom: 30px;
        }

        .value_container{
            display:flex;
            justify-content:center;
            gap: 80px;
            margin-top:20px;
        }

        .value_box{
            text-align:center;
            color: #1d7d2c;
            width:150px;
        }

        .value_box img{
            width: 120px;
            margin: 0 auto 10px;
            display: block;

        }
        .value_box .title{
            font-size: 20px;
            font-weight: 500;
            line-height: 1.3;
        }

        </style>




<script>
    let slideIndex = 1;
showSlides(slideIndex);

//next/previous
function plusSlides(n){
    showSlides(slideIndex += n);
}

// thubnail images
function currentSlide(n){
    showSlides(slideIndex = n);
}

function showSlides(n) {

    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if(n > slides.length) {slideIndex = 1}
    if (n < 1){slideIndex = slides.length}
    for(i = 0; i < slides.length; i++){

        slides[i].style.display = "none";
    }
     for(i = 0; i < dots.length; i++){
        dots[i].className = dots[i].className.replace("active", "");
    }
slides[slideIndex - 1].style.display = "block";
dots[slideIndex - 1].className += " active";
}
</script>


</x-layout>

