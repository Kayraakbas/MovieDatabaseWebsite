
<?php
// footer.php
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>

            html, body {
                margin: 0;
                padding: 0;
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .footer {
                margin: 0;
                padding: 0;
                height: 60%;
                background-color: #000;
                color: #fff;
                padding: 20px 0;
                text-align: center;
                font-size: 14px;
            }

            .footer .container {
                max-width: 1500px;
                margin: 0 auto;
                margin-bottom: 0px;
                padding: 0 15px;
            }

            .footer p {
                margin: 0 0 10px;
            }

            .footer-links {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                justify-content: center;
                gap: 15px;
            }

            .footer-links li {
                display: inline;
            }

            .footer-links a {
                color: #fff;
                text-decoration: none;
            }

            .footer-links a:hover {
                text-decoration: underline;
            }

        </style>
    </head>
    <body>
        <footer class="footer">
            <div class="container">
                <p>&copy; <?php echo date('Y'); ?> Your Website Name. All rights reserved.</p>
                <ul class="footer-links">
                    <li><a href="privacy.php">Privacy Policy</a></li>
                    <li><a href="terms.php">Terms of Service</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </footer>
    </body>
</html>