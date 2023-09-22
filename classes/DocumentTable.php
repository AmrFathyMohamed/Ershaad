<?php
class DocumentTable
{
    private $db;
    private $table = 'documents';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertDocument($therapistID, $documentName, $documentOrganization, $documentDate, $documentType, $documentFile)
    {
        $query = "INSERT INTO $this->table (TherapistID, DocumentName, DocumentOrganization, DocumentDate, DocumentType, DocumentFile, is_deleted, created_at, updated_at) 
        VALUES ($therapistID, '$documentName', '$documentOrganization', '$documentDate', '$documentType', '$documentFile', 0, NOW(), NOW())";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function deleteDocument($documentId)
    {
        $query = "DELETE FROM $this->table WHERE DocumentID = $documentId";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getDocuments()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getDocumentById($documentId)
    {
        $query = "SELECT * FROM $this->table WHERE DocumentID = $documentId";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }

    public function getDocumentsByTherapist($therapistID)
    {
        $query = "SELECT * FROM $this->table WHERE TherapistID = $therapistID";
        $stmt = $this->db->executeQuery($query);
        if ($stmt !== false) {
            return $stmt->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>
