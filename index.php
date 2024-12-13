<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Moovy - Home</title>
        
        <style>

            body{
                background-color: #2C2C2C;
            }
        
            .content-container {
                margin-top: 50px;
                display: grid;
                column-gap: 10px;
                margin: 0%;
                font-family:system-ui;
            
                grid-template-columns: 1fr 3fr;
                grid-template-rows: 1fr;
            }

            
            .filter-container {
                margin-top: 40%;
                margin-left: 60px;
                width: 250px;
                height: 600px;
                background-color: black;
                border-radius: 15px;

                /* GRID */
                display: grid;
                row-gap: 1;
                grid-template-columns: 1fr;
                grid-template-rows: repeat(6, 2fr);
            }

            .cards-container {
                margin-top: 10%;
                margin-left: 20px;
                margin-right: 80px;
                align-items: center;
                border-radius: 15px;
                font-size: 10px;        
            }

        </style>
    </head>

    <body>

        <?php include('components/navbar.php'); ?>

        <div class="content-container">

            <div class="filter-container">
                <?php include('components/filter.php'); ?>
            </div>

            <div class="cards-container">
                <?php include('components/cards.php'); ?>
            </div>
        
        </div>
    </body>
</html>
