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

        public function exportOrders()
        {

            $orders = $this->request(
                'SELECT * FROM orders'
            )->fetchAll();

            $fp = fopen('/var/www/pierre/projet_E6.2/main/src/files/orders_' . date('d-m-Y_H-i-s') . '.csv', 'w');

            $entete = array('id', 'name', 'quantity', 'assigned_time', 'created_order', 'status');
            fputcsv($fp, $entete, ';');

            foreach ($orders as $order){
                fputcsv($fp, $order, ';');
            }

            fclose($fp);

        }

        public function exportOperations(){

            $operations = $this->request(
                'SELECT * FROM operation'
            )->fetchAll();

            $fp = fopen('/var/www/pierre/projet_E6.2/main/src/files/operation_' . date('d-m-Y_H-i-s') . '.csv', 'w');

            $entete = array('operation_id', 'quantity', 'ok_element', 'nok_element', 'assigned_order', 'assigned_time', 'create_date', 'status');
            fputcsv($fp, $entete, ';');

            foreach ($operations as $operation){
                fputcsv($fp, $operation, ';');
            }

            fclose($fp);

        }

    }

?>