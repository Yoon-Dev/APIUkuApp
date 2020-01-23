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
    public function getAll()
    {
    // recupere la data d'une base de donnée
    $content = [];

            $q = $this->_conn->prepare('SELECT * FROM `uku_sheet`');
            $q->execute([]);

    
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {

                $content[] = $donnees;
        }
        echo json_encode($content);
    }
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°   
    public function add(array $data)
    {
    // ajoute une partition à la base de donéée
        $q = $this->_conn->prepare('INSERT INTO `uku_sheet` (titre, lien_partition, tonalite, tempo, del_link)VALUES (:titre, :lien, :tonalite, :tempo, :del_link)');
        $q->execute([':titre' => $data['titre'],
                     ':lien' => $data['lien'],
                     ':tonalite' => $data['tonalite'],
                     ':tempo' => $data['tempo'],
                     ':del_link' => $data['del_link']]);

    }
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°   
    public function update(array $data, $id, bool $newimg)
    {
    // ajoute une partition à la base de donéée
    $tempo = (int)$data['tempo'];
        if($newimg){
            $q = $this->_conn->prepare('UPDATE `uku_sheet` SET `titre`= :titre,`lien_partition`= :lien,`tonalite`= :tonalite,`tempo`= :tempo,`del_link`= :del_link WHERE `id` = :id');
            $q->execute([':titre' => $data['titre'],
                        ':lien' => $data['lien'],
                        ':tonalite' => $data['tonalite'],
                        ':tempo' => $tempo,
                        ':del_link' => $data['del_link'], 
                        ':id' => $id]);
        }else{
            $q = $this->_conn->prepare('UPDATE `uku_sheet` SET `titre`= :titre,`tonalite`= :tonalite,`tempo`= :tempo WHERE `id` = :id');
            $q->execute([':titre' => $data['titre'],
                        ':tonalite' => $data['tonalite'],
                        ':tempo' => $tempo, 
                        ':id' => $id]);
        }


    }
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    public function del(int $id)
    {
    // ajoute une partition à la base de donéée
        $q = $this->_conn->prepare('DELETE FROM `uku_sheet` WHERE `id` = :id');
        $q->execute([':id' => $id]);
    }
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    // SETTER
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    public function setDb(PDO $conn){$this->_conn = $conn;}
// end
}
