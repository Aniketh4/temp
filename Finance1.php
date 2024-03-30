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
            $sql = "SELECT Title FROM Test WHERE Num = :num AND Type = :type";
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':num', $num, PDO::PARAM_INT);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);

            // Set parameters
            $num = 1;
            $type = 'Finance';

            // Execute query
            $stmt->execute();

            // Fetch row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if a row was found
            if ($row) {
                // Output the text
                echo $row['Title'] ;
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
            At vero eos et accusamus et iusto odio dignissimos ducimus qui
            blanditiis praesentium voluptatum deleniti atque corrupti quos
            dolores et quas molestias excepturi sint occaecati cupiditate non
            provident, similique sunt in culpa qui officia deserunt mollitia
            animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis
            est et expedita distinctio. Nam libero tempore, cum soluta nobis est
            eligendi optio cumque nihil impedit quo minus id quod maxime placeat
            facere possimus, omnis voluptas assumenda est, omnis dolor
            repellendus. Temporibus autem quibvoluptates repudiandae sint et
            molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente
            delectus, ut aut reiciendis voluptatibus maiores alias consequatur
            aut perferendis doloribus asperiores repellat. On the other hand, we
            denounce with righteous indignation and dislike men who are so
            beguiled and demoralized by the charms of pleasure of the moment, so
            blinded by desire, that they cannot foresee the pain and trouble
            that are bound to ensue; and equal blame belongs to those who fail
            in their duty through weakness of will, which is the same as saying
            through shrinking from toil and pain. These cases are perfectly
            simple and easy to distinguish. In a free hour, when our power of
            choice is untrammelled and when nothing prevents our being able to
            do what we like best, every pleasure is to be welcomed and every
            pain avoided. But in certain circumstances and owing to the claims
            of duty ormatters to this principle of selection: he rejects
            pleasures to secure other greater pleasures, or else he endures
            pains to avoid worse pains. At vero eos et accusamus et iusto odio
            dignissimos ducimus qui blanditiis praesentium voluptatum deleniti
            atque corrupti quos dolores et quas molestias excepturi sint
            occaecati cupiditate non provident, similique sunt in culpa qui
            officia deserunt mollitia animi, id est laborum et dolorum fuga. Et
            harum quidem rerum facilis est et expedita distinctio. Nam libero
            tempore, cum soluta nobis est eligendi optio cumque nihil impedit
            quo minus id quod maxime placeat facere possimus, omnis voluptas
            assumenda est, omnis dolor repellendus. Temporibus autem
            quibvoluptates repudiandae sint et molestiae non recusandae. Itaque
            earum rerum hic tenetur a sapiente delectus, ut aut reiciendis
            voluptatibus maiores alias consequatur aut perferendis doloribus
            asperiores repellat. On the other hand, we denounce with righteous
            indignation and dislike men who are so beguiled and demoralized by
            the charms of pleasure of the moment, so blinded by desire, that
            they cannot foresee the pain and trouble that are bound to ensue;
            and equal blame belongs to those who fail in their duty through
            weakness of will, which is the same as saying through shrinking from
            toil and pain. These cases are perfectly simple and easy to
            distinguish. In a free hour, when our power of choice is
            untrammelled and when nothing prevents our being able to do what we
            like best, every pleasure is to be welcomed and every pain avoided.
            But in certain circumstances and owing to the claims of duty
            ormatters to this principle of selection: he rejects pleasures to
            secure other greater pleasures, or else he endures pains to avoid
            worse pains. At vero eos et accusamus et iusto odio dignissimos
            ducimus qui blanditiis praesentium voluptatum deleniti atque
            corrupti quos dolores et quas molestias excepturi sint occaecati
            cupiditate non provident, similique sunt in culpa qui officia
            deserunt mollitia animi, id est laborum et dolorum fuga. Et harum
            quidem rerum facilis est et expedita distinctio. Nam libero tempore,
            cum soluta nobis est eligendi optio cumque nihil impedit quo minus
            id quod maxime placeat facere possimus, omnis voluptas assumenda
            est, omnis dolor repellendus. Temporibus autem quibvoluptates
            repudiandae sint et molestiae non recusandae. Itaque earum rerum hic
            tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores
            alias consequatur aut perferendis doloribus asperiores repellat. On
            the other hand, we denounce with righteous indignation and dislike
            men who are so beguiled and demoralized by the charms of pleasure of
            the moment, so blinded by desire, that they cannot foresee the pain
            and trouble that are bound to ensue; and equal blame belongs to
            those who fail in their duty through weakness of will, which is the
            same as saying through shrinking from toil and pain. These cases are
            perfectly simple and easy to distinguish. In a free hour, when our
            power of choice is untrammelled and when nothing prevents our being
            able to do what we like best, every pleasure is to be welcomed and
            every pain avoided. But in certain circumstances and owing to the
            claims of duty ormatters to this principle of selection: he rejects
            pleasures to secure other greater pleasures, or else he endures
            pains to avoid worse pains. At vero eos et accusamus et iusto odio
            dignissimos ducimus qui blanditiis praesentium voluptatum deleniti
            atque corrupti quos dolores et quas molestias excepturi sint
            occaecati cupiditate non provident, similique sunt in culpa qui
            officia deserunt mollitia animi, id est laborum et dolorum fuga. Et
            harum quidem rerum facilis est et expedita distinctio. Nam libero
            tempore, cum soluta nobis est eligendi optio cumque nihil impedit
            quo minus id quod maxime placeat facere possimus, omnis voluptas
            assumenda est, omnis dolor repellendus. Temporibus autem
            quibvoluptates repudiandae sint et molestiae non recusandae. Itaque
            earum rerum hic tenetur a sapiente delectus, ut aut reiciendis
            voluptatibus maiores alias consequatur aut perferendis doloribus
            asperiores repellat. On the other hand, we denounce with righteous
            indignation and dislike men who are so beguiled and demoralized by
            the charms of pleasure of the moment, so blinded by desire, that
            they cannot foresee the pain and trouble that are bound to ensue;
            and equal blame belongs to those who fail in their duty through
            weakness of will, which is the same as saying through shrinking from
            toil and pain. These cases are perfectly simple and easy to
            distinguish. In a free hour, when our power of choice is
            untrammelled and when nothing prevents our being able to do what we
            like best, every pleasure is to be welcomed and every pain avoided.
            But in certain circumstances and owing to the claims of duty
            ormatters to this principle of selection: he rejects pleasures to
            secure other greater pleasures, or else he endures pains to avoid
            worse pains.
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
