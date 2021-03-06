<?php

namespace TastySite\View;

use Id1354fw\View\AbstractRequestHandler;
use TastySite\Util\Constants;


/**
 * Description of Comments
 *
 * @author sararosander
 */
class HandleComments extends AbstractRequestHandler {
    private $comment;
    
    public function setComment($comment){
        $this->comment = htmlentities($comment, ENT_QUOTES);
    }

    protected function doExecute() {
         $controller = $this->session->get(Constants::CONTR_KEY_NAME);
         $this->session->set(Constants::CONTR_KEY_NAME, $controller);
         
         $user = $this->session->get(Constants::LOGGED_IN_USER);
         $recipe = $this->session->get(Constants::RECIPE);
         
       
        $checkComments = $controller->postComment($user, $recipe, $this->comment);
        $getComments = $controller->readComments($recipe);
          
        $this->addVariable('theComments', $getComments);
               
        if($checkComments){
            return $recipe;
        }
        else {
            echo 'Something went wrong, please try again';
        }    
    
    }
}

