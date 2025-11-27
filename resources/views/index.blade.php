<x-layout>
    <style>
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

       
        .hero-section {
            background-color: #f4f1ea; 
            padding: 80px 20px;
            text-align: center;
            border-bottom: 5px solid #6b8e23; 
        }
        
        .hero-section h1 {
            font-size: 3rem;
            color: #4a3b2a; 
            margin-bottom: 10px;
            font-family: 'Arial', sans-serif;
        }

        .hero-section p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 30px;
        }

        .cta-button {
            background-color: #6b8e23; 
            color: white;
            padding: 15px 30px;
            font-size: 1.2rem;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .cta-button:hover {
            background-color: #556b2f;
        }

        
        .categories-section {
            padding: 60px 20px;
            text-align: center;
        }

        .section-title {
            font-size: 2rem;
            color: #4a3b2a;
            margin-bottom: 40px;
        }

        .category-grid {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .category-card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 250px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .category-card:hover {
            transform: translateY(-5px); 
        }

        .category-card h3 {
            color: #4a3b2a;
            margin-bottom: 10px;
        }
    </style>

    <div class="hero-section">
        <h1>Grow Your Knowledge</h1>
        <p>Premium sustainable stationery, books, and supplies for students.</p>
        <a href="/products" class="cta-button">Shop All Products</a>
    </div>

    <div class="container categories-section">
        <h2 class="section-title">Browse Our Collections</h2>
        
        <div class="category-grid">
            <div class="category-card">
                <h3>📚 Books</h3>
                <p>Essential reading for your course.</p>
            </div>

            <div class="category-card">
                <h3>✏️ Stationery</h3>
                <p>Pens, pencils and notebooks.</p>
            </div>

            <div class="category-card">
                <h3>🎨 Arts & Crafts</h3>
                <p>Materials for creative minds.</p>
            </div>
        </div>
    </div>


</x-layout>