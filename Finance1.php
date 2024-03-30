<?php
// Include your config.php file
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Bombay Forum</title>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
    <link
      href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css"
      type="text/css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css"
      type="text/css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/navbar.css" />
    <link rel="stylesheet" href="./assets/article.css" />
  </head>
  <body>
    <nav>
      <h2 class="logo">The Bombay Forum</h2>
      <h2 class="mob-logo">TBF</h2>
      <ul class="link-ul center-nav">
        <li><a href="">Finance</a></li>
        <li><a href="">Technology</a></li>
        <li><a href="">Lifestyle</a></li>
        <li><a href="">Markets</a></li>
        <li><a href="">Bombay</a></li>
      </ul>
      <ul class="link-ul side-nav">
        <li><a href="" class="login-link">Login</a></li>
        <li class="mag-container">
          <a href="" class="magazine-link">Magazine</a>
        </li>
      </ul>
      <div class="hamburger">
        <img src="./assets/img/menu.png" alt="" />
      </div>
      <div class="sidebar" id="sidebar">
        <div class="cross-btn">X</div>
        <div class="side-main">
          <ul class="link-ul side-ls">
            <li><a href="">Finance</a></li>
            <li><a href="">technology</a></li>
            <li><a href="">Lifestyle</a></li>
            <li><a href="">Markets</a></li>
            <li><a href="">Bombay</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <main>
      <div class="article-head">
        <div class="breadcrumb">
          <span class="grey-text">Home/</span>Finance
        </div>
        <div class="article-time article-time-big grey-text">
          <img src="./assets/img/clock.png" alt="" />
          posted 2 min ago
        </div>
        <div class="reaction-btns reaction-btns-small">
          <div class="heart"><img src="./assets/img/heart.png" /></div>
          <div class="share">
            <img src="./assets/img/share.png" alt="" />
          </div>
        </div>
      </div>
      <div class="article-container">
        <div class="article-ls">
          <div class="article-img">
            <img src="./assets/img/stylish.png" alt="Article Image" />
            <div class="slide-btns slide-btns-small">
              <div class="btn">
                <img src="./assets/img/chevron-left.png" height="25px" alt="" />
              </div>
              <div class="btn">
                <img
                  src="./assets/img/chevron-right.png"
                  height="25px"
                  alt=""
                />
              </div>
            </div>
          </div>
          <div class="reaction-btns reaction-btns-big">
            <div class="heart"><img src="./assets/img/heart.png" /></div>
            <div class="share"><img src="./assets/img/share.png" alt="" /></div>
          </div>
          <div class="slide-btns slide-btns-big">
            <div class="btn">
              <img src="./assets/img/chevron-left.png" height="30px" alt="" />
            </div>
            <div class="btn">
              <img src="./assets/img/chevron-right.png" height="30px" alt="" />
            </div>
          </div>
        </div>
        <div class="article-rs">
          <div>
            <h1 class="article-title">
            <?php
                $sql = "SELECT Title, Num FROM News WHERE Type = 'Finance' AND Num IN (1)";
                
                // Prepare and execute the statement
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                // Check if there are any results
                if ($stmt->rowCount() > 0) {
                    // Fetch and display each row
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {                        
                        // Output the news item inside a clickable div
                        echo $row['Title'];
                    }
                } else {
                    // No matching rows found
                    echo "No records found";
                }
                ?>
            </h1>
            <div class="article-time grey-text article-time-small">
              <img src="./assets/img/clock.png" alt="" />
              posted 2 min ago
            </div>
          </div>
          <div class="article-data">
            <?php
            $sql = "SELECT Description, Num FROM News WHERE Type = 'Finance' AND Num IN (1)";
            // Prepare and execute the statement
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            // Check if there are any results
            if ($stmt->rowCount() > 0) {
                // Fetch and display each row
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {                        
                    // Output the news item inside a clickable div with line breaks
                    echo  nl2br($row['Description']);
                }
            } else {
                // No matching rows found
                echo "No records found";
            }
            ?>
          </div>
        </div>
      </div>
      <footer>
        <div class="footer-top">
          <div class="footer-ls">
            <h1 class="blue-text">Latest</h1>
            <div class="footer-news first-ft-news">
              <div class="news-title">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Adipisci, a...
              </div>
              <div class="news-tag">News</div>
            </div>
            <div class="footer-news">
              <div class="news-title">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Adipisci, a...
              </div>
              <div class="news-tag">News</div>
            </div>
            <div class="footer-news">
              <div class="news-title">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Adipisci, a...
              </div>
              <div class="news-tag">News</div>
            </div>
            <div class="footer-news">
              <div class="news-title">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Adipisci, a...
              </div>
              <div class="news-tag">News</div>
            </div>
            <div class="footer-news">
              <div class="news-title">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Adipisci, a...
              </div>
              <div class="news-tag">News</div>
            </div>
          </div>
          <div class="footer-rs">
            <h3>News</h3>
            <h3>News</h3>
            <h3>News</h3>
            <h3>News</h3>
            <h3>News</h3>
            <h3>News</h3>
          </div>
        </div>
        <hr />
        <div class="bottom-footer">
          <h3 class="footer-fade-link">Privacy Policy</h3>
          <h3 class="footer-fade-link">2024 &copy; COPYRIGHT</h3>
          <h3 class="footer-fade-link">Terms and Conditions</h3>
        </div>
      </footer>
    </main>

    <script src="./assets/sidebar.js"></script>
  </body>
</html>
