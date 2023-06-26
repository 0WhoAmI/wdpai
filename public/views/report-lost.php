<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="public/css/style.css" />
  <link rel="stylesheet" type="text/css" href="public/css/found.css" />
  <title>REPORT LOST PAGE</title>
</head>

<body>
  <div class="logo-found">
    <img src="public/img/logo.svg" />
  </div>
  <div class="base-container">
    <nav>
    <ul>
        <li>
          <i class="fa-light fa-folder-magnifying-glass"></i>
          <a href="found" class="button">Found</a>
        </li>
        <li>
          <i class="fa-light fa-folder-magnifying-glass"></i>
          <a href="reportFinding" class="button">Report finding</a>
        </li>
        <li>
          <i class="fa-light fa-folder-magnifying-glass"></i>
          <a href="lost" class="button">Lost</a>
        </li>
        <li>
          <i class="fa-solid fa-message-question"></i>
          <a href="reportLost" class="button">Report lost</a>
        </li>
        <li>
          <i class="fa-light fa-folder-magnifying-glass"></i>
          <a href="#" class="button">Profile</a>
        </li>
      </ul>
    </nav>
    <main>
      <header>
        <div class="title">
          <h1>Report Lost</h1>
        </div>

        <section class="add-report-finding">
          <form action="reportLost" method="POST" ENCTYPE="multipart/form-data">
            <?php
            if (isset($messages)) {
              foreach ($messages as $message) {
                echo $message;
              }
            }
            ?>
            <input type="file" name="file" />
            <input name="lostDate" placeholder="Date" />
            <input name="city" placeholder="City" />
            <input name="genre" placeholder="Genre" />
            <input name="microchipNumber" placeholder="Microchip number" />
            <input name="telephone" placeholder="Telephone" />
            <textarea name="description" placeholder="Animal description" rows="5"></textarea>
            <button type="submit">Send</button>
          </form>
        </section>
      </header>

    </main>
  </div>
</body>