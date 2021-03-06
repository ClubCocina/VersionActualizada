<?

class meta_usuario_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getMetaUsuario($id, $tipo) {
        $query = $this->db->query("SELECT idMeta as idMetaKey, 
            nombreMeta, dato, requerido
            FROM metaUsuario mu
            JOIN metaKey m
            ON m.idMetaKey=mu.idMeta
            WHERE mu.idMeta = m.idMetaKey
            AND mu.idUsuario = ?
            AND m.tipoMeta = ?
            UNION
            SELECT idMetaKey, nombreMeta, NULL as dato, NULL as requerido
            FROM metaKey
            WHERE metaKey.tipoMeta = ?
            AND metaKey.idMetaKey NOT IN (SELECT idMeta FROM metaUsuario mu
                                            JOIN metaKey m
                                            ON m.idMetaKey=mu.idMeta
                                            WHERE mu.idMeta = m.idMetaKey
                                            AND mu.idUsuario = ?
                                            AND m.tipoMeta = ?
                                            )
                                            ORDER BY idMetaKey",
           array($id, $tipo, $tipo, $id, $tipo)
        );
        return $query->result_array();
    }
    
    public function getMetaComuna($id, $tipo) {
        $query = $this->db->query("SELECT idMeta, nombreMeta
            FROM metaUsuario mu
            JOIN metaKey m
            ON m.idMetaKey=mu.idMeta
            WHERE mu.idMeta = m.idMetaKey
            AND mu.idUsuario = ?
            AND m.tipoMeta = ?",
           array($id, $tipo)
        );
        return $query->result_array();
    }
    
    public function getMetasExistentesEnChef($tipoMeta) {
        $this->db->select('DISTINCT(mu.idMeta), m.nombreMeta')
                ->from('metaUsuario mu')
                ->join('metaKey m', 'm.idMetaKey=mu.idMeta')
                ->where('m.tipoMeta', $tipoMeta);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function tagsChef($id) {
        $this->db->from('metaUsuario mu')
                ->join('metaKey m', 'm.idMetaKey=mu.idMeta')
                ->where('mu.idUsuario', $id)
                ->where('m.tipoMeta', 4);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function add($id, $data) {

        foreach ($data as $key => $value) {
            $newData = array(
                'idUsuario' => $id,
                'idMeta' => $key,
                'dato' => $value
            );
            $this->db->insert('metausuario', $newData);
        }
    }

    public function update($data) {
        $this->db->where('idMetaKey', $data['idMetaKey']);
        $this->db->where('idUsuario', $data['idUsuario']);
        $this->db->update('metaUsuario', $data);
    }

    function delete($data) {
        $this->db->where('idMetaKey', $data['idMetaKey']);
        $this->db->where('idUsuario', $data['idUsuario']);
        $this->db->delete('metaUsuario');
    }
    
    function deleteMetasUsuario($id) {
        $this->db->where('idUsuario', $id);
        $this->db->delete('metaUsuario');
    }
    
    function getMetasComunes($idChefs) {
        $this->db->from('metaUsuario mu')
                ->join('metaKey m', 'm.idMetaKey=mu.idMeta')
                ->where('m.tipoMeta', 4)
                ->where_in('mu.idUsuario', $idChefs)
                ->group_by('m.idMetaKey');
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>