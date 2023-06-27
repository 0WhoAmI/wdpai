<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="public/css/style.css" />
  <link rel="stylesheet" type="text/css" href="public/css/found.css" />
  <script type="text/javascript" src="./public/js/searchLost.js" defer></script>
  <title>LOST PAGE</title>
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
          <h1>Lost</h1>
        </div>
        <div class="search-bar">
          <form>
            <input placeholder="Date" type="date"/>
            <input placeholder="City" />
            <input placeholder="Genre" />
            <input placeholder="Microchip number" />
          </form>
        </div>
      </header>

      <section class="found-list">
      <?php
        foreach ( $losts as $lost):
        ?>
        <div>
          <div class="photo"><img src="public/uploads/<?= $lost->getPhoto()?>"></div>
          <div class="info">
            <p class="info-city"><small>City:</small>&emsp; <strong><?= $lost->getCity()?></strong></p>
            <p class="info-microchipNumer"><small>Microchip:</small>&emsp; <strong><?= $lost->getMicrochipNumber()?></strong></p>
            <p class="info-description"><small>Description:</small>&emsp; <strong><?= $lost->getDescription()?></strong></p>
            <p class="info-found-date"><small>Lost:</small>&emsp; <strong><?= $lost->getLostDate()?></strong></p>
            <p class="info-telephone"><small>Phone:</small>&emsp; <strong><?= $lost->getTelephone()?></strong></p>
          </div>
        </div>
        <?php endforeach; ?>
      </section>
    </main>
  </div>
</body>

<template id="lost-template">
  <div>
    <div class="photo"><img src=""></div>
    <div class="info">
      <p class="info-city"><small>City:</small>&emsp; <strong></strong></p>
      <p class="info-microchipNumer"><small>Microchip:</small>&emsp; <strong></strong></p>
      <p class="info-description"><small>Description:</small>&emsp; <strong></strong></p>
      <p class="info-lost-date"><small>Lost:</small>&emsp; <strong></strong></p>
      <p class="info-telephone"><small>Phone:</small>&emsp; <strong></strong></p>
    </div>
  </div>
</template>