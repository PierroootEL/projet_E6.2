<?php

    use App\Database;

    class Moniteur extends Database
    {


        public function chartCommandes(){

           return $this->request(
                'SELECT * FROM orders WHERE created_order LIKE :today',
                array(
                    ':today' => date('Y-m-d') . '%'
                )
            )->fetchAll();

        }

        public function chartOperations(){

            return $this->request(
                'SELECT * FROM operation WHERE create_date LIKE :today',
                array(
                    ':today' => date('Y-m-d') . '%'
                )
            )->fetchAll();

        }
        
        public function extractChartCommandes(){

            $toDoCount = 0;
            $finishCount = 0;

            foreach ($this->chartCommandes() as $commande) {
                if($commande['status'] == 1 || $commande['status'] == 2){
                    $toDoCount++;
                }else{
                    $finishCount++;
                }
            }

            return array(
                'toDo' => $toDoCount,
                'finish' => $finishCount
            );
        }
            public function extractChartOperations(){

                $toDoOperation = 0;
                $finishOperation = 0;

                foreach ($this->chartOperations() as $operation) {
                    if($operation['status'] == 1 || $operation['status'] == 2){
                        $toDoOperation++;
                    }else{
                        $finishOperation++;
                    }
                }
    
                return array(
                    'toDo' => $toDoOperation,
                    'finish' => $finishOperation
                );
            }

            public function chartWorkbenchs(){
                return $this->request(
                    'SELECT * FROM workbench, operation WHERE workbench.assigned_operation = operation.operation_id'
                )->fetchAll();
            }

            public function extractWorkbench(){

                $i = 0;

                foreach ($this->chartWorkbenchs() as $workbench) {
                    if($workbench['ok_element'] == $workbench['quantity']){
                        $color = "'rgba(37, 142, 20, 0.7)'";
                    }else{
                        $color = "'rgba(235, 54, 42, 0.7)'";
                    }
                    $atelier_num = $i+1;
                    $atelier_name = '"Atelier n°'. $atelier_num .'"';
                    $atelier[$i] = array(
                        'atelier_name' => $atelier_name,
                        'quantity' => $workbench['quantity'],
                        'ok_element' => $workbench['ok_element'],
                        'color' => $color
                    );
                    
                    $i++;
                }

                return $atelier;
                
            }

            public function getCommandes(){
                return $this->request(
                    'SELECT * FROM orders'
                )->fetchAll();
            }

            public function getCommandesTime(int $id){
                foreach ($this->request('SELECT * FROM orders WHERE id = :id', array(':id' => $id)) as $commande) {
                    $temps_total = strtotime($commande['created_order'] . ' + ' . $commande['assigned_time'] . ' minutes');
                    $temps_total = date('Y-m-d h:i:s', $temps_total);
                    $temps_actuel = date('Y-m-d h:i:s');

                    if($temps_actuel > $temps_total){
                        # En retard

                        return '<h1 style="color: red;">En retard</h1>';
                    }

                    return '<h1 style="color: green;">Dans les temps</h1>';
                }
            }
    }


?>