<?php

class Database {
    private $conn;

    /**
     * Konstruktor - Inicjuje połączenie z bazą danych
     *
     * @param string $host     Host bazy danych
     * @param string $user     Nazwa użytkownika bazy danych
     * @param string $password Hasło do bazy danych
     * @param string $dbName   Nazwa bazy danych
     */
    public function __construct($host, $user, $password, $dbName) {
        $this->conn = new mysqli($host, $user, $password, $dbName);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * Wykonuje zapytanie do bazy danych
     *
     * @param string $sql Zapytanie SQL
     * @return mixed      Wynik zapytania
     */
    public function query($sql) {
        $result = $this->conn->query($sql);
        return $result;
    }

    /**
     * Pobiera pojedynczy wiersz wyników
     *
     * @param mixed $result Wynik zapytania
     * @return array|null  Asocjacyjna tablica z danymi wiersza lub null, jeśli brak danych
     */
    public function fetch($result) {
        return $result->fetch_assoc();
    }

    /**
     * Pobiera wszystkie wiersze wyników
     *
     * @param mixed $result Wynik zapytania
     * @return array       Asocjacyjna tablica z danymi wszystkich wierszy
     */
    public function fetchAll($result) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * Escapuje ciąg znaków, aby chronić przed atakami SQL injection
     *
     * @param string $value Niezaufany ciąg znaków
     * @return string       Escapowany ciąg znaków
     */
    public function escapeString($value) {
        return $this->conn->real_escape_string($value);
    }

    /**
     * Zamyka połączenie z bazą danych
     */
    public function closeConnection() {
        $this->conn->close();
    }
}

// Przykład użycia:
/*
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$sql = "SELECT * FROM users";
$result = $db->query($sql);

while ($row = $db->fetch($result)) {
    // Przetwarzanie danych
}

$db->closeConnection();
*/
?>

