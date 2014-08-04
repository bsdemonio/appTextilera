<?php
class DbTable_Store extends GE_Db_Table_Abstract {

    public function getIdClient($emailClient) {
        $select = $this->_db
                ->select()
                ->from('client',array('idClient'))
                ->where("LOWER(email) = ?",strtolower($emailClient))
                ->query()
                ->fetch();
        return $select;
    }

    public function updateClient($idClient,$data) {
		$where['idClient = ?'] = $idClient;
		return $this->_db->update('client', $data, $where);	
    
    }
    public function insertClient($data) {
		return $this->_db->insert('client', $data);	
    }
}
?>