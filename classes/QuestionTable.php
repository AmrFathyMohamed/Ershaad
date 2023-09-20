<?php 
class QuestionTable
{
    private $db;
    private $table = 'questions';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertQuestion($question, $answer)
    {
        $query = "INSERT INTO $this->table (Question, Answer, is_deleted, created_at, updated_at) 
        VALUES ('$question', '$answer', 0, NOW(), NOW())";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function updateQuestion($questionID, $question, $answer)
    {
        $query = "UPDATE $this->table SET 
                  Question = '$question', Answer = '$answer', updated_at = NOW()
                  WHERE QuestionID = $questionID";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function deleteQuestion($questionID)
    {
        $query = "DELETE FROM $this->table WHERE QuestionID = $questionID";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getQuestions()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getQuestionById($questionID)
    {
        $query = "SELECT * FROM $this->table WHERE QuestionID = $questionID";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }
}
?>