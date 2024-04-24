<?php
// Include your config.php file
include 'config.php';
?>

<?php
// Establish database connection
try {
    $conn = new PDO("mysql:host=$databaseHost;port=$databasePort;dbname=$databaseName", $databaseUser, $databasePassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    // Error handling: Print error message if connection fails
    die("Connection failed: " . $error->getMessage());
}
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
    <link rel="stylesheet" href="./assets/home.css" />
    <link rel="stylesheet" href="./assets/vid-n-pods.css" />
  </head>
  <body>
    <div class="video-modal">
      <video src="./assets/img/sample.mp4"></video>
      <div class="cross-vid">CLOSE</div>
    </div>

    <nav>
      <h2 class="logo">The Bombay Forum</h2>
      <h2 class="mob-logo">TBF</h2>
      <ul class="link-ul center-nav">
      <li><a href="./domain-news.php?type=Finance">Finance</a></li>
      <li><a href="./domain-news.php?type=Tech">Technology</a></li>
      <li><a href="./domain-news.php?type=Lifestyle">Lifestyle</a></li>
      <li><a href="./domain-news.php?type=Markets">Markets</a></li>
      <li><a href="./domain-news.php?type=Bombay">Bombay</a></li>
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
            <li><a href="./domain-news.php?type=Finance">Finance</a></li>
            <li><a href="./domain-news.php?type=Tech">Technology</a></li>
            <li><a href="./domain-news.php?type=Lifestyle">Lifestyle</a></li>
            <li><a href="./domain-news.php?type=Markets">Markets</a></li>
            <li><a href="./domain-news.php?type=Bombay">Bombay</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="snp-marquee">
      <marquee
        id="marquee"
        onmouseover="this.stop();"
        onmouseout="this.start();"
        direction="up"
        scrollamount="1"
      >
        <label class="red" data-graphid="SnP 10.13289">S&P 10.13289</label>
        <label class="green" data-graphid="SnP 10.13289">S&P 10.13289</label>
        <label class="white" data-graphid="SnP 10.13289">S&P 10.13289</label>
      </marquee>
      <marquee
        id="marquee1"
        onmouseover="this.stop();"
        onmouseout="this.start();"
      >
        <label class="red" data-graphid="SnP 10.13289">S&P 10.13289</label>
        <label class="green" data-graphid="SnP 10.13289">S&P 10.13289</label>
        <label class="white" data-graphid="SnP 10.13289">S&P 10.13289</label>
      </marquee>
      <!-- <div class="container-modal">
        <div id="container"></div>
        <div class="cross-cm">CLOSE</div>
      </div> -->
    </div>
    <main class="body-main">
      <div class="ad"></div>

      <div>
        <div class="domains-arena">
          <div class="flex flex-1">
            <h3 class="title-2">Finance</h3>
            <div class="trending-btn">Trending</div>
            <div class="dashboard-card-description">
            <?php
              try {                  
                  // Define SQL query
                  $sql = "SELECT Title, Num FROM news WHERE Type = 'Finance' AND Num IN (1, 2, 3, 4, 5)";
                  
                  // Prepare and execute the statement
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  
                  // Check if there are any results
                  if ($stmt->rowCount() > 0) {
                      // Fetch and display each row
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          // Generate URL with news number
                          $url = 'Article.php?type=Finance&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="dashboard-news article-open" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                          echo '<hr />';
                      }
                  } else {
                      // No matching rows found
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  // Error handling: Print error message if connection fails
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>

            </div>
          </div>

          <div class="flex">
            <div class="trending-card">
              <div class="white-card article-open">
                <div class="card-title">Lifestyle</div>
                <div class="trending-btn">Trending</div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Lifestyle' AND Num = 1"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Lifestyle&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="card-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
              </div>

              <div class="white-card article-open">
                <div class="card-title">Lifestyle</div>
                <div class="trending-btn">Trending</div>
                <?php
                  try {
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Lifestyle' AND Num = 2"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Lifestyle&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="card-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
              </div>

              <div class="white-card article-open">
                <div class="card-title">Lifestyle</div>
                <div class="trending-btn">Trending</div>
                <?php
                  try {
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Lifestyle' AND Num = 3"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Lifestyle&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="card-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
              </div>
            </div>
          </div>

          <div class="flex flex-2">
            <h3 class="title-2">Technology</h3>
            <div class="trending-btn">Trending</div>
            <div class="dashboard-card-description">
            <?php
              try {                  
                  // Define SQL query
                  $sql = "SELECT Title, Num FROM news WHERE Type = 'Tech' AND Num IN (1, 2, 3, 4, 5, 6)";
                  
                  // Prepare and execute the statement
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  
                  // Check if there are any results
                  if ($stmt->rowCount() > 0) {
                      // Fetch and display each row
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          // Generate URL with news number
                          $url = 'Article.php?type=Tech&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="dashboard-news article-open" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                          echo '<hr />';
                      }
                  } else {
                      // No matching rows found
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  // Error handling: Print error message if connection fails
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
            </div>
          </div>
        </div>

        <div class="finance-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Finance</h3>
            <div class="date">05 March 2024</div>
          </div>

          <div class="finance-main">
            <div class="ls-finance">
              <div class="row article-open">
                <div class="finance-ls">
                  <div class="row-title">News 01</div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Finance' AND Num = 6"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Finance&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="row-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
                <div class="rs">
                <?php
                try {
                    $sql = "SELECT Lphoto FROM news WHERE Type = 'Finance' AND Num = 6"; // Changed IN (1) to = 1
                    
                    // Prepare and execute the statement
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    
                    // Check if there are any results
                    if ($stmt->rowCount() > 0) {
                        // Fetch the first row
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        // Output the news item inside a clickable div
                        echo '<img src="' . $row['Lphoto'] . '" alt="" height= "100px" style="overflow:hidden;" />';
                    } else {
                        // No matching rows found
                        echo "No records found";
                    }
                } catch(PDOException $error) {
                    // Error handling: Print error message if connection fails
                    echo "Connection failed: " . $error->getMessage();
                }
                ?>
                </div>
              </div>
              <hr />
              <div class="row article-open">
                <div class="finance-ls">
                  <div class="row-title">News 02</div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Finance' AND Num = 7"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Finance&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="row-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
                <div class="rs">
                <?php
                try {
                    $sql = "SELECT Lphoto FROM news WHERE Type = 'Finance' AND Num = 7"; // Changed IN (1) to = 1
                    
                    // Prepare and execute the statement
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    
                    // Check if there are any results
                    if ($stmt->rowCount() > 0) {
                        // Fetch the first row
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        // Output the news item inside a clickable div
                        echo '<img src="' . $row['Lphoto'] . '" alt="" height= "100px" style="overflow:hidden;" />';
                    } else {
                        // No matching rows found
                        echo "No records found";
                    }
                } catch(PDOException $error) {
                    // Error handling: Print error message if connection fails
                    echo "Connection failed: " . $error->getMessage();
                }
                ?>
                </div>
              </div>
              <hr />
              <div class="row article-open">
                <div class="finance-ls">
                  <div class="row-title">News 03</div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Finance' AND Num = 8"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Finance&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="row-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
                <div class="rs">
                <?php
                try {
                    $sql = "SELECT Lphoto FROM news WHERE Type = 'Finance' AND Num = 8"; // Changed IN (1) to = 1
                    
                    // Prepare and execute the statement
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    
                    // Check if there are any results
                    if ($stmt->rowCount() > 0) {
                        // Fetch the first row
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        // Output the news item inside a clickable div
                        echo '<img src="' . $row['Lphoto'] . '" alt="" height= "100px" style="overflow:hidden;" />';

                    } else {
                        // No matching rows found
                        echo "No records found";
                    }
                } catch(PDOException $error) {
                    // Error handling: Print error message if connection fails
                    echo "Connection failed: " . $error->getMessage();
                }
                ?>
                </div>
              </div>
            </div>
            <div class="finance-rs">
              <div class="finance-news article-open">
                <div class="news-header">
                  <div class="index">01</div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Finance' AND Num = 9"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Finance&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
                <div class="news-sub-header">
                  <div class="time">8:00</div>
                  <div class="how-much"></div>
                  2 min ago
                </div>
              </div>

              <div class="finance-news article-open">
                <div class="news-header">
                  <div class="index">02</div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Finance' AND Num = 10"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Finance&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
                <div class="news-sub-header">
                  <div class="time">8:00</div>
                  <div class="how-much"></div>
                  2 min ago
                </div>
              </div>

              <div class="finance-news article-open">
                <div class="news-header">
                  <div class="index">03</div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Finance' AND Num = 11"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Finance&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
                <div class="news-sub-header">
                  <div class="time">8:00</div>
                  <div class="how-much"></div>
                  2 min ago
                </div>
              </div>
              <div class="finance-news article-open">
                <div class="news-header">
                  <div class="index">04</div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Finance' AND Num = 12"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Finance&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
                <div class="news-sub-header">
                  <div class="time">8:00</div>
                  <div class="how-much"></div>
                  2 min ago
                </div>
              </div>
              <div class="finance-news article-open">
                <div class="news-header">
                  <div class="index">05</div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Finance' AND Num = 13"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Finance&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
                <div class="news-sub-header">
                  <div class="time">8:00</div>
                  <div class="how-much"></div>
                  2 min ago
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="billionare-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Billionare</h3>
            <div class="date">05 March 2024</div>
          </div>
          <div class="bill-main">
            <div class="bill-table-div">
              <table class="bill-table" id="bill-table">
                <tr>
                  <th></th>
                  <th>RANK</th>
                  <th>Name</th>
                  <th>Net Worth</th>
                  <th>Change</th>
                  <th>Age</th>
                  <th>Source</th>
                  <th>Country/Territory</th>
                </tr>
                <tr>
                  <td>
                    <img src="./assets/img/elon.webp" width="80px" alt="" />
                  </td>
                  <td class="bill-tbl-rank">1</td>
                  <td class="bill-tbl-name">Elon Musk</td>
                  <td>$241.5 B</td>
                  <td class="bill-tbl-up">
                    <span
                      ><img src="./assets/img/green.png" height="12px" alt=""
                    /></span>
                    $5.9 B | 2.50%
                  </td>
                  <td class="bill-tbl-age">60</td>
                  <td class="bill-tbl-src">Amazon</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td>
                    <img src="./assets/img/elon.webp" width="80px" alt="" />
                  </td>
                  <td class="bill-tbl-rank">1</td>
                  <td class="bill-tbl-name">Elon Musk</td>
                  <td>$241.5 B</td>
                  <td class="bill-tbl-up">
                    <span
                      ><img src="./assets/img/green.png" height="12px" alt=""
                    /></span>
                    $5.9 B | 2.50%
                  </td>
                  <td class="bill-tbl-age">60</td>
                  <td class="bill-tbl-src">Amazon</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td>
                    <img src="./assets/img/elon.webp" width="80px" alt="" />
                  </td>
                  <td class="bill-tbl-rank">1</td>
                  <td class="bill-tbl-name">Elon Musk</td>
                  <td>$241.5 B</td>
                  <td class="bill-tbl-up">
                    <span
                      ><img src="./assets/img/green.png" height="12px" alt=""
                    /></span>
                    $5.9 B | 2.50%
                  </td>
                  <td class="bill-tbl-age">60</td>
                  <td class="bill-tbl-src">Amazon</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td>
                    <img src="./assets/img/elon.webp" width="80px" alt="" />
                  </td>
                  <td class="bill-tbl-rank">1</td>
                  <td class="bill-tbl-name">Elon Musk</td>
                  <td>$241.5 B</td>
                  <td class="bill-tbl-down">
                    <span
                      ><img src="./assets/img/red.png" height="12px" alt=""
                    /></span>
                    $5.9 B | 2.50%
                  </td>
                  <td class="bill-tbl-age">60</td>
                  <td class="bill-tbl-src">Amazon</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td>
                    <img src="./assets/img/elon.webp" width="80px" alt="" />
                  </td>
                  <td class="bill-tbl-rank">1</td>
                  <td class="bill-tbl-name">Elon Musk</td>
                  <td>$241.5 B</td>
                  <td class="bill-tbl-down">
                    <span
                      ><img src="./assets/img/red.png" height="12px" alt=""
                    /></span>
                    $5.9 B | 2.50%
                  </td>
                  <td class="bill-tbl-age">60</td>
                  <td class="bill-tbl-src">Amazon</td>
                  <td>United States</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="technology-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Technology</h3>
            <div class="date">05 March 2024</div>
          </div>
          <div class="tech-main">
            <div class="tech-grid">
              <div id="grid-card article-open">
              <?php
                try {
                    $sql = "SELECT Sphoto FROM news WHERE Type = 'Tech' AND Num = 7"; // Changed IN (1) to = 1
                    
                    // Prepare and execute the statement
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    
                    // Check if there are any results
                    if ($stmt->rowCount() > 0) {
                        // Fetch the first row
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        // Output the news item inside a clickable div
                        echo '<img src="' . $row['Sphoto'] . '" alt="" style="width: 257px; height: 216px;">';
                    } else {
                        // No matching rows found
                        echo "No records found";
                    }
                } catch(PDOException $error) {
                    // Error handling: Print error message if connection fails
                    echo "Connection failed: " . $error->getMessage();
                }
                ?>
                <div class="tech-data">
                  <div class="tech-header">
                    <div class="tech-title">Trending</div>
                    <div class="tech-time">09:00</div>
                  </div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Tech' AND Num = 7"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Tech&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="tech-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
              </div>
              <div id="grid-card article-open">
              <?php
                try {
                    $sql = "SELECT Sphoto FROM news WHERE Type = 'Tech' AND Num = 8"; // Changed IN (1) to = 1
                    
                    // Prepare and execute the statement
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    
                    // Check if there are any results
                    if ($stmt->rowCount() > 0) {
                        // Fetch the first row
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        // Output the news item inside a clickable div
                        echo '<img src="' . $row['Sphoto'] . '" alt="" style="width: 257px; height: 216px;">';
                    } else {
                        // No matching rows found
                        echo "No records found";
                    }
                } catch(PDOException $error) {
                    // Error handling: Print error message if connection fails
                    echo "Connection failed: " . $error->getMessage();
                }
                ?>
                <div class="tech-data">
                  <div class="tech-header">
                    <div class="tech-title">Trending</div>
                    <div class="tech-time">09:00</div>
                  </div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Tech' AND Num = 8"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Tech&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="tech-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
              </div>

              <div id="grid-card article-open">
              <?php
                try {
                    $sql = "SELECT Sphoto FROM news WHERE Type = 'Tech' AND Num = 9"; // Changed IN (1) to = 1
                    
                    // Prepare and execute the statement
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    
                    // Check if there are any results
                    if ($stmt->rowCount() > 0) {
                        // Fetch the first row
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        // Output the news item inside a clickable div
                        echo '<img src="' . $row['Sphoto'] . '" alt="" style="width: 257px; height: 216px;">';
                    } else {
                        // No matching rows found
                        echo "No records found";
                    }
                } catch(PDOException $error) {
                    // Error handling: Print error message if connection fails
                    echo "Connection failed: " . $error->getMessage();
                }
                ?>
                <div class="tech-data">
                  <div class="tech-header">
                    <div class="tech-title">Trending</div>
                    <div class="tech-time">09:00</div>
                  </div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Tech' AND Num = 9"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Tech&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="tech-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
              </div>
              <div id="grid-card article-open">
              <?php
                try {
                    $sql = "SELECT Sphoto FROM news WHERE Type = 'Tech' AND Num = 10"; // Changed IN (1) to = 1
                    
                    // Prepare and execute the statement
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    
                    // Check if there are any results
                    if ($stmt->rowCount() > 0) {
                        // Fetch the first row
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        // Output the news item inside a clickable div
                        echo '<img src="' . $row['Sphoto'] . '" alt="" style="width: 257px; height: 216px;">';
                    } else {
                        // No matching rows found
                        echo "No records found";
                    }
                } catch(PDOException $error) {
                    // Error handling: Print error message if connection fails
                    echo "Connection failed: " . $error->getMessage();
                }
                ?>
                <div class="tech-data">
                  <div class="tech-header">
                    <div class="tech-title">Trending</div>
                    <div class="tech-time">09:00</div>
                  </div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Tech' AND Num = 10"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Tech&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="tech-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
              </div>
            </div>
            <div class="tech-flex">
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>Latest</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Tech' AND Num = 11"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Tech&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div onclick="window.location.href=\'' . $url . '\'">';
        
                          // Split the title into chunks of maximum 50 characters
                          $title = wordwrap($row['Title'], 70, "<br>");
                          
                          // Output the title
                          echo $title;
                          
                          // Close the clickable div
                          echo '</div>';
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
              </div>
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>Latest</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Tech' AND Num = 12"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Tech&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div onclick="window.location.href=\'' . $url . '\'">';
        
                          // Split the title into chunks of maximum 50 characters
                          $title = wordwrap($row['Title'], 70, "<br>");
                          
                          // Output the title
                          echo $title;
                          
                          // Close the clickable div
                          echo '</div>';
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
              </div>
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>ZARA</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <?php
                    try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Tech' AND Num = 13"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Tech&num=' . $row['Num'];
                          
                          echo '<div onclick="window.location.href=\'' . $url . '\'">';
        
                          // Split the title into chunks of maximum 50 characters
                          $title = wordwrap($row['Title'], 70, "<br>");
                          
                          // Output the title
                          echo $title;
                          
                          // Close the clickable div
                          echo '</div>';
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                    } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                    }
                    ?>
                </div>
              </div>
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>Latest</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <?php
                  try {
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Tech' AND Num = 14"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Tech&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div onclick="window.location.href=\'' . $url . '\'">';
        
                          // Split the title into chunks of maximum 50 characters
                          $title = wordwrap($row['Title'], 70, "<br>");
                          
                          // Output the title
                          echo $title;
                          
                          // Close the clickable div
                          echo '</div>';
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="lifestyle-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Lifestyle</h3>
            <div class="date">05 March 2024</div>
          </div>
          <div class="flex-3">
            <div class="div-1 article-open">
            <?php
                  try {
                      $sql = "SELECT Sphoto FROM news WHERE Type = 'Lifestyle' AND Num = 4"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Output the news item inside a clickable div
                          echo '<img src="' . $row['Sphoto'] . '" alt="" class="life-long-img"/>'; 
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
              <div class="long-header">
                <div class="long-title">Latest</div>
                <div class="long-time">09:08</div>
              </div>
              <?php
                  try {
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Lifestyle' AND Num = 4"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Lifestyle&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="long-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
            </div>
            <div class="div-1 article-open">
            <?php
                try {
                    $sql = "SELECT Sphoto FROM news WHERE Type = 'Lifestyle' AND Num = 5"; // Changed IN (1) to = 1
                    
                    // Prepare and execute the statement
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    
                    // Check if there are any results
                    if ($stmt->rowCount() > 0) {
                        // Fetch the first row
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        // Output the news item inside a clickable div
                        echo '<img src="' . $row['Sphoto'] . '" alt="" class="life-long-img"/>'; 
                    } else {
                        // No matching rows found
                        echo "No records found";
                    }
                } catch(PDOException $error) {
                    // Error handling: Print error message if connection fails
                    echo "Connection failed: " . $error->getMessage();
                }
                ?>
              <div class="long-header">
                <div class="long-title">Latest</div>
                <div class="long-time">09:08</div>
              </div>
              <?php
                  try {
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Lifestyle' AND Num = 5"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Lifestyle&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="long-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
            </div>
            <div class="div-3">
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>Latest</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <?php
                  try {
                      
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Lifestyle' AND Num = 6"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Lifestyle&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="flex-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
              </div>
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>Latest</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <?php
                  try {                      
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Lifestyle' AND Num = 7"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Lifestyle&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="flex-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
              </div>
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>Latest</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <?php
                  try {                      
                      // Define SQL query
                      $sql = "SELECT Title, Num FROM news WHERE Type = 'Lifestyle' AND Num = 8"; // Changed IN (1) to = 1
                      
                      // Prepare and execute the statement
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      
                      // Check if there are any results
                      if ($stmt->rowCount() > 0) {
                          // Fetch the first row
                          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                          
                          // Generate URL with news number
                          $url = 'Article.php?type=Lifestyle&num=' . $row['Num'];
                          
                          // Output the news item inside a clickable div
                          echo '<div class="flex-desc" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>'; // Added </div> at the end
                      } else {
                          // No matching rows found
                          echo "No records found";
                      }
                  } catch(PDOException $error) {
                      // Error handling: Print error message if connection fails
                      echo "Connection failed: " . $error->getMessage();
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="market-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Market</h3>
            <div class="date">05 March 2024</div>
          </div>

          <div class="market-main">
            <div class="market-ls">
              <div class="table-head">
                <div class="active-gn gainer-head">Top Gainer</div>
                <div class="looser-head">Top Looser</div>
              </div>
              <div class="place-divs">
                <div class="long-div-green">
                  <div class="short-div"></div>
                  <div class="short-div-2"></div>
                </div>
                <div class="long-div-red">
                  <div class="short-div"></div>
                  <div class="short-div-2"></div>
                </div>
              </div>
              <div class="tables">
                <div class="gainer-table">
                  <table class="market-table" id="gainer-table">
                    <tr>
                      <th>Stocks</th>
                      <th>Price</th>
                      <th>%Change</th>
                    </tr>
                    <tr>
                      <td>Alfreds Futterkiste</td>
                      <td>Maria Anders</td>
                      <td>Germany</td>
                    </tr>
                    <tr>
                      <td>Berglunds snabbköp</td>
                      <td>Christina Berglund</td>
                      <td>Sweden</td>
                    </tr>
                    <tr>
                      <td>Centro comercial Moctezuma</td>
                      <td>Francisco Chang</td>
                      <td>Mexico</td>
                    </tr>
                    <tr>
                      <td>Ernst Handel</td>
                      <td>Roland Mendel</td>
                      <td>Austria</td>
                    </tr>
                  </table>
                </div>
                <div class="looser-table">
                  <table class="market-table" id="looser-table">
                    <tr>
                      <th>Stocks</th>
                      <th>Price</th>
                      <th>%Change</th>
                    </tr>
                    <tr>
                      <td>Alfreds Futterkiste</td>
                      <td>Maria Anders</td>
                      <td>Germany</td>
                    </tr>
                    <tr>
                      <td>Berglunds snabbköp</td>
                      <td>Christina Berglund</td>
                      <td>Sweden</td>
                    </tr>
                    <tr>
                      <td>Centro comercial Moctezuma</td>
                      <td>Francisco Chang</td>
                      <td>Mexico</td>
                    </tr>
                    <tr>
                      <td>Ernst Handel</td>
                      <td>Roland Mendel</td>
                      <td>Austria</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="market-rs">
              <div class="market-graph-container">
                <div id="market-graph"></div>
              </div>
              <div class="markets">
                <div
                  class="active-market-data market-data-container nifty-cont"
                >
                  <h2 class="center">Nifty</h2>
                  <div class="row">
                    <div class="sub">75,542</div>
                    <div class="sub">(+3.5%)</div>
                  </div>
                  <div class="row">27.36</div>
                </div>
                <div class="market-data-container sensex-cont">
                  <h2 class="center">Sensex</h2>
                  <div class="row">
                    <div class="sub">75,542</div>
                    <div class="sub">(+3.5%)</div>
                  </div>
                  <div class="row">27.36</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="video-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Video</h3>
            <div class="date">05 March 2024</div>
          </div>
          <div class="vid-flex-container">
            <div class="vid-flex">
              <div class="short-vid" class="vid-tb">
                <img src="./assets/img/video.png" alt="" />
                <div class="vid-news">NEWS</div>
                <div class="vid-title">Video Title</div>
              </div>
              <div class="long-vid" class="vid-tb">
                <img src="./assets/img/video.png" alt="" />

                <div class="vid-news">NEWS</div>
                <div class="vid-title">Video Title</div>
              </div>
            </div>
            <div class="vid-flex">
              <div class="long-vid" class="vid-tb">
                <img src="./assets/img/video.png" alt="" />

                <div class="vid-news">NEWS</div>
                <div class="vid-title">Video Title</div>
              </div>
              <div class="short-vid" class="vid-tb">
                <img src="./assets/img/video.png" alt="" />

                <div class="vid-news">NEWS</div>
                <div class="vid-title">Video Title</div>
              </div>
            </div>
            <div class="vid-flex">
              <div class="short-vid" class="vid-tb">
                <img src="./assets/img/video.png" alt="" />

                <div class="vid-news">NEWS</div>
                <div class="vid-title">Video Title</div>
              </div>
              <div class="short-vid" class="vid-tb">
                <img src="./assets/img/video.png" alt="" />

                <div class="vid-news">NEWS</div>
                <div class="vid-title">Video Title</div>
              </div>
              <div class="short-vid" class="vid-tb">
                <img src="./assets/img/video.png" alt="" />

                <div class="vid-news">NEWS</div>
                <div class="vid-title">Video Title</div>
              </div>
            </div>
          </div>
        </div>
        <div class="podcast-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Forum</h3>
            <div class="date">05 March 2024</div>
          </div>
          <div class="podcast-main">
            <div class="podcast-card">
              <div class="top-pods">
                <img src="./assets/img/podcast.png" alt="" />
                <div class="pod-data">
                  <div class="bill-name">Rakshanda Giri</div>
                  <div class="bill-sub">Billionare</div>
                </div>
              </div>
              <div class="bill-desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
                nostrum?
              </div>
            </div>
            <div class="podcast-card">
              <div class="top-pods">
                <img src="./assets/img/podcast.png" alt="" />
                <div class="pod-data">
                  <div class="bill-name">Rakshanda Giri</div>
                  <div class="bill-sub">Billionare</div>
                </div>
              </div>
              <div class="bill-desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
                nostrum?
              </div>
            </div>
            <div class="podcast-card">
              <div class="top-pods">
                <img src="./assets/img/podcast.png" alt="" />
                <div class="pod-data">
                  <div class="bill-name">Rakshanda Giri</div>
                  <div class="bill-sub">Billionare</div>
                </div>
              </div>
              <div class="bill-desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
                nostrum?
              </div>
            </div>
            <div class="podcast-card">
              <div class="top-pods">
                <img src="./assets/img/podcast.png" alt="" />
                <div class="pod-data">
                  <div class="bill-name">Rakshanda Giri</div>
                  <div class="bill-sub">Billionare</div>
                </div>
              </div>
              <div class="bill-desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
                nostrum?
              </div>
            </div>
            <div class="podcast-card">
              <div class="top-pods">
                <img src="./assets/img/podcast.png" alt="" />
                <div class="pod-data">
                  <div class="bill-name">Rakshanda Giri</div>
                  <div class="bill-sub">Billionare</div>
                </div>
              </div>
              <div class="bill-desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
                nostrum?
              </div>
            </div>
            <div class="podcast-card">
              <div class="top-pods">
                <img src="./assets/img/podcast.png" alt="" />
                <div class="pod-data">
                  <div class="bill-name">Rakshanda Giri</div>
                  <div class="bill-sub">Billionare</div>
                </div>
              </div>
              <div class="bill-desc">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
                nostrum?
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ad"></div>
    </main>
    <footer>
      <div class="footer-top">
        <div class="footer-ls">
          <h1 class="blue-text">Latest</h1>
          <div class="footer-news first-ft-news">
            <div class="news-title">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
              a...
            </div>
            <div class="news-tag">News</div>
          </div>
          <div class="footer-news">
            <div class="news-title">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
              a...
            </div>
            <div class="news-tag">News</div>
          </div>
          <div class="footer-news">
            <div class="news-title">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
              a...
            </div>
            <div class="news-tag">News</div>
          </div>
          <div class="footer-news">
            <div class="news-title">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
              a...
            </div>
            <div class="news-tag">News</div>
          </div>
          <div class="footer-news">
            <div class="news-title">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
              a...
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

    <script>
      anychart.onDocumentReady(function () {
        // create data set on our data
        var dataSet = anychart.data.set(getData());

        // map data for the first series, take x from the zero column and value from the first column of data set
        var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });

        // map data for the second series, take x from the zero column and value from the second column of data set
        var secondSeriesData = dataSet.mapAs({ x: 0, value: 2 });

        // map data for the third series, take x from the zero column and value from the third column of data set
        var thirdSeriesData = dataSet.mapAs({ x: 0, value: 3 });

        // create line chart
        var chart = anychart.line();

        // turn on chart animation
        chart.animation(true);

        // set chart padding
        chart.padding([10, 20, 5, 20]);

        // turn on the crosshair
        chart.crosshair().enabled(true).yLabel(false).yStroke(null);

        // set tooltip mode to point
        chart.tooltip().positionMode("point");

        // set chart title text settings
        chart.title("NIFTY MARKET");

        // set yAxis title
        chart.yAxis().title("Stock");
        chart.xAxis().labels().padding(5);

        // create first series with mapped data
        var firstSeries = chart.line(firstSeriesData);
        firstSeries.name("Stock 1");
        firstSeries.hovered().markers().enabled(true).type("circle").size(4);
        firstSeries
          .tooltip()
          .position("right")
          .anchor("left-center")
          .offsetX(5)
          .offsetY(5);

        // create second series with mapped data
        var secondSeries = chart.line(secondSeriesData);
        secondSeries.name("Stock 2");
        secondSeries.hovered().markers().enabled(true).type("circle").size(4);
        secondSeries
          .tooltip()
          .position("right")
          .anchor("left-center")
          .offsetX(5)
          .offsetY(5);

        // create third series with mapped data
        var thirdSeries = chart.line(thirdSeriesData);
        thirdSeries.name("Stock 3");
        thirdSeries.hovered().markers().enabled(true).type("circle").size(4);
        thirdSeries
          .tooltip()
          .position("right")
          .anchor("left-center")
          .offsetX(5)
          .offsetY(5);

        // turn the legend on
        chart.legend().enabled(true).fontSize(13).padding([0, 0, 10, 0]);

        // set container id for the chart
        chart.container("market-graph");
        // initiate chart drawing
        chart.draw();
      });

      function getData() {
        return [
          ["1986", 3.6, 2.3, 2.8, 11.5],
          ["1987", 7.1, 4.0, 4.1, 14.1],
          ["1988", 8.5, 6.2, 5.1, 17.5],
          ["1989", 9.2, 11.8, 6.5, 18.9],
          ["1990", 10.1, 13.0, 12.5, 20.8],
          ["1991", 11.6, 13.9, 18.0, 22.9],
          ["1992", 16.4, 18.0, 21.0, 25.2],
          ["1993", 18.0, 23.3, 20.3, 27.0],
          ["1994", 13.2, 24.7, 19.2, 26.5],
          ["1995", 12.0, 18.0, 14.4, 25.3],
          ["1996", 3.2, 15.1, 9.2, 23.4],
          ["1997", 4.1, 11.3, 5.9, 19.5],
          ["1998", 6.3, 14.2, 5.2, 17.8],
          ["1999", 9.4, 13.7, 4.7, 16.2],
          ["2000", 11.5, 9.9, 4.2, 15.4],
          ["2001", 13.5, 12.1, 1.2, 14.0],
          ["2002", 14.8, 13.5, 5.4, 12.5],
          ["2003", 16.6, 15.1, 6.3, 10.8],
          ["2004", 18.1, 17.9, 8.9, 8.9],
          ["2005", 17.0, 18.9, 10.1, 8.0],
          ["2006", 16.6, 20.3, 11.5, 6.2],
          ["2007", 14.1, 20.7, 12.2, 5.1],
          ["2008", 15.7, 21.6, 10, 3.7],
          ["2009", 12.0, 22.5, 8.9, 1.5],
        ];
      }
    </script>
    <script src="./assets/sidebar.js"></script>
    <script src="./assets/home-animations.js"></script>
    <script src="script.js"></script>
  </body>
</html>

<?php
// Close the database connection
$conn = null;
?><!DOCTYPE html>
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
    <link rel="stylesheet" href="./assets/home.css" />
    <link rel="stylesheet" href="./assets/vid-n-pods.css" />
  </head>
  <body>
    <div class="video-modal">
      <video src="./assets/img/sample.mp4"></video>
      <div class="cross-vid">CLOSE</div>
    </div>

    <nav>
      <h2 class="logo">The Bombay Forum</h2>
      <h2 class="mob-logo">TBF</h2>
      <ul class="link-ul center-nav">
        <li><a href="">Finance</a></li>
        <li><a href="">Finance</a></li>
        <li><a href="">Finance</a></li>
        <li><a href="">Finance</a></li>
        <li><a href="">Finance</a></li>
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
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="snp-marquee">
      <marquee
        id="marquee"
        onmouseover="this.stop();"
        onmouseout="this.start();"
        direction="up"
        scrollamount="1"
      >
        <label class="red" data-graphid="SnP 10.13289">S&P 10.13289</label>
        <label class="green" data-graphid="SnP 10.13289">S&P 10.13289</label>
        <label class="white" data-graphid="SnP 10.13289">S&P 10.13289</label>
      </marquee>
      <marquee
        id="marquee1"
        onmouseover="this.stop();"
        onmouseout="this.start();"
      >
        <label class="red" data-graphid="SnP 10.13289">S&P 10.13289</label>
        <label class="green" data-graphid="SnP 10.13289">S&P 10.13289</label>
        <label class="white" data-graphid="SnP 10.13289">S&P 10.13289</label>
      </marquee>
      <!-- <div class="container-modal">
        <div id="container"></div>
        <div class="cross-cm">CLOSE</div>
      </div> -->
    </div>
    <main class="body-main">
      <div class="ad"></div>

      <div>
        <div class="domains-arena">
          <div class="flex flex-1">
            <h3 class="title-2">Finance</h3>
            <div class="trending-btn">Trending</div>
            <div class="dashboard-card-description">
              <div class="dashboard-news article-open">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum,
                voluptatibus!
              </div>
              <hr />
              <div class="dashboard-news article-open">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum,
                voluptatibus!
              </div>
              <hr />
              <div class="dashboard-news article-open">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum,
                voluptatibus!
              </div>
              <hr />
              <div class="dashboard-news article-open">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum,
                voluptatibus!
              </div>
              <hr />
              <div class="dashboard-news article-open">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum,
                voluptatibus!
              </div>
            </div>
          </div>

          <div class="flex">
            <div class="trending-card">
              <div class="white-card article-open">
                <div class="card-title">Lifestyle</div>
                <div class="trending-btn">Trending</div>
                <div class="card-desc">
                  Lorem ipsum dolor sit amet consectetur
                </div>
              </div>

              <div class="white-card article-open">
                <div class="card-title">Lifestyle</div>
                <div class="trending-btn">Trending</div>
                <div class="card-desc">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
              </div>

              <div class="white-card article-open">
                <div class="card-title">Lifestyle</div>
                <div class="trending-btn">Trending</div>
                <div class="card-desc">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
              </div>
            </div>
          </div>

          <div class="flex flex-2">
            <h3 class="title-2">Technology</h3>
            <div class="trending-btn">Trending</div>
            <div class="dashboard-card-description">
              <div class="dashboard-news article-open">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum,
                voluptatibus!
              </div>
              <hr />
              <div class="dashboard-news article-open">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum,
                voluptatibus!
              </div>
              <hr />
              <div class="dashboard-news article-open">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum,
                voluptatibus!
              </div>
              <hr />
              <div class="dashboard-news article-open">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum,
                voluptatibus!
              </div>
              <hr />
              <div class="dashboard-news article-open">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum,
                voluptatibus!
              </div>
            </div>
          </div>
        </div>

        <div class="finance-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Finance</h3>
            <div class="date">05 March 2024</div>
          </div>

          <div class="finance-main">
            <div class="ls-finance">
              <div class="row article-open">
                <div class="finance-ls">
                  <div class="row-title">News 01</div>
                  <div class="row-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  </div>
                </div>
                <div class="rs">
                  <img src="./assets/img/finance.png" height="100px" alt="" />
                </div>
              </div>
              <hr />
              <div class="row article-open">
                <div class="finance-ls">
                  <div class="row-title">News 01</div>
                  <div class="row-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  </div>
                </div>
                <div class="rs">
                  <img src="./assets/img/finance.png" height="100px" alt="" />
                </div>
              </div>
              <hr />
              <div class="row article-open">
                <div class="finance-ls">
                  <div class="row-title">News 01</div>
                  <div class="row-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  </div>
                </div>
                <div class="rs">
                  <img src="./assets/img/finance.png" height="100px" alt="" />
                </div>
              </div>
            </div>
            <div class="finance-rs">
              <div class="finance-news article-open">
                <div class="news-header">
                  <div class="index">01</div>
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Delectus, doloremque.
                  </div>
                </div>
                <div class="news-sub-header">
                  <div class="time">8:00</div>
                  <div class="how-much"></div>
                  2 min ago
                </div>
              </div>

              <div class="finance-news article-open">
                <div class="news-header">
                  <div class="index">01</div>
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Delectus, doloremque.
                  </div>
                </div>
                <div class="news-sub-header">
                  <div class="time">8:00</div>
                  <div class="how-much"></div>
                  2 min ago
                </div>
              </div>

              <div class="finance-news article-open">
                <div class="news-header">
                  <div class="index">01</div>
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Delectus, doloremque.
                  </div>
                </div>
                <div class="news-sub-header">
                  <div class="time">8:00</div>
                  <div class="how-much"></div>
                  2 min ago
                </div>
              </div>
              <div class="finance-news article-open">
                <div class="news-header">
                  <div class="index">01</div>
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Delectus, doloremque.
                  </div>
                </div>
                <div class="news-sub-header">
                  <div class="time">8:00</div>
                  <div class="how-much"></div>
                  2 min ago
                </div>
              </div>
              <div class="finance-news article-open">
                <div class="news-header">
                  <div class="index">01</div>
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Delectus, doloremque.
                  </div>
                </div>
                <div class="news-sub-header">
                  <div class="time">8:00</div>
                  <div class="how-much"></div>
                  2 min ago
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="billionare-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Billionare</h3>
            <div class="date">05 March 2024</div>
          </div>
          <div class="bill-main">
            <div class="bill-table-div">
              <table class="bill-table" id="bill-table">
                <tr>
                  <th></th>
                  <th>RANK</th>
                  <th>Name</th>
                  <th>Net Worth</th>
                  <th>Change</th>
                  <th>Age</th>
                  <th>Source</th>
                  <th>Country/Territory</th>
                </tr>
                <tr>
                  <td>
                    <img src="./assets/img/elon.webp" width="80px" alt="" />
                  </td>
                  <td class="bill-tbl-rank">1</td>
                  <td class="bill-tbl-name">Elon Musk</td>
                  <td>$241.5 B</td>
                  <td class="bill-tbl-up">
                    <span
                      ><img src="./assets/img/green.png" height="12px" alt=""
                    /></span>
                    $5.9 B | 2.50%
                  </td>
                  <td class="bill-tbl-age">60</td>
                  <td class="bill-tbl-src">Amazon</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td>
                    <img src="./assets/img/elon.webp" width="80px" alt="" />
                  </td>
                  <td class="bill-tbl-rank">1</td>
                  <td class="bill-tbl-name">Elon Musk</td>
                  <td>$241.5 B</td>
                  <td class="bill-tbl-up">
                    <span
                      ><img src="./assets/img/green.png" height="12px" alt=""
                    /></span>
                    $5.9 B | 2.50%
                  </td>
                  <td class="bill-tbl-age">60</td>
                  <td class="bill-tbl-src">Amazon</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td>
                    <img src="./assets/img/elon.webp" width="80px" alt="" />
                  </td>
                  <td class="bill-tbl-rank">1</td>
                  <td class="bill-tbl-name">Elon Musk</td>
                  <td>$241.5 B</td>
                  <td class="bill-tbl-up">
                    <span
                      ><img src="./assets/img/green.png" height="12px" alt=""
                    /></span>
                    $5.9 B | 2.50%
                  </td>
                  <td class="bill-tbl-age">60</td>
                  <td class="bill-tbl-src">Amazon</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td>
                    <img src="./assets/img/elon.webp" width="80px" alt="" />
                  </td>
                  <td class="bill-tbl-rank">1</td>
                  <td class="bill-tbl-name">Elon Musk</td>
                  <td>$241.5 B</td>
                  <td class="bill-tbl-down">
                    <span
                      ><img src="./assets/img/red.png" height="12px" alt=""
                    /></span>
                    $5.9 B | 2.50%
                  </td>
                  <td class="bill-tbl-age">60</td>
                  <td class="bill-tbl-src">Amazon</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td>
                    <img src="./assets/img/elon.webp" width="80px" alt="" />
                  </td>
                  <td class="bill-tbl-rank">1</td>
                  <td class="bill-tbl-name">Elon Musk</td>
                  <td>$241.5 B</td>
                  <td class="bill-tbl-down">
                    <span
                      ><img src="./assets/img/red.png" height="12px" alt=""
                    /></span>
                    $5.9 B | 2.50%
                  </td>
                  <td class="bill-tbl-age">60</td>
                  <td class="bill-tbl-src">Amazon</td>
                  <td>United States</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="technology-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Technology</h3>
            <div class="date">05 March 2024</div>
          </div>
          <div class="tech-main">
            <div class="tech-grid">
              <div id="grid-card " class="grid-card article-open">
                <img src="./assets/img/finance.png" alt="" />
                <div class="tech-data">
                  <div class="tech-header">
                    <div class="tech-title">Google</div>
                    <div class="tech-time">09:00</div>
                  </div>
                  <div class="tech-desc">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Quia, hic.
                  </div>
                </div>
              </div>
              <div id="grid-card article-open" class="grid-card article-open">
                <img src="./assets/img/finance.png" alt="" />
                <div class="tech-data">
                  <div class="tech-header">
                    <div class="tech-title">Google</div>
                    <div class="tech-time">09:00</div>
                  </div>
                  <div class="tech-desc">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Quia, hic.
                  </div>
                </div>
              </div>

              <div id="grid-card article-open" class="grid-card article-open">
                <img src="./assets/img/finance.png" alt="" />
                <div class="tech-data">
                  <div class="tech-header">
                    <div class="tech-title">Google</div>
                    <div class="tech-time">09:00</div>
                  </div>
                  <div class="tech-desc">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Quia, hic.
                  </div>
                </div>
              </div>
              <div id="grid-card article-open" class="grid-card article-open">
                <img src="./assets/img/finance.png" alt="" />
                <div class="tech-data">
                  <div class="tech-header">
                    <div class="tech-title">Google</div>
                    <div class="tech-time">09:00</div>
                  </div>
                  <div class="tech-desc">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Quia, hic.
                  </div>
                </div>
              </div>
            </div>
            <div class="tech-flex">
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>ZARA</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <div class="flex-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A,
                    consequatur?
                  </div>
                </div>
              </div>
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>ZARA</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <div class="flex-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A,
                    consequatur?
                  </div>
                </div>
              </div>
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>ZARA</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <div class="flex-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A,
                    consequatur?
                  </div>
                </div>
              </div>
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>ZARA</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <div class="flex-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A,
                    consequatur?
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="lifestyle-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Lifestyle</h3>
            <div class="date">05 March 2024</div>
          </div>
          <div class="flex-3">
            <div class="div-1 article-open">
              <img src="./assets/img/life.png" alt="" class="life-long-img" />
              <div class="long-header">
                <div class="long-title">ZARA</div>
                <div class="long-time">09:08</div>
              </div>
              <div class="long-desc">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Officiis, suscipit.
              </div>
            </div>
            <div class="div-1 article-open">
              <img src="./assets/img/life.png" alt="" class="life-long-img" />
              <div class="long-header">
                <div class="long-title">ZARA</div>
                <div class="long-time">09:08</div>
              </div>
              <div class="long-desc">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Officiis, suscipit.
              </div>
            </div>
            <div class="div-3">
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>ZARA</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <div class="flex-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A,
                    consequatur?
                  </div>
                </div>
              </div>
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>ZARA</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <div class="flex-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A,
                    consequatur?
                  </div>
                </div>
              </div>
              <div class="flex-card article-open">
                <img src="./assets/img/bg-1.png" alt="" />
                <div class="flex-data">
                  <div class="flex-title">
                    <h3>ZARA</h3>
                    <div class="tech-time">09:00</div>
                  </div>
                  <div class="flex-desc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. A,
                    consequatur?
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="market-arena">
          <div class="rajdhani-layout">
            <h3 class="title-3">Market</h3>
            <div class="date">05 March 2024</div>
          </div>

          <div class="market-main">
            <div class="market-ls">
              <div class="table-head">
                <div class="active-gn gainer-head">Top Gainer</div>
                <div class="looser-head">Top Looser</div>
              </div>
              <div class="place-divs">
                <div class="long-div-green">
                  <div class="short-div"></div>
                  <div class="short-div-2"></div>
                </div>
                <div class="long-div-red">
                  <div class="short-div"></div>
                  <div class="short-div-2"></div>
                </div>
              </div>
              <div class="tables">
                <div class="gainer-table">
                  <table class="market-table" id="gainer-table">
                    <tr>
                      <th>Stocks</th>
                      <th>Price</th>
                      <th>%Change</th>
                    </tr>
                    <tr>
                      <td>Alfreds Futterkiste</td>
                      <td>Maria Anders</td>
                      <td>Germany</td>
                    </tr>
                    <tr>
                      <td>Berglunds snabbköp</td>
                      <td>Christina Berglund</td>
                      <td>Sweden</td>
                    </tr>
                    <tr>
                      <td>Centro comercial Moctezuma</td>
                      <td>Francisco Chang</td>
                      <td>Mexico</td>
                    </tr>
                    <tr>
                      <td>Ernst Handel</td>
                      <td>Roland Mendel</td>
                      <td>Austria</td>
                    </tr>
                  </table>
                </div>
                <div class="looser-table">
                  <table class="market-table" id="looser-table">
                    <tr>
                      <th>Stocks</th>
                      <th>Price</th>
                      <th>%Change</th>
                    </tr>
                    <tr>
                      <td>Alfreds Futterkiste</td>
                      <td>Maria Anders</td>
                      <td>Germany</td>
                    </tr>
                    <tr>
                      <td>Berglunds snabbköp</td>
                      <td>Christina Berglund</td>
                      <td>Sweden</td>
                    </tr>
                    <tr>
                      <td>Centro comercial Moctezuma</td>
                      <td>Francisco Chang</td>
                      <td>Mexico</td>
                    </tr>
                    <tr>
                      <td>Ernst Handel</td>
                      <td>Roland Mendel</td>
                      <td>Austria</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ad"></div>
    </main>
    <footer>
      <div class="footer-top">
        <div class="footer-ls">
          <h1 class="blue-text">Latest</h1>
          <div class="footer-news first-ft-news">
            <div class="news-title">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
              a...
            </div>
            <div class="news-tag">News</div>
          </div>
          <div class="footer-news">
            <div class="news-title">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
              a...
            </div>
            <div class="news-tag">News</div>
          </div>
          <div class="footer-news">
            <div class="news-title">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
              a...
            </div>
            <div class="news-tag">News</div>
          </div>
          <div class="footer-news">
            <div class="news-title">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
              a...
            </div>
            <div class="news-tag">News</div>
          </div>
          <div class="footer-news">
            <div class="news-title">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci,
              a...
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

    <script>
      anychart.onDocumentReady(function () {
        // create data set on our data
        var dataSet = anychart.data.set(getData());

        // map data for the first series, take x from the zero column and value from the first column of data set
        var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });

        // map data for the second series, take x from the zero column and value from the second column of data set
        var secondSeriesData = dataSet.mapAs({ x: 0, value: 2 });

        // map data for the third series, take x from the zero column and value from the third column of data set
        var thirdSeriesData = dataSet.mapAs({ x: 0, value: 3 });

        // create line chart
        var chart = anychart.line();

        // turn on chart animation
        chart.animation(true);

        // set chart padding
        chart.padding([10, 20, 5, 20]);

        // turn on the crosshair
        chart.crosshair().enabled(true).yLabel(false).yStroke(null);

        // set tooltip mode to point
        chart.tooltip().positionMode("point");

        // set chart title text settings
        chart.title("NIFTY MARKET");

        // set yAxis title
        chart.yAxis().title("Stock");
        chart.xAxis().labels().padding(5);

        // create first series with mapped data
        var firstSeries = chart.line(firstSeriesData);
        firstSeries.name("Stock 1");
        firstSeries.hovered().markers().enabled(true).type("circle").size(4);
        firstSeries
          .tooltip()
          .position("right")
          .anchor("left-center")
          .offsetX(5)
          .offsetY(5);

        // create second series with mapped data
        var secondSeries = chart.line(secondSeriesData);
        secondSeries.name("Stock 2");
        secondSeries.hovered().markers().enabled(true).type("circle").size(4);
        secondSeries
          .tooltip()
          .position("right")
          .anchor("left-center")
          .offsetX(5)
          .offsetY(5);

        // create third series with mapped data
        var thirdSeries = chart.line(thirdSeriesData);
        thirdSeries.name("Stock 3");
        thirdSeries.hovered().markers().enabled(true).type("circle").size(4);
        thirdSeries
          .tooltip()
          .position("right")
          .anchor("left-center")
          .offsetX(5)
          .offsetY(5);

        // turn the legend on
        chart.legend().enabled(true).fontSize(13).padding([0, 0, 10, 0]);

        // set container id for the chart
        chart.container("market-graph");
        // initiate chart drawing
        chart.draw();
      });

      function getData() {
        return [
          ["1986", 3.6, 2.3, 2.8, 11.5],
          ["1987", 7.1, 4.0, 4.1, 14.1],
          ["1988", 8.5, 6.2, 5.1, 17.5],
          ["1989", 9.2, 11.8, 6.5, 18.9],
          ["1990", 10.1, 13.0, 12.5, 20.8],
          ["1991", 11.6, 13.9, 18.0, 22.9],
          ["1992", 16.4, 18.0, 21.0, 25.2],
          ["1993", 18.0, 23.3, 20.3, 27.0],
          ["1994", 13.2, 24.7, 19.2, 26.5],
          ["1995", 12.0, 18.0, 14.4, 25.3],
          ["1996", 3.2, 15.1, 9.2, 23.4],
          ["1997", 4.1, 11.3, 5.9, 19.5],
          ["1998", 6.3, 14.2, 5.2, 17.8],
          ["1999", 9.4, 13.7, 4.7, 16.2],
          ["2000", 11.5, 9.9, 4.2, 15.4],
          ["2001", 13.5, 12.1, 1.2, 14.0],
          ["2002", 14.8, 13.5, 5.4, 12.5],
          ["2003", 16.6, 15.1, 6.3, 10.8],
          ["2004", 18.1, 17.9, 8.9, 8.9],
          ["2005", 17.0, 18.9, 10.1, 8.0],
          ["2006", 16.6, 20.3, 11.5, 6.2],
          ["2007", 14.1, 20.7, 12.2, 5.1],
          ["2008", 15.7, 21.6, 10, 3.7],
          ["2009", 12.0, 22.5, 8.9, 1.5],
        ];
      }
    </script>
    <script src="./assets/sidebar.js"></script>
    <script src="./assets/home-animations.js"></script>
  </body>
</html>
