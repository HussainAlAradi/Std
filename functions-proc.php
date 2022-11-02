<?php

    function inputEmptySignUp($username,$email,$phone,$pwd,$pwdrepeat){
        $boolvar;
        if(empty($username) || empty($email) || empty($pwd) || empty($pwdrepeat)){
            $boolvar=true;
        } else {
            $boolvar=false;
        }
        return $boolvar;
    }

    function userChar($username){
        $boolvar;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $boolvar=true;
        } else {
            $boolvar=false;
        }
        return $boolvar;
    }

    function emailChar($email){
        $boolvar;
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $boolvar=true;
        } else {
            $boolvar=false;
        }
        return $boolvar;
    }

    function pwdMatch($pwd,$pwdrepeat){
        $boolvar;
        if($pwd !== $pwdrepeat){
            $boolvar=true;
        } else {
            $boolvar=false;
        }
        return $boolvar;
    }

    function pwdSmall($pwd){
        $boolvar;
        if(strlen($pwd) < 8){
            $boolvar=true;
        } else {
            $boolvar=false;
        }
        return $boolvar;
    }

    function phoneLimit($phone){
        $boolvar;
        if(!preg_match("/^[0-9]{8}$/", $phone)) {
          $boolvar=true;
        } else {
            $boolvar=false;
        }
        return $boolvar;
    }

    function userExist($conn,$username,$email){
        try {
            $boolvar;
            // prepare sql and bind parameters
            $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username,$email]);
            if($fetch = $stmt->fetch(PDO::FETCH_ASSOC)){
                return $fetch;
            } else {
                $boolvar = false;
                return $boolvar;
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function createUser($conn,$username,$email,$phone,$pwd){

        try {
            // prepare sql and bind parameters
          $sql = "INSERT INTO users (usersName, usersEmail, usersPhone, usersPWD)
                  VALUES (?,?,?,?);";
          // encrypt password using hashing technique
          $hashedPWD = password_hash($pwd,PASSWORD_DEFAULT);
          $stmt = $conn->prepare($sql);
          $stmt->execute([$username,$email,$phone,$hashedPWD]);
          header("location: ../login.php?error=None");
          exit();
        } catch(PDOException $e) {
            echo "Error signingup: " . $e->getMessage();
        }

    }

    function inputEmptyLogIn($username,$pwd){
        $boolvar;
        if(empty($username)){
            $boolvar=true;
        } else {
            $boolvar=false;
        }
        return $boolvar;
    }

    function loginUser($conn,$username,$pwd){
        $userExist = userExist($conn,$username,$email);

        if($userExist == false){
            header("location: ../login.php?error=usernotExist");
            exit();
        }
        // verify if password is correct
        $hashPWD = $userExist['usersPWD'];
        $checkPWD = password_verify($pwd, $hashPWD);

        if($checkPWD === false){
            header("location: ../login.php?error=passwordIncorrect");
            exit();
        }
        elseif($checkPWD === true){
            session_start();
            $_SESSION['userid'] = $userExist['usersID'];
            $_SESSION['username'] = $userExist['usersName'];
            $_SESSION['useremail'] = $userExist['usersEmail'];
            $_SESSION['userphone'] = $userExist['usersPhone'];
            $_SESSION['usertype'] = $userExist['usersType'];
            header("location: ../index.php?status=loginSuccesfully");
            exit();
        }
    }

    function addItemQuantity($user_id, $type, $id, $qty) {
        if($type === 0 || $type === '0') {
            $type = [0, 'dID'];
        }
        elseif($type === 1 || $type === '1') {
            $type = [1, 'mfID'];
        }
        elseif($type === 2 || $type === '2') {
            $type = [2, 'sfID'];
        }
        else {
            throw new Exception('Unknown food type');
        }

        if((gettype($id) !== 'integer' && gettype($id) !== 'string') || (string) (int) $id !== (string) $id) throw new Exception('Invalid id');
        if((gettype($qty) !== 'integer' && gettype($qty) !== 'string') || (string) (int) $qty !== (string) $qty) throw new Exception('Invalid qty');

        $host = "localhost";
        //default for XAMPP
        $serverName = "root";
        //default for XAMPP
        $serverPWD = "";
        //the name of database you are using in phpMyAdmin
        $dbName = "internet333";

        try {
          $conn2 = new PDO("mysql:host=$host;dbname=$dbName", $serverName, $serverPWD);
          // set the PDO error mode to exception
          $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection to database failed: " . $e->getMessage();
        }

        $conn2->exec('START TRANSACTION');

        $sql = "REPLACE INTO basket (usersID, $type[1]) VALUES ($user_id, $id)";
        $conn2->exec($sql);

        $sql = "SELECT qty FROM basket WHERE usersID = $user_id AND $type[1] = $id";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();

        $basket_item = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $new_quantity = min(($basket_item === false? 0 : $basket_item['qty']) + $qty, 65535);

        $conn2->exec($new_quantity > 0? "REPLACE INTO basket (usersID, $type[1], `type`, qty) VALUES ($user_id, $id, $type[0], $new_quantity)" : "DELETE FROM basket WHERE usersID = $user_id AND `type` = $type[0] AND $type[1] = $id");
        $conn2->exec('COMMIT');
    }

    function setItemQuantity($user_id, $type, $id, $qty) {
        if($type === 0 || $type === '0') {
            $type = [0, 'dID'];
        }
        elseif($type === 1 || $type === '1') {
            $type = [1, 'mfID'];
        }
        elseif($type === 2 || $type === '2') {
            $type = [2, 'sfID'];
        }
        else {
            throw new Exception('Unknown food type');
        }

        if((gettype($id) !== 'integer' && gettype($id) !== 'string') || (string) (int) $id !== (string) $id) throw new Exception('Invalid id');
        if((gettype($qty) !== 'integer' && gettype($qty) !== 'string') || (string) (int) $qty !== (string) $qty) throw new Exception('Invalid qty');

        $GLOBALS['conn']->exec($qty > 0? "REPLACE INTO basket (usersID, $type[1], `type`, qty) VALUES ($user_id, $id, $type[0], $qty)" : "DELETE FROM basket WHERE usersID = $user_id AND `type` = $type[0] AND $type[1] = $id");
    }

    function placeOrder($user_id) {
        $host = "localhost";
        //default for XAMPP
        $serverName = "root";
        //default for XAMPP
        $serverPWD = "";
        //the name of database you are using in phpMyAdmin
        $dbName = "internet333";

        try {
          $conn = new PDO("mysql:host=$host;dbname=$dbName", $serverName, $serverPWD);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection to database failed: " . $e->getMessage();
        }
        $conn->exec('START TRANSACTION');

        $stmt = $conn->prepare("SELECT * FROM basket WHERE usersID = $user_id FOR UPDATE");
        $stmt->execute();
        $basket = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        if(empty($basket)) throw new Exception('Basket is empty');

        $conn->exec("DELETE FROM basket WHERE usersID = $user_id");
        $conn->exec("INSERT INTO orders (usersID, `status`, oPlacedDate, total) VALUES ($user_id, 'acknowledged', CURRENT_TIMESTAMP(), 0)");

        $order_id = $conn->lastInsertId();

        $total_price = 0;
        foreach($basket as $item) {
            if($item['type'] === '0') {
                $sql = "SELECT dPrice AS price FROM drinkanddesserts WHERE dID = $item[dID]";
                $type = [$item['dID'], 'dID', 0];
            }
            elseif($item['type'] === '1') {
                $sql = "SELECT mfPrice AS price FROM mealfood WHERE mfID = $item[mfID]";
                $type = [$item['mfID'], 'mfID', 1];
            }
            else {
                $sql = "SELECT sfPrice AS price FROM singlefood WHERE sfID = $item[sfID]";
                $type = [$item['sfID'], 'sfID', 2];
            }

            $stmt = $conn->query($sql);
            $item['price'] = $stmt->fetch(PDO::FETCH_ASSOC)['price'];
            $stmt->closeCursor();
            $total_price += $item['price'] * $item['qty'];

            $conn->exec("INSERT INTO orderItems (orderID, $type[1], `type`, pricePerUnit, qty) VALUES ($order_id, $type[0], $type[2], $item[price], $item[qty])");
        }

        $conn->exec("UPDATE orders SET total = $total_price WHERE id = $order_id");
        $conn->exec('COMMIT');
    }
