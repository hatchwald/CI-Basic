<?php namespace App\Controllers;
use App\Models\EmployeeModel;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function some()
	{
		return view('some_page');
	}

	public function post_ins(){
		$args = [];
		if ($_POST['type_action'] == 'upd_employee') {
			$args = [
				'name'	=>	$_POST['name_emp'],
				'email'	=>	$_POST['email_emp'],
				'gender'	=>	$_POST['gender_emp'],
				'nip'	=>	$_POST['nip_emp'],
				'hobby'	=>	$_POST['hobby_emp'],
			];
			if (is_uploaded_file($_FILES['photo_emp']['tmp_name'])) {
				$valid_extensions = array('jpg', 'png'); 
				$path = 'assets/img/'; 
				$img = $_FILES['photo_emp']['name'];
				$tmp = $_FILES['photo_emp']['tmp_name'];
				$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
				$final_image = rand(1000,1000000).$img;

					$path = $path.strtolower($final_image); 
					if ( move_uploaded_file($tmp,$path) ) {
						$args['photo'] = $final_image;
					}else{
						return redirect()->back()->with('errs','failed upload image');
					}

			}
			log_message('alert',print_r($args,true));
			EmployeeModel::upd_employee($_POST['ids_emp'],$args);
			return redirect('employee_list');
		}else{
			$valid_extensions = array('jpg', 'png'); 
			$path = 'assets/img/'; 
			$img = $_FILES['photo_emp']['name'];
			$tmp = $_FILES['photo_emp']['tmp_name'];
			$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
			$final_image = rand(1000,1000000).$img;
	
			if ( in_array($ext, $valid_extensions) ) {
				$path = $path.strtolower($final_image); 
				if ( move_uploaded_file($tmp,$path) ) {
					EmployeeModel::inst_employe($_POST['name_emp'],$_POST['email_emp'],$_POST['gender_emp'],$_POST['nip_emp'],$_POST['hobby_emp'],$final_image);
				}else{
					return redirect()->back()->with('errs','failed upload image');
				}
			}else{
				return redirect()->back()->with('errs','extenstion not match');
			}
			return redirect('employee_list');
		}
	}

	public function showall_data(){
		return json_encode(EmployeeModel::get_all_employee());
	}

	public function del_empl(){
		EmployeeModel::del_emp($_POST['del_id']);
		return redirect('employee_list');
	}
	//--------------------------------------------------------------------

}
