<?php
   
    function registro(){
        require_once("../admin/db_ecommerce.php");
        $errores = duplicacion($con);

        if(!empty($errores)){
            return $errores;
        }

        $nombre = limpiar($_POST['nombre']);
        $apellido = limpiar($_POST['apellido']);
        $email = limpiar($_POST['email']);
        $pass = limpiar($_POST['pass']);

        $dec = $con -> prepare ("INSERT INTO `usuarios` (`nombre`, `apellido`, `email`, `pass`) VALUES (?, ?, ?, ?)");
        $dec -> bind_param("ssss", $nombre, $apellido, $email, password_hash($pass, PASSWORD_DEFAULT));
        $dec -> execute();
        $resultado = $dec -> affected_rows;
        $dec -> free_result();
        $dec -> close();
        $con -> close();

        if($resultado == 1){
            $_SESSION['usuario'] = $usuario;
            header('location: ../index.php');
        }
        else{
            $errores[] = 'Oops, estamos experimentando problemas tecnicos y no podemos crear tu perfil en este momento. Porfavor intentalo de nuevo mas tarde.';
        }

        return $errores;
    }

    function duplicacion($con){
        $errores = [];

        $email = limpiar($_POST['email']);

        $dec = $con -> prepare ("SELECT email FROM usuarios WHERE email = ?");
        $dec -> bind_param("s", $email);
        $dec -> execute();
        $resultado = $dec -> get_result();
        $cantidad = mysqli_num_rows($resultado);
        $linea = $resultado -> fetch_assoc();
        $dec -> free_result();
        $dec -> close();

        if($cantidad > 0){
            if($_POST['email'] == $linea['email']){
                $errores[] = 'El CORREO ELECTRONICO ya esta siendo usado por alguien mas.';
            }
        }

        return $errores;
    }

    function login(){
        require_once("../admin/db_ecommerce.php");
        $errores = [];

        $emailLogin = limpiar($_POST['emailLogin']);
        $passLogin = limpiar($_POST['passLogin']);

        $dec = $con -> prepare ("SELECT pass, nombre, intento, tiempo, id FROM usuarios WHERE email = ?");
        $dec -> bind_param("s", $emailLogin);
        $dec -> execute();
        $resultado = $dec -> get_result();
        $cantidad = mysqli_num_rows($resultado);
        $linea = $resultado -> fetch_assoc();
        $dec -> free_result();
        $dec -> close();

        if($cantidad == 1){

            $errores = fuerzaBruta($con, $linea['intento'], $linea['id'], $linea['tiempo']);
            if(!empty($errores)){return $errores;}

            if(password_verify($passLogin, $linea['pass'])){
                
                $intento = 0;
                $tiempo = NULL;
                $id = $linea['id'];
                $dec = $con -> prepare ("UPDATE usuarios SET intento = ?, tiempo = ? WHERE id = ?");
                $dec -> bind_param("isi", $intento, $tiempo, $id);
                $dec -> execute();
                $dec -> close();
                $con -> close();

                $_SESSION['usuario'] = $linea['nombre'];
                header('location: ../index.php');
            } 
            else {
                $errores[] = 'La combinación de CORREO ELECTRONICO y CONTRASEÑA no es valida.';
            }
        }
        else {
            $errores[] = 'La combinación de CORREO ELECTRONICO y CONTRASEÑA no es valida.';
        }

        return $errores;
    }

    function fuerzaBruta($con, $intento, $id, $tiempo){
        $errores = [];
        $intento = $intento + 1;

        $dec = $con -> prepare ("UPDATE usuarios SET intento = ? WHERE id = ?");
        $dec -> bind_param("ii", $intento, $id);
        $dec -> execute();
        $dec -> close();

        if($intento == 5){
            $ahora = date('Y-m-d H:i:s');
            $dec = $con -> prepare ("UPDATE usuarios SET tiempo = ? WHERE id = ?");
            $dec -> bind_param("si", $ahora, $id);
            $dec -> execute();
            $dec -> close();
            $con -> close();
            $errores[] = 'Esta cuenta ha sido bloqueada por los proximos 15 minutos.';
        } 
        elseif($intento > 5){
            $espera = strtotime(date('Y-m-d H:i:s')) - strtotime($tiempo);
            $minutos = ceil((900 - $espera) / 60);

            if($espera < 900){
                $errores[] = 'Esta cuenta ha sido bloqueada por los proximos '.$minutos.' minutos.';
            }
            else{
                $intento = 1;
                $tiempo = NULL;
                $dec = $con -> prepare ("UPDATE usuarios SET intento = ?, tiempo = ? WHERE id = ?");
                $dec -> bind_param("isi", $intento, $tiempo, $id);
                $dec -> execute();
                $dec -> close();
                $con -> close();
            }
        }

        return $errores;
    }

    function limpiar($datos){
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }

    function mostrarErrores($errores){
        $resultado = `
        <div class="alert alert-danger"><ul>`;
        foreach($errores as $error){
            $resultado .= '<li>' . htmlspecialchars($error) . '</li>';
        }
        $resultado .= '</ul></div>';
        return $resultado;
    }

    function ficha_csrf(){
        $ficha = bin2hex(random_bytes(32));
        return $_SESSION['ficha'] = $ficha;
    }

    function validar_ficha($ficha){
        if(isset($_SESSION['ficha']) && hash_equals($_SESSION['ficha'], $ficha)){
            unset($_SESSION['ficha']);
            return true;
        }
        return false;
    }

    function validar($campos){
        $errores = [];
        foreach ($campos as $nombre => $mostrar) {
            if(!isset($_POST[$nombre]) || $_POST[$nombre] == NULL){
                $errores[] = $mostrar . ' es un campo requerido.';
            }
            else{
                $valides = campos();
                foreach ($valides as $campo => $opcion) {
                    if($nombre == $campo){
                        if(!preg_match($opcion['patron'], $_POST[$nombre])){
                            $errores[] = $opcion['error'];  
                        }
                    }
                }
            }
        }
        return $errores;
    }

    function campo($nombre){
        echo $_POST[$nombre] ?? '';
    }

    function campos(){
        $validacion = [
            'nombre' => [
                'patron' => '/^[a-z\s]{2,150}$/i',
                'error' => 'NOMBRE solo puede usar letras y espacios. Además debe de tener de 2 a 50 caracteres.'
            ],
            'apellido' => [
                'patron' => '/^[a-z\s]{2,150}$/i',
                'error' => 'APELLIDO solo puede usar letras y espacios. Además debe de tener de 2 a 50 caracteres.'
            ],
            'email' => [
                'patron' => '/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/',
                'error' => 'El CORREO ELECTRONICO debe de ser en un formato valido.'
            ],
            'pass' => [
                'patron' => '/(?=^[\w\!@#\$%\^&\*\?]{8,30}$)(?=(.*\d){2,})(?=(.*[a-z]){2,})(?=(.*[A-Z]){1,})(?=(.*[\!@#\$%\^&\*\?_]){1,})^.*/',
                'error' => 'Porfavor ingrese una contraseña valida. La contraseña debe tener por lo menos 1 letras mayusculas, 2 letras minusculas, 2 numeros y 1 simbolos.'
            ],
            'emailLogin' => [
                'patron' => '/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/',
                'error' => 'Porfavor use un CORREO ELECTRONICO valido.'
            ],
            'passLogin' => [
                'patron' => '/(?=^[\w\!@#\$%\^&\*\?]{8,30}$)(?=(.*\d){2,})(?=(.*[a-z]){2,})(?=(.*[A-Z]){1,})(?=(.*[\!@#\$%\^&\*\?_]){1,})^.*/',
                'error' => 'Contraseña incorrecta. Porfavor ingrese una contraseña valida.'
            ]
        ];
        return $validacion;
    }

    function comparadorDeClaves($pass, $repass){
        $errores = [];
        if($pass !== $repass){
            $errores[] = 'Las contraseñas no son iguales.';
        }
        return $errores;
    }
?>