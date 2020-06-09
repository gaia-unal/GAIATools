<?php

/* verRecurso.twig.html */
class __TwigTemplate_4718ea8582022f8fa2947efffdc051bc extends Twig_Template
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

    // line 1
    public function block_inner($context, array $blocks = array())
    {
        // line 2
        if (($this->getContext($context, 'estilo') == "1")) {
            // line 3
            echo "    <div class=\"presentacion\" autofocus>";
            $context['finLibro'] = "Al pronunciar presentación puedes regresar.";
        } elseif (($this->getContext($context, 'estilo') == "2")) {
            // line 5
            echo "    <div class=\"inner\" autofocus>";
            $context['finLibro'] = "Al pronunciar página principal puedes regresar.";
        }
        // line 7
        if (($this->getContext($context, 'idCuest') == 5)) {
            // line 8
            echo "<!-- librerias necesarias para el aspecto y funcionamiento de la aplicacion libro -->
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


<!--div class=\"libro\"-->
    <header><h2>LIBRO: ";
            // line 22
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "</h2></header>
    <div class=\"prim\">
        <div class=\"book_wrapper\">
            <a id=\"next_page_button\">Pasar a la página <br>siguiente</a>
            <a id=\"prev_page_button\">Pasar a la página <br>anterior</a>
            <div id=\"loading\" class=\"loading\">Loading pages...</div>
            <div id=\"mybook\">
                <div class=\"b-load\" id=\"texto\">
                    <div class=\"pagina\">
                        <br><br><br><header class=\"titulo\"><h1>";
            // line 31
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "</h1></header><br>
                        <br><header class=\"titulo\"><h1>Creado por:<br><br>";
            // line 32
            echo twig_escape_filter($this->env, $this->getContext($context, 'autor'), "html");
            echo "</h1></header>
                        <input type=\"hidden\" id=\"leerpag1\" value=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "  por ";
            echo twig_escape_filter($this->env, $this->getContext($context, 'autor'), "html");
            echo "\" />
                    </div>
                    ";
            // line 35
            $context['pag'] = 2;
            // line 36
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'capitulos'));
            foreach ($context['_seq'] as $context['_key'] => $context['n']) {
                // line 37
                echo "                    <div class=\"pagina\">
                        <br><br><label><h4>";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "capitulo", array(), "any", false), "html");
                echo "</h4></label><br><br>
                        ";
                // line 39
                if (($this->getAttribute($this->getContext($context, 'n'), "imagen", array(), "any", false) != "")) {
                    // line 40
                    echo "                        <img class=\"image\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "imagen", array(), "any", false), "html");
                    echo "\" alt=\"\" />
                        ";
                }
                // line 42
                echo "                        <p class=\"contenido\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "contenido", array(), "any", false), "html");
                echo "</p>
                        <input type=\"hidden\" id=\"leerpag";
                // line 43
                echo twig_escape_filter($this->env, $this->getContext($context, 'pag'), "html");
                echo "\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "capitulo", array(), "any", false), "html");
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'n'), "contenido", array(), "any", false), "html");
                echo "\" />
                        ";
                // line 44
                $context['pag'] = ($this->getContext($context, 'pag') + 1);
                // line 45
                echo "                    </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 47
            echo "                    <div class=\"pagina\">
                        <br><br><label><h4>FIN</h4></label><br><br>
                        <input type=\"hidden\" id=\"leerpag";
            // line 49
            echo twig_escape_filter($this->env, $this->getContext($context, 'pag'), "html");
            echo "\" value=\"fin. ";
            echo twig_escape_filter($this->env, $this->getContext($context, 'finLibro'), "html");
            echo "\" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2>...</h2>
    <input id=\"is\" type=\"button\" onclick=\"redireccionar();\" class=\"voz\" value=\"REGRESAR\"><br>
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
                if(loaded === cnt_images){
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
                }
            });
        });
    </script>
<!--/div-->
";
        } else {
            // line 121
            echo "    <header><h1><b>";
            if (twig_in_filter($this->getContext($context, 'idCuest'), array(0 => 1, 1 => 2, 2 => 3, 3 => 4))) {
                echo "PREGUNTA-LO";
            } elseif (($this->getContext($context, 'idCuest') == 6)) {
                echo "ESCRIBE-LO";
            }
            echo "<br>";
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "</h1></header>\t
    <form id=\"formu\" action=\"verRecurso.php\" method=\"post\">
        <input type='hidden' name='idCuestionario' value=\"";
            // line 123
            echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
            echo "\">
        <input type='hidden' name='validar' value=\"";
            // line 124
            echo twig_escape_filter($this->env, $this->getContext($context, 'validar'), "html");
            echo "\">
        <input type='hidden' name='id' value=\"";
            // line 125
            echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
            echo "\">
        <input type='hidden' name='pos' value=\"";
            // line 126
            echo twig_escape_filter($this->env, $this->getContext($context, 'pos'), "html");
            echo "\">
        <input type='hidden' name='correctos' value=\"";
            // line 127
            echo twig_escape_filter($this->env, $this->getContext($context, 'conteoCorrectos'), "html");
            echo "\">
        <input type='hidden' name='erroneos' value=\"";
            // line 128
            echo twig_escape_filter($this->env, $this->getContext($context, 'conteoErroneo'), "html");
            echo "\">
        <input type='hidden' name='titulo' value=\"";
            // line 129
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "\">
        <input type='hidden' name='estilo' value=\"";
            // line 130
            echo twig_escape_filter($this->env, $this->getContext($context, 'estilo'), "html");
            echo "\">
        <input type='hidden' name='autor' value=\"";
            // line 131
            echo twig_escape_filter($this->env, $this->getContext($context, 'autor'), "html");
            echo "\">
        ";
            // line 132
            if (($this->getContext($context, 'siguiente') == 1)) {
                // line 133
                echo "        <br><h2><b>";
                if (twig_in_filter($this->getContext($context, 'idCuest'), array(0 => 1, 1 => 2, 2 => 3, 3 => 4))) {
                    echo "PREGUNTA:";
                } elseif (($this->getContext($context, 'idCuest') == 6)) {
                    echo "TÍTULO:";
                }
                echo "</b> <br>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'datosPreg'), "pregunta", array(), "any", false), "html");
                echo "</h2>
            ";
                // line 134
                if (($this->getContext($context, 'idCuest') == 4)) {
                    echo "   
                <h2><textarea id='respuesta' class='textarea1' rows='automatically' 
                              cols='automatically' placeholder='RESPUESTA'></textarea></h2><br><br>
                <input type=\"hidden\" name=\"respuesta\" id=\"respAbierta\">
                <input type=\"hidden\" id=\"respCorrecta\" name=\"respCorr\" value=";
                    // line 138
                    echo twig_escape_filter($this->env, $this->getContext($context, 'respAbierta'), "html");
                    echo ">
                <p id='resultNormalizacion'></p>
                <!--<script>alert('puntuacion'+\$('#resultNormalizacion').html());</script><br>-->
            ";
                } elseif (twig_in_filter($this->getContext($context, 'idCuest'), array(0 => 1, 1 => 3))) {
                    // line 141
                    echo "<!--preguntas cerradas de eleccion multiple (unica respuesta) y falso y verdadero-->
            ";
                    // line 142
                    $context['numopcion'] = 1;
                    // line 143
                    echo "                <h2><b>SELECCIONE SU RESPUESTA:<br></b><br>
                    ";
                    // line 144
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'datosOpcion'));
                    foreach ($context['_seq'] as $context['_key'] => $context['opcion']) {
                        // line 145
                        echo "                        <input type=\"radio\" name=\"respuesta\" value=";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'opcion'), "respuesta", array(), "any", false), "html");
                        echo " id=\"";
                        echo twig_escape_filter($this->env, $this->getContext($context, 'numopcion'), "html");
                        echo "\" >";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'opcion'), "opcion", array(), "any", false), "html");
                        echo "</input><br>
                        <input type=\"hidden\" id=\"opcionesPreg\" value=\"\" />
                        <script>\$('#opcionesPreg').val(\$('#opcionesPreg').val()+' Opción ";
                        // line 147
                        echo twig_escape_filter($this->env, $this->getContext($context, 'numopcion'), "html");
                        echo ": ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'opcion'), "opcion", array(), "any", false), "html");
                        echo ".');</script>
                    ";
                        // line 148
                        $context['numopcion'] = ($this->getContext($context, 'numopcion') + 1);
                        // line 149
                        echo "                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['opcion'], $context['_parent'], $context['loop']);
                    $context = array_merge($_parent, array_intersect_key($context, $_parent));
                    // line 150
                    echo "                </h2>
            ";
                } elseif (($this->getContext($context, 'idCuest') == 6)) {
                    // line 152
                    echo "                <label>";
                    echo twig_escape_filter($this->env, $this->getContext($context, 'respAbierta'), "html");
                    echo "</label><br><br><br>
            ";
                }
                // line 154
                echo "            <input id=\"is\" onclick=\"dispararFrom();\" type=\"button\" class=\"voz\" value=\"SIGUIENTE\"><br>
            <input id=\"is\" type=\"button\" onclick=\"redireccionar();\" class=\"voz\" value=\"REGRESAR\">
            ";
            }
            // line 157
            echo "    </form>
    ";
            // line 158
            if (($this->getContext($context, 'siguiente') == 0)) {
                // line 159
                echo "    ";
                if (($this->getContext($context, 'mensajeRetro') != "")) {
                    // line 160
                    echo "        <br><br><label id=\"calificacion\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
                    echo "</label><br>
    ";
                } else {
                    // line 162
                    echo "        <br><br><label id=\"retro\">";
                    echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
                    echo "</label><br>
    ";
                }
                // line 164
                echo "    <label id=\"retro\">";
                echo twig_escape_filter($this->env, $this->getContext($context, 'mensajeRetro'), "html");
                echo "</label><br><br>
        <form id=\"siguienteItem\" action=\"verRecurso.php\" method=\"post\">
            <input type='hidden' name='idCuestionario' value=\"";
                // line 166
                echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
                echo "\">
            <input type='hidden' name='validar' value=\"";
                // line 167
                echo twig_escape_filter($this->env, $this->getContext($context, 'validar'), "html");
                echo "\">
            <input type='hidden' name='id' value=\"";
                // line 168
                echo twig_escape_filter($this->env, $this->getContext($context, 'id'), "html");
                echo "\">
            <input type='hidden' name='pos' value=\"";
                // line 169
                echo twig_escape_filter($this->env, $this->getContext($context, 'pos'), "html");
                echo "\">
            <input type='hidden' name='correctos' value=\"";
                // line 170
                echo twig_escape_filter($this->env, $this->getContext($context, 'conteoCorrectos'), "html");
                echo "\">
            <input type='hidden' name='erroneos' value=\"";
                // line 171
                echo twig_escape_filter($this->env, $this->getContext($context, 'conteoErroneo'), "html");
                echo "\">
            <input type='hidden' name='titulo' value=\"";
                // line 172
                echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
                echo "\">
            <input type='hidden' name='estilo' value=\"";
                // line 173
                echo twig_escape_filter($this->env, $this->getContext($context, 'estilo'), "html");
                echo "\">
            <input id=\"is\" type=\"submit\" class=\"voz\" value=\"CONTINUAR\"><br>
            <input id=\"is\" type=\"button\" onclick=\"redireccionar();\" class=\"voz\" value=\"REGRESAR\">
        </form>
    ";
            } elseif (($this->getContext($context, 'siguiente') == 2)) {
                // line 178
                echo "        ";
                $context['mensaje2'] = "El recurso educativo a finalizado";
                // line 179
                echo "        ";
                if (twig_in_filter($this->getContext($context, 'idCuest'), array(0 => 1, 1 => 2, 2 => 3, 3 => 4))) {
                    // line 180
                    echo "        ";
                    $context['mensaje2'] = ((((($this->getContext($context, 'mensaje2') . ", has tenido un total de ") . $this->getContext($context, 'conteoCorrectos')) . " ítems acertados y un total de ") . $this->getContext($context, 'conteoErroneo')) . " ítems erróneos.");
                    // line 181
                    echo "        ";
                }
                // line 182
                echo "        <label><h1>";
                echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje2'), "html");
                echo "</h1></label><br>
        <br>
        <input id=\"is\" type=\"button\" onclick=\"redireccionar();\" class=\"voz\" value=\"REGRESAR\">
    ";
            }
        }
        // line 187
        echo "<script>
    function redireccionar(){
        location.href='";
        // line 189
        echo twig_escape_filter($this->env, $this->getContext($context, 'retorno'), "html");
        echo "';
    }
    function dispararFrom(){
        var cuestionario = '";
        // line 192
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "';
        if(cuestionario==='4'){calificar();}
        document.forms['formu'].submit();
    }
    function dispararSiguiente(){
        \$(\"#siguienteItem\").submit();
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
        var pregunta = '";
        // line 211
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'datosPreg'), "pregunta", array(), "any", false), "html");
        echo "';
        //convertir la cadena en minuscula
        string = string.toLowerCase();
        palClaves = palClaves.toLowerCase();
        pregunta = pregunta.toLowerCase();
        //quita tildes y caracteres especiales ademas de signos de puntuacion, agrupacion, admiracion y otros
        string = normalize(string);
        palClaves = normalize(palClaves);
        pregunta = normalize(pregunta);
        //palabras es un arreglo separador de palabras
        respuEstud = string.split(\" \");
        respuProfe = palClaves.split(\" \");
        pregunta = pregunta.split(\" \");
        //eliminar palabra iguales entre respuesta profesor y la pregunta.
        palClaves=\"\";
        for (var i in pregunta){
            for (var k in respuProfe){
                if (pregunta[i]!==respuProfe[k]){
                    palClaves = respuProfe[k]+\" \";
                }
            }
        }
        respuProfe = palClaves.split(\" \");
        
        //Retirar espacios en blanco, y palabras de union (a, de, en, un...) StopWord
        for (var i in respuEstud) {
            pal=respuEstud[i];
            if ( !invalidas(pal) ) {
                analEstud[j]=respuEstud[i];j++;
            }
        }
        j=0;
        for (var i in respuProfe) {pal=respuProfe[i];if ( !invalidas(pal) ) {analProfe[j]=respuProfe[i];j++;}}
        //ordenar el arreglo
        analEstud.sort();
        analProfe.sort();
        for (var i in analEstud ) {for (var k in analProfe ) {if (analEstud[i]===analProfe[k]) {contRep = contRep + 1;}}}
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
        //var prepos = ['un', 'una', 'unas', 'unos', 'uno', 'sobre', 'todo', 'también', 'tras', 'otro', 'algún', 'alguno', 'alguna', 'algunos', 'algunas', 'ser', 'es', 'soy', 'eres', 'somos', 'sois', 'estoy', 'esta', 'estamos', 'estais', 'estan', 'como', 'en', 'para', 'atras', 'porque', 'por qué', 'estado', 'estaba', 'ante', 'antes', 'siendo', 'ambos', 'pero', 'por', 'poder', 'puede', 'puedo', 'podemos', 'podeis', 'pueden', 'fui', 'fue', 'fuimos', 'fueron', 'hacer', 'hago', 'hace', 'hacemos', 'haceis', 'hacen', 'cada', 'fin', 'incluso', 'primero', 'desde', 'conseguir', 'consigo', 'consigue', 'consigues', 'conseguimos', 'consiguen', 'ir', 'voy', 'va', 'vamos', 'vais', 'van', 'vaya', 'gueno', 'ha', 'tener', 'tengo', 'tiene', 'tenemos', 'teneis', 'tienen', 'el', 'la', 'lo', 'las', 'los', 'su', 'aqui', 'mio', 'tuyo', 'ellos', 'ellas', 'nos', 'nosotros', 'vosotros', 'vosotras', 'si', 'dentro', 'solo', 'solamente', 'saber', 'sabes', 'sabe', 'sabemos', 'sabeis', 'saben', 'ultimo', 'largo', 'bastante', 'haces', 'muchos', 'aquellos', 'aquellas', 'sus', 'entonces', 'tiempo', 'verdad', 'verdadero', 'verdadera','cierto', 'ciertos', 'cierta', 'ciertas', 'intentar', 'intento', 'intenta', 'intentas', 'intentamos', 'intentais', 'intentan', 'dos', 'bajo', 'arriba', 'encima', 'usar', 'uso', 'usas', 'usa', 'usamos', 'usais', 'usan', 'emplear', 'empleo', 'empleas', 'emplean', 'ampleamos', 'empleais', 'valor', 'muy', 'era', 'eras', 'eramos', 'eran', 'modo', 'bien', 'cual', 'cuando', 'donde', 'mientras', 'quien', 'con', 'entre', 'sin', 'trabajo', 'trabajar', 'trabajas', 'trabaja', 'trabajamos', 'trabajais', 'trabajan', 'podria', 'podrias', 'podriamos', 'podrian', 'podriais', 'yo', 'aquel', ''];
        var prepos = [\"el\", \"ella\", \"por\", \"de\", \"los\", \"las\", \"donde\", \"contra\", \"si\", \"no\", \"para\", \"y\", \"a\", \"que\", \"este\", \"un\", \"una\", \"cada\", \"entre\", \"ellas\", \"ellos\", \"porque\", \"con\", \"\"];
        for (i in prepos ) {if (prepos[i] === str) {es = true;break;}else{es = false;}}
        return es;
    }
</script>
<h3 class=\"licencia\" style=\"line-height: normal; text-transform: none; letter-spacing: normal; margin-top: 2em; margin-bottom: 2em; display: inline-block\">
    Este recurso educativo cuenta con la licencia Atribución – No comercial <br>
    <img alt=\"Logotipo de la licencias creative commons\" style=\"width: 5em;\" src=\"../images/licencia.png\"/>
</h3>
</div>
";
        // line 277
        if (($this->getContext($context, 'estilo') == "1")) {
            // line 278
            echo "
<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    var onload = function (){
        if('";
            // line 284
            echo twig_escape_filter($this->env, $this->getContext($context, 'siguiente'), "html");
            echo "'==='1'){
            var actividad = \"Cuestionario llamado ";
            // line 285
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo ", donde acontinuación se presenta una \";
            var instruccion = \"\";
            switch('";
            // line 287
            echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
            echo "') {
                case '1':
                    actividad = actividad+'Pregunta de Elección Múltiple';
                    instruccion = 'Para conocer la pregunta pronuncia la palabra pregunta, luego pronuncia la palabra opciones, y para elegir una opción pronuncia la palabra respuesta seguido de la opción luego, confirmaremos la respuesta elegida y para calificar la respuesta pronuncia la palabra siguiente.';
                    break;
                case '2':
                    actividad = actividad+'Pregunta de Selección Múltiple';
                    break;
                case '3':
                    actividad = actividad+'Pregunta de Verdadero o Falso';
                    instruccion = 'Para conocer la pregunta pronuncia la palabra pregunta, al pronunciar respuesta deberas decir si es falso o verdadero, luego, confirmaremos la respuesta elegida y para calificar la respuesta pronuncia la palabra siguiente.';
                    break;
                case '4':
                    actividad = actividad+'Pregunta Abierta';
                    instruccion = \"Pronuncia preguntar para conocer la pregunta y responder seguido de la respuesta para dar solución a la pregunta, luego confirmaremos la respuesta y puedes mensionar la palabra siguiente para calificar la respuesta.\";
                    break;
                case '5':
                    actividad = 'Libro llamado ";
            // line 304
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "';
                    instruccion = 'Para iniciar la lectura del libro pronuncia continuar, para cambiar de página mensiona siguiente o atrás.';
                    break;
                case '6':
                    actividad = 'Escribelo llamado ";
            // line 308
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "';
                    instruccion = 'Pronuncia la palabra titulo y luego la palabra contenido, para continuar con otro ítem pronuncia siguiente.';
                    break;
                case '7':
                    actividad = 'Emparejados llamado ";
            // line 312
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "';
                    break;
                case '8':
                    actividad = 'Ordénalo llamado ";
            // line 315
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "';
                    break;
                /*default:
                    default break;*/
            }
            var texto = \"Esta es la visualización del recurso \"+actividad+\", aquí podras ver el contenido. Recuerda que puede consultar el menú o cerrar sesión.  \"+instruccion;
        }else if('";
            // line 321
            echo twig_escape_filter($this->env, $this->getContext($context, 'siguiente'), "html");
            echo "'==='0'){
            var texto = '";
            // line 322
            echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
            echo ", pronuncia continuar para la siguiente pregunta';
        }else if('";
            // line 323
            echo twig_escape_filter($this->env, $this->getContext($context, 'siguiente'), "html");
            echo "'==='2'){
            var texto = '";
            // line 324
            echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje2'), "html");
            echo " Para regresar pronuncia presentación.';
        }
        sintetizadorVoz(texto);
    }
</script>

";
        } elseif (($this->getContext($context, 'estilo') == "2")) {
            // line 331
            echo "
<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script type=\"text/javascript\">
    var onload = function (){
        if('";
            // line 337
            echo twig_escape_filter($this->env, $this->getContext($context, 'siguiente'), "html");
            echo "'==='1'){
            var actividad = \"Cuestionario llamado ";
            // line 338
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo ", donde acontinuación se presenta una \";
            var instruccion = \"\";
            switch('";
            // line 340
            echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
            echo "') {
                case '1':
                    actividad = actividad+'Pregunta de Elección Múltiple';
                    instruccion = 'Para conocer la pregunta pronuncia la palabra pregunta, luego pronuncia la palabra opciones, y para elegir una opción pronuncia la palabra respuesta seguido de la opción luego, confirmaremos la respuesta elegida y para calificar la respuesta pronuncia la palabra siguiente.';
                    break;
                case '2':
                    actividad = actividad+'Pregunta de Selección Múltiple';
                    break;
                case '3':
                    actividad = actividad+'Pregunta de Verdadero o Falso';
                    instruccion = 'Para conocer la pregunta pronuncia la palabra pregunta, al pronunciar respuesta deberas decir si es falso o verdadero, luego, confirmaremos la respuesta elegida y para calificar la respuesta pronuncia la palabra siguiente.';
                    break;
                case '4':
                    actividad = actividad+'Pregunta Abierta';
                    instruccion = \"Pronuncia preguntar para conocer la pregunta y responder seguido de la respuesta para dar solución a la pregunta, luego confirmaremos la respuesta y puedes mensionar la palabra siguiente para calificar la respuesta.\";
                    break;
                case '5':
                    actividad = 'Libro llamado ";
            // line 357
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "';
                    instruccion = 'Para iniciar la lectura del libro pronuncia continuar, para cambiar de página mensiona siguiente o atrás.';
                    break;
                case '6':
                    actividad = 'Escribelo llamado ";
            // line 361
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "';
                    instruccion = 'Pronuncia la palabra titulo y luego la palabra contenido, para continuar con otro ítem pronuncia siguiente.';
                    break;
                case '7':
                    actividad = 'Emparejados llamado ";
            // line 365
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "';
                    break;
                case '8':
                    actividad = 'Ordénalo llamado ";
            // line 368
            echo twig_escape_filter($this->env, $this->getContext($context, 'titulo'), "html");
            echo "';
                    break;
                /*default:
                    default break;*/
            }
            var texto = \"Esta es la visualización del recurso \"+actividad+\", aquí podras ver el contenido. Recuerda que puedes regresar diciendo página principal. O tambien puedes construir objetos educativos con iniciar sesión, pero si no puedes, registrarte en el sistema con la palabra registar. \"+instruccion;
        }else if('";
            // line 374
            echo twig_escape_filter($this->env, $this->getContext($context, 'siguiente'), "html");
            echo "'==='0'){
            var texto = '";
            // line 375
            echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje'), "html");
            echo ", pronuncia continuar para la siguiente pregunta';
        }else if('";
            // line 376
            echo twig_escape_filter($this->env, $this->getContext($context, 'siguiente'), "html");
            echo "'==='2'){
            var texto = '";
            // line 377
            echo twig_escape_filter($this->env, $this->getContext($context, 'mensaje2'), "html");
            echo " Para regresar pronuncia página principal.';
        }
        sintetizadorVoz(texto);
    }
</script>
";
        }
        // line 383
        echo "
<script src=\"http://code.jquery.com/jquery-1.12.1.js\"></script>
<script src=\"http://code.responsivevoice.org/responsivevoice.js\"></script>

<script>
    var posPagina=1;
    //var valor = localStorage.getItem(\"controlador\");
        //if(valor===\"true\"){
            \"use strict\";//inicio de la implementación de la libreria annyang para el ingreso de comandos de voz con cada una de las palabras que se implementan y que a medida de que la plataforma se mueve entre las distintas paginas, se informa las palabras que estan activas y con las que se puede logear y moverse entre ellas.
            if (annyang) {
                \"use strict\"
                var commands = {//cada una de las palabras de los comando de voz, realizaran acciones distinta, despues de cada sección de lectura de pantalla se informara que comandos de voz estan activados y las palabras que tinen que decir para cada funcionalidad y recorrido entre cada una de las pagina
                    'página principal':function(){window.location=\"index.php\";},
                    'iniciar sesión':function(){window.location=\"validar.php\";},
                    'registrar':function(){window.location=\"registro.php\";},
                    'cerrar sesión':function(){window.location=\"cierre.php\";},
                    'menú':function(){//menu e información de todos los recursos educativos y funcionalidades de la creación de recursos, presentacion, visialización, editar, eliminación y seguir.
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"Si deseas ver la página principal, pronuncia presentación. Puedes verificar tus datos personales al pronunciar información personal, pero tambien puedes realizar otras operaciones sobre los recursos educativos, solo debes mencionar la palabra visualizar, crear, editar o eliminar según la acción que requieras utilizar.\"; 
                        sintetizadorVoz(texto);
                    },//en general cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                    'presentación':function(){window.location=\"principal.php\";},
                    'visualizar':function(){window.location=\"listarRecurso.php\";},
                    'información personal':function(){window.location=\"informacionPersonal.php\";},
                    'crear':function(){window.location=\"crearRecurso.php\";},
                    'editar':function(){window.location=\"editarRecurso.php\";},
                    'eliminar':function(){window.location=\"eliminarRecurso.php\";},
                    'siguiente':function(){
                        if('";
        // line 412
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='5'){
                            posPagina++;
                            gcse.pause();
                            gcse.src = \"\";
                            var contPagina = \"#leerpag\"+posPagina;
                            sintetizadorVoz(\$(contPagina).val());
                        }else if('";
        // line 418
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='1' || '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='2' || '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='3' || '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='4' || '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='6'){
                            dispararFrom();
                        }
                    },
                    'atrás':function(){
                        if('";
        // line 423
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'===5){
                            posPagina--;
                            gcse.pause();
                            gcse.src = \"\";
                            var contPagina = \"#leerpag\"+posPagina;
                            sintetizadorVoz(\$(contPagina).val());
                        }
                    },
                    'pregunta':function(){//cada palabra que esta en verde son las palabras que se tienen que decir para moverse entre cada una de las funcionalidades de la plataforma GAIA Tools
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"";
        // line 434
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'datosPreg'), "pregunta", array(), "any", false), "html");
        echo " + recuerda pronunciar \";
                        if('";
        // line 435
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='1' || '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='2' || '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='3'){
                            texto = texto+\" la palabra opciones para listar las posibles respuestas.\";
                        }else{
                            texto = texto+\" la palabra respuesta seguido de la respuesta.\";
                        }
                        sintetizadorVoz(texto);
                    },
                    'título':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"";
        // line 445
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, 'datosPreg'), "pregunta", array(), "any", false), "html");
        echo "\";
                        sintetizadorVoz(texto);
                    },
                    'contenido':function(){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto = \"";
        // line 451
        echo twig_escape_filter($this->env, $this->getContext($context, 'respAbierta'), "html");
        echo "\";
                        sintetizadorVoz(texto);
                    },
                    'opciones' : function(){
                        gcse.pause();
                        gcse.src = \"\";
                        sintetizadorVoz(\$('#opcionesPreg').val()+\" Recuerda pronunciar la palabra respuesta seguido del número de la opción. Si necesitas repetir las posibles elecciónes pronuncia la palabra opciones.\");
                    },
                    'respuesta *v' : function(v){
                        gcse.pause();
                        gcse.src = \"\";
                        var texto =\"\"; var opcionE=\"\";
                        v = v.toLowerCase();
                        if('";
        // line 464
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='4'){
                            texto = \"Su respuesta ha sido: \"+v+\" Para continuar y calificar su respuesta pronuncie siguiente.\";
                            \$('#respuesta').val(v);
                        }else if('";
        // line 467
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='1' || '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='2' || '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='3'){
                            opcionE = \"#\"+v;
                            if(v===\"verdadero\"){ 
                                opcionE = \"#2\"; 
                            }else if(v===\"falso\"){ 
                                opcionE = \"#1\"; 
                            }
                            //var vi = \$(v).html();
                            texto = \"Su opción elegida es \"+v+\" Para continuar y calificar su respuesta pronuncie siguiente.\";//+\" \"+(opcionE).html();
                            jQuery(opcionE).attr('checked', true);
                        }
                        sintetizadorVoz(texto);
                    },
                    'continuar':function(){
                        if('";
        // line 481
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='1' || '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='2' || '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='3' || '";
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='4'){
                            dispararSiguiente();
                        }else if('";
        // line 483
        echo twig_escape_filter($this->env, $this->getContext($context, 'idCuest'), "html");
        echo "'==='5'){
                            gcse.pause();
                            gcse.src = \"\";
                            sintetizadorVoz(\$('#leerpag1').val());
                        }
                    },
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
            }
        //}
</script>

";
    }

    public function getTemplateName()
    {
        return "verRecurso.twig.html";
    }

    public function isTraitable()
    {
        return false;
    }
}
