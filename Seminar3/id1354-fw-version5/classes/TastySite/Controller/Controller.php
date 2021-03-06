<?php

namespace TastySite\Controller;

use TastySite\Model\User;
use TastySite\Model\Comment;

/**
 * All calls to Model passes through here
 *
 * @author sararosander
 */
class Controller {
    private $user,$comment;
    
    public function login($username, $password){
        $this->user = new User();
        return $this->user->checkLogin($username, $password);
    }
    
    public function register($username, $password){
        $this->user = new User();
        return $this->user->checkRegister($username, $password);
    }
    
    public function postComment($username, $recipe, $comment){
        $this->comment = new Comment();
        return $this->comment->addComment($username, $recipe, $comment);
    }
    
    public function readComments($recipe){
        $this->comment = new Comment();
        return $this->comment->getComments($recipe);
    }
    
    public function deleteComment($comment_id, $comment_user, $comment_recipe, $loggedInUser){
        $this->comment = new Comment();
        return $this->comment->deleteComment($comment_id, $comment_user, $comment_recipe, $loggedInUser);
    }  
}
