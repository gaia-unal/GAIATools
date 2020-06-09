<?php

/* verRecursoEnsenaEmparejar.twig.html */
class __TwigTemplate_578f20a71c97667bdfa41e29f37f4743 extends Twig_Template
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
        if (($this->getContext($context, 'estilo') == "1")) {
            // line 4
            echo "<div class=\"presentacion\">
";
        } elseif (($this->getContext($context, 'estilo') == "2")) {
            // line 6
            echo "<div class=\"inner\">
";
        }
        // line 8
        if (($this->getContext($context, 'idCuest') == 5)) {
            // line 9
            echo "<!-- librerias necesarias para el aspecto y funcionamiento de la aplicacion libro -->

<div class=\"libro\">

    <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
    <meta name=\"description\" content=\"\" />
    <meta name=\"keywords\" content=\"\" />
    <meta name=\"description\" content=\"Moleskine Notebook with jQuery Booklet\" />
    <meta name=\"keywords\" content=\"jquery, book, flip, pages, moleskine, booklet, plugin, css3 \"/>
    <link rel=\"stylesheet\" href=\"../templates/booklet/jquery.booklet.1.1.0.css\" type=\"text/css\" media=\"screen\"/>
    <link rel=\"stylesheet\" href=\"../templates/css/style.css\" />
    <script type=\"text/javascript\" src=\"../templates/booklet/jquery-2.1.4.min.js\"></script>
    <script type=\"text/javascript\" src=\"../templates/booklet/jquery.easing.1.3.js\"></script>
    <script type=\"text/javascript\" src=\"../templates/booklet/jquery.booklet.1.1.0.min.js\"></script>
    <header><h2>LIBRO: ";
            // line 23
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "</h2></header>


    
    <div class=\"prim\">
        <div class=\"book_wrapper\">
            <a id=\"next_page_button\"></a><a id=\"prev_page_button\"></a>
            <div id=\"loading\" class=\"loading\">Loading pages...</div>
            <div id=\"mybook\">
                <div class=\"b-load\" id=\"texto\">
                    <div class=\"pagina\">
                        <br><br><br><header class=\"titulo\"><h1>";
            // line 34
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "</h1></header><br>
                        <br><header class=\"titulo\"><h1>Creado por:<br><br>";
            // line 35
            echo twig_escape_filter($this->env, $this->getContext($context, 'autor'), "html");
            echo "</h1></header>
                    </div>
                    ";
            // line 37
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'capitulos'));
            foreach ($context['_seq'] as $context['_key'] => $context['n']) {
                // line 38
                echo "                    <div class=\"pagina\">
                        <br><br><label><h4>";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "capitulo", array(), "any", false), "html");
                echo "</h4></label><br><br>
                        <p class=\"contenido\">";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "contenido", array(), "any", false), "html");
                echo "</p>
                        ";
                // line 41
                if (($this->getAttribute($this->getContext($context, 'n'), "imagen", array(), "any", false) != "")) {
                    // line 42
                    echo "                        <img class=\"image\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "imagen", array(), "any", false), "html");
                    echo "\" alt=\"\" />
                        ";
                }
                // line 44
                echo "                        <input type=\"hidden\" id=\"leerpag\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "capitulo", array(), "any", false), "html");
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "contenido", array(), "any", false), "html");
                echo "\" />
                    </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 47
            echo "                </div>
            </div>
        </div>
    </div>
    <script type=\"text/javascript\">
        \$(function() {
            var \$mybook         = \$('#mybook');
            var \$bttn_next      = \$('#next_page_button');
            var \$bttn_prev      = \$('#prev_page_button');
            var \$loading        = \$('#loading');
            var \$mybook_images  = \$mybook.find('div.pagina');
            var cnt_images      = \$mybook_images.length;
            var loaded          = 0;
            //preload all the images in the book,
            //and then call the booklet plugin
            \$mybook_images.each(function(){
                var \$img    = \$(this);
                var source  = \$img.attr('src');

                    ++loaded;
                    if(loaded == cnt_images){
                        \$loading.hide();
                        \$bttn_next.show();
                        \$bttn_prev.show();
                        \$mybook.show().booklet({
                            name:               null,                            // name of the booklet to display in the document title bar
                            width:              800,                             // container width
                            height:             500,                             // container height
                            speed:              600,                             // speed of the transition between pages
                            direction:          'LTR',                           // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
                            startingPage:       0,                               // index of the first page to be displayed
                            easing:             'easeInOutQuad',                 // easing method for complete transition
                            easeIn:             'easeInQuad',                    // easing method for first half of transition
                            easeOut:            'easeOutQuad',                   // easing method for second half of transition

                            closed:             true,                           // start with the book \"closed\", will add empty pages to beginning and end of book
                            closedFrontTitle:   null,                            // used with \"closed\", \"menu\" and \"pageSelector\", determines title of blank starting page
                            closedFrontChapter: null,                            // used with \"closed\", \"menu\" and \"chapterSelector\", determines chapter name of blank starting page
                            closedBackTitle:    null,                            // used with \"closed\", \"menu\" and \"pageSelector\", determines chapter name of blank ending page
                            closedBackChapter:  null,                            // used with \"closed\", \"menu\" and \"chapterSelector\", determines chapter name of blank ending page
                            covers:             false,                           // used with  \"closed\", makes first and last pages into covers, without page numbers (if enabled)

                            pagePadding:        10,                              // padding for each page wrapper
                            pageNumbers:        true,                            // display page numbers on each page

                            hovers:             false,                            // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
                            overlays:           false,                            // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
                            tabs:               false,                           // adds tabs along the top of the pages
                            tabWidth:           60,                              // set the width of the tabs
                            tabHeight:          20,                              // set the height of the tabs
                            arrows:             false,                           // adds arrows overlayed over the book edges
                            cursor:             'pointer',                       // cursor css setting for side bar areas

                            hash:               false,                           // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
                            keyboard:           true,                            // enables navigation with arrow keys (left: previous, right: next)
                            next:               \$bttn_next,                     // selector for element to use as click trigger for next page
                            prev:               \$bttn_prev,                     // selector for element to use as click trigger for previous page

                            menu:               null,                            // selector for element to use as the menu area, required for 'pageSelector'
                            pageSelector:       false,                           // enables navigation with a dropdown menu of pages, requires 'menu'
                            chapterSelector:    false,                           // enables navigation with a dropdown menu of chapters, determined by the \"rel\" attribute, requires 'menu'

                            shadows:            true,                            // display shadows on page animations
                            shadowTopFwdWidth:  166,                             // shadow width for top forward anim
                            shadowTopBackWidth: 166,                             // shadow width for top back anim
                            shadowBtmWidth:     50,                              // shadow width for bottom shadow

                            before:             function(){},                    // callback invoked before each page turn animation
                            after:              function(){}                     // callback invoked after each page turn animation
                        });
                        //Cufon.refresh();
                    }
            });
        });
        /*var onload = function cargarRE (){
            var texto = \"Esta es la visualización del libro\".'";
            // line 122
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "'.\", aquí \\n\\
                    podras ver el contenido. Recuerda que puedes regresar a la \\n\\
                    página principal. O tambien puedes construir objetos educativos \\n\\
                    con iniciar sesión, pero si no puedes registrarte en el sistema \\n\\
                    con la palabra registar. Para iniciar la lectura del libro \\n\\
                    pronuncia iniciar, para cambiar de pagina mensiona siguiente o atras.\"; 
            //agregar instrucciones.
            sintetizadorVoz(texto);
            var datos = {idArea : 'todas'};
            \$.post(\"../ajax/index-ajax.php\", datos, function(data) { \$(\"#recursos\").html(data); });
        }*/
    </script>
</div>

";
        } else {
            // line 137
            echo "
    <p align=\"right\" class=\"num\"><font color=\"#0489B1\" size=\"5\">";
            // line 138
            echo twig_escape_filter($this->env, $this->getContext($context, 'pos'), "html");
            echo "</font></p>


    ";
            // line 141
            if (((($this->getContext($context, 'pos') == 1) && ($this->getContext($context, 'mensaje') == "")) && ($this->getContext($context, 'siguiente') != 2))) {
                // line 142
                echo "    <br><br><br>
<font color=\"#0489B1\">¡ Es fácil !, mire cada imágen y su descripción, las que están debajo de las casillas al frente de cada avatar, usted debe escribir en la casilla correspondiente la letra del avatar que muestre este valor. </font><br><font color=\"#57934E\">El avatar se acciona dándo click encima.</font>
";
            }
            // line 144
            echo "  

";
            // line 146
            if (((($this->getContext($context, 'pos') == 2) && ($this->getContext($context, 'mensaje') == "")) && ($this->getContext($context, 'siguiente') != 2))) {
                // line 147
                echo "    <br><br><br>
<font color=\"#0489B1\">Este segundo ítem se resuelve de igual forma que el primero. </font><br><font color=\"#57934E\">Recuerde: el avatar se acciona dándo click encima.</font>
";
            }
            // line 149
            echo " 

";
            // line 151
            if (((($this->getContext($context, 'pos') > 2) && ($this->getContext($context, 'mensaje') == "")) && ($this->getContext($context, 'siguiente') != 2))) {
                // line 152
                echo "    <br><br><br>
<font color=\"#0489B1\">Responda correctamente este ítem, se responde igual a los anteriores.</font>
";
            }
            // line 154
            echo " 



<style type=\"text/css\">
    
    .overlay{
     display: none;
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     background: #000;
     z-index:1001;
     opacity:.75;
     -moz-opacity: 0.75;
     filter: alpha(opacity=75);
}
.modal {
     display: none;
     position: absolute;
     top: 25%;
     left: 25%;
     width: 50%;
     height: 50%;
     padding: 16px;
     background: #fff;
     color: #333;
     z-index:1002;
     overflow: auto;
}
.num{
    margin-top: -30px;
    margin-bottom: -50px;
    }
</style>    

";
            // line 192
            if ((($this->getContext($context, 'mensaje') == "CORRECTO") && ($this->getContext($context, 'siguiente') == 1))) {
                // line 193
                echo "        <br>
        <img src=\"../images/fiesta.png\" width=\"250px\"><br>
        <header><h2><font color=\"#0489B1\" size=\"5\">¡EXCELENTE!</font></h2><br><font color=\"#57934E\">Ha respondido correctamente, presione continuar para ir por más</font></header>

        <form action=\"verRecursoEnsenaEmparejar.php?validar=true&id=";
                // line 197
                echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
                echo "&pos=";
                echo twig_escape_filter($this->env, ($this->getContext($context, 'pos') + 1), "html");
                echo "&head=";
                echo twig_escape_filter($this->env, $this->getContext($context, 'head'), "html");
                echo "&g=";
                echo twig_escape_filter($this->env, $this->getContext($context, 'conteoCorrectos'), "html");
                echo "&b=";
                echo twig_escape_filter($this->env, $this->getContext($context, 'conteoErroneo'), "html");
                echo "\" method=\"post\">
            <input id=\"is\" type=\"submit\" class=\"voz\" value=\"CONTINUAR\">
            
        </form>

        ";
            } elseif ((($this->getContext($context, 'mensaje') == "INCORRECTO") && ($this->getContext($context, 'siguiente') == 1))) {
                // line 203
                echo "        <br>
        <img src=\"../images/preocupado.png\" width=\"100px\"><br>
        <header><h2><font color=\"#A34B4E\" size=\"5\">¡Algo no estuvo bien!</font></h2><br><font color=\"#A34B4E\">No ha respondido correctamente, recuerde ";
                // line 205
                echo twig_escape_filter($this->env, $this->getContext($context, 'retro'), "html");
                echo ", tal vez en el siguiente le vaya mejor.</font></header><br>

        <form action=\"verRecursoEnsenaEmparejar.php?validar=true&id=";
                // line 207
                echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
                echo "&pos=";
                echo twig_escape_filter($this->env, ($this->getContext($context, 'pos') + 1), "html");
                echo "&head=";
                echo twig_escape_filter($this->env, $this->getContext($context, 'head'), "html");
                echo "&g=";
                echo twig_escape_filter($this->env, $this->getContext($context, 'conteoCorrectos'), "html");
                echo "&b=";
                echo twig_escape_filter($this->env, $this->getContext($context, 'conteoErroneo'), "html");
                echo "\" method=\"post\">
            <input id=\"is\" type=\"submit\" class=\"voz\" value=\"CONTINUAR\">
            
        </form>
                
        

        ";
            } else {
                // line 215
                echo "
    <form id=\"formu\" action=\"verRecursoEnsenaEmparejar.php?validar=true&id=";
                // line 216
                echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
                echo "&pos=";
                echo twig_escape_filter($this->env, ($this->getContext($context, 'pos') + 1), "html");
                echo "&head=";
                echo twig_escape_filter($this->env, $this->getContext($context, 'head'), "html");
                echo "\" method=\"post\">
        <input type='hidden' name='idCuestionario' value=\"";
                // line 217
                echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
                echo "\">
        <input type='hidden' name='validar' value=\"";
                // line 218
                echo twig_escape_filter($this->env, $this->getContext($context, 'validar'), "html");
                echo "\">
        <input type='hidden' name='id' value=\"";
                // line 219
                echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
                echo "\">
        <input type='hidden' name='pos' value=\"";
                // line 220
                echo twig_escape_filter($this->env, $this->getContext($context, 'pos'), "html");
                echo "\">
        <input type='hidden' name='correctos' value=\"";
                // line 221
                echo twig_escape_filter($this->env, $this->getContext($context, 'conteoCorrectos'), "html");
                echo "\">
        <input type='hidden' name='erroneos' value=\"";
                // line 222
                echo twig_escape_filter($this->env, $this->getContext($context, 'conteoErroneo'), "html");
                echo "\">
        <input type='hidden' name='titulo' value=\"";
                // line 223
                echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
                echo "\">
        <input type='hidden' name='estilo' value=\"";
                // line 224
                echo twig_escape_filter($this->env, $this->getContext($context, 'estilo'), "html");
                echo "\">
        <input type='hidden' name='autor' value=\"";
                // line 225
                echo twig_escape_filter($this->env, $this->getContext($context, 'autor'), "html");
                echo "\">
       
        

        
        ";
                // line 230
                if (($this->getContext($context, 'siguiente') == 1)) {
                    // line 231
                    echo "
        <h1><b>";
                    // line 232
                    if (twig_in_filter($this->getContext($context, 'idCuest'), array(0 => 1, 1 => 2, 2 => 3, 3 => 4))) {
                        echo "PREGUNTA:";
                    } elseif (($this->getContext($context, 'idCuest') == 6)) {
                        echo "TÍTULO:";
                    }
                    echo "</b> <br>
        </h1>
        <!-- se imprimen los avatars -->
        <table width=\"100%\">
    <tr>
        <td>
            <h1><strong>&nbsp;&nbsp;a)</strong></h1>

        </td>
        <td>

            <div id=\"animation0\" onclick=\"PrestartAnimation('";
                    // line 243
                    echo twig_escape_filter($this->env, $this->getContext($context, 'a'), "html");
                    echo "', 0, 0)\" ></div>

            <div id=\"slider\" style=\"width:200px;\"></div><br>
        </td>
        <td>
            <input type=\"text\" id=\"option1\" name=\"option1\" value=\"\" min=\"0\" title=\"\" required=\"required\" autocomplete=\"off\"><br>
            <font size=\"5%\"><strong><img src=\"../images/all/";
                    // line 249
                    echo twig_escape_filter($this->env, $this->getContext($context, 'file_nameA'), "html");
                    echo ".png\" width=\"100px\"><br><font color=\"#0489B1\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, 'Correct_a'), "html");
                    echo "</font></strong></font>



        </td>
    </tr>
    <tr>
        <td>
            <h1><strong>&nbsp;&nbsp;b)</strong></h1>

        </td>
        <td>

            <div id=\"animation1\" onclick=\"PrestartAnimation('";
                    // line 262
                    echo twig_escape_filter($this->env, $this->getContext($context, 'b'), "html");
                    echo "', 0, 1)\" ></div>
            <div id=\"slider\" style=\"width:200px;\"></div><br>

        </td>
        <td>
            <input type=\"text\" id=\"option2\" name=\"option2\" value=\"\" min=\"0\" title=\"\" required=\"required\" autocomplete=\"off\"><br>
            <font size=\"5%\"><strong><img src=\"../images/all/";
                    // line 268
                    echo twig_escape_filter($this->env, $this->getContext($context, 'file_nameB'), "html");
                    echo ".png\" width=\"100px\"><br><font color=\"#0489B1\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, 'Correct_b'), "html");
                    echo "</font></strong></font>


        </td>
    </tr>
    <tr>
        <td>
            <h1><strong>&nbsp;&nbsp;c)</strong></h1>

        </td>
        <td>

            <div id=\"animation2\" onclick=\"PrestartAnimation('";
                    // line 280
                    echo twig_escape_filter($this->env, $this->getContext($context, 'c'), "html");
                    echo "', 0, 2)\" ></div>
            <div id=\"slider\" style=\"width:200px;\"></div><br>
            
        </td>
        <td>
            <input type=\"text\" id=\"option3\" name=\"option3\" value=\"\" min=\"0\" title=\"\" required=\"required\" autocomplete=\"off\"><br>
            <font size=\"5%\"><strong><img src=\"../images/all/";
                    // line 286
                    echo twig_escape_filter($this->env, $this->getContext($context, 'file_nameC'), "html");
                    echo ".png\" width=\"100px\"><br><font color=\"#0489B1\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, 'Correct_c'), "html");
                    echo "</font></strong></font>

        </td>
    </tr>
</table>
        <input type='hidden' name='Correct_a' value=\"";
                    // line 291
                    echo twig_escape_filter($this->env, $this->getContext($context, 'Correct_a'), "html");
                    echo "\">
        <input type='hidden' name='Correct_b' value=\"";
                    // line 292
                    echo twig_escape_filter($this->env, $this->getContext($context, 'Correct_b'), "html");
                    echo "\">
        <input type='hidden' name='Correct_c' value=\"";
                    // line 293
                    echo twig_escape_filter($this->env, $this->getContext($context, 'Correct_c'), "html");
                    echo "\">
        <input type='hidden' name='a' value=\"";
                    // line 294
                    echo twig_escape_filter($this->env, $this->getContext($context, 'a'), "html");
                    echo "\">
        <input type='hidden' name='b' value=\"";
                    // line 295
                    echo twig_escape_filter($this->env, $this->getContext($context, 'b'), "html");
                    echo "\">
        <input type='hidden' name='c' value=\"";
                    // line 296
                    echo twig_escape_filter($this->env, $this->getContext($context, 'c'), "html");
                    echo "\">
        



            ";
                    // line 301
                    if (($this->getContext($context, 'idCuest') == 4)) {
                        echo "   
                <textarea id='respuesta' class='textarea1' rows='automatically' cols='automatically' placeholder='RESPUESTA'></textarea><br><br>
                <input type=\"hidden\" name=\"respuesta\" id=\"respAbierta\">
                <input type=\"hidden\" id=\"respCorrecta\" name=\"respCorr\" value=";
                        // line 304
                        echo twig_escape_filter($this->env, $this->getContext($context, 'respAbierta'), "html");
                        echo ">
                <p id='resultNormalizacion'></p>
                <!--<script>alert('puntuacion'+\$('#resultNormalizacion').html());</script><br>-->
            ";
                    } elseif (twig_in_filter($this->getContext($context, 'idCuest'), array(0 => 1, 1 => 3))) {
                        // line 307
                        echo "<!--preguntas cerradas de eleccion multiple (unica respuesta) y falso y verdadero-->
                   <b>SELECCIONE SU RESPUESTA:<br></b><br>
                    ";
                        // line 309
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'datosOpcion'));
                        foreach ($context['_seq'] as $context['_key'] => $context['opcion']) {
                            // line 310
                            echo "                    <input type=\"radio\" name=\"respuesta\" value=";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'opcion'), "respuesta", array(), "any", false), "html");
                            echo ">";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'opcion'), "opcion", array(), "any", false), "html");
                            echo "<br>
                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opcion'], $context['_parent'], $context['loop']);
                        $context = array_merge($_parent, array_intersect_key($context, $_parent));
                        // line 312
                        echo "            ";
                    } elseif (($this->getContext($context, 'idCuest') == 6)) {
                        // line 313
                        echo "                <label>";
                        echo twig_escape_filter($this->env, $this->getContext($context, 'respAbierta'), "html");
                        echo "</label><br><br><br>
            ";
                    }
                    // line 315
                    echo "        <input id=\"is\" onclick=\"dispararFrom();\" type=\"button\" class=\"voz\" value=\"SIGUIENTE\">
    </form>
    ";
                } elseif (($this->getContext($context, 'siguiente') == 0)) {
                    // line 318
                    echo "    <label>";
                    echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
                    echo "</label><br>
        <form action=\"verRecursoEnsenaEmparejar.php?validar=true&id=";
                    // line 319
                    echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
                    echo "&pos=";
                    echo twig_escape_filter($this->env, ($this->getContext($context, 'pos') + 1), "html");
                    echo "&head=";
                    echo twig_escape_filter($this->env, $this->getContext($context, 'head'), "html");
                    echo "\" method=\"post\">
            <input type='hidden' name='idCuestionario' value=\"";
                    // line 320
                    echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
                    echo "\">
            <input type='hidden' name='validar' value=\"";
                    // line 321
                    echo twig_escape_filter($this->env, $this->getContext($context, 'validar'), "html");
                    echo "\">
            <input type='hidden' name='id' value=\"";
                    // line 322
                    echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
                    echo "\">
            <input type='hidden' name='pos' value=\"";
                    // line 323
                    echo twig_escape_filter($this->env, $this->getContext($context, 'pos'), "html");
                    echo "\">
            <input type='hidden' name='correctos' value=\"";
                    // line 324
                    echo twig_escape_filter($this->env, $this->getContext($context, 'conteoCorrectos'), "html");
                    echo "\">
            <input type='hidden' name='erroneos' value=\"";
                    // line 325
                    echo twig_escape_filter($this->env, $this->getContext($context, 'conteoErroneo'), "html");
                    echo "\">
            <input type='hidden' name='titulo' value=\"";
                    // line 326
                    echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
                    echo "\">
            <input type='hidden' name='estilo' value=\"";
                    // line 327
                    echo twig_escape_filter($this->env, $this->getContext($context, 'estilo'), "html");
                    echo "\">
            <input id=\"is\" type=\"submit\" class=\"voz\" value=\"CONTINUAR\">
            
        </form>
    ";
                } elseif (($this->getContext($context, 'siguiente') == 2)) {
                    // line 332
                    echo "        
        <br>
        <img src=\"../images/fiesta.png\" width=\"250px\"><br>
        <header><h2><font color=\"#57934E\" size=\"5\">¡con esta finaliza la actividad!</font></h2><br><font color=\"#57934E\"></header><br>
        ha tenido un total de ";
                    // line 336
                    echo twig_escape_filter($this->env, $this->getContext($context, 'conteoCorrectos'), "html");
                    echo " ítems acertados
                y un total de <font color=\"#A34B4E\"> ";
                    // line 337
                    echo twig_escape_filter($this->env, $this->getContext($context, 'conteoErroneo'), "html");
                    echo " ítems erróneos</font></strong><br><br></header>
            <form action=\"listarRecurso.php\" method=\"post\">
            <input type='hidden' name='idCuestionario' value=\"";
                    // line 339
                    echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
                    echo "\">
            <input type='hidden' name='validar' value=\"";
                    // line 340
                    echo twig_escape_filter($this->env, $this->getContext($context, 'validar'), "html");
                    echo "\">
            <input type='hidden' name='id' value=\"";
                    // line 341
                    echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
                    echo "\">
            <input type='hidden' name='pos' value=\"";
                    // line 342
                    echo twig_escape_filter($this->env, $this->getContext($context, 'pos'), "html");
                    echo "\">
            <input type='hidden' name='correctos' value=\"";
                    // line 343
                    echo twig_escape_filter($this->env, $this->getContext($context, 'conteoCorrectos'), "html");
                    echo "\">
            <input type='hidden' name='erroneos' value=\"";
                    // line 344
                    echo twig_escape_filter($this->env, $this->getContext($context, 'conteoErroneo'), "html");
                    echo "\">
            <input type='hidden' name='titulo' value=\"";
                    // line 345
                    echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
                    echo "\">
            <input type='hidden' name='estilo' value=\"";
                    // line 346
                    echo twig_escape_filter($this->env, $this->getContext($context, 'estilo'), "html");
                    echo "\">
            
        </form>

        
        <a  href=";
                    // line 351
                    echo twig_escape_filter($this->env, $this->getContext($context, 'retorno'), "html");
                    echo "><img src=\"../images/17.png\" width=\"70\" heigth=\"70\" align=\"center\"></a>
    ";
                }
            }
        }
        // line 355
        echo "<script>
    function dispararFrom(){
        var cuestionario = '";
        // line 357
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "';
        if(cuestionario==='4'){calificar();}
        document.forms['formu'].submit();
    }
    function calificar(){
        var string = \$(\"#respuesta\").val();
        var palClaves = \$(\"#respCorrecta\").val();
        palClaves = palClaves.replace(/%/gi,\" \");
        \$(\"#respAbierta\").val(normalizar(string, palClaves));
    }
    function normalizar(string, palClaves){
        //var segimiento=\"\";
        var j=0, pal, tamEst, tamPro, tamMin, dOverlap, contRep=0;
        var respuEstud, respuProfe;
        var analEstud = new Array();
        var analProfe = new Array();
        //convertir la cadena en minuscula
        string = string.toLowerCase();
        palClaves = palClaves.toLowerCase();
        //quita tildes y caracteres especiales ademas de signos de puntuacion, agrupacion, admiracion y otros
        string = normalize(string);
        palClaves = normalize(palClaves);
        //palabras es un arreglo separador de palabras
        respuEstud = string.split(\" \");
        respuProfe = palClaves.split(\" \");
        //Retirar espacios en blanco, y palabras de union (a, de, en, un...) StopWord
        for (var i in respuEstud) {pal=respuEstud[i];if ( !invalidas(pal) ) {analEstud[j]=respuEstud[i];j++;}}
        j=0;
        for (var i in respuProfe) {pal=respuProfe[i];if ( !invalidas(pal) ) {analProfe[j]=respuProfe[i];j++;}}
        //ordenar el arreglo
        analEstud.sort();
        analProfe.sort();
        for (var i in analEstud ) {for (var k in analProfe ) {if (analEstud[i]==analProfe[k]) {contRep = contRep + 1;}}}
        //tamaños de las cadenas
        tamEst = analEstud.length;
        tamPro = analProfe.length;
        if (tamEst>tamPro) {tamMin = tamEst;}else{tamMin = tamPro;}
        dOverlap = contRep/tamMin;
        if (dOverlap>0.5) {return 't';}else{return 'f';}
    }
    function normalize (str) {
        var from = \"ÃÀÁÄÂÈÉËÊÌÍÏÎÒÓÖÔÙÚÜÛãàáäâèéëêìíïîòóöôùúüûÇç´'`,;.:-_^¨{}[]*+~¡?¿!#\$%&/()=°!|ºª\";
        var to   = \"AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuucc\";
        var mapping = {};
        for(var i = 0, j = from.length; i < j; i++ ){mapping[ from.charAt( i ) ] = to.charAt( i );}
        var ret = [];
        for( var i = 0, j = str.length; i < j; i++ ) {var c = str.charAt( i );if( mapping.hasOwnProperty( str.charAt( i ) ) ){ret.push( mapping[ c ] );}else{ret.push( c );}}      
        return ret.join( '' );
    }
    function invalidas(str){
        var i, es;
        var prepos = ['a','ante','bajo','con','de','desde','durante','en','entre','excepto','hacia','hasta','mediante','para','por','salvo','segun','sin','sobre','tras', 'ellos','pero', 'un', 'una', 'al', 'le', 'la', 'lo', 'el', 'los', ''];
        for (i in prepos ) {if (prepos[i] == str) {es = true;break;}else{es = false;}}
        return es;
    }



    /*
    var onload = function cargarRE (){
        var texto = \"Estas visualizando el funcionamiento del recurso educativo\\n\\
                    llamado \".'";
        // line 418
        echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
        echo "'.\". Recuerda que puede consultar el \\n\\
                    menú o cerrar sesión. Para consultar las preguntas de este \\n\\
                    recurso pronuncia la palabra pregunta, para responder o \\n\\
                    evaluar las posibles respuestas pronuncia responder, para \\n\\
                    evaluar la siguiente pregunta solo debes pronunciar siguiente.\"; 
        //agregar instrucciones.
        sintetizadorVoz(texto);
    }
    \"use strict\";
    if (annyang) {
        \"use strict\"
        var commands = {
            'cerrar sesión':function(){window.location=\"cierre.php\";},
            'menú':function(){
                gcse.pause();
                gcse.src = \"\";
                var texto = \"Si deseas ver la página principal, pronuncia presentación.\\n\\\\n\\
                            Puedes verificar tus datos personales al pronunciar \\n\\
                            información personal, pero tambien puedes realizar \\n\\
                            otras operaciones sobre los recursos educativos, solo debes\\n\\
                            mencionar la palabra visualizar, crear, editar o eliminar\\n\\
                            según la acción que requieras utilizar.\"; 
                sintetizadorVoz(texto);
            },
            'presentación':function(){window.location=\"principal.php\";},
            'visualizar':function(){window.location=\"listarRecurso.php\";},
            'información personal':function(){window.location=\"informacionPersonal.php\";},
            'crear':function(){window.location=\"crearRecurso.php\";},
            'editar':function(){window.location=\"editarRecurso.php\";},
            'eliminar':function(){window.location=\"eliminarRecurso.php\";},
            'seguir' :function(){
                gcse.pause();
                gcse.src = \"\";
                var titulos = \$('#paraSintetizador').val();
                titulos = titulos.replace(',-%',',');
                var texto = \"Usted debe pronunciar la palabra seleccionar \\n\\
                            seguido del titulo completo del \\n\\
                            recurso educativo que desea ver, para ello le \\n\\
                            mencionaremos todos los titulos de los recursos \\n\\
                            educativos existentes, \"+titulos;
                sintetizadorVoz(texto);
            },
            'pregunta':function(){
                sintetizadorVoz('";
        // line 461
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'datosPreg'), "pregunta", array(), "any", false), "html");
        echo "');
            },
            'responder *v':function(v){
                if ('";
        // line 464
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==4){
                    \$('#respuesta').val(v);
                }
            },
            'siguiente':function(){
                dispararFrom();
            }
        };
        // OPTIONAL: activate debug mode for detailed logging in the console
        annyang.debug();
        // Add voice commands to respond to
        annyang.addCommands(commands);
        // OPTIONAL: Set a language for speech recognition (defaults to English)
        annyang.setLanguage('es');
        // Start listening. You can call this here, or attach this call to an event, button, etc.
        annyang.start();
    } else {
        \$(document).ready(function() {
            \$('#unsupported').fadeIn('fast');
        });
    }*/
    /*
    \"use strict\";
    if (annyang) {
        \"use strict\"
        var commands = {
            'página principal':function(){window.location=\"index.php\";},
            'iniciar sesión':function(){window.location=\"validar.php\";},
            'registrar':function(){window.location=\"registro.php\";},
            'iniciar' :function(){
                gcse.pause();
                gcse.src = \"\";
                var titulos = \$('#leerpag').val();
                var texto = titulos;
                sintetizadorVoz(texto);
            }
        };
        // OPTIONAL: activate debug mode for detailed logging in the console
        annyang.debug();
        // Add voice commands to respond to
        annyang.addCommands(commands);
        // OPTIONAL: Set a language for speech recognition (defaults to English)
        annyang.setLanguage('es');
        // Start listening. You can call this here, or attach this call to an event, button, etc.
        annyang.start();
    } else {
        \$(document).ready(function() {
            \$('#unsupported').fadeIn('fast');
        });
    }*/
</script>

<script> 
function abrir() { 
open('pagina.html','','top=300,left=300,width=300,height=300') ; 
} 
</script> 

</div>
";
    }

    public function getTemplateName()
    {
        return "verRecursoEnsenaEmparejar.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
