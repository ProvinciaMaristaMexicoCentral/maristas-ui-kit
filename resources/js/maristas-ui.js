/*!
 * Maristas UI · comportamientos ligeros (JavaScript puro, sin dependencias).
 * Opcional: los componentes se ven igual sin este archivo; aquí solo viven los comportamientos.
 * Requiere Bootstrap 5 JS para menús, modales y paneles.
 */
(function () {
    'use strict';

    var $ = function (sel, ctx) { return (ctx || document).querySelector(sel); };
    var $$ = function (sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); };
    var normalizar = function (s) { return (s || '').toString().normalize('NFD').replace(/[̀-ͯ]/g, '').toLowerCase().trim(); };

    /* ---------- Barra principal en pantallas angostas ---------- */
    document.addEventListener('click', function (e) {
        var boton = e.target.closest('[data-mr-toggle]');
        if (!boton) return;
        var panel = $(boton.getAttribute('data-mr-toggle'));
        if (!panel) return;
        var abierto = panel.classList.toggle('is-open');
        boton.setAttribute('aria-expanded', abierto ? 'true' : 'false');
    });

    /* ---------- Ejemplos: pestañas Vista previa / Código y copiar ---------- */
    document.addEventListener('click', function (e) {
        var tab = e.target.closest('[data-mr-tab]');
        if (tab) {
            var ejemplo = tab.closest('.mr-example');
            $$('[data-mr-tab]', ejemplo).forEach(function (t) { t.classList.toggle('is-active', t === tab); });
            $$('[data-mr-pane]', ejemplo).forEach(function (p) { p.hidden = p.getAttribute('data-mr-pane') !== tab.getAttribute('data-mr-tab'); });
            return;
        }
        var copiar = e.target.closest('[data-mr-copy]');
        if (copiar) {
            var texto = $('code', copiar.parentNode).textContent;
            var listo = function () {
                var span = $('span', copiar);
                span.textContent = 'Copiado';
                setTimeout(function () { span.textContent = 'Copiar'; }, 1400);
            };
            if (navigator.clipboard) navigator.clipboard.writeText(texto).then(listo);
        }
    });

    /* ---------- Tablas de datos: búsqueda, filtro, orden, selección y paginación ---------- */
    function iniciarTabla(raiz) {
        var cuerpo = $('tbody', raiz);
        var filas = $$('tr', cuerpo).filter(function (tr) { return !tr.hasAttribute('data-mr-empty'); });
        var vacio = $('[data-mr-empty]', raiz);
        var buscador = $('[data-mr-search]', raiz);
        var filtro = $('[data-mr-filter]', raiz);
        var info = $('[data-mr-info]', raiz);
        var pager = $('[data-mr-pager]', raiz);
        var selectorTamano = $('[data-mr-page-size-select]', raiz);
        var todas = $('[data-mr-select-all]', raiz);
        var lote = $('[data-mr-bulk]', raiz);
        var contador = $('[data-mr-selected]', raiz);
        var tamano = parseInt(raiz.getAttribute('data-mr-page-size') || '10', 10);
        var pagina = 1;
        var orden = { col: null, dir: 1 };

        var celda = function (tr, i) { var td = tr.children[i]; return td ? (td.getAttribute('data-sort') || td.textContent.trim()) : ''; };

        function coincidentes() {
            var q = normalizar(buscador ? buscador.value : '');
            var col = filtro ? parseInt(filtro.getAttribute('data-mr-filter'), 10) : -1;
            var val = filtro ? normalizar(filtro.value) : '';
            return filas.filter(function (tr) {
                var okTexto = !q || normalizar(tr.textContent).indexOf(q) !== -1;
                var okFiltro = !val || normalizar(celda(tr, col)) === val;
                return okTexto && okFiltro;
            });
        }

        function pintar() {
            var lista = coincidentes();
            if (orden.col !== null) {
                lista.sort(function (a, b) {
                    var x = celda(a, orden.col), y = celda(b, orden.col);
                    var nx = parseFloat(x), ny = parseFloat(y);
                    var r = (!isNaN(nx) && !isNaN(ny) && String(nx) === x && String(ny) === y) ? nx - ny : x.localeCompare(y, 'es', { numeric: true, sensitivity: 'base' });
                    return r * orden.dir;
                });
            }
            var paginas = Math.max(1, Math.ceil(lista.length / tamano));
            pagina = Math.min(pagina, paginas);
            var inicio = (pagina - 1) * tamano;
            var visibles = lista.slice(inicio, inicio + tamano);

            filas.forEach(function (tr) { tr.hidden = visibles.indexOf(tr) === -1; });
            lista.forEach(function (tr) { cuerpo.insertBefore(tr, vacio || null); });
            if (vacio) vacio.hidden = lista.length !== 0;

            if (info) info.textContent = lista.length ? 'Mostrando ' + (inicio + 1) + '–' + (inicio + visibles.length) + ' de ' + lista.length : 'Sin resultados';

            if (pager) {
                pager.innerHTML = '';
                var item = function (texto, destino, activo, deshabilitado, etiqueta) {
                    var li = document.createElement('li');
                    li.className = 'page-item' + (activo ? ' active' : '') + (deshabilitado ? ' disabled' : '');
                    var a = document.createElement('a');
                    a.className = 'page-link'; a.href = '#'; a.innerHTML = texto;
                    if (etiqueta) a.setAttribute('aria-label', etiqueta);
                    a.addEventListener('click', function (ev) { ev.preventDefault(); if (!deshabilitado) { pagina = destino; pintar(); } });
                    li.appendChild(a); pager.appendChild(li);
                };
                item('&lsaquo;', pagina - 1, false, pagina === 1, 'Anterior');
                for (var p = 1; p <= paginas; p++) item(String(p), p, p === pagina, false);
                item('&rsaquo;', pagina + 1, false, pagina === paginas, 'Siguiente');
            }
            actualizarSeleccion();
        }

        function actualizarSeleccion() {
            var marcadas = $$('[data-mr-select]', raiz).filter(function (c) { return c.checked; });
            if (lote) lote.hidden = marcadas.length === 0;
            if (contador) contador.textContent = marcadas.length;
            var etiquetaLote = $('[data-mr-selected-label]', raiz);
            if (etiquetaLote) etiquetaLote.textContent = marcadas.length === 1 ? 'seleccionado' : 'seleccionados';
            if (todas) {
                var visibles = $$('[data-mr-select]', raiz).filter(function (c) { return !c.closest('tr').hidden; });
                todas.checked = visibles.length > 0 && visibles.every(function (c) { return c.checked; });
                todas.indeterminate = !todas.checked && marcadas.length > 0;
            }
            filas.forEach(function (tr) { var c = $('[data-mr-select]', tr); tr.classList.toggle('table-active', !!(c && c.checked)); });
        }

        if (buscador) buscador.addEventListener('input', function () { pagina = 1; pintar(); });
        if (filtro) filtro.addEventListener('change', function () { pagina = 1; pintar(); });
        if (selectorTamano) selectorTamano.addEventListener('change', function () { tamano = parseInt(selectorTamano.value, 10); pagina = 1; pintar(); });
        if (todas) todas.addEventListener('change', function () {
            $$('[data-mr-select]', raiz).forEach(function (c) { if (!c.closest('tr').hidden) c.checked = todas.checked; });
            actualizarSeleccion();
        });
        raiz.addEventListener('change', function (e) { if (e.target.matches('[data-mr-select]')) actualizarSeleccion(); });
        $$('th[data-mr-sort]', raiz).forEach(function (th) {
            th.tabIndex = 0; th.setAttribute('role', 'button');
            var alternar = function () {
                var i = Array.prototype.indexOf.call(th.parentNode.children, th);
                orden.dir = orden.col === i ? -orden.dir : 1; orden.col = i;
                $$('th[data-mr-sort]', raiz).forEach(function (o) { o.removeAttribute('aria-sort'); });
                th.setAttribute('aria-sort', orden.dir === 1 ? 'ascending' : 'descending');
                pintar();
            };
            th.addEventListener('click', alternar);
            th.addEventListener('keydown', function (e) { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); alternar(); } });
        });
        pintar();
    }
    $$('[data-mr-table]').forEach(iniciarTabla);

    /* ---------- Etiquetas ---------- */
    $$('[data-mr-tags]').forEach(function (raiz) {
        var campo = $('input[type="text"]', raiz);
        var nombre = raiz.getAttribute('data-mr-tags-name');
        var agregar = function (valor) {
            valor = valor.trim();
            if (!valor) return;
            var tag = document.createElement('span');
            tag.className = 'mr-tag'; tag.textContent = valor;
            var quitar = document.createElement('button');
            quitar.type = 'button'; quitar.setAttribute('aria-label', 'Quitar ' + valor); quitar.innerHTML = '&times;';
            tag.appendChild(quitar);
            if (nombre) { var oculto = document.createElement('input'); oculto.type = 'hidden'; oculto.name = nombre; oculto.value = valor; tag.appendChild(oculto); }
            raiz.insertBefore(tag, campo);
        };
        raiz.addEventListener('click', function (e) {
            var q = e.target.closest('.mr-tag button');
            if (q) q.parentNode.remove(); else campo.focus();
        });
        campo.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ',') { e.preventDefault(); agregar(campo.value); campo.value = ''; }
            else if (e.key === 'Backspace' && !campo.value) { var t = $$('.mr-tag', raiz).pop(); if (t) t.remove(); }
        });
    });

    /* ---------- Selección múltiple en menú ---------- */
    $$('[data-mr-multiselect]').forEach(function (raiz) {
        var etiqueta = $('[data-mr-multiselect-label]', raiz);
        var base = etiqueta.textContent;
        raiz.addEventListener('change', function () {
            var n = $$('input[type="checkbox"]:checked', raiz).length;
            etiqueta.textContent = n ? base + ' · ' + n : base;
        });
    });

    /* ---------- Rango con valor visible ---------- */
    $$('[data-mr-range-output]').forEach(function (salida) {
        var rango = $(salida.getAttribute('data-mr-range-output'));
        if (!rango) return;
        var formato = function (v) { return rango.getAttribute('data-mr-range-format') === 'currency' ? '$' + Number(v).toLocaleString('es-MX') : v; };
        rango.addEventListener('input', function () { salida.textContent = formato(rango.value); });
    });

    /* ---------- Zona de carga de archivos ---------- */
    $$('[data-mr-dropzone]').forEach(function (raiz) {
        var zona = $('.mr-dropzone', raiz);
        var entrada = $('input[type="file"]', raiz);
        var lista = $('[data-mr-file-list]', raiz);
        var mostrar = function (archivos) {
            Array.prototype.forEach.call(archivos, function (a) {
                var li = document.createElement('li');
                li.className = 'mr-file';
                var kb = a.size / 1024;
                li.innerHTML = '<i class="ri-file-line"></i><div class="flex-grow-1 min-w-0"><div class="d-flex justify-content-between"><span class="text-truncate"></span><span class="mr-small">' + (kb > 1024 ? (kb / 1024).toFixed(1) + ' MB' : Math.round(kb) + ' KB') + '</span></div></div>';
                $('.text-truncate', li).textContent = a.name;
                lista.appendChild(li);
            });
        };
        ['dragenter', 'dragover'].forEach(function (ev) { zona.addEventListener(ev, function (e) { e.preventDefault(); zona.classList.add('is-over'); }); });
        ['dragleave', 'drop'].forEach(function (ev) { zona.addEventListener(ev, function (e) { e.preventDefault(); zona.classList.remove('is-over'); }); });
        zona.addEventListener('drop', function (e) { mostrar(e.dataTransfer.files); });
        entrada.addEventListener('change', function () { mostrar(entrada.files); });
    });
})();
