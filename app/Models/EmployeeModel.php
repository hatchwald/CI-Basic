<?php
namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
        protected $table = 'employee_list';
        protected $primaryKey = 'id';
        protected $returnType = 'array';
        protected $allowedFields = ['name', 'email', 'gender','nip','hobby','photo'];

        public function get_all_employee(){
            $EmployeeModel = new EmployeeModel;
            return $EmployeeModel->findAll();
        }

        /**
         * for insert new data employee
         */
        public function inst_employe($name,$email,$gender,$nip,$hoby,$photo)
        {
            $EmployeeModel = new EmployeeModel;
            $data = [
                'name'  =>  $name,
                'email' =>  $email,
                'gender'    =>  $gender,
                'nip'   =>  $nip,
                'hobby'  =>  $hoby,
                'photo' =>  $photo
            ];
            $EmployeeModel->insert($data);
        }

        public function upd_employee($id,$args){
            $EmployeeModel = new EmployeeModel;
            $EmployeeModel->update($id,$args);
        }

        public function del_emp($id){
            $EmployeeModel = new EmployeeModel;
            $EmployeeModel->delete($id);
        }
}