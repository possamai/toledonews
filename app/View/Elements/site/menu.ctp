
<div class="mb-10">
    <?PHP
    echo $this->Tree->show($MenuSite, 'Menu');
    ?>
</div>
<div class="clearfix visible-xs-block"></div>



<?PHP
//Debugger::dump(  $MenuSite   );
/**
<div class="mb-10">
    <nav>
        <ul class="nav nav-justified">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Downloads</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</div>



    $htmlMenu = '';
foreach ($MenuSite as $key => $value):
	// aqui ele verifica qual o local EX: toledo, mercedes, e etc
	// isso ele pega na session que sera gravada no controller Pades function atualiza
		// tendo o local vamos montar o menu com os generos das noticias daquele local
$htmlMenu .='<div class="menutopo">
		<div class="meio">
			<ul id="jsddm" class="menutopo">';
		foreach ($value['children'] as $chave => $valor):
			//entra no primeiro nivel desconsiderando o local q � o primeiro 
			//
$htmlMenu .= '	<li class="menutopo">';
$htmlMenu .=  	$this->Html->link( 
					$valor['Menu']['titulo'],
					array('controller' => 'menus', 'action' => 'ver', $valor['Menu']['id']),
					array('class' => 'menutopo', 'style' => 'color:'.$valor['Menu']['cor'])
				);
		$htmlMenu .= '<ul>';
			foreach ($valor['children'] as $idd => $result):
					$htmlMenu .= '<li>';
					$htmlMenu .=  	$this->Html->link( 
						$result['Menu']['titulo'],
						array('controller' => 'menus', 'action' => 'ver', $result['Menu']['id']),
						array('class' => 'a.menutopo', 'style' => 'color: black;')
					);
					$htmlMenu .= '</li>';
			endforeach;
		$htmlMenu .= '</ul>
				</li>';
		endforeach;
$htmlMenu .= '		</ul>
		</div>
	</div>';
endforeach;

echo $htmlMenu;
*/
?>