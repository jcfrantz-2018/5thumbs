<?php

class T_DollarsDAO {
    
//////// Counts total number of courses enrolled by the user ////////
    public function getUsername_T_Dollars() {
        $sql = 'SELECT username, T_Dollars 
                FROM t_dollars
                ORDER BY T_Dollars desc';

        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $stmt = $conn->prepare($sql);

        //$stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = null;
        if ($stmt->execute()) {
      
        // Step 4 - Retrieve Query Results (if any)
        while($row = $stmt->fetch()){
            $result[] = ([$row['username'], 
                        $row['T_Dollars']]
                        );
                    }
        }

        $stmt = null;
        $pdo = null;

        // Return (if any)
        return $result;
    }

}