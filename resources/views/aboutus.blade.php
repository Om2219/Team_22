<x-layout>
   <div class="About-Us">

<main class="About_Us">
    <h1>What makes us Roots?</h1>
    

<section class="stats_1">
    <div class="card">
        <h3>Inspired From the Start</h3>
        <p> ROOTS was born from the belief that creativity thrives
             when nurtured, growing from a love of stationery and handmade 
            crafts into a space for inspiration....</p>
</div>


    <div class="card">
        <h3>Planting the Seeds of Creativity</h3>
        <p>Every ROOTS product is designed to inspire 
            creativity, self-expression, and beautiful ideas — through quality tools 
            made for dreamers and creators....</p>
</div>

<div class="card">
        <h3>Where Purpose Meets Creativity</h3>
        <p>ROOTS is more than a brand — it’s a community where 
            creativity is celebrated, individuality is valued, 
            and every idea is nurtured to grow....</p>
</div>
</section>

 <h1>Ours Value</h1>
    

<section class="stats_2">
    <div class="card_1">✏️
        <h3>Creativity</h3>
        <p> Creativity is at the heart of ROOTS. We create tools that inspire ideas, imagination, 
            and self-expression in every form.</p>
</div>


    <div class="card_1"> 🧵
        <h3>Craftsmanship</h3>
        <p>Every product is thoughtfully designed and carefully made, with attention to 
            detail, quality, and purpose.</p>
</div>

 <div class="card_1"> 🌿
        <h3>Sustainability</h3>
        <p> We choose mindful materials and responsible practices to support creativity 
            while caring for our planet.</p>
</div>


    <div class="card_1"> 🤍
        <h3>Customer-First</h3>
        <p>Our community comes first. We design with our customers in mind, supporting 
            creators at every step of their journey.</p>
</div>
</section>


<section class="stats_3">
    <div class="card_2">
        <h3>Let Your Ideas Grow</h3>
        <p>Explore our collection of stationery and creative essentials designed to spark imagination.</p>
        <button class = "headbut_1"><a href="/products">Browse Products</a></button>
</div>

</section>


   </div>

</x-layout>
<style>

    .About-Us{
        display: flex;
        min-height: 100vh;
        background-color:#f5f1e8;
        font-family: 'Segoe UI', sans-serif;

    }


.About_Us{
flex:1;
padding: 40px;
background-color: #f5f1e8;
 font-family: 'Segoe UI', sans-serif;
color: #2e2e2e;
}

.About_Us h1{
    margin: 0 0 8px;
    font-size: 2.2rem;
    color:#7a4900;
}

.About_Us p{
 margin: 0 0 28px;
    font-size: 1rem;
    color:#5a5a5a;
}

.stats_1{
    display: grid;
    grid-template-columns:repeat(3,1fr);
    gap: 18px;
    margin-bottom: 30px;
    margin-top: 20px;
}

.card{
    background: #ffffff;
    border-radius: 12px;
    padding: 18px 18px;
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    border-left: 6px solid #bdab53;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}


.card:hover{
    transform: translateY(-2px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.12);
}

.card h3{
    margin: 0 0 10px;
    font-size: 1rem;
    font-weight: 700;
    color: #7a4900;
    letter-spacing: 0.2px;

}

.card p{
    margin: 0;
    font-size: 1rem;
    font-weight: 80;
    color: #2e2e22;
}




.stats_2{
    display: grid;
    grid-template-columns:repeat(4,1fr);
    gap: 18px;
    margin-bottom: 30px;
    margin-top: 20px;
}

.card_1{
    background: #ffffff;
    border-radius: 12px;
    padding: 18px 18px;
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    border-left: 6px solid #bdab53;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}


.card_1:hover{
    transform: translateY(-2px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.12);
}

.card_1 h3{
    margin: 0 0 10px;
    font-size: 1rem;
    font-weight: 700;
    color: #7a4900;
    letter-spacing: 0.2px;

}

.card_1 p{
    margin: 0;
    font-size: 1rem;
    font-weight: 80;
    color: #2e2e22;
}





.stats_3{
    margin-top: 20px;
    display: grid;
    grid-template-columns:repeat(1,1fr);
    gap: 18px;
    margin-bottom: 30px;
}

.card_2{
    background: #ffffff;
    border-radius: 12px;
    padding: 18px 18px;
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    text-align: center;
}



.card_2 h3{
    margin: 0 0 10px;
    font-size: 1rem;
    font-weight: 700;
    color: #7a4900;
    letter-spacing: 0.2px;
    line-height: 1.6;


}

.card_2 p{
    margin: 0;
    font-size: 1rem;
    font-weight: 80;
    color: #2e2e22;
    line-height: 1.6;
}

.headbut_1 {
  
    background-color: #7a4900; 
    display: inline-block;
    cursor: pointer;
    padding: 12px 26px;
    border-radius: 10px; 
    font-size: 16px;
    line-height: 1; 
    border: 2px solid #7a4900;
    font-weight: 600;
    margin-top: 20px;

}


.headbut_1 a{
    color: #e7b569;
   text-decoration: none;
   display: inline-block;
}

.headbut_1:hover {
    background-color: transparent;
}

.headbut_1:active {
    color: #e99a24;
}


/**Responsive */
@media (max-width:900px){
    .stats_1{
        grid-template-columns: 1fr;
    }

    .About_Us{
        padding: 22px;
    }
}

    </style>
