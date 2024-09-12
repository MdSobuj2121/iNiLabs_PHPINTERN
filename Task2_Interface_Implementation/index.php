<?php

// Define the Logger Interface
interface LoggerInterface {
    public function log(string $message): void;
}

// FileLogger Class
class FileLogger implements LoggerInterface {
    private $filePath;

    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    public function log(string $message): void {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }
}

// Simulated Database Connection Class
class DatabaseConnection {
    public function prepare($query) {
        // Simulate a prepared statement
        return new class {
            public function bindParam($param, $value) {
                // Simulate binding a parameter
            }
            public function execute() {
                // Simulate executing a statement
                echo "Log message inserted into database.\n";
            }
        };
    }
}

// DatabaseLogger Class
class DatabaseLogger implements LoggerInterface {
    private $dbConnection;

    public function __construct(DatabaseConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function log(string $message): void {
        $stmt = $this->dbConnection->prepare("INSERT INTO logs (message) VALUES (:message)");
        $stmt->bindParam(':message', $message);
        $stmt->execute();
    }
}

// Demonstrate Usage

// File Logger Example
$fileLogger = new FileLogger('logfile.log');
$fileLogger->log('This is a log message to a file.');

// Database Logger Example
$dbConnection = new DatabaseConnection();
$databaseLogger = new DatabaseLogger($dbConnection);
$databaseLogger->log('This is a log message to the database.');

?>
