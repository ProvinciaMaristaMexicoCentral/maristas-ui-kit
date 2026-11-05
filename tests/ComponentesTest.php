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
}
