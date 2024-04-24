<?php
// Include your config.php file
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TBF</title>
    <link rel="stylesheet" href="./assets/navbar.css" />
    <link rel="stylesheet" href="./assets/domain.css" />
    <link rel="stylesheet" href="./assets/vid-n-pods.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  </head>
  <body>
    <header id="scroll-header">
      <h1 class="domain-title"><?php echo isset($_GET['type']) ? ucfirst($_GET['type']) : 'Finance'; ?></h1>
      <h2 class="trending-btn">Trending</h2>
      <div class="header-arena">
        <div class="header-ls" id="header-ls">
          <div class="news" data-srce="finance.png">
            <div class="news-num">#1</div>
            <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 1";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
          </div>
          <div class="news" data-srce="domain2.jpeg">
            <div class="news-num">#2</div>
            <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 2";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
          </div>
          <div class="news" data-srce="domain3.jpeg">
            <div class="news-num">#3</div>
            <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 3";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
          </div>
          <div class="news" data-srce="domain2.jpeg">
            <div class="news-num">#4</div>
            <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 4";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
          </div>
          <div class="news" data-srce="domain3.jpeg">
            <div class="news-num">#5</div>
            <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 5";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
          </div>
        </div>
        <div class="header-rs">
          <div class="header-img">
            <img
              src="./assets/img/finance.png"
              height="333px"
              width="333px"
              id="header-img"
              alt=""
            />
          </div>
        </div>
      </div>
    </header>
    <div class="tab-bar">
      <div class="tabs">
        <div class="active-tab tab">India</div>
        <div class="tab">India</div>
        <div class="tab">India</div>
        <div class="tab">India</div>
        <div class="tab">India</div>
      </div>
      <div class="hamburger">
        <img src="./assets/img/menu.png" height="25px" alt="" />
      </div>
      <div class="sidebar" id="sidebar">
        <div class="cross-btn">X</div>
        <div class="side-main">
          <ul class="side-ls">
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="div-main">
      <div class="ad"></div>
      <main>
        <div class="main-arena">
          <div class="flex">
            <div class="flex-img">
              <img src="./assets/img/domain.png" alt="" />
            </div>
            <div class="flex-news">
              <div class="news">
                <div class="news-number">01</div>
                <div class="news-data">
                <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 6";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
                  <div class="news-time">08:45</div>
                </div>
              </div>
              <div class="news">
                <div class="news-number">02</div>
                <div class="news-data">
                <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 7";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
                  <div class="news-time">08:45</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div class="flex-img">
              <img src="./assets/img/domain.png" alt="" />
            </div>
            <div class="flex-news">
              <div class="news">
                <div class="news-number">03</div>
                <div class="news-data">
                <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 8";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
                  <div class="news-time">08:45</div>
                </div>
              </div>
              <div class="news">
                <div class="news-number">04</div>
                <div class="news-data">
                <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 9";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
                  <div class="news-time">08:45</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div class="flex-img">
              <img src="./assets/img/domain.png" alt="" />
            </div>
            <div class="flex-news">
              <div class="news">
                <div class="news-number">05</div>
                <div class="news-data">
                <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 10";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
                  <div class="news-time">08:45</div>
                </div>
              </div>
              <div class="news">
                <div class="news-number">06</div>
                <div class="news-data">
                <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 11";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
                  <div class="news-time">08:45</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div class="flex-img">
              <img src="./assets/img/domain.png" alt="" />
            </div>
            <div class="flex-news">
              <div class="news">
                <div class="news-number">07</div>
                <div class="news-data">
                <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 12";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
                  <div class="news-time">08:45</div>
                </div>
              </div>
              <div class="news">
                <div class="news-number">08</div>
                <div class="news-data">
                <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 13";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<div class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</div>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
                  <div class="news-time">08:45</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="video-arena">
        <div class="rajdhani-layout"><h1>Video</h1></div>
        <div class="vid-flex-container">
          <div class="vid-flex">
            <div class="short-vid">
              <img src="./assets/img/video.png" alt="" />
              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
            <div class="long-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
          </div>
          <div class="vid-flex">
            <div class="long-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
            <div class="short-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
          </div>
          <div class="vid-flex">
            <div class="short-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
            <div class="short-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
            <div class="short-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
          </div>
        </div>
      </div> -->
        <!-- <div class="podcast-arena">
        <div class="rajdhani-layout"><h1>Podcast</h1></div>
        <div class="podcast-main">
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
        </div>
      </div> -->
        <aside class="news-side">
          <div class="new-v-news">
            <div class="news">
              <div class="news-data">
              <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 14";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<h2 class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</h2>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
              </div>
              <div class="news-image-container">
                <img
                  src="./assets/img/finance.png"
                  height="140px"
                  alt=""
                  class="news-img"
                />
              </div>
            </div>

            <div class="news">
              <div class="news-data">
              <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 15";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<h2 class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</h2>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
              </div>
              <div class="news-image-container">
                <img
                  src="./assets/img/finance.png"
                  height="140px"
                  alt=""
                  class="news-img"
                />
              </div>
            </div>

            <div class="news">
              <div class="news-data">
              <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 16";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<h2 class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</h2>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
              </div>
              <div class="news-image-container">
                <img
                  src="./assets/img/finance.png"
                  height="140px"
                  alt=""
                  class="news-img"
                />
              </div>
            </div>

            <div class="news">
              <div class="news-data">
              <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 17";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<h2 class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</h2>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
              </div>
              <div class="news-image-container">
                <img
                  src="./assets/img/finance.png"
                  height="140px"
                  alt=""
                  class="news-img"
                />
              </div>
            </div>

            <div class="news">
              <div class="news-data">
              <?php
              try {
                  $type = isset($_GET['type']) ? $_GET['type'] : 'Lifestyle';
                  $sql = "SELECT Title, Num FROM news WHERE Type = '$type' AND Num = 18";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                      $row = $stmt->fetch(PDO::FETCH_ASSOC);
                      $url = 'Article.php?type=' . $type . '&num=' . $row['Num'];
                      echo '<h2 class="news-title" onclick="window.location.href=\'' . $url . '\'">' . $row['Title'] . '</h2>';
                  } else {
                      echo "No records found";
                  }
              } catch(PDOException $error) {
                  echo "Connection failed: " . $error->getMessage();
              }
              ?>
              </div>
              <div class="news-image-container">
                <img
                  src="./assets/img/finance.png"
                  height="140px"
                  alt=""
                  class="news-img"
                />
              </div>
            </div>
          </div>
        </aside>
      </main>
      <div class="ad"></div>
    </div>
    <div class="bottom-tab-arena">
      <div class="active-btm bottom-tab">Finance</div>
      <div class="bottom-tab">Billionare</div>
      <div class="bottom-tab">Billionare</div>
      <div class="bottom-tab">Billionare</div>
      <div class="bottom-tab">Billionare</div>
      <div class="bottom-tab">Billionare</div>
    </div>
    <div class="pagination">
      <div class="btm-btn">
        <a href="">
          <img src="./assets/img/chevron-left.png" height="25px" alt="" />
        </a>
      </div>
      <div class="pages">
        <div class="active-pg">1</div>
        <div class="pg"></div>
        <div class="pg"></div>
        <div class="pg"></div>
        <div class="pg"></div>
        <div class="pg"></div>
      </div>
      <div class="btm-btn">
        <a href="">
          <img src="./assets/img/chevron-right.png" height="25px" alt="" />
        </a>
      </div>
    </div>
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
    <script src="./assets/sidebar.js"></script>
    <script src="./assets/scroll-event.js"></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Finance - TBF</title>
    <link rel="stylesheet" href="./assets/navbar.css" />
    <link rel="stylesheet" href="./assets/domain.css" />
    <link rel="stylesheet" href="./assets/vid-n-pods.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  </head>
  <body>
    <header id="scroll-header">
      <h1 class="domain-title">Finance</h1>
      <h2 class="trending-btn">Trending</h2>
      <div class="header-arena">
        <div class="header-ls" id="header-ls">
          <div class="news" data-srce="finance.png">
            <div class="news-num">#1</div>
            <div class="news-title">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi,
              eaque?
            </div>
          </div>
          <div class="news" data-srce="domain2.jpeg">
            <div class="news-num">#1</div>
            <div class="news-title">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi,
              eaque?
            </div>
          </div>
          <div class="news" data-srce="domain3.jpeg">
            <div class="news-num">#1</div>
            <div class="news-title">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi,
              eaque?
            </div>
          </div>
          <div class="news" data-srce="domain2.jpeg">
            <div class="news-num">#1</div>
            <div class="news-title">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi,
              eaque?
            </div>
          </div>
          <div class="news" data-srce="domain3.jpeg">
            <div class="news-num">#1</div>
            <div class="news-title">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi,
              eaque?
            </div>
          </div>
        </div>
        <div class="header-rs">
          <div class="header-img">
            <img
              src="./assets/img/finance.png"
              height="333px"
              width="333px"
              id="header-img"
              alt=""
            />
          </div>
        </div>
      </div>
    </header>
    <div class="tab-bar">
      <div class="hamburger">
        <img src="./assets/img/menu.png" height="25px" alt="" />
      </div>
      <div class="sidebar" id="sidebar">
        <div class="cross-btn">X</div>
        <div class="side-main">
          <ul class="side-ls">
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
            <li><a href="">Home</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="div-main">
      <div class="ad"></div>
      <main>
        <div class="main-arena">
          <div class="flex">
            <div class="flex-img">
              <img src="./assets/img/domain.png" alt="" />
            </div>
            <div class="flex-news">
              <div class="news">
                <div class="news-number">01</div>
                <div class="news-data">
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Maiores, itaque?
                  </div>
                  <div class="news-time">08:45</div>
                </div>
              </div>
              <div class="news">
                <div class="news-number">01</div>
                <div class="news-data">
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Maiores, itaque?
                  </div>
                  <div class="news-time">08:45</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div class="flex-img">
              <img src="./assets/img/domain.png" alt="" />
            </div>
            <div class="flex-news">
              <div class="news">
                <div class="news-number">01</div>
                <div class="news-data">
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Maiores, itaque?
                  </div>
                  <div class="news-time">08:45</div>
                </div>
              </div>
              <div class="news">
                <div class="news-number">01</div>
                <div class="news-data">
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Maiores, itaque?
                  </div>
                  <div class="news-time">08:45</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div class="flex-img">
              <img src="./assets/img/domain.png" alt="" />
            </div>
            <div class="flex-news">
              <div class="news">
                <div class="news-number">01</div>
                <div class="news-data">
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Maiores, itaque?
                  </div>
                  <div class="news-time">08:45</div>
                </div>
              </div>
              <div class="news">
                <div class="news-number">01</div>
                <div class="news-data">
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Maiores, itaque?
                  </div>
                  <div class="news-time">08:45</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div class="flex-img">
              <img src="./assets/img/domain.png" alt="" />
            </div>
            <div class="flex-news">
              <div class="news">
                <div class="news-number">01</div>
                <div class="news-data">
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Maiores, itaque?
                  </div>
                  <div class="news-time">08:45</div>
                </div>
              </div>
              <div class="news">
                <div class="news-number">01</div>
                <div class="news-data">
                  <div class="news-title">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Maiores, itaque?
                  </div>
                  <div class="news-time">08:45</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="video-arena">
        <div class="rajdhani-layout"><h1>Video</h1></div>
        <div class="vid-flex-container">
          <div class="vid-flex">
            <div class="short-vid">
              <img src="./assets/img/video.png" alt="" />
              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
            <div class="long-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
          </div>
          <div class="vid-flex">
            <div class="long-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
            <div class="short-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
          </div>
          <div class="vid-flex">
            <div class="short-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
            <div class="short-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
            <div class="short-vid">
              <img src="./assets/img/video.png" alt="" />

              <div class="vid-news">NEWS</div>
              <div class="vid-title">Video Title</div>
            </div>
          </div>
        </div>
      </div> -->
        <!-- <div class="podcast-arena">
        <div class="rajdhani-layout"><h1>Podcast</h1></div>
        <div class="podcast-main">
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
          <div class="podcast-card">
            <img src="./assets/img/podcast.png" alt="" />
            <div class="bill-name">Rakshanda Giri</div>
            <div class="bill-sub">Billionare</div>
            <div class="bill-desc">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
              nostrum?
            </div>
          </div>
        </div>
      </div> -->
        <aside class="news-side">
          <div class="new-v-news">
            <div class="news">
              <div class="news-data">
                <h2 class="news-title">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Unde, saepe exercitationem expedita laborum optio nostrum?
                </h2>
                <div class="news-desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Sequi ullam quaerat numquam dolorem explicabo ab impedit et
                  dolor esse, omnis sed libero quae? Pariatur, aperiam.
                </div>
              </div>
              <div class="news-image-container">
                <img
                  src="./assets/img/finance.png"
                  height="140px"
                  alt=""
                  class="news-img"
                />
              </div>
            </div>

            <div class="news">
              <div class="news-data">
                <h2 class="news-title">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Unde, saepe exercitationem expedita laborum optio nostrum?
                </h2>
                <div class="news-desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Sequi ullam quaerat numquam dolorem explicabo ab impedit et
                  dolor esse, omnis sed libero quae? Pariatur, aperiam.
                </div>
              </div>
              <div class="news-image-container">
                <img
                  src="./assets/img/finance.png"
                  height="140px"
                  alt=""
                  class="news-img"
                />
              </div>
            </div>

            <div class="news">
              <div class="news-data">
                <h2 class="news-title">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Unde, saepe exercitationem expedita laborum optio nostrum?
                </h2>
                <div class="news-desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Sequi ullam quaerat numquam dolorem explicabo ab impedit et
                  dolor esse, omnis sed libero quae? Pariatur, aperiam.
                </div>
              </div>
              <div class="news-image-container">
                <img
                  src="./assets/img/finance.png"
                  height="140px"
                  alt=""
                  class="news-img"
                />
              </div>
            </div>

            <div class="news">
              <div class="news-data">
                <h2 class="news-title">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Unde, saepe exercitationem expedita laborum optio nostrum?
                </h2>
                <div class="news-desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Sequi ullam quaerat numquam dolorem explicabo ab impedit et
                  dolor esse, omnis sed libero quae? Pariatur, aperiam.
                </div>
              </div>
              <div class="news-image-container">
                <img
                  src="./assets/img/finance.png"
                  height="140px"
                  alt=""
                  class="news-img"
                />
              </div>
            </div>

            <div class="news">
              <div class="news-data">
                <h2 class="news-title">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Unde, saepe exercitationem expedita laborum optio nostrum?
                </h2>
                <div class="news-desc">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Sequi ullam quaerat numquam dolorem explicabo ab impedit et
                  dolor esse, omnis sed libero quae? Pariatur, aperiam.
                </div>
              </div>
              <div class="news-image-container">
                <img
                  src="./assets/img/finance.png"
                  height="140px"
                  alt=""
                  class="news-img"
                />
              </div>
            </div>
          </div>
        </aside>
      </main>
      <div class="ad"></div>
    </div>
    <div class="bottom-tab-arena">
      <div class="active-btm bottom-tab">Finance</div>
      <div class="bottom-tab">Billionare</div>
      <div class="bottom-tab">Billionare</div>
      <div class="bottom-tab">Billionare</div>
      <div class="bottom-tab">Billionare</div>
      <div class="bottom-tab">Billionare</div>
    </div>
    <div class="pagination">
      <div class="btm-btn">
        <a href="">
          <img src="./assets/img/chevron-left.png" height="25px" alt="" />
        </a>
      </div>
      <div class="pages">
        <div class="active-pg">1</div>
        <div class="pg"></div>
        <div class="pg"></div>
        <div class="pg"></div>
        <div class="pg"></div>
        <div class="pg"></div>
      </div>
      <div class="btm-btn">
        <a href="">
          <img src="./assets/img/chevron-right.png" height="25px" alt="" />
        </a>
      </div>
    </div>
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
    <script src="./assets/sidebar.js"></script>
    <script src="./assets/scroll-event.js"></script>
  </body>
</html>
