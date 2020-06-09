<?php

/* pregCerradaUnica.twing.html */
class __TwigTemplate_d08741979450fdf2c8a0cd2310e84591 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'inner' => array($this, 'block_inner'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("layout.twig.html");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_inner($context, array $blocks = array())
    {
        // line 3
        echo "<div id=\"formulario\"></div>
<script type=\"text/javascript\">
    function guardarTemp(urlAplicacion){
        var titulo ='";
        // line 6
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "';
        var id ='";
        // line 7
        echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
        echo "';
        \$(\"#formulario\").html('<form id=\"cambapli\" action=\"'+urlAplicacion+'\" method=\"post\">\\n\\
                                <input type=\"hidden\" name=\"titulo\" value=\"'+titulo+'\"></input>\\n\\
                                <input type=\"hidden\" name=\"id\" value=\"'+id+'\"></input>\\n\\
                               </form>');
        document.forms['cambapli'].submit();  
    }
</script>
<div class=\"presentacion\">
    <header><h2>QUESTION -pregunta cerrada elección múltiple- para: \"";
        // line 16
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "\"</h2></header>
    <div id=\"tipopreg\">
        <button id=\"abierta\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregAbierta.php');\">Pregunta Abierta</button>
        <!--button id=\"cerradanmultiple\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregCerradaMultiple.php');\">Pregunta Cerrada de Múltiple Respuesta</button-->
        <button id=\"cerradaunica\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregCerradaUnica.php');\">Pregunta Cerrada de Única Respuesta</button>
        <button id=\"vf\" class=\"selecPreg btn-default\" onclick=\"guardarTemp('pregVerdadero.php');\">Pregunta de Verdadero o Falso</button>
    </div>
    <div id=\"pregCerrada\">
        <header><h2></h2></header>
        <form class=\"sesion\" action=\"pregCerradaUnica.php\" method=\"post\">
            <p class=\"preg\">
                <label>PREGUNTA:</label><textarea class=\"textarea1\" name=\"pregunta\"  placeholder=\"¡Escriba aca su pregunta!\"></textarea><br><br>
                <label>OPCIÓN:</label><input type='text' id=\"opcione\" value=''> <br><br>
                <label>RESPUESTA:</label><select id=\"respuesta\" name=\"respuesta\" ></select><br><br>
                <input class=\"btn\" type='button' id=\"agregaropcion\" onclick='javascript:insertOption(elements[1].value)' value='Inserta Opción'> <br><br>
                <input class=\"btn\" type='button' onclick='javascript:removeOption()' value='Borra Optión'> <br><br>
                <input type=\"text\" id=\"respuestas1\" name=\"respuestas1\" hidden>
                <input class=\"btn\" type=\"submit\" name=\"guardarCerrada\" id=\"guardar\" value=\"GUARDAR\"><br><br>
            </p>
        </form>
        <script>
            \$('#agregaropcion').click(function(){
                var valu = \$(\"#respuestas1\").val();
                if(valu==\"\"){
                    \$(\"#respuestas1\").val(\$('#opcione').val()),
                    \$(\"#opcione\").val('');
                }else{
                    \$(\"#respuestas1\").val(valu+','+\$('#opcione').val()),
                    \$(\"#opcione\").val('');
                }
            });
            \$(\"#add\").click(function(){
            var name = parseInt(\$(\".ans > input\").last()[0].name)+1
            \$(\".ans\").append(name+\"° opcion: <input type=text name=\"+name+\" onchange=myFunction(this.value)><br><br>\")
            });
            function myFunction(val) {
                \$('#respuesta').append('<option value='+val+' selected=\"selected\">'+val+'</option>');
            }
            function confirmClick() {
                if(confirm(\"desea cerrar sesión?\")) { return true; } else { return false; }
            };
            \$(function(){
                \$(\"div.selecPreg\").click(function() {
                    \$(this).addClass(\"active\").animate({opacity:0.50}); 
                    \$(this).toggleClass(\"active\").animate({opacity:1});                             
                });
            }); 
            function insertOption(elm) { 
                var nuevaOpcion=document.createElement('option'); 
                nuevaOpcion.text=elm; 
                var selectRespuesta=document.getElementById(\"respuesta\"); 
                try { 
                    selectRespuesta.add(nuevaOpcion,null);  
                    var respuestas1 = document.getElementById(\"respuesta1\");
                } catch(ex) { selectRespuesta.add(nuevaOpcion); } 
            } 
            function removeOption() { 
                var selectRespuesta=document.getElementById(\"respuesta\"); 
                selectRespuesta.remove(selectRespuesta.selectedIndex); 
            } 
        </script>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "pregCerradaUnica.twing.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
