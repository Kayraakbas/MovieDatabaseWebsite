<?php
// Sample movie data
$movies = [
    [
        'title' => 'The Shawshank Redemption',
        'poster' => "components/assets/grayMan.png",
        'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.'
    ],

    [
        'title' => 'The Dark Knight',
        'poster' => "components/assets/blackWidow.png",
        'description' => 'When the menace known as The Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.'
    ],
    [
        'title' => 'Inception',
        'poster' => "components/assets/ınception.png",
        'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.'
    ],
    [
        'title' => 'The Matrix',
        'poster' => "components/assets/bladeRunner.png",
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.'
    ],
    [
        'title' => 'Fight Club',
        'poster' => "components/assets/herleySs.png",
        'description' => 'An insomniac office worker forms an underground fight club with soap salesman Tyler Durden.'
    ],
    [
        'title' => 'The Dark Knight',
        'poster' => "components/assets/hod.png",
        'description' => 'When the menace known as The Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.'
    ],
    [
        'title' => 'Inception',
        'poster' => "components/assets/ınception.png",
        'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.'
    ],
    [
        'title' => 'The Matrix',
        'poster' => "components/assets/ınception.png",
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.'
    ],
    [
        'title' => 'Fight Club',
        'poster' => "components/assets/ınception.png",
        'description' => 'An insomniac office worker forms an underground fight club with soap salesman Tyler Durden.'
    ],
    [
        'title' => 'The Dark Knight',
        'poster' => "components/assets/joker.png",
        'description' => 'When the menace known as The Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.'
    ],
    [
        'title' => 'Inception',
        'poster' => "components/assets/hod.png",
        'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.'
    ],
    [
        'title' => 'The Matrix',
        'poster' => "components/assets/starWars.png",
        'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.'
    ],
    [
        'title' => 'Fight Club',
        'poster' => "components/assets/starWars.png",
        'description' => 'An insomniac office worker forms an underground fight club with soap salesman Tyler Durden.'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        .movies{

            /* GRID */
            display: grid;
            grid-template-columns: repeat(4, 1fr); 
            column-gap: 100px 200px;
            row-gap: 10px;
            margin-bottom: 20px;
        }

        .movie-card {
            position: relative;
            width: 175px;
            height: 280px;
            margin: 40px;
            margin-left: 30px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .movie-card:hover {
            transform: scale(1.05);
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
        }

        h3 {
            font-size: 20px;
            margin: 0;
            color: #333;
        }

    
        .card-footer {
            margin-top: 10px;
            text-align: right;
            font-size: 12px;
            color: #999;
        }   
    </style>
</head>
<body>

<div class="movies">
    <?php foreach ($movies as $movie): ?>
        <div class="movie-card">
            <img src="<?php echo $movie['poster']; ?>" alt="<?php echo $movie['title']; ?> Poster">
            <div class="card-content">
                <h3><?php echo $movie['title']; ?></h3>
                <p><?php echo $movie['description']; ?></p>
            </div>
            <div class="card-footer">
                <a href="#">More Info</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
