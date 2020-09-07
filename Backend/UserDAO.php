<?php

class UserDAO {
    
//////// Counts total number of courses enrolled by the user ////////
    public function getFullName($username) {
        $sql = 'SELECT first_name, last_name 
                FROM user
                WHERE username = :username';

        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $fullname = '';
        if ($stmt->execute()) {
            if ($row = $stmt->fetch()) {
                $fullname = $row['first_name'] .' '. $row['last_name'];
            }
        }
        
        $stmt = null;
        $pdo = null;

        return $fullname;   
    }

    public function addUser($email, $password, $username, $first_name, $last_name) {
        $sql = 'INSERT INTO user (email, password, username, first_name, last_name) 
                VALUES (:email, :password, :username, :first_name, :last_name)';
    
        $connMgr = new ConnectionManager();       
        $conn = $connMgr->getConnection();
        
        $stmt = $conn->prepare($sql); 

        $stmt->bindParam(':email', $email , PDO::PARAM_STR);
        $stmt->bindParam(':password',$password , PDO::PARAM_STR);
        $stmt->bindParam(':username',$username , PDO::PARAM_STR);
        $stmt->bindParam(':first_name',$first_name , PDO::PARAM_STR);
        $stmt->bindParam(':last_name',$last_name , PDO::PARAM_STR);

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

}

    // public function retrieveByCourse ($userid, $courseid) {
    //     $conn_manager = new ConnectionManager();
    //     $pdo = $conn_manager->getConnection();

    //     $sql = "SELECT * FROM enrolled
    //             WHERE userId = :userId and courseId = :courseId";

    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindParam(':userId', $userid, PDO::PARAM_STR);
    //     $stmt->bindParam(':courseId', $courseid, PDO::PARAM_STR);

    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //     $found = null;

    //     if ($stmt->execute()) {
    //         if ($row = $stmt->fetch()) {
    //             $found = new Enrolled($row["userId"], $row["amount"], $row["courseId"], $row["section"]);
    //         }
    //     }

    //     return $found;
    // }

    // public function retrieveByUserId($userid) {
    //     $conn_manager = new ConnectionManager();
    //     $pdo = $conn_manager->getConnection();

    //     $sql = "SELECT * FROM enrolled
    //             WHERE userId = :userId";

    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindParam(':userId', $userid, PDO::PARAM_STR);

    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //     $course_list = array();

    //     if ($stmt->execute()) {
    //         while ($row = $stmt->fetch()) {
    //             $course_list[] = new Enrolled($row["userId"], $row["amount"], $row["courseId"], $row["section"]);
    //         }
    //     }

    //     return $course_list;
    // }

    // public function insertIntoEnrolled($userId, $amount, $courseId, $section) {

    //     $sql = "INSERT INTO enrolled (userId, amount, courseId, section) 
    //             VALUES (:userId, :amount, :courseId, :section)";

    //     $connMgr = new ConnectionManager();      
    //     $conn = $connMgr->getConnection();
    //     $stmt = $conn->prepare($sql);

    //     $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
    //     $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
    //     $stmt->bindParam(':courseId', $courseId, PDO::PARAM_STR);
    //     $stmt->bindParam(':section', $section, PDO::PARAM_STR);

    //     $isAddOK = False;
    //     if ($stmt->execute()) {
    //         $isAddOK = True;
    //     }
    //     $stmt = null;
    //     $pdo = null;
    //     return $isAddOK;
    // }

    // public function dropEnrolled ($userId, $courseId) {
    //     $sql = "DELETE FROM enrolled
    //             WHERE userId=:userId and courseId=:courseId";

    //     $studentDAO = new StudentDAO();
    //     $enrolledDAO = new EnrolledDAO();

    //     $enrolledObject = $enrolledDAO->retrieveByCourse($userId, $courseId);
    //     $amount = $enrolledObject->getAmount();
        
    //     $student = $studentDAO->retrieve($userId);
    //     $currentEdollars = $student->getEDollar();
    //     $newAmount = $currentEdollars + $amount;
        
    //     $connMgr = new ConnectionManager();
    //     $pdo = $connMgr->getConnection();
    //     $stmt = $pdo->prepare($sql);

    //     $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
    //     $stmt->bindParam(':courseId', $courseId, PDO::PARAM_STR);
        
    //     $isDropOK = False;
    //     if ($stmt->execute()) {
    //         $isDropOK = True;
    //         $status = $studentDAO->updateEDollars($userId, $newAmount);
    //     }
    //     $stmt = null;
    //     $pdo = null;
    //     return $isDropOK;
    // }

    // public function removeAll() {
    //     $sql = '
    //         SET FOREIGN_KEY_CHECKS = 0;
    //         TRUNCATE TABLE enrolled';
        
    //         $connMgr = new ConnectionManager();
    //         $conn = $connMgr->getConnection();
            
    //         $stmt = $conn->prepare($sql);
            
    //         $isTruncateOK = False;
    //         if ($stmt->execute()) {
    //             $isTruncateOK = True;
    //         }
    
    //         $stmt = null;
    //         $pdo = null;
    //         return $isTruncateOK;
    // }

    // public function retrieveAll() {
    //     $conn_manager = new ConnectionManager();
    //     $pdo = $conn_manager->getConnection();

    //     $sql = "SELECT * FROM enrolled";

    //     $stmt = $pdo->prepare($sql);
        
    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //     $course_list = array();

    //     if ($stmt->execute()) {
    //         while ($row = $stmt->fetch()) {
    //             $course_list[] = new Enrolled($row["userId"], $row["amount"], $row["courseId"], $row["section"]);
    //         }
    //     }

    //     return $course_list;
    // }
    
    // public function retrieveByCourseJSON ($userid, $courseid, $section) {
    //     $conn_manager = new ConnectionManager();
    //     $pdo = $conn_manager->getConnection();

    //     $sql = "SELECT * FROM enrolled
    //             WHERE userId = :userId and courseId = :courseId and section= :section";

    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindParam(':userId', $userid, PDO::PARAM_STR);
    //     $stmt->bindParam(':courseId', $courseid, PDO::PARAM_STR);
    //     $stmt->bindParam(':section', $section, PDO::PARAM_STR);

    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //     $found = null;

    //     if ($stmt->execute()) {
    //         if ($row = $stmt->fetch()) {
    //             $found = new Enrolled($row["userId"], $row["amount"], $row["courseId"], $row["section"]);
    //         }
    //     }

    //     return $found;
    // }

    // public function dropEnrolledJSON ($userId, $courseId, $section) {
    //     $sql = "DELETE FROM enrolled
    //             WHERE userId=:userId and courseId=:courseId and section=:section";

    //     $studentDAO = new StudentDAO();
    //     $enrolledDAO = new EnrolledDAO();
    //     $sectionDAO = new SectionDAO();

    //     $enrolledObject = $enrolledDAO->retrieveByCourse($userId, $courseId);
    //     $amount = $enrolledObject->getAmount();
        
    //     $student = $studentDAO->retrieve($userId);
    //     $currentEdollars = $student->getEDollar();
    //     $newAmount = $currentEdollars + $amount;
        
    //     $connMgr = new ConnectionManager();
    //     $pdo = $connMgr->getConnection();
    //     $stmt = $pdo->prepare($sql);

    //     $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);
    //     $stmt->bindParam(':courseId', $courseId, PDO::PARAM_STR);
    //     $stmt->bindParam(':section', $section, PDO::PARAM_STR);
        
    //     $isDropOK = False;
    //     if ($stmt->execute()) {
    //         $isDropOK = True;
    //         $status = $studentDAO->updateEDollars($userId, $newAmount);
    //         $increase = $sectionDAO->IncreaseVacancy($courseId,$section);
    //     }
    //     $stmt = null;
    //     $pdo = null;
    //     return $isDropOK;
    // }

    // public function retrieveByCourseSection ($courseid, $section) {
    //     $conn_manager = new ConnectionManager();
    //     $pdo = $conn_manager->getConnection();

    //     $sql = "SELECT * FROM enrolled
    //             WHERE courseId = :courseId and section= :section";

    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindParam(':courseId', $courseid, PDO::PARAM_STR);
    //     $stmt->bindParam(':section', $section, PDO::PARAM_STR);

    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //     $found = null;

    //     if ($stmt->execute()) {
    //         $found = array();
    //         while ($row = $stmt->fetch()) {
    //             $found[] = new Enrolled($row["userId"], $row["amount"], $row["courseId"], $row["section"]);
    //         }
    //     }

    //     return $found;
    // }