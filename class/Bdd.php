<?php
class Bdd{
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // caratéristique
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    protected   $_id,
                $_titre,
                $_lien_partition,
                $_tonalite,
                $_tempo,
                $_del_link;
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    // CONSTRUCT
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    public function __construct(Array $data){
        $this->hydrate($data);
    }
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    // HYDRATE
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    public function hydrate(Array $data){
        foreach ($data as $key => $value){
            $method='set'.ucfirst($key);
    // convertit les str censée etre des int en int
            if($key == "id" || $key == "etat_repe" || $key == "repe_confirme"){
                $value = intval($value);
            }
            if (method_exists($this, $method)){
                $this->$method($value);
            }
            }
        }
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    // fonctionnalité
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        public function SweetLimite(){
            $ugly = $this->limite();
            $ugly = substr($ugly, 5, 5);
            $this->_limite = $ugly;
        }
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    // GETTER
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    public function id(){return$this->_id;}
    public function titre(){return$this->_titre;}
    public function lien_partition(){return$this->_lien_partition;}
    public function tonalite(){return$this->_tonalite;}
    public function tempo(){return$this->_tempo;}
    public function del_link(){return$this->_del_link;}
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    // SETTER
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
    public function setId($id){if(is_int($id)){$this->_id = $id;}}
    public function setTitre($titre){if(is_string($titre)){$this->_titre = $titre;}}
    public function setLien_partition($lien_partition){if(!empty($lien_partition) && is_string($lien_partition)){$this->_lien_partition = $lien_partition;}}
    public function setTonalite($tonalite){if(!empty($tonalite) && is_string($tonalite)){$this->_tonalite = $tonalite;}}
    public function setTempo($tempo){if(is_string($tempo)){$this->_tempo = $tempo;}}
    public function setDel_link($del_link){if(is_string($del_link)){$this->_del_link = $del_link;}}
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°
// fin CLASSE
}

?>