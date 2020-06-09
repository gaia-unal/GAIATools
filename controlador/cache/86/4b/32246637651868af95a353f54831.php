<?php

/* layout.twig.html */
class __TwigTemplate_864b32246637651868af95a353f54831 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'inner' => array($this, 'block_inner'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "<!DOCTYPE html PUBLIC> 
<html lang=\"es\">
    <head>
        ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 35
        echo "    </head>
    <body class=\"index\" >
    <!--barra UNAL-->
        <header id=\"unalTop\">
            <div class=\"logou\">
                <a href=\"http://unal.edu.co\" target=\"_blank\"><img alt=\"Escudo de la Universidad Nacional de Colombia\" src=\"../images/escudoUnal.png\"/></a>
                <div class=\"diag\"></div>
            </div>
            <div class=\"seal\"> <img alt=\"Escudo de la República de Colombia\" src=\"../images/sealColombia.png\" width=\"66\" height=\"66\" /> </div>
            <div class=\"firstMenu\"> <ul class=\"socialLinks\"></ul> </div>
            <div class=\"navigation\"> <div class=\"site-url\"></div> </div>
        </header>
        <div class=\"header\">
            <div class=\"up\" id=\"img_tools\"><img class=\"logogaia\" alt=\"Logo de GAIATools\" src=\"../images/gaia_tools.png\" /></div>
            <div class=\"up\">
                ";
        // line 50
        if (($this->getAttribute($this->getContext($context, 'session'), "nombre", array(), "any", false) == null)) {
            // line 51
            echo "                <br>
                <fieldset id=\"manejoUsuarios\" ><!--style=\"background:#fff;\"-->
                    <legend></legend>
                    <div style=\"margin-bottom: 1em;\" align=\"center\"><a href=\"validar.php\" class=\"config\">Iniciar Sesión</a></div>
                    <div align=\"center\"><a href=\"registro.php\" class=\"config\">Registrar Usuario</a></div>
                </fieldset>
                ";
        }
        // line 58
        echo "                ";
        if ($this->getAttribute($this->getContext($context, 'session'), "nombre", array(), "any", false)) {
            // line 59
            echo "                <fieldset>
                    <legend></legend>
                    <div align='center' id=\"nombreBien\" class=\"config\">Bienvenido ";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'session'), "nombre", array(), "any", false), "html");
            echo "</div><br>
                    <div align='center'><a id='cierre' class=\"config\" href='cierre.php'>Cerrar Sesión</a></div>
                </fieldset>
                ";
        }
        // line 65
        echo "            </div>
            <div class=\"accesibilidad\" id=\"accesibilidad\" >
                <label><input type=\"checkbox\" onclick=\"setSintetizador()\" name=\"sintetizador\" id=\"sintetizador\" />Uso del sintetizador de voz</label><br>
                <label><input type=\"checkbox\" onclick=\"setControladorVoz()\" name=\"voz\" id=\"voz\"/>Uso los comandos de voz</label>
            </div>
        </div>
        <!--final barra-->
    \t<section id=\"banner\">
            ";
        // line 73
        if ($this->getAttribute($this->getContext($context, 'session'), "nombre", array(), "any", false)) {
            // line 74
            echo "            <aside id=\"sidebar\"><br>
                <ul class='toggle'>
                    <li class='icn_categories'><h2 class=\"h2niv\" ><a href='principal.php'>Presentación</a></h2></li>
                    <li class='icn_categories'><h2 class=\"h2niv\" ><a href='informacionPersonal.php'>Información personal</a></h2></li>
                    ";
            // line 78
            if (($this->getContext($context, 'rol') == 1)) {
                // line 79
                echo "                    <!--li class='icn_categories'><a href='#'>Administración de cuenta</a></li-->
                    <li class=\"icn_categories\"><h2 class=\"h2niv\" >Administración de usuarios</h2></li>
                    <li class='icn_sub_catego'><h2 class=\"h2niv\" ><a href='permisosUsuarios.php'>Otorgar Permisos a Usuarios</a></h2></li>
                    <!--li class='icn_sub_catego'><a href='listarUsuarios.php'>Listar Usuarios Activos</a></li-->
                    ";
            }
            // line 84
            echo "                    <li class='icn_categories'><h2 class=\"h2niv\" >Recursos Educativos ";
            if (($this->getContext($context, 'rol') == 1)) {
                echo "Propios";
            }
            echo "</h2></li>
                    <li class='icn_sub_catego'><h2 class=\"h2niv\" ><a href='listarRecurso.php'>Listar Recursos Educativos</a></h2></li>
                    <li class='icn_sub_catego'><h2 class=\"h2niv\" ><a href='crearRecurso.php'>Crear Recursos Educativos</a></h2></li>
                    <li class='icn_sub_catego'><h2 class=\"h2niv\" ><a href='editarRecurso.php'>Editar Recursos Educativos</a></h2></li>
                    <li class='icn_sub_catego'><h2 class=\"h2niv\" ><a href='eliminarRecurso.php'>Eliminar Recursos Educativos</a></h2></li>
                    ";
            // line 89
            if (($this->getContext($context, 'rol') == 1)) {
                // line 90
                echo "                    <li class='icn_categories'><h2 class=\"h2niv\" >Reportes y consultas</h2></li>
                    <li class='icn_sub_catego'><h2 class=\"h2niv\" ><a href='sobreUsuarios.php' >Sobre Usuarios</a></h2></li>
                    <li class='icn_sub_catego'><h2 class=\"h2niv\" ><a href='sobreRecursos.php' >Sobre Recursos Educativos</a></h2></li>
                    ";
            }
            // line 94
            echo "                </ul>
                <footer id=\"pie\">GAIA - Grupo de Ambientes Inteligentes Adaptativos</footer>
            </aside>
            ";
        }
        // line 98
        echo "            ";
        $this->displayBlock('inner', $context, $blocks);
        // line 99
        echo "    \t</section>
    </body>
    <!--pie de pagina-->
    <div id=\"footer\">
        <div><br><br><br>
            <a href=\"http://www.colciencias.gov.co/\"  target=\"_blank\">
                <img alt=\"Logotipo de Colciencias Todos por un nuevo país\" style=\"width: 20em;\" src=\"../images/logoColciencias.png\"/>
            </a>
            <a href=\"http://www.mineducacion.gov.co/1759/w3-channel.html\"  target=\"_blank\">
                <img alt=\"Logotipo Ministerio de educación\" style=\"width: 20em;\" src=\"../images/logoMin.png\"/>
            </a>
            <a href=\"http://www.manizales.unal.edu.co/\"  target=\"_blank\">
                <img alt=\"Escudo universidad nacional de colombia sede Manizales\" style=\"width: 10em;\" src=\"../images/manizales.png\"/>
            </a>
            <a href=\"http://medellin.unal.edu.co/\"  target=\"_blank\">
                <img alt=\"Escudo universidad nacional de colombia sede Medellín\" style=\"width: 10em;\" src=\"../images/medellin.png\"/>
            </a>
            <a id=\"linklogo\" href=\"http://froac.manizales.unal.edu.co/GAIA/\"  target=\"_blank\" alt=\"enlace página web grupo GAIA\">
                <img class=\"logogaia2\" alt=\"Logo GAIA\" style=\"width: 10em;\" src=\"../images/logogaia.gif\" />
            </a>
            <p style=\"color:#fff;\">
                <br>
                Si eres una persona con discapacidad visual, para garantizar un óptimo funcionamiento del sintetizador y reconocimiento de voz, se recomienda utilizar el navegador Google Crome. Al utilizar Internet explorer o Firefox Mozilla, se puede hacer uso de lectores de pantalla.
            </p>
            
            <blockquote style=\"color:#fff;\">
                Citación: GAIATools - \"Herramienta de autor para personas con necesidades 
                especiales de educación\", Universidad Nacional de Colombia and Colciencias, 2015. [Online]. 
                Available: http://froac.manizales.unal.edu.co/RAIM. 
                [Accessed: 
                <script>
                    var f = new Date();
                    document.write(f.getDate() + \"-\" + (f.getMonth() +1) + \"-\" + f.getFullYear());
                </script>
                ].<br><br><br>
                Desarrollado por:
                <!--a href=\"http://froac.manizales.unal.edu.co/GAIA/\" target=\"_blank\" style=\"color:#FFFFFF;\" alt=\"Enlace Página oficial del grupo de investigación\" -->
                GAIA - \"Grupo de ambientes inteligentes adaptativos\"<!--/a-->
                de la Universidad Nacional  de Colombia Sede Manizales.
            </blockquote>
        </div>
        <!--div class=\"foot\" id=\"info\">
        </div>
        <div class=\"foot\" id=\"medio\">
        </div>
        <div class=\"foot\" id=\"contacto\">
        </div-->
    </div>
    <!--fin pie de pagina-->
</html>

<!--función cierre de sesión-->
<script type=\"text/javascript\">
    
    window.onunload=function(){
        gcse.id = 'audio';
        gcse.src = 'http://www.sonidosmp3gratis.com/sounds/SD_ALERT_43.mp3';
        gcse.autoplay = true;
    }
//bloquear sintetizador de voz si no es google chrom
/*
var es_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
var es_chrome = navigator.userAgent.indexOf(\"chrome\") > -1 ;
var navegador = navigator.app
alert(es_chrome);
if(es_chrome){
                alert(\"El navegador que se ésta utilizando es Chrome\");
}

var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
\talert(is_chrome);
*/


    if(typeof(Storage) == \"undefined\") {
        document.getElementById(\"result\").innerHTML = \"Disculpa, pero para evitar inconvenientes recomendamos utilizar uno de estos navegadores con sus \\n\\
            versiones iguales o superiores: Google Chrom 4.0, Internet Exploret 8.0, Mozilla Firefox 3.5, Safari 4.0, u Opera 11.5\";
    }
    
    inicializacion();
    
    function setSintetizador(){
        if( \$('#sintetizador').prop('checked') ) { bSintetizador=true;  }else{ bSintetizador=false; }
        localStorage.setItem(\"sintetizador\",bSintetizador); 
        location.reload(true);
    }
 
    function setControladorVoz(){
        if( \$('#voz').prop('checked') ) {  bControlador=true;  }else{ bControlador=false; }
        localStorage.setItem(\"controlador\",bControlador); 
        location.reload(true);
    }
    
    function inicializacion(){
        var valor = localStorage.getItem(\"sintetizador\");
        if (valor!==null){
            if(valor===\"true\"){
                document.getElementById(\"sintetizador\").checked = true;
                localStorage.setItem(\"sintetizador\",true);
            }else{
                document.getElementById(\"sintetizador\").checked = false;
                localStorage.setItem(\"sintetizador\",false); 
            }
        }else{
            document.getElementById(\"sintetizador\").checked = true;
            localStorage.setItem(\"sintetizador\",true); 
        }
        var valor = localStorage.getItem(\"controlador\");
        if (valor!==null){
            if(valor===\"true\"){
                document.getElementById(\"voz\").checked = true;
                localStorage.setItem(\"voz\",true); 
            }else{
                document.getElementById(\"voz\").checked = false;
                localStorage.setItem(\"voz\",false); 
            }
        }else{
            document.getElementById(\"voz\").checked = true;
            localStorage.setItem(\"voz\",true); 
        }
    }

    
</script>
<!--fin función cierre sesión-->";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "        <!--titulo y encabezado de la pagina-->
        <title>GAIA Tools</title>
        <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"description\" content=\"\" />
        <meta name=\"keywords\" content=\"\" />
        <meta name=\"description\" content=\"Moleskine Notebook with jQuery Booklet\" />
        <meta name=\"keywords\" content=\"jquery, book, flip, pages, moleskine, booklet, plugin, css3 \"/>
        <link rel=\"shortcut icon\" href=\"../images/favicon.ico\" type=\"image/x-icon\"/>
        <link rel=\"stylesheet\" href=\"../css/skel.css\" />
        <link rel=\"stylesheet\" href=\"../css/style-wide.css\" />
        <link rel=\"stylesheet\" href=\"../css/style.css\" />
        <link rel=\"stylesheet\" href=\"../css/style-noscript.css\" />
        <link rel=\"stylesheet\" href=\"../css/estilo.css\" type=\"text/css\"/>        
        <link rel=\"stylesheet\" href=\"../css/jquery-ui.css\" />
        <link rel=\"stylesheet\" href=\"../css/autocomplete.css\" type=\"text/css\" />
        <link rel=\"stylesheet\" href=\"../templates/booklet/jquery.booklet.1.1.0.css\" type=\"text/css\" media=\"screen\"/>
        <link rel=\"stylesheet\" href=\"../templates/css/style.css\" />
        <script type=\"text/javascript\" src=\"../templates/booklet/jquery-2.1.4.min.js\"></script>
        <script type=\"text/javascript\" src=\"../templates/booklet/jquery.easing.1.3.js\"></script>
        <script type=\"text/javascript\" src=\"../templates/booklet/jquery.booklet.1.1.0.min.js\"></script>
        <script type=\"text/javascript\" src=\"../js/jquery-ui.min.js\"></script>
        <script type=\"text/javascript\" src=\"../js/jquery-ui.js\"></script>
        <script type=\"text/javascript\" src=\"../js/jquery.js\"></script>
        <script type=\"text/javascript\" src=\"../js/guiaVoz.js\"></script>
        <script type=\"text/javascript\" src=\"../js/jquery.min.js\"></script>
        <script type=\"text/javascript\" src=\"../js/annyang.js\"></script>
        <script type=\"text/javascript\" src=\"../js/jquery-1.10.2.js\"></script>
        <script type=\"text/javascript\" src=\"../js/autocomplete.jquery.js\"></script>
        ";
    }

    // line 98
    public function block_inner($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
