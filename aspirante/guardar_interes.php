<?php
require_once __DIR__.'/../config/config.php';

require_role('aspirante');

if($_SERVER['REQUEST_METHOD']!=='POST') redirect('/programas.php');

verify_csrf();

$programa=(int)($_POST['programa']??0);
$uid=$_SESSION['user']['id'];

$check=$db->prepare('SELECT id_programa FROM programas WHERE id_programa=?');
$check->bind_param('i',$programa);
$check->execute();

if(!$check->get_result()->num_rows){flash('El programa seleccionado no existe.','error');
redirect('/programas.php');
}
$st=$db->prepare('INSERT IGNORE INTO intereses(id_aspirante,id_programa,fecha) VALUES(?,?,CURDATE())');
$st->bind_param('ii',$uid,$programa);
$st->execute();

flash('Programa guardado en tu lista de intereses.');
redirect('/aspirante/panel.php');
