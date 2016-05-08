<?php
require_once('bdd.php');

 
 class Student{

      public $interest;
      public $course;
      public $length;
      public $hours ;
      public $share ;
      public $firstname;
      public $name;
      public $phone;
      public $email;

		public function insert($interest,$course,$length,$hours,$share,$firstname,$name,$phone,$email ){
			global $bdd;
			$statement = $bdd->prepare("INSERT INTO `cours`(`prenom`, `nom`, `telephone`, `email`, `interets`, `cour_souhaite`, `pratique`, `heures_semaine`, `vu_par`) VALUES (:prenom, :nom, :telephone, :email, :interets, :cours_souhaite, :pratique, :heures_semaine, :vu_par)");
			$statement->bindParam(':prenom', $firstname);
			$statement->bindParam(':nom', $name);
			$statement->bindParam(':telephone', $phone);
			$statement->bindParam(':email', $email);
			$statement->bindParam(':interets', $interest);
			$statement->bindParam(':cours_souhaite', $course);
			$statement->bindParam(':pratique', $length);
			$statement->bindParam(':heures_semaine', $hours);
			$statement->bindParam(':vu_par', $share);
			$statement->execute();
			$statement->closeCursor();
			if($statement){
				return true;
				 echo $statement;
			}else{
			   
				return false;
				echo $statement;
			}
			
		}
		
		
		
		
}		
		
		
		
?>