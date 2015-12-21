<?

class experiencia_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getExperiencia($id = null) { //muestra usuarios de un perfil especifico o todos
        $this->db->from('experiencia');
        if ($id != '')
            $this->db->where('idExperiencia', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add($data) {
        $this->db->insert('experiencia', $data);
    }

    function edit($data) {
        $this->db->where('idExperiencia', $data['idExperiencia']);
        $this->db->update('experiencia', $data);
    }

    function delete($id) {
        $this->db->delete('experiencia', array('idExperiencia' => $id));
    }
    
    public function getExperienciasChef($id){
        $this->db->from('experiencia')
                ->where('idUsuario', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function countExperiencias() {
        $this->db->join('usuario u', 'u.idUsuario=e.idUsuario')
                 ->where('u.estado', 1);
         return $this->db->count_all_results('experiencia e');
        
    }
    
    public function getMinTimeChef($id) {
        $this->db->select('MIN(tiempo2) as tiempo2')
                ->where('idUsuario', $id)
                ->where('tiempo2 != 0')
                ->from('experiencia');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllExperiencias(){
        /*$query = $this->db->query('SELECT e.idExperiencia, e.idUsuario, e.nombre, e.descripcion, e.imagen
                        FROM usuario u, experiencia e
                        WHERE u.estado = 1');
        */
        $query = $this->db->query('SELECT idExperiencia, idUsuario, nombre, descripcion, imagen, tiempo, tiempo2, tiempo3, tiempo4, tiempo5, tiempo6, tiempo7, tiempo8, tiempo9, tiempo10, tiempo11, tiempo12, tiempo13, tiempo14
                                    FROM experiencia
                                    WHERE idUsuario IN (SELECT idUsuario
                                                          FROM usuario
                                                          WHERE estado = 1)');
        return $query->result_array();
    }

}

?>