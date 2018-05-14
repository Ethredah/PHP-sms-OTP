<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	public function index()
	{
		$this->load->view('register');
	}

	public function register()
	{

		$this->form_validation->set_rules('name', 'User Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[register.email]',
		array(
						'required'      => 'You have not provided %s.',
						'is_unique'     => 'This %s already exists.'
		)
		);


		if ($this->form_validation->run()==FALSE)
		{
		$this->load->view('register');
		}

		else {


			/*  ------- SEND SMS --------*/

			$name=$this->input->post('name');
			$phone = $this->input->post('phone');

			require(APPPATH.'libraries/textlocal.class.php');

			$textlocal = new Textlocal(false, false, API_KEY);

			$numbers = array($phone);
			$sender = 'TXTLCL';
			$otp = mt_rand(100,999);
			$message = 'Hello  '  . $name . "  This is your OTP: " . $otp ;

			try {
			    $result = $textlocal->sendSms($numbers, $message, $sender);
					//save OTP
					setcookie('otp', $otp);
			   //echo "OTP Successfyully sent..!";
			} catch (Exception $e) {
			    die('Error: ' . $e->getMessage());
			}

		  /*------- SEND SMS -------- */


				$amount = 100;

					$user = array(
						'name' =>$this->input->post('name') ,
						'phone' =>$this->input->post('phone'),
						'email' =>$this->input->post('email'),
						'otp' =>$otp,
						'amount' => $amount

						);


		$this->load->model('Model');
		$this->Model->register($user); /* Add user Details In Database */

		$this->session->set_flashdata('registered','Congratulations ! You have been registered.');
		$this->session->set_flashdata('code','Use the verification code sent to your phone number to Login your account.');

		/* Load Login Page */
		redirect('Main/loginpage');


		}


	}



	public function loginpage()
	{
		$this->load->view('login');
	}


	public function login()
	{



		$user = array(
			'email' =>$this->input->post('email') ,
			'otp' =>$this->input->post('otp')
	);

		$this->load->model('Model');
		$result = $this->Model->verify($user);

		if ($result == TRUE) {
			$session_data = array(
			'email' => $result[0]->email,
			);
			// Add user data in session
			$this->session->set_userdata('logged_in', $session_data);
			$this->load->view('account', $user);
				}

			else
			{
			$this->session->set_flashdata('login_fail','Invalid credentials. Please check your details and try again.');
			redirect('Main/loginpage');
			}



	}


	public function logout()
	{
		redirect('');
	}



}
