<?php

class assetDAO {
    
    // retrieves all asset
    public  function retrieveAllAsset() {
        $sql = 'SELECT * FROM asset';
        
            
        $connMgr = new ConnectionManager();      
        $conn = $connMgr->getConnection();

        $stmt = $conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $result = array();

        while($row = $stmt->fetch()) {
            $result[] = new asset($row['name'], $row['value']);
        }
                  
        return $result;
    }

    // retrieves specified random asset
    public function retrieveRandomAsset($num) {
        $sql = 'SELECT * FROM asset
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
            $result[] = new asset($row['name'], $row['value']);
        }
                  
        return $result;
    }
}