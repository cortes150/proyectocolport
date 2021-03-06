<?php
require_once 'model/usuario.php';
class UsuarioController
{
    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }

    public function Index(){
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/usuario/usuario-reg.php';
        require_once 'view/footer.php';

    }

    public function Guardar()
    {
        require_once 'view/headers.php';
        require_once 'view/inicio.php';
        require_once 'view/usuario/usuario-reg.php';
        require_once 'view/footer.php';
        $alm = new Usuario();
        //$alm->misionID = $_REQUEST['misionID'];
        $alm->nick = $_REQUEST['nick'];
        $alm->clave = $_REQUEST['clave'];
        $alm->tipo = $_REQUEST['tipo'];
        $alm->miembroID = $_REQUEST['miembroID'];
        $alm->pass_cifrado = password_hash($alm->clave, PASSWORD_DEFAULT, array("cost"=>12));
        $alm->usuarioID > 0 ? $this->model->Actualizar($alm) : $this->model->GuardarUsuario($alm);
        //header('Location: view/mision/mision.php');
    }

    public function Sesiones(){
        $sesiones = new Usuario();
        $sesiones->nick = $_POST['user'];
        $sesiones->clave = $_POST['pass'];
        $sesiones->usuarioID > 0 ? $this->model->SesionIniciada($sesiones): $this->model->SesionIniciada($sesiones);
    }
}