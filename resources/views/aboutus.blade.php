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
    font-family: 'Segoe UI', sans-serif;

}
[data-bs-theme="dark"] .About-Us {
    background-color: #3b3b3b;
} /* Dark mode */
[data-bs-theme="light"] .About-Us {
    background-color: #f5f1e8;
} /* Light mode */

.About_Us{
    flex:1;
    padding: 40px;
    font-family: 'Segoe UI', sans-serif;
}
[data-bs-theme="dark"] .About_Us {
    background-color: #292929;
    color: #c8c8c8;
} /* Dark mode */
[data-bs-theme="light"] .About_Us { 
    background-color: #f5f1e8;
    color: #2e2e2e;
} /* Light mode */

.About_Us h1{
    margin: 0 0 8px;
    font-size: 2.2rem;
}
[data-bs-theme="dark"] .About_Us h1 {
    color: #ffd595;
} /* Dark mode */
[data-bs-theme="light"] .About_Us h1 {
    color: #7a4900;
} /* Light mode */

.About_Us p{
    margin: 0 0 28px;
    font-size: 1rem;
}
[data-bs-theme="dark"] .About_Us p {
    color: #dbdbdb;
} /* Dark mode */
[data-bs-theme="light"] .About_Us p {
    color: #5a5a5a;
} /* Light mode */

.stats_1{
    display: grid;
    grid-template-columns:repeat(3,1fr);
    gap: 18px;
    margin-bottom: 30px;
    margin-top: 20px;
}

.card{
    border-radius: 12px;
    padding: 18px 18px;
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
[data-bs-theme="dark"] .card {
    background: #212529;
    border-left: 6px solid #bdab53;
} /* Dark mode */
[data-bs-theme="light"] .card{
    background: #ffffff;
    border-left: 6px solid #bdab53;
} /* Light mode */


.card:hover{
    transform: translateY(-2px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.12);
}

.card h3{
    margin: 0 0 10px;
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: 0.2px;

}
[data-bs-theme="dark"] .card h3 {
    color: #d4ba92;
} /* Dark mode */
[data-bs-theme="light"] .card h3 {
    color: #7a4900;
} /* Light mode */

.card p{
    margin: 0;
    font-size: 1rem;
    font-weight: 80;
}
[data-bs-theme="dark"] .card p {
    color: #c7c7c7;
} /* Dark mode */
[data-bs-theme="light"] .card p {
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
    border-radius: 12px;
    padding: 18px 18px;
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
[data-bs-theme="dark"] .card_1 {
    background: #212529;
    border-left: 6px solid #bdab53;
} /* Dark mode */
[data-bs-theme="light"] .card_1 {
    background: #ffffff;
    border-left: 6px solid #bdab53;
} /* Light mode */


.card_1:hover{
    transform: translateY(-2px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.12);
}

.card_1 h3{
    margin: 0 0 10px;
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: 0.2px;

}
[data-bs-theme="dark"] .card_1 h3 {
    color: #d4ba92;
} /* Dark mode */
[data-bs-theme="light"] .card_1 h3 {
    color: #7a4900;
} /* Light mode */

.card_1 p{
    margin: 0;
    font-size: 1rem;
    font-weight: 80;
}
[data-bs-theme="dark"] .card_1 p {
    color: #c7c7c7;
} /* Dark mode */
[data-bs-theme="light"] .card_1 p {
    color: #2e2e22;
} /* Light mode */

.stats_3{
    margin-top: 20px;
    display: grid;
    grid-template-columns:repeat(1,1fr);
    gap: 18px;
    margin-bottom: 30px;
}

.card_2{
    border-radius: 12px;
    padding: 18px 18px;
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    text-align: center;
}
[data-bs-theme="dark"] .card_2 {
    background: #212529;
} /* Dark mode */
[data-bs-theme="light"] .card_2 {
    background: #ffffff;
} /* Light mode */



.card_2 h3{
    margin: 0 0 10px;
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: 0.2px;
    line-height: 1.6;
}
[data-bs-theme="dark"] .card_2 h3 {
    color: #d4ba92;
} /* Dark mode */
[data-bs-theme="light"] .card_2 h3 {
    color: #7a4900;
} /* Light mode */

.card_2 p{
    margin: 0;
    font-size: 1rem;
    font-weight: 80;
    line-height: 1.6;
}
[data-bs-theme="dark"] .card_2 p {
    color: #c7c7c7;
} /* Dark mode */
[data-bs-theme="light"] .card_2 p {
    color: #2e2e22;
} /* Light mode */

.headbut_1 {
  
    display: inline-block;
    cursor: pointer;
    padding: 12px 26px;
    border-radius: 10px; 
    font-size: 16px;
    line-height: 1; 
    font-weight: 600;
    margin-top: 20px;

}
[data-bs-theme="dark"] .headbut_1 {
    background-color: #d4ba92; 
    border: 2px solid #d4ba92;
} /* Dark mode */
[data-bs-theme="light"] .headbut_1 {
    background-color: #7a4900; 
    border: 2px solid #7a4900;
} /* Light mode */


.headbut_1 a{
    text-decoration: none;
    display: inline-block;
}
[data-bs-theme="dark"] .headbut_1 a {
    color: #69440b;
} /* Dark mode */
[data-bs-theme="light"] .headbut_1 a {
    color: #e7b569;
} /* Light mode */

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
