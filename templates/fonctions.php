<?php 
//connextion à base de données 

function connect_BD(){
    $user="root";
    $mdp="";
    $DBname="khmispottery";

    try {
        $conn = new PDO("mysql:host=localhost;dbname=$DBname", $user, $mdp);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //  echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;

}

//fonction pour executer la requete SELECT 

function getAll($tab){
    $conn=connect_BD();
    $res=$conn->query("SELECT * from ". $tab.";");
    //les resultat dans un tableau
    $aff=$res->fetchAll();

    return $aff;

}

//fonction pour recherche produit 

function getProduitByNom($nomProd){

    $cn=connect_BD();
    $req="SELECT * from produit where nom LIKE '%$nomProd%' ;";
    $res=$cn->query($req);
    $prod=$res->fetchAll();
    return $prod;
}
 //fonction pour recherche produit par id

 function getProduitById($id){

    $cn=connect_BD();
    $req="SELECT * from produit where id=$id ;";
    $res=$cn->query($req);
    $prod=$res->fetch();
    return $prod;
} 

function getElementByNom($tab,$nomProd){

    $cn=connect_BD();
    $req="SELECT * from $tab where nom = '$nomProd' ;";
    $res=$cn->query($req);
    $prod=$res->fetchAll();
    return $prod;
}

function getElementById($tab,$id){

    $cn=connect_BD();
    $req="SELECT * from $tab where id=$id ;";
    $res=$cn->query($req);
    $prod=$res->fetch();
    return $prod;
} 
function userExiste($mail){

    $cn=connect_BD();
    $req="SELECT * from user where email='$mail' ;";
    $res=$cn->query($req);
    $prod=$res->fetch(PDO::FETCH_ASSOC);
    return $prod;
}

function AddUser($data){
    try {
    $cn=connect_BD();
    $req="INSERT INTO user (nom,prenom, email, mdp,telphone) VALUES ('".$data["nom"]."','".$data["prenom"]."','".$data["mail"]."','".$data["mdp"]."','".$data["tel"]."');";
    $res=$cn->query($req);

    if ($res){
        return true;
    }else{
        return false;
    }
}
catch( PDOException $Exception ) {
    echo "";
}
}

function ChangerUser($post,$mail){
    try {
    $cn=connect_BD();
   // $req="REPLACE INTO user (nom,prenom, email, telphone) VALUES ('".$post["nom"]."','".$post["prenom"]."','".$post["mail"]."','".$post["tel"]."');";

   $req="UPDATE `user` SET nom='".$post["nom"]."',prenom='".$post["prenom"]."',email='".$post["mail"]."',telphone=".$post["tel"]." WHERE email = '".$mail."';";
    $res=$cn->query($req);
    $user=$res->fetch();
    //var_dump($user);

    if ($res){
        return true;
    }else{
        return false;
    }
}
catch( PDOException $Exception ) {
    echo "erreeuuuur".$Exception;
}
}

function ChangerAdmin($post,$id){
    try {
    $cn=connect_BD();

   $req="UPDATE `admin` SET nom='".$post["nom"]."',mail='".$post["email"]."',mdp='".sha1($post["mdp"])."' WHERE id = '".$id."';";
    $res=$cn->query($req);
    $user=$res->fetch();
    //var_dump($user);

    if ($res){
        return true;
    }else{
        return false;
    }
}
catch( PDOException $Exception ) {
    echo "erreeuuuur".$Exception;
}
}




function checkSession () {
    $boolean=false;
    $timeout = 900;
        if (isset($_SESSION)  )

        {if( isset( $_SESSION[ 'lastaccess' ] ) ) {

            // Time difference since user sent last request
            $duration = time() - intval( $_SESSION[ 'lastaccess' ] );
        
            // Destroy if last request was sent before the current time minus last request
            if( $duration > $timeout ) {
            if(session_status() !== PHP_SESSION_ACTIVE)
                {
                $boolean=true;

                }
        }
        else {
            header("location:index.php");
        
        }

    return $boolean;

    }
    }
}

function produitOnStock($id){
    $prod=getProduitById($id);
    $qte=$prod['qte'];
    if($qte>0){
        return true;
    }else {
        return false;
    }

    
}


function addCommande($post){
try {
    $date_createur=date("Y-m-d");
    $cn=connect_BD();
    $req="INSERT INTO commande (produit,qte, panier, total,date_creation) VALUES ('".$post["produit_id"]."','".$post["qte"]."','".$post["panier"]."','".$post["total"]."','".$date_createur."');";
    $res=$cn->query($req);

    if ($res){
        return true;
    }else{
        return false;
    }
}catch( PDOException $Exception ) {
    echo "hhhh";
}
}

function addPanier($post){
    try {
        $date_createur=date("Y-m-d");
        $cn=connect_BD();
        $req="INSERT INTO panier (visiteur,total, date_creation) VALUES ('".$post["visiteur"]."','".$post["total"]."','".$date_createur."');";
        $res=$cn->query($req);
        $id=$cn->lastInsertId();
    
        if ($res){
            return $id;
        }else{
            return -1;
        }
    }catch( PDOException $Exception ) {
        echo "";
    }
    }
    
    function getAllCommandes(){
        try {
        
    $cn=connect_BD();
    $req="SELECT p.nom, p.img, c.qte, c.total ,c.panier from commande c, produit p where c.produit = p.nom ;";
    $res=$cn->query($req);
    $prod=$res->fetchAll();
    return $prod;

    }catch( PDOException $Exception ) {
    echo "";
}
    }
    function getPanierByEtat($etat){
        $conn=connect_BD();
        $res=$conn->query("SELECT * from panier where etat ='$etat';");
        //les resultat dans un tableau
        $aff=$res->fetchAll();
    
        return $aff;


    }
?>