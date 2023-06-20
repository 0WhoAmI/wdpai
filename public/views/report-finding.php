<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="public/css/style.css" />
  <link rel="stylesheet" type="text/css" href="public/css/found.css" />
  <script src="https://kit.fontawesome.com/33c1bba527.js" crossorigin="anonymous"></script>
  <title>REPORT FINDING PAGE</title>
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
          <a href="#" class="button">Found</a>
        </li>
        <li>
          <i class="fa-light fa-folder-magnifying-glass"></i>
          <a href="#" class="button">Report finding</a>
        </li>
        <li>
          <i class="fa-light fa-folder-magnifying-glass"></i>
          <a href="#" class="button">Missing</a>
        </li>
        <li>
          <i class="fa-solid fa-message-question"></i>
          <a href="#" class="button">Report missing</a>
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
          <h1>Report Finding</h1>
        </div>

        <section class="add-report-finding">
          <form action="reportFinding" method="POST" ENCTYPE="multipart/form-data">
            <?php
            if (isset($messages)) {
              foreach ($messages as $message) {
                echo $message;
              }
            }
            ?>
            <input type="file" name="file" />
            <input name="date" placeholder="Date" />
            <input name="city" placeholder="City" />
            <input name="genre" placeholder="Genre" />
            <input name="gender" placeholder="Gender" />
            <input name="microchipNumber" placeholder="Microchip number" />
            <input name="email" placeholder="Email" />
            <input name="telephone" placeholder="Telephone" />
            <textarea name="animalDescription" placeholder="Animal description" rows="5"></textarea>
            <button type="submit">Send</button>
          </form>
        </section>
      </header>

    </main>
  </div>
</body>