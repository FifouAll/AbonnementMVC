<?php
/**
 * Description of class
 *
 * @author jchoay
 */
class PDOAbonnement {
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=abonnements';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
        private static $monPdo;
        private static $monPDOAbonnement = null;
        
        private function __construct()
	{
    		PDOAbonnement::$monPdo = new PDO(PDOAbonnement::$serveur.';'.PDOAbonnement::$bdd, PDOAbonnement::$user, PDOAbonnement::$mdp); 
            PDOAbonnement::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PDOAbonnement::$monPdo = null;
	}
        public  static function getPdoAbo()
	{
		if(PDOAbonnement::$monPDOAbonnement == null)
		{
			PDOAbonnement::$monPDOAbonnement= new PDOAbonnement();
		}
		return PDOAbonnement::$monPDOAbonnement;  
	}
        public function getLesTypes()
        {
            $req = "select * from type";
            $res = PDOAbonnement::$monPdo->query($req);
            $lesLignes = $res->fetchAll();
            return $lesLignes;
        }
        
        public function checkLogin($login, $mdp)
        {
           $req = "SELECT Count(*) as c, id FROM user WHERE login = '$login' and mdp = '$mdp'"; 
           $res = PDOAbonnement::$monPdo->query($req)->fetch();
           if($res["c"] > 0)
           {
               return $res["id"];
           }
           else
           {
               return null;
           }
        }
        
        public function inscription($login, $mdp)
        {
            $req = "SELECT * FROM user WHERE login='$login'";
            $exist = PDOAbonnement::$monPdo->query($req)->rowCount();
            if($exist == 0)
            {
                $req = "INSERT INTO user (`login`, `mdp`) VALUES ('$login', '$mdp') ";
                $res = PDOAbonnement::$monPdo->query($req)->rowCount();
                if($res > 0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        
        public function getLesAbonnements($id)
        {
           $req = "SELECT * FROM abonnement WHERE id_user = '$id' ORDER BY DATEDIFF(NOW(), date_fin) DESC, cloturer ASC"; 
           $res = PDOAbonnement::$monPdo->query($req)->fetchAll(); 
           return $res;
        }

        public function getLesAbonnementsByYear($id, $year)
        {
           $req = "SELECT * FROM abonnement WHERE id_user = '$id' and year(date_depart) = '$year' ORDER BY DATEDIFF(NOW(), date_fin) DESC, cloturer ASC"; 
           $res = PDOAbonnement::$monPdo->query($req)->fetchAll(); 
           return $res;
        }

        public function creerAbonnementPromo($date_d, $prix_m, $date_fin, $date_fin_p, $prix_m_p, $type, $id)
        {
            if($date_fin == "") {$date_fin = null;}
            if($date_fin_p == "") {$date_fin_p = null;}
            if($prix_m_p == "0.00") {$prix_m_p = null;}
           
             
            $req = "INSERT INTO abonnement(`date_depart`, `prix_mensuel`, `date_fin`, `date_fin_promotion`, `prix_mensuel_promotion`, `id_type`, `id_user`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $res = PDOAbonnement::$monPdo->prepare($req);
            $res->execute(array($date_d, $prix_m, $date_fin, $date_fin_p, $prix_m_p, $type, $id));
            if($res->rowCount())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public function creerAbonnement($date_d, $prix_m, $date_fin, $type, $id)
        {
            if($date_fin == "") {$date_fin = null;}
           
            $req = "INSERT INTO abonnement(`date_depart`, `prix_mensuel`, `date_fin`, `id_type`, `id_user`) VALUES (?, ?, ?, ?, ?)";
            $res = PDOAbonnement::$monPdo->prepare($req);
            $res->execute(array($date_d, $prix_m, $date_fin, $type, $id));
             
            if($res->rowCount())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        
        public function cloturerAbonnement($id_abo)
        {
            $req = "UPDATE abonnement SET cloturer = 1, date_cloture = date_fin, date_fin = null WHERE id = '$id_abo'";
            $res = PDOAbonnement::$monPdo->query($req)->rowCount();
            if($res > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
}
