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
    
    public function addUserT_Dollar($email, $username) {
        $sql = 'INSERT INTO t_dollars (email, username, T_Dollars) 
                VALUES (:email, :username, 100)';
    
        $connMgr = new ConnectionManager();       
        $conn = $connMgr->getConnection();
        
        $stmt = $conn->prepare($sql); 

        $stmt->bindParam(':email', $email , PDO::PARAM_STR);
        $stmt->bindParam(':username', $username , PDO::PARAM_STR);

        $isAddOK = False;
        if ($stmt->execute()) {
            $isAddOK = True;
        }

        if ($isAddOK === False) {
            
            $stmt = null;
            $pdo = null;

            return $stmt->errorInfo();
        }

        $stmt = null;
        $pdo = null;

        return $isAddOK;
    }

    public function updateT_Dollar($username, $t_dollars) {
        $sql = 'UPDATE t_dollar
                SET T_Dollars = $t_dollars
                WHERE username = :username';
                
        $connMgr = new ConnectionManager();       
        $conn = $connMgr->getConnection();
        
        $stmt = $conn->prepare($sql); 

        $stmt->bindParam(':email', $email , PDO::PARAM_STR);
        $stmt->bindParam(':username', $username , PDO::PARAM_STR);

        $isAddOK = False;
        if ($stmt->execute()) {
            $isAddOK = True;
        }

        if ($isAddOK === False) {
            
            $stmt = null;
            $pdo = null;

            return $stmt->errorInfo();
        }

        $stmt = null;
        $pdo = null;

        return $isAddOK;
    }

    public function getT_DollarsbyUsername($username) {
        $sql = 'SELECT T_Dollars 
                FROM t_dollars
                WHERE username = :username';

        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = null;
        if ($stmt->execute()) {
      
        // Step 4 - Retrieve Query Results (if any)
        if($row = $stmt->fetch()){
            $result = $row['T_Dollars'];
        }

        $stmt = null;
        $pdo = null;

        // Return (if any)
        return $result;
        }

    }

}