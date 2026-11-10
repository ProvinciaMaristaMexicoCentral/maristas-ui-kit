<?php

namespace Maristas\UiKit\Tests;

use Illuminate\Support\Facades\Blade;

class ComponentesTest extends TestCase
{
    public function test_el_boton_se_renderiza_con_su_variante_y_tamano(): void
    {
        $html = Blade::render('<x-maristas::button variant="danger" size="sm" icon="ri-delete-bin-line">Eliminar</x-maristas::button>');

        $this->assertStringContainsString('Eliminar', $html);
        $this->assertStringContainsString('btn-danger', $html);
        $this->assertStringContainsString('btn-sm', $html);
    }

    public function test_el_avatar_calcula_las_iniciales(): void
    {
        $html = Blade::render('<x-maristas::avatar name="María López" />');

        $this->assertStringContainsString('ML', $html);
    }

    public function test_la_barra_principal_incluye_marca_herramientas_y_navegacion(): void
    {
        $html = Blade::render(<<<'BLADE'
            <x-maristas::topbar id="t">
                <x-slot:brand><span>Marca</span></x-slot:brand>
                <x-slot:tools><span>Herramientas</span></x-slot:tools>
                <x-maristas::nav-link href="/" :active="true">Inicio</x-maristas::nav-link>
            </x-maristas::topbar>
            BLADE);

        foreach (['Marca', 'Herramientas', 'Inicio', 'is-active', 'id="t-nav"'] as $texto) {
            $this->assertStringContainsString($texto, $html);
        }
    }

    public function test_el_banner_muestra_titulo_descripcion_y_acciones(): void
    {
        $html = Blade::render('<x-maristas::banner title="Eventos" eyebrow="Gestión" description="Texto de apoyo" icon="ri-add-line"><button>Nuevo</button></x-maristas::banner>');

        $this->assertStringContainsString('mr-banner', $html);
        $this->assertStringContainsString('Eventos', $html);
        $this->assertStringContainsString('Gestión', $html);
        $this->assertStringContainsString('Texto de apoyo', $html);
        $this->assertStringContainsString('mr-banner-actions', $html);
    }

    public function test_la_tarjeta_con_portada_muestra_titulo_etiquetas_datos_y_acciones(): void
    {
        $html = Blade::render('<x-maristas::cover-card title="Encuentro" subtitle="Convivencia" image="/x.jpg"><x-slot:tags><span>Etiqueta</span></x-slot:tags><x-slot:meta><div>Sede</div></x-slot:meta><x-slot:actions><button>Ver</button></x-slot:actions></x-maristas::cover-card>');

        foreach (['mr-cover-card', 'Encuentro', 'Convivencia', 'url(\'/x.jpg\')', 'mr-cover-tags', 'mr-cover-meta', 'mr-cover-actions'] as $esperado) {
            $this->assertStringContainsString($esperado, $html);
        }
    }

    public function test_la_tarjeta_con_portada_sin_imagen_muestra_un_icono(): void
    {
        $html = Blade::render('<x-maristas::cover-card title="Sin imagen" icon="ri-tent-line" />');

        $this->assertStringContainsString('mr-cover-empty', $html);
        $this->assertStringContainsString('ri-tent-line', $html);
    }

    public function test_el_indicador_con_icono_y_nota_los_muestra_y_sin_ellos_no_cambia(): void
    {
        $con = Blade::render('<x-maristas::stat icon="ri-user-3-line" label="Alumno" value="9034" hint="Nota" />');
        $sin = Blade::render('<x-maristas::stat label="Activos" value="248" />');

        foreach (['mr-stat-with-icon', 'ri-user-3-line', 'mr-stat-hint', 'Nota', '9034'] as $esperado) {
            $this->assertStringContainsString($esperado, $con);
        }
        $this->assertStringNotContainsString('mr-stat-with-icon', $sin);
        $this->assertStringNotContainsString('mr-stat-body', $sin);
    }

    public function test_la_tarjeta_con_portada_puede_dejar_de_llenar_la_altura(): void
    {
        $llena = Blade::render('<x-maristas::cover-card title="A" />');
        $natural = Blade::render('<x-maristas::cover-card title="A" :fill="false" />');

        $this->assertStringContainsString('h-100', $llena);
        $this->assertStringNotContainsString('h-100', $natural);
    }

    public function test_la_pagina_de_documentacion_responde(): void
    {
        $this->get('/ui-kit')->assertOk()->assertSee('Maristas UI Kit');
    }

    public function test_el_css_se_sirve_con_el_tipo_correcto(): void
    {
        $this->get('/ui-kit/_assets/maristas-ui.css')->assertOk()->assertHeader('Content-Type', 'text/css; charset=UTF-8');
    }

    public function test_todas_las_paginas_del_catalogo_responden(): void
    {
        foreach (array_keys(\Maristas\UiKit\Docs\Catalogo::paginas()) as $slug) {
            $this->get('/ui-kit/'.$slug)->assertOk();
        }
    }

    public function test_una_pagina_inexistente_da_404(): void
    {
        $this->get('/ui-kit/no-existe')->assertNotFound();
    }

    public function test_los_assets_fuera_de_la_lista_blanca_dan_404(): void
    {
        $this->get('/ui-kit/_assets/composer.json')->assertNotFound();
    }

    public function test_la_guia_para_ia_cubre_tokens_componentes_y_paginas(): void
    {
        $guia = \Maristas\UiKit\Docs\GuiaIA::generar();

        $this->assertStringContainsString('`--maristas-brand`: `#0b3a6f`', $guia);
        $this->assertStringContainsString('x-maristas::button', $guia);
        $this->assertStringContainsString('variant = \'primary\'', $guia);
        $this->assertStringContainsString('`mr-dt-toolbar`', $guia);
        $this->assertStringContainsString('`--maristas-gutter`', $guia);
        $this->assertStringContainsString('`mr-page`', $guia);
        $this->assertStringContainsString('`mr-topbar-full`', $guia);
        $this->assertStringContainsString('`mr-footer-full`', $guia);
        $this->assertStringNotContainsString('x-maristas::example`', $guia);

        foreach (\Maristas\UiKit\Docs\Catalogo::paginas() as $slug => $pagina) {
            if ($slug !== 'introduccion') {
                $this->assertStringContainsString('(`'.$slug.'`)', $guia, "Falta la página {$slug}");
            }
        }

        $this->assertLessThan(strlen($guia), strlen(\Maristas\UiKit\Docs\GuiaIA::generar(false)));
    }

    public function test_la_guia_para_ia_se_sirve_como_markdown(): void
    {
        $this->get('/ui-kit/ia.md')->assertOk()->assertHeader('Content-Type', 'text/markdown; charset=UTF-8');
    }

    public function test_el_comando_escribe_la_guia_y_enlaza_a_los_agentes_sin_duplicar(): void
    {
        $dir = sys_get_temp_dir().'/mr-ia-'.uniqid();
        mkdir($dir);
        file_put_contents($dir.'/CLAUDE.md', "# Proyecto\n\nTexto previo.\n");
        $this->app->setBasePath($dir);

        $this->artisan('maristas-ui:ia', ['--agentes' => true])->assertSuccessful();
        $this->artisan('maristas-ui:ia', ['--agentes' => true])->assertSuccessful();

        $this->assertFileExists($dir.'/docs/maristas-ui.md');
        $claude = file_get_contents($dir.'/CLAUDE.md');
        $this->assertStringContainsString('Texto previo.', $claude);
        $this->assertSame(1, substr_count($claude, 'maristas-ui:inicio'));
        $this->assertFileDoesNotExist($dir.'/AGENTS.md');
    }

    public function test_el_lint_detecta_los_problemas_de_una_vista_mala(): void
    {
        $h = (new \Maristas\UiKit\Lint\Linter)->revisar(file_get_contents(__DIR__.'/fixtures/mala.blade.php'));
        $mensajes = implode("\n", array_map(fn ($x) => $x['linea'].': '.$x['mensaje'], $h));

        $this->assertStringContainsString('2: clase inventada: `mr-boton-grande`', $mensajes);
        $this->assertStringNotContainsString('mr-state-', $mensajes);
        $this->assertStringNotContainsString('mr-comentado', $mensajes);
        $this->assertStringContainsString('3: tono inválido `rojo`', $mensajes);
        $this->assertStringContainsString('locked-lable', $mensajes);
        $this->assertStringContainsString('componente inexistente: `x-maristas::inventado`', $mensajes);
        $this->assertStringContainsString('color suelto `#ff6600`', $mensajes);
        $this->assertStringContainsString('ícono solo sin `aria-label`', $mensajes);
        $this->assertStringContainsString('text-danger', $mensajes);
        $this->assertStringContainsString('2 botones principales', $mensajes);
        $this->assertStringContainsString('ícono con `me-2`', $mensajes);
    }

    public function test_el_lint_no_marca_una_vista_correcta(): void
    {
        $this->assertSame([], (new \Maristas\UiKit\Lint\Linter)->revisar(file_get_contents(__DIR__.'/fixtures/buena.blade.php')));
    }

    public function test_el_comando_lint_falla_con_errores_y_pasa_sin_ellos(): void
    {
        $this->artisan('maristas-ui:lint', ['ruta' => __DIR__.'/fixtures/mala.blade.php'])->assertFailed();
        $this->artisan('maristas-ui:lint', ['ruta' => __DIR__.'/fixtures/buena.blade.php'])->assertSuccessful();
    }

    public function test_las_vistas_de_la_documentacion_pasan_el_lint_sin_errores(): void
    {
        $linter = new \Maristas\UiKit\Lint\Linter;
        $errores = [];

        foreach (glob(__DIR__.'/../resources/views/docs/pages/*.blade.php') as $archivo) {
            foreach ($linter->revisar(file_get_contents($archivo)) as $x) {
                if ($x['nivel'] === 'error') {
                    $errores[] = basename($archivo).':'.$x['linea'].' '.$x['mensaje'];
                }
            }
        }

        $this->assertSame([], $errores);
    }

    public function test_la_paleta_de_busqueda_trae_paginas_y_ejemplos_y_el_script_se_sirve(): void
    {
        $html = $this->get('/ui-kit/botones')->assertOk()->getContent();
        $this->assertStringContainsString('id="mr-palette"', $html);
        $this->assertStringContainsString('data-mr-base="/ui-kit"', $html);

        preg_match('#<script type="application/json" id="mr-search-index">(.*?)</script>#s', $html, $m);
        $indice = json_decode($m[1], true);
        $this->assertNotEmpty($indice);

        $tipos = array_count_values(array_column($indice, 'tipo'));
        $this->assertSame(count(\Maristas\UiKit\Docs\Catalogo::paginas()), $tipos['pagina']);
        $this->assertGreaterThan(20, $tipos['ejemplo']);
        $this->assertContains('/ui-kit/botones#variantes', array_map(fn ($e) => parse_url($e['url'], PHP_URL_PATH).'#'.(parse_url($e['url'], PHP_URL_FRAGMENT) ?? ''), $indice));

        $this->get('/ui-kit/_assets/maristas-docs.js')->assertOk();
        $this->get('/ui-kit/_assets/maristas-favicon.svg')->assertOk()->assertHeader('Content-Type', 'image/svg+xml');
        $this->assertStringContainsString('rel="icon"', $html);
    }

    public function test_lint_respeta_regiones_marcadas_para_ignorar(): void
    {
        $linter = new \Maristas\UiKit\Lint\Linter();
        $vista = "<div style=\"color:#ff0000\">fuera</div>\n{{-- mr-lint:off correo --}}\n<div style=\"color:#00ff00\">dentro</div>\n{{-- mr-lint:on --}}\n";

        $hallazgos = $linter->revisar($vista);

        $this->assertCount(1, $hallazgos);
        $this->assertSame(1, $hallazgos[0]['linea']);
    }

    public function test_lint_no_revisa_las_carpetas_excluidas(): void
    {
        $dir = sys_get_temp_dir().'/mr-lint-'.uniqid();
        mkdir($dir.'/emails', 0777, true);
        file_put_contents($dir.'/emails/correo.blade.php', '<div style="color:#ff0000">correo</div>');
        file_put_contents($dir.'/pantalla.blade.php', '<div>ok</div>');

        $this->artisan('maristas-ui:lint', ['ruta' => $dir])->assertExitCode(0);

        unlink($dir.'/emails/correo.blade.php');
        unlink($dir.'/pantalla.blade.php');
        rmdir($dir.'/emails');
        rmdir($dir);
    }

    public function test_lint_no_marca_iconos_con_color_ni_botones_en_modales_o_condicionales(): void
    {
        $linter = new \Maristas\UiKit\Lint\Linter();

        $this->assertSame([], $linter->revisar('<i class="ri-check-line text-success"></i>'));
        $this->assertSame([], $linter->revisar('<button class="dropdown-item text-danger">Eliminar</button><span class="spinner-border text-primary"></span>'));

        $vista = '<button class="btn btn-primary">Uno</button>'
            ."@if (\$a)<button class=\"btn btn-primary\">Alterno</button>@endif"
            .'<div class="modal fade"><button class="btn btn-primary">En modal</button></div>';
        $this->assertSame([], $linter->revisar($vista));

        $alternos = '<button class="btn btn-primary" x-show="a">Uno</button><button class="btn btn-primary" x-show="b">Dos</button>';
        $this->assertSame([], $linter->revisar($alternos));

        $dos = '<button class="btn btn-primary">Uno</button><button class="btn btn-primary">Dos</button>';
        $this->assertCount(1, $linter->revisar($dos));
    }
}
