logRequest();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $err = handleUpload();
}
$thumbs = getGalleryThumbnails();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Фотогалерея</title>
  <style>
    img.thumb { margin: 5px; border: 1px solid #ccc; }
    form { margin-bottom: 20px; }
  </style>
</head>
<body>
  <h1>Фотогалерея</h1>

  <!-- Форма загрузки -->
  <?php if (!empty($err)): ?>
    <p style="color:red"><?=htmlspecialchars($err)?></p>
  <?php endif; ?>
  <form method="post" enctype="multipart/form-data">
    <label>Выберите изображение (JPG, PNG, GIF, до 5 МБ):
      <input type="file" name="photo" accept="image/*" required>
    </label>
    <button type="submit">Загрузить</button>
  </form>

  <!-- Галерея миниатюр -->
  <div class="gallery">
    <?php foreach ($thumbs as $name): ?>
      <a href="images/big/<?=urlencode($name)?>" target="_blank">
        <img class="thumb" src="images/small/<?=urlencode($name)?>" width="150" alt="">
      </a>
    <?php endforeach; ?>
  </div>
</body>
</html>