<?php
class UsersController extends AppController {
  var $components=array("Email","Session");
  var $helpers=array("Html","Form","Session");
	function beforeFilter(){
		$this->Auth->autoRedirect = false;
		$this->Auth->allow('forgetpwd','reset', 'register');
	}
	function register(){
		if(!empty($this->data) && $this->data['User']['password'] == $this->Auth->password($this->data['User']['password_conformation'])){
			if($this->User->validates()){
				if($this->User->save($this->data)){
					$this->redirect(array('controller' => 'users', 'action' => 'login'));
				}
			}
		}
	}
	function login() {
		if(!empty($this->data) && isset($this->data['User']['accounting_year'])){
			$year = split('[/]', $this->data['User']['accounting_year']);
			$this->Session->write('User.acc_opening_year', $year[0]);
			$this->Session->write('User.acc_closing_year', $year[1]);
			$this->redirect(array('controller' => 'accounts', 'action'=>'index'));
		}
		if($this->Auth->User('id')){ 
			$this->redirect(array('controller' => 'accounts', 'action'=>'index'));
		}
		
	}
	function logout() {
			$this->Session->delete('User');
		 $this->redirect($this->Auth->logout());
	}
	function update(){
		if(empty($this->data)){
			//$user = $session->read('Auth.User');
			//$this->set(compact('user'));
		}
		if(!empty($this->data) && isset($this->data['User']['password'])){
			$this->data['User']['name'] = $this->data['User']['username'];
			if($this->User->save($this->data)){
				$this->redirect(array('controller' => 'accounts', 'action'=>'index'));
			}
			else{
				var_dump($current_user);
			}
		}
	}
  function forgetpwd(){
        //$this->layout="signup";
        $this->User->recursive=-1;
        if(!empty($this->data))
        {
            if(empty($this->data['User']['email']))
            {
                $this->Session->setFlash($GLOBALS['flash_messages']['email']);
            }
            else
            {
                $email=$this->data['User']['email'];
                $fu=$this->User->find('first',array('conditions'=>array('User.email'=>$email)));
                if($fu)
                {
                    //debug($fu);
                    if($fu['User']['active'])
                    {
                        $key = Security::hash(String::uuid(),'sha512',true);
                        $hash=sha1($fu['User']['username'].rand(0,100));
                        $url = Router::url( array('controller'=>'users','action'=>'reset'), true ).'/'.$key.'#'.$hash;
                        $ms=$url;
                        $ms=wordwrap($ms,1000);
                        //debug($url);
                        $fu['User']['tokenhash']=$key;
                        $this->User->id=$fu['User']['id'];
                        if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){                        
                             
                            //============Email================//
                            /* SMTP Options */ 
                            $this->Email->smtpOptions = array(
                                'port'=>'465',
                                'timeout'=>'30',
                                'host' => 'ssl://smtp.gmail.com',
                                'username'=>'ks.sanmugam2@gmail.com',
                                'password'=>'vanakkam'
                                  );
                            $this->Email->template = 'resetpw';
                            $this->Email->from    = 'ks.sanmugam2@gmail.com';
                            $this->Email->to      = $fu['User']['name'].'<'.$fu['User']['email'].'>';
                            $this->Email->subject = 'Reset Your Account management System Password';
                            $this->Email->sendAs = 'both';
                            $this->Email->delivery = 'smtp';
                            $this->set('ms', $ms);
                            $this->Email->send();
                            $this->set('smtp_errors', $this->Email->smtpError);
                            $this->Session->setFlash(__('Check Your Email To Reset your password', true)); 
														$this->redirect(array('controller'=>'users','action'=>'login'));       
                             
                            //============EndEmail=============//    
                        }
                        else{
                            $this->Session->setFlash("Error Generating Reset link");                            
                        }                        
                    }
                    else
                    {
                        $this->Session->setFlash('This Account is not Active yet.Check Your mail to activate it');
                    }
                }
                else
                {
                    $this->Session->setFlash('Email does Not Exist');
                }
            }
        }
    }
  function reset($token=null){
        //$this->layout="Login";
        $this->User->recursive=-1;
        if(!empty($token)){
          
            $u=$this->User->findBytokenhash($token); 
            if($u){                
                if(!empty($this->data)){
                    //$this->User->data=$this->data;
                    $this->User->data['User']['id']=$u['User']['id'];
                    $this->User->data['User']['username']=$u['User']['username']; 
										$this->User->data['User']['password'] = $this->Auth->password($this->data['User']['password']);                   
                    $new_hash=sha1($u['User']['username'].rand(0,100));//created token
                    $this->User->data['User']['tokenhash']=$new_hash;  
										//var_dump($this->User->data);die;                    
                    if($this->data['User']['password'] != '' && $this->data['User']['password_confirm'] != ''){                          
                        if($this->User->save($this->User->data))
                        {
                            $this->Session->setFlash('Password Has been Updated');
                            $this->redirect(array('controller'=>'users','action'=>'login'));
                        }
                         
                    }
                    else{
                         
                        $this->Session->setFlash('Fill all Fields');                        
                    }
                }
            }
            else
            {
                $this->Session->setFlash('Token Corrupted,,Please Retry.the reset link work only for once.');
            }
        }
         
        else{
            $this->redirect('/');    
        }    
    }
}
?>