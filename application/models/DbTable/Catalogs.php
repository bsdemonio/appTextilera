<?php
class DbTable_Catalogs extends GE_Db_Table_Abstract {

    public function getproduct() {
        $select = $this->_db
                ->select()
                ->from('product',array('idProduct','productName'))
                ->query()
                ->fetchAll();
        return $select;
    }

}
?>