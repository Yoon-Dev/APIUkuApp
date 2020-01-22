<?php
class Manager{
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // caratéristique
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    protected $_conn;
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    // CONSTRUCT
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    public function __construct($conn){$this->setDb($conn);}    
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// fonctionnalité
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    public function getAll(string $parcour)
    {
        // recupere toute les ingredients dans la bdd
    $page = [];
    switch($parcour){
        case 'etudiant':
            $q = $this->_conn->prepare('SELECT * FROM `etudiant`');
            $q->execute([]);
                break;
        case 'entreprise':
            $q = $this->_conn->prepare('SELECT * FROM `entreprise`');
            $q->execute([]);
                break;
    }
    
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {

                $page[] = $donnees;
        }
        return $page;
    }
    
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    public function getFaq(string $parcour)
    {
        $faq = [];
        switch($parcour){
            case 'etudiant':
                $q = $this->_conn->prepare('SELECT * FROM `etu_faq`');
                $q->execute([]);
                    break;
            case 'entreprise':
                $q = $this->_conn->prepare('SELECT * FROM `ent_faq`');
                $q->execute([]);
                    break;
    
        }
        
        
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $faq[] = $donnees;
        }
        return $faq;
    }
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    public function getCompe(string $parcour)
    {
        $compe = [];
        switch($parcour){
            case 'etudiant':
                $q = $this->_conn->prepare('SELECT * FROM `etu_compe`');
                $q->execute([]);
                    break;
            case 'entreprise':
                $q = $this->_conn->prepare('SELECT * FROM `ent_compe`');
                $q->execute([]);
                    break;
        }
        
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $compe[] = $donnees;
        }
        
        return $compe;
    }
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    public function getContent(string $parcour)
    {
        $content = [];
        $content = ['page' => $this->getAll($parcour), 'faq' => $this->getFaq($parcour), 'compe' => $this->getCompe($parcour)];
        // $content = ['page' => 'bru', 'faq' =>  'bru', 'compe' =>  'bru'];

        $content = json_encode($content);
        echo $content;
    }
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    // SETTER
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    public function setDb(PDO $conn){$this->_conn = $conn;}
// end
}