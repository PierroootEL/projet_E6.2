<?php

    namespace App;

    class DataExport extends Database
    {

        public function exportWorkbench(){

            $workbenchs = $this->request(
                'SELECT * FROM workbench'
            )->fetchAll();

            $fp = fopen('/var/www/pierre/projet_E6.2/main/src/files/workbench_' . date('d-m-Y_H-i-s') . '.csv', 'w');

            $entete = array('workbench_id', 'workbench_name', 'assigned_operation');
            fputcsv($fp, $entete, ';');

            foreach ($workbenchs as $workbench){
                fputcsv($fp, $workbench, ';');
            }

            fclose($fp);

        }

        public function exportOperation(){

            $workbenchs = $this->request(
                'SELECT * FROM operation'
            )->fetchAll();

            $fp = fopen('/var/www/pierre/projet_E6.2/main/src/files/operation_' . date('d-m-Y_H-i-s') . '.csv', 'w');

            $entete = array('operation_id', 'product_value', 'quantity', 'create_date', 'status');
            fputcsv($fp, $entete, ';');

            foreach ($workbenchs as $workbench){
                fputcsv($fp, $workbench, ';');
            }

            fclose($fp);

        }

    }

?>