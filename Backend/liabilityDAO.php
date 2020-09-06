<?php

class liabilityDAO {
    
    // retrieves all liability
    public  function retrieveAllliability() {
        $sql = 'SELECT * FROM liability';
        
            
        $connMgr = new ConnectionManager();      
        $conn = $connMgr->getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $result = array();

        while($row = $stmt->fetch()) {
            $result[] = new liability($row['name'], $row['value'], $row['happiness']);
        }
                  
        return $result;
    }

    // retrieves specified random liability
    public function retrieveRandomLiability($num) {
        $sql = 'SELECT * FROM liability
        ORDER BY RAND()
        LIMIT :num';
        
            
        $connMgr = new ConnectionManager();      
        $conn = $connMgr->getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(':num', $num, PDO::PARAM_INT);
        $stmt->execute();

        $result = array();

        while($row = $stmt->fetch()) {
            $result[] = new liability($row['name'], $row['value'], $row['happiness']);
        }
                  
        return $result;
    }
}