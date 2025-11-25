

<x-layout>
 
    <div class="slideshow-container">

<!-- full -width images-->
<div class="mySlides fade">
    <div class="numbertext"> 1/3</div>
     <img src="{{ asset('images/img1.jpg') }}"  class="slide-img">
<div class="text"> <h1>Where our Story Begins</h1><p>Every great creation starts with a seed.
ROOTS was born from a simple belief- that creativity grows when it is nurtured. What began as a 
    small passion for beutiful stationary and meanigful handmade crafts soon blossomed into a space 
    where ideas, imagination and inspiration come together. At ROOTS, we believe creativity is not just 
    an activity - it is a journey that starts deep within.</p>

</div>

</div>

<div class="mySlides fade">
    <div class="numbertext"> 2/3</div>
    <img src="{{ asset('images/img1.jpg') }}"  class="slide-img">
<div class="text"> <h1>Growing Creativity, One Idea At a Time</h1>
<p> From thoughtfully designed notebooks to vibrant art supplies, every product we offer is chosen to 
    spark imagination and encourage self-expression. We support dreamers, makers, writers, students and 
    artist - anyone who believes in the power of creating something beutiful. Our focus is simple: quality, 
    inspiration and tools that help creativity flourish. Because when your tools feel good your ideas grow even better. </p>

</div>

</div>

<div class="mySlides fade">
    <div class="numbertext"> 3/3</div>
     <img src="{{ asset('images/img1.jpg') }}"  class="slide-img">
<div class="text"> <h1> Rooted in Purpose Made for You</h1>
<p> Rootsis more than a brand - Its a community. A place where creativity is celebrated, individuality is 
    valued, ane every creation tells a story. Whether you are crafting, learning, writing or discovering new 
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

<style>

*{box-sizing: border-box}

/* slideshow */

.slideshow-container{
max-width: 1000px;
position: relative;
margin:  40px auto 0  auto;
}

/* */
.mySlides{
    display:none;
}


.slide-img{
    width: 100%;
    height: 350px;
    object-fit: cover;
}

/* previous and next button */
.prev, .next{
    cursor:pointer;
position: absolute;
top:50%;
width: auto;
margin-top: -22px;
padding: 16px;
color: white;
font-weight:bold;
font-size:18px;
transition: 0.6s ease;
border-radius: 0 3px 3px 0;
user-select: none;

}

/* position next button */
.next{
    right: 0;
    border-radius: 3px 0 0 px;
}

/* add black bacground color with a little bit see-through */

.prev:hover, .next:hover{
    background-color: rgba(0,0,0,0.8);

}

/*caption text */
.text{
    color: black;
    font-size:25px;
    padding: 8px 12px;
    position: absolute;
    bottom: 20px;
    width: 100%;
    text-align: left;
}

/*number text */
.numbertext{
    color:#f2f2f2;
    font-size:12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

/*dots */
.dot{
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;

}

.active, .dot:hover{
    background-color: #717171;

}

/*  fading animation*/

.fade{
    animation-name: fade;
    animation-duration: 1.5s;
}

@keyframes fade{
    from{opacity: .4}
    to {opacity: 1}
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

