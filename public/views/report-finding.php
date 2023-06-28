<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="public/css/style.css" />
  <link rel="stylesheet" type="text/css" href="public/css/found.css" />
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
          <a href="login" class="button">Log out</a>
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
            <input type="file" name="file" required="required"/>
            <input name="foundDate" type="date" placeholder="Date" required="required"/>
            <input name="city" placeholder="City" required="required"/>
            <input name="species" placeholder="Species" required="required"/>
            <input name="microchipNumber" placeholder="Microchip number" />
            <input name="telephone" placeholder="Telephone" pattern="[0-9]{9}" title="Podaj 9 cyfr" required="required"/>
            <textarea name="description" placeholder="Animal description" rows="5"></textarea>
            <button type="submit">Send</button>
          </form>
        </section>
      </header>

    </main>
  </div>
</body>