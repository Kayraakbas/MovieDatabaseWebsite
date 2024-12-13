<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        .filter-title {
            font-size: 25px;
            font-weight: bold;
            margin: 30px;
            color: white;
            
        }

        .filter-group {
            margin: 30px;
            margin-bottom: 15px;
            font-family:system-ui;
        }

        .filter-group label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
            color: white;
        }

        .filter-group select, 
        .filter-group input[type="checkbox"] {
            width: 100%;
            height: 25px;
            background-color: #2C2C2C;
            border: none;
            color: white;
            border-radius: 5px;
        }

        .filter-submit {
            display: block;
            background-color: #2C2C2C;
            color: white;
            border: none;
            font-size: 14px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 70px;
        }

        .filter-submit:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div>
    <div class="filter-title">Filter Movies</div>
    
    <form action="" method="get">
        <!-- Filter by Film Genres -->
        <div class="filter-group">
            <label for="genres">Film Genres:</label>
            <select name="genres" id="genres">
                <option value="">All Genres</option>
                <option value="action">Action</option>
                <option value="comedy">Comedy</option>
                <option value="drama">Drama</option>
                <option value="thriller">Thriller</option>
                <option value="sci-fi">Sci-Fi</option>
                <option value="romance">Romance</option>
                <!-- Add more genres as needed -->
            </select>
        </div>

        <!-- Filter by Rating -->
        <div class="filter-group">
            <label for="rating">Rating:</label>
            <select name="rating" id="rating">
                <option value="">All Ratings</option>
                <option value="5">5 Stars</option>
                <option value="4">4 Stars & Up</option>
                <option value="3">3 Stars & Up</option>
                <option value="2">2 Stars & Up</option>
                <option value="1">1 Star & Up</option>
            </select>
        </div>

        <!-- Filter by Year of Release -->
        <div class="filter-group">
            <label for="year">Year of Release:</label>
            <select name="year" id="year">
                <option value="">All Years</option>
                <?php
                // Generate year options dynamically from 2025 to 1980
                for ($year = 2025; $year >= 1980; $year--) {
                    echo "<option value=\"$year\">$year</option>";
                }
                ?>
            </select>
        </div>

        <!-- Order By Options -->
        <div class="filter-title">Order By</div>
        <div class="filter-group">
            <label for="order">Order Movies By:</label>
            <select name="order" id="order">
                <option value="year_desc">Year (Newest First)</option>
                <option value="year_asc">Year (Oldest First)</option>
                <option value="most_watched">Most Watched</option>
                <option value="rating_desc">Rating (Highest First)</option>
                <option value="rating_asc">Rating (Lowest First)</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="filter-submit">Apply</button>
    </form>
</div>

</body>
</html>
