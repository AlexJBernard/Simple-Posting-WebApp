<?php
declare(strict_types=1);
namespace App\Infrastructure\Persistence\DAO;

use App\Infrastructure\Persistence\DBIterator;
use App\Domain\Models\Post;

class PostDAO extends DAO {

    /**
     * SQL Query used to select a result from the posts table
     */
    private $BaseQuery = "SELECT * FROM posts 
    JOIN users ON posts.post_user_id=user_id ";

    /**
     * Returns post information based on the given id
     */
    function getById($postId) {
        $DBConn = $this->DBPool->request();
        $DBConn->query($this->BaseQuery . "WHERE post_id = ?",
            array(
                array("value" => $postId, "type" => \PDO::PARAM_INT)
            ));
        $Post = null;
        if ($DBConn->nextRow()) {
            $Post = new Post($DBConn->getRow());
        }
        $this->DBPool->release($DBConn);
        
        return $Post;
    }

    /**
     * Returns an array of all Posts from the post database
     */
    function getAll() {
        $DBConn = $this->DBPool->request();
        $PostIterator = $this->getIterator("");
        $Posts = $PostIterator->toArray();
        return $Posts;
    }

    // POST REQUESTS
    /**
     * @param text The content's of the user's post
     * @param user The user posting the given comment
     */
    function post($text, $user) {
        $DBConn = $this->DBPool->request();
        $DBConn->query("INSERT INTO posts (post_text, post_user_id) VALUES (?, ?)",
        array(
            array("value" => $text, "type" => \PDO::PARAM_STR),
            array("value" => $user->id, "type" => \PDO::PARAM_INT)
        ));
        $postId = $DBConn->lastInsertID();
        $this->DBPool->release($DBConn);
        return $this->getById($postId);
    }

    /**
     * Creates an Iterator for the result of the given SQL query
     * @param appendQuery String appended to the end of the program's base query
     */
    function getIterator($appendQuery) {
        $DBConn = $this->DBPool->request();
        $DBConn->query($this->BaseQuery . $appendQuery);
        return new DBIterator($DBConn, "Post");
    }
}