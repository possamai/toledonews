<?php
App::uses('AppModel', 'Model');
/**
 * Patrocinio Model
 *
 * @property Pagina $Pagina
 * @property Menu $Menu
 */
class Patrocinio extends AppModel {
 public $actsAs = array(
        'Upload.Upload' => array(
            'src' => array(
                // Local onde salvar
				'path'=>'{ROOT}webroot{DS}img{DS}{model}{DS}fotos{DS}',
                'pathMethod'=>'flat',
                'customName' => '{!getNewName}',
                // Campos
               // 'fields' => array(
               //     'dir' => 'dir',
               //     'type' => 'mimetype',
               //     'size' => 'filesize'
               // ),
                // Thumbnails
                'thumbnailMethod' => 'php', // GD
                'thumbnailSizes' => array(
                    'thumb' => '200x100',
                    'large' => '550x502',
                ),
            ),
            
        )
    );

	public function getNewName($filename = ''){
        return uniqid();
    }
	
/**
 * Use database config
 *
 * @var string
 */
	//public $useDbConfig = 'test';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'titulo';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'pagina_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),				
				'message' => 'Informe um número!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'menu_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),				
				'message' => 'Informe um número!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'patrocinadore_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Informe um número!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'titulo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),				'message' => 'Este campo deve ser informado!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength', 250),				'message' => 'no máximo 250 characters!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength', 3),				'message' => 'Informe no minimo 03 characters!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		'url' => array(
			'maxLength' => array(
				'rule' => array('maxLength', 250),				'message' => 'no máximo 250 characters!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength', 3),				'message' => 'Informe no minimo 03 characters!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),				'message' => 'Este campo deve ser informado!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'miniatura' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),				'message' => 'Este campo deve ser informado!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'popup' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),				'message' => 'Este campo deve ser informado!',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Pagina' => array(
			'className' => 'Pagina',
			'foreignKey' => 'pagina_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Menu' => array(
			'className' => 'Menu',
			'foreignKey' => 'menu_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Patrocinadore' => array(
			'className' => 'Patrocinadore',
			'foreignKey' => 'patrocinadore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	/*
	public function beforeSave($options = array()) {
		if(!empty($this->data['Pagina']['src']['name'])) {  
			$this->data['Pagina']['src'] = $this->upload($this->data['Pagina']['src']);  
		} else {  
			unset($this->data['Pagina']['src']);  
		} 
	}
	public function upload($imagem = array(), $dir = 'img/paginas')  
	{  
		$dir = WWW_ROOT.$dir.DS;  
	  
		if(($imagem['error']!=0) and ($imagem['size']==0)) {  
			throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro '.$imagem['error'].' e tamanho '.$imagem['size']);  
		}  
	  
		$this->checa_dir($dir);  
	  
		$imagem = $this->checa_nome($imagem, $dir);  
	  
		$this->move_arquivos($imagem, $dir);  
	  
		return $imagem['name'];  
	}
	public function checa_dir($dir)  
	{  
		App::uses('Folder', 'Utility');  
		$folder = new Folder();  
		if (!is_dir($dir)){  
			$folder->create($dir);  
		}  
	}  
	  
	/** 
	 * Verifica se o nome do arquivo já existe, se existir adiciona um numero ao nome e verifica novamente 
	 * @access public 
	 * @param Array $imagem 
	 * @param String $data 
	 * @return nome da imagem 
	*/   
	
	/*
	public function checa_nome($imagem, $dir)  
	{  
		$imagem_info = pathinfo($dir.$imagem['name']);  
		$imagem_nome = $this->trata_nome($imagem_info['filename']).'.'.$imagem_info['extension'];  
		debug($imagem_nome);  
		$conta = 2;  
		while (file_exists($dir.$imagem_nome)) {  
			$imagem_nome  = $this->trata_nome($imagem_info['filename']).'-'.$conta;  
			$imagem_nome .= '.'.$imagem_info['extension'];  
			$conta++;  
			debug($imagem_nome);  
		}  
		$imagem['name'] = $imagem_nome;  
		return $imagem;  
	}  
	  
	/** 
	 * Trata o nome removendo espaços, acentos e caracteres em maiúsculo. 
	 * @access public 
	 * @param Array $imagem 
	 * @param String $data 
	*/   
	
	/*
	public function trata_nome($imagem_nome)  
	{  
		$imagem_nome = strtolower(Inflector::slug($imagem_nome,'-'));  
		return $imagem_nome;  
	}  
	  
	/** 
	 * Move o arquivo para a pasta de destino. 
	 * @access public 
	 * @param Array $imagem 
	 * @param String $data 
	*/   
	/*
	public function move_arquivos($imagem, $dir)  
	{  
		App::uses('File', 'Utility');  
		$arquivo = new File($imagem['tmp_name']);
		print_r($arquivo);
		$arquivo->copy($dir.$imagem['name']);  
		$arquivo->close();  
	}  
		*/
}
