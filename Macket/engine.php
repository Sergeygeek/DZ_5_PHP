<?php
// Проверяем был ли отправлен запрос $_POST переменная 'send' которую мы берем на кнопке загрузить в индексном файле
if (isset($_POST['send'])) {
    // Проверяем, что при загрузке не произошло ошибок
  if ( $_FILES['userfile']['error'] == 0 ) {
    // Если файл загружен успешно, то проверяем - графический ли он
    if( substr($_FILES['userfile']['type'], 0, 5)=='image' ) {
      // Читаем содержимое файла
      $image = file_get_contents( $_FILES['userfile']['tmp_name'] );
      // Экранируем специальные символы в содержимом файла
      $image = mysqli_real_escape_string(db_connect(), $image );
      // Формируем запрос на добавление файла в базу данных
      $query="INSERT INTO `photo` (title, img) VALUES(".$_FILES['userfile']['tmp_name'].",'".$image."')";
      // Выполняем данный запрос к базе данных
      mysqli_query( db_connect(), $query );
    }
  }
}

?>