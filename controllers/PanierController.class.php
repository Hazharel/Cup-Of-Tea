<?php

class PanierController
{

   
   
    public function display()
    {
        
            //instance de mes class model pour les appeller dans les "phtml"
           
            //$thesModels= new ThesModel();
           // $id= $_GET['idtry'];
           // $thesModel= $thesModels -> getAllThes($id);
            //$thesPrice= $thesModels -> getPrice($id);

                        
            
            
            $template ='panierAffichage.phtml';
            require 'views/layout.phtml';
            
            
            
            
    }
    
     public function verify(){
        
        if(isset($_POST['mail'])){

            $utilisateurModel= new UtilisateursModel();
            $users= $utilisateurModel -> getUser($_POST['mail']);
           

 
            if($_POST['mail'] == $users['mail_ut'] && password_verify($_POST['verifpassword'],$users['mdp_ut'])){
                //connection l'utilisateur en utilisant une session
                //variables super globales
                
                $_SESSION['user']='user';
                $_SESSION['userId']=$users['id_ut'];
                //$_SESSION['etiquette']=valeur dont on a besoin plus tard
        
            }
    
            else{
                 $error="Vous n'avez pas saisi les bons identifiants";
               
            }
        }
        
    }
     public function getInfo(){
          
          
       $thesModel = new ThesModel();
         // Takes raw data from the request
         $json = file_get_contents('php://input');

        // Converts it into a PHP object
        $data = json_decode($json);

        for ($i =0;$i<count($data); $i++){
            $prix = $data[$i] -> prix;
            $poid = $data[$i] -> poids;
            $article = $data[$i] -> article;
            
            $Thes = $thesModel -> getAllThes($article, $poid);
            $data[$i] -> title = $Thes["titre_the"];
            $data[$i] -> image = $Thes["image_the"];
            
        }
        
        require 'views/Panier.phtml';
    }
   
       

   
}    