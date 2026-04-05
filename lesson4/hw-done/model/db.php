<?php
declare(strict_types=1);

/**
 * Возвращает экземпляр PDO для работы с базой данных
 * Реализует паттерн Singleton для создания единственного подключения
 *
 * @return PDO Экземпляр PDO с настройками по умолчанию
 */
function dbInstance(): PDO
{
  static $db;

  if ($db === null) {
    $db = new PDO('mysql:host=localhost;dbname=lesseon4-hw', 'root', '', [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $db->exec('SET NAMES UTF8');
  }

  return $db;
}

/**
 * Выполняет SQL-запрос с параметрами
 *
 * @param string $sql SQL-запрос с плейсхолдерами
 * @param array $params Массив параметров для привязки к запросу
 * @return PDOStatement Подготовленный и выполненный запрос
 */
function dbQuery(string $sql, array $params = []): PDOStatement
{
  $db = dbInstance();
  $query = $db->prepare($sql);
  $query->execute($params);
  dbCheckError($query);
  return $query;
}

/**
 * Проверяет наличие ошибок в SQL-запросе
 * При наличии ошибки выводит её и завершает выполнение скрипта
 *
 * @param PDOStatement $query Выполненный запрос для проверки
 * @return bool Всегда возвращает true при отсутствии ошибок
 */
function dbCheckError(PDOStatement $query): bool
{
  $errInfo = $query->errorInfo();

  if ($errInfo[0] !== PDO::ERR_NONE) {
    echo $errInfo[2];
    exit();
  }

  return true;
}