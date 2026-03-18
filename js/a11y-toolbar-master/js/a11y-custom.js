/* public/assets/js/a11y-custom.js
   Extiende la toolbar (a11y-toolbar.js) con controles avanzados.
   Cargar después de a11y-toolbar.js (usar defer)
*/
(function () {
  'use strict';

  const KEY = 'ci_uni_a11y_v1';
  const DEFAULTS = {
    saturation: 1,
    invert: false,
    highlightLinks: false,
    fontScale: 1.0,
    lineHeight: 1.5,
    letterSpacing: 0,
    textAlign: 'left',
    contrast: 1,
    hideMedia: false,
    cursor: 'default',
    ttsActive: false,
    readingMode: false,
    colorFilter: 'none' // 'none', 'protanopia', 'deuteranopia', 'tritanopia', 'monocromo'
  };


  const TOOLBAR_SELECTORS = [
    '.a11y-toolbar',
    '.accessibility-toolbar',
    '#a11y-toolbar',
    '.a11y',
    '[data-a11y-toolbar]'
  ];

  function $(s, ctx = document) {
    return ctx.querySelector(s);
  }

  function $all(s, ctx = document) {
    return Array.from(ctx.querySelectorAll(s));
  }

  function loadState() {
    try {
      const raw = localStorage.getItem(KEY);
      return raw ? JSON.parse(raw) : { ...DEFAULTS };
    } catch (e) {
      return { ...DEFAULTS };
    }
  }

  function saveState(state) {
    try {
      localStorage.setItem(KEY, JSON.stringify(state));
    } catch (e) { }
  }

  function applyState(state) {
    const doc = document.documentElement;
    doc.style.setProperty('--a11y-font-scale', state.fontScale);
    doc.style.setProperty('--a11y-line-height', state.lineHeight);
    doc.style.setProperty('--a11y-letter-spacing', state.letterSpacing + 'px');
    doc.style.setProperty('--a11y-text-align', state.textAlign);
    doc.style.setProperty('--a11y-saturation', state.saturation);
    doc.style.setProperty('--a11y-contrast', state.contrast);
    doc.style.setProperty('--a11y-invert', state.invert ? 1 : 0);

    document.body.classList.toggle('a11y-highlight-links', !!state.highlightLinks);
    document.body.classList.toggle('a11y-hide-media', !!state.hideMedia);
    document.body.classList.remove('cursor-large', 'cursor-dot');


    document.documentElement.classList.remove(
      'a11y-filter-protanopia',
      'a11y-filter-deuteranopia',
      'a11y-filter-tritanopia',
      'a11y-filter-monocromo'
    );


    if (state.colorFilter !== 'none') {
      document.documentElement.classList.add(`a11y-filter-${state.colorFilter}`);
    }

    document.body.classList.toggle('a11y-reading-mode', !!state.readingMode);

    if (state.cursor === 'large') document.body.classList.add('cursor-large');
    if (state.cursor === 'dot') document.body.classList.add('cursor-dot');

    if (!state.ttsActive) {
      window.speechSynthesis.cancel();
      document.querySelectorAll('.a11y-tts-highlight').forEach(el => {
        el.classList.remove('a11y-tts-highlight');
      });
    }



    window.__CI_A11Y_STATE = state;
  }


  function injectColorFilters() {
    if (document.getElementById('a11y-filters-svg')) return;
    const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.id = "a11y-filters-svg";
    svg.style.display = "none";
    svg.innerHTML = `
        <defs>
            <filter id="protanopia"><feColorMatrix values="0.567,0.433,0,0,0 0.558,0.442,0,0,0 0,0.242,0.758,0,0 0,0,0,1,0"/></filter>
            <filter id="deuteranopia"><feColorMatrix values="0.625,0.375,0,0,0 0.7,0.3,0,0,0 0,0.3,0.7,0,0 0,0,0,1,0"/></filter>
            <filter id="tritanopia"><feColorMatrix values="0.95,0.05,0,0,0 0,0.433,0.567,0,0 0,0.475,0.525,0,0 0,0,0,1,0"/></filter>
        </defs>`;
    document.body.appendChild(svg);
  }


  let lastClickedElement = null;
  let lastClickTime = 0;



  function initTtsEngine() {
    const readableTags = ['P', 'H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'A', 'LI', 'SPAN', 'IMG', 'TH', 'TD', 'LABEL', 'BUTTON'];

    const getLatamVoice = () => {
      const voices = window.speechSynthesis.getVoices();
      let voice = voices.find(v => v.lang === 'es-AR' || v.lang.includes('es_AR'));
      if (!voice) voice = voices.find(v => v.lang.includes('es-MX') || v.lang.includes('es-419'));
      return voice;
    };

    document.addEventListener('mouseover', (e) => {
      const state = window.__CI_A11Y_STATE;
      if (!state || !state.ttsActive) return;


      if (e.target.closest('#ci-a11y-toggle') || e.target.closest('#ci-a11y-custom-panel')) return;

      const target = e.target.closest(readableTags.join(','));
      document.querySelectorAll('.a11y-tts-highlight').forEach(el => el.classList.remove('a11y-tts-highlight'));
      if (target) target.classList.add('a11y-tts-highlight');
    });

    document.addEventListener('click', (e) => {
      const state = window.__CI_A11Y_STATE;
      if (!state || !state.ttsActive) return;


      if (e.target.closest('#ci-a11y-toggle') || e.target.closest('#ci-a11y-custom-panel')) {
        return;
      }

      const target = e.target.closest(readableTags.join(','));
      if (!target) return;

      const currentTime = Date.now();
      const isSameElement = (target === lastClickedElement);
      const isSecondClick = isSameElement && (currentTime - lastClickTime < 1000);


      const interactive = target.closest('a, button');

      if (isSecondClick && interactive) {
        window.speechSynthesis.cancel();
        lastClickedElement = null;

        return;
      }


      e.preventDefault();
      e.stopPropagation();

      lastClickedElement = target;
      lastClickTime = currentTime;

      let text = "";
      const tag = target.tagName;


      if (tag === 'TH') {
        const dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        text = dias[target.cellIndex] || target.innerText;
      }
      else if (tag === 'TD') {
        const mesHeader = target.closest('.mes')?.querySelector('h1')?.innerText.trim() || "";
        const nums = Array.from(target.querySelectorAll('span'))
          .map(s => s.innerText.trim())
          .filter(t => !isNaN(t) && t !== "");

        if (nums.length > 1) {
          text = `${nums.join(' y ')} de ${mesHeader}`;
        } else {
          const contenido = target.innerText.trim();
          text = (!isNaN(contenido) && contenido !== "") ? `${contenido} de ${mesHeader}` : contenido;
        }
      }
      else if (tag === 'IMG') {
        text = target.alt || target.title || target.parentElement.getAttribute('title') || "Imagen sin descripción";
      }
      else {
        text = target.innerText || target.getAttribute('title') || "";
      }

      window.speechSynthesis.cancel();
      const utterance = new SpeechSynthesisUtterance(text.trim());
      const voice = getLatamVoice();
      if (voice) utterance.voice = voice;
      utterance.lang = 'es-AR';
      window.speechSynthesis.speak(utterance);

    }, true);
  }





  function createControlsPanel() {
    const panelId = 'ci-a11y-custom-panel';

    const existing = document.getElementById(panelId);
    if (existing) {
      return existing;
    }

    const panel = document.createElement('div');
    panel.id = panelId;
    panel.className =
      'a11y-custom-panel fixed bottom-28 left-4 w-80 max-w-[90vw] bg-white dark:bg-slate-800 p-3 rounded shadow-lg ring-1 ring-slate-200 z-[9999]';
    panel.setAttribute('role', 'dialog');
    panel.setAttribute('aria-modal', 'false');
    panel.setAttribute('aria-hidden', 'true');

    panel.innerHTML = `
      <div class="flex items-center justify-between mb-2">
        <strong class="text-sm">Preferencias de accesibilidad</strong>
        <button id="ci-a11y-close" aria-label="Cerrar panel" class="ml-2 p-1 rounded focus:outline-none">✕</button>
      </div>
      <div id="ci-a11y-controls" class="text-sm space-y-2">
      <div class="control-row">
    <label><input id="ci-a11y-tts" type="checkbox"> Texto a voz (clic para leer)</label>
</div>
<!--div class="control-row">
    <label><input id="ci-a11y-read-mode" type="checkbox"> Activar modo lectura</label>
</div-->
<div class="control-row">
    <label for="ci-a11y-filter">Modo de color (Daltonismo)</label>
    <select id="ci-a11y-filter" class="ml-2 border rounded">
        <option value="none">Normal</option>
        <option value="protanopia">Protanopía (Rojo)</option>
        <option value="deuteranopia">Deuteranopía (Verde)</option>
        <option value="tritanopia">Tritanopía (Azul)</option>
        <option value="monocromo">Monocromo</option>
    </select>
</div>
        <div class="control-row">
          <label for="ci-a11y-sat">Saturación</label>
          <input id="ci-a11y-sat" type="range" min="0" max="2" step="0.01">
        </div>

        <div class="control-row"><label><input id="ci-a11y-inv" type="checkbox"> Invertir colores</label></div>
        <div class="control-row"><label><input id="ci-a11y-hl" type="checkbox"> Enlaces resaltados</label></div>

        <div class="control-row">
          <label for="ci-a11y-font">Tamaño fuente</label>
          <input id="ci-a11y-font" type="range" min="0.8" max="1.6" step="0.01">
        </div>

        <div class="control-row">
          <label for="ci-a11y-line">Altura línea</label>
          <input id="ci-a11y-line" type="range" min="1" max="2" step="0.01">
        </div>

        <div class="control-row">
          <label for="ci-a11y-letter">Espaciado letras</label>
          <input id="ci-a11y-letter" type="range" min="0" max="5" step="0.1">
        </div>

        <div class="control-row">
          <label for="ci-a11y-align">Alinear</label>
          <select id="ci-a11y-align" class="ml-2">
            <option value="left">Izquierda</option>
            <option value="center">Centrado</option>
            <option value="justify">Justificar</option>
            <option value="right">Derecha</option>
          </select>
        </div>

        <div class="control-row">
          <label for="ci-a11y-contrast">Contraste</label>
          <input id="ci-a11y-contrast" type="range" min="0.5" max="2" step="0.01">
        </div>

        <div class="control-row"><label><input id="ci-a11y-hide-media" type="checkbox"> Ocultar imágenes / videos</label></div>

        <div class="control-row">
          <label for="ci-a11y-cursor">Cursor</label>
          <select id="ci-a11y-cursor" class="ml-2">
            <option value="default">Normal</option>
            <option value="large">Grande</option>
            <option value="dot">Punto</option>
          </select>
        </div>

        <div class="flex gap-2 mt-3">
          <button id="ci-a11y-reset" class="flex-1 bg-red-600 text-white p-2 rounded">Reestablecer</button>
          <button id="ci-a11y-save" class="flex-1 bg-slate-200 dark:bg-blue-900 p-2 rounded">Guardar</button>
        </div>
      </div>
    `;

    document.body.appendChild(panel);

    const addedPanel = document.getElementById(panelId);
    if (!addedPanel) {
      console.error('ERROR: No se pudo agregar el panel al DOM');
      return null;
    }

    return addedPanel;
  }

  function createToggleButton() {
    var miThemeData = "/wp-content/themes/Carreras-UNSL/imagenes/accesibilidad-blanco.png";
    let host = null;
    for (const sel of TOOLBAR_SELECTORS) {
      const n = document.querySelector(sel);
      if (n) { host = n; break; }
    }
    const btn = document.createElement('button');
    btn.id = 'ci-a11y-toggle';
    btn.className = 'fixed bottom-4 flex justify-center items-center left-4 z-[9998] bg-blue-600 text-white rounded-full p-3 shadow-lg focus:outline-none';
    btn.setAttribute('aria-controls', 'ci-a11y-custom-panel');
    btn.setAttribute('aria-expanded', 'false');
    btn.innerHTML = `<img src="${miThemeData}" alt="Accesibilidad" class="w-6 h-6">`;
    document.body.appendChild(btn);

    return btn;
  }

  function togglePanel(show) {
    const panel = document.getElementById('ci-a11y-custom-panel');
    const btn = document.getElementById('ci-a11y-toggle');

    if (!panel || !btn) return;

    if (show === undefined) show = panel.getAttribute('aria-hidden') === 'true';

    panel.setAttribute('aria-hidden', show ? 'false' : 'true');
    btn.setAttribute('aria-expanded', show ? 'true' : 'false');
    panel.classList.toggle('hidden', !show);
  }

  function wireUi(panel) {
    if (!panel) {
      console.error('ERROR: Panel es null en wireUi');
      return;
    }

    const state = loadState();

    // Mapear elementos
    const elementMap = {
      'ci-a11y-sat': document.getElementById('ci-a11y-sat'),
      'ci-a11y-inv': document.getElementById('ci-a11y-inv'),
      'ci-a11y-hl': document.getElementById('ci-a11y-hl'),
      'ci-a11y-font': document.getElementById('ci-a11y-font'),
      'ci-a11y-line': document.getElementById('ci-a11y-line'),
      'ci-a11y-letter': document.getElementById('ci-a11y-letter'),
      'ci-a11y-align': document.getElementById('ci-a11y-align'),
      'ci-a11y-contrast': document.getElementById('ci-a11y-contrast'),
      'ci-a11y-hide-media': document.getElementById('ci-a11y-hide-media'),
      'ci-a11y-cursor': document.getElementById('ci-a11y-cursor'),
      'ci-a11y-filter': document.getElementById('ci-a11y-filter')
    };

    // Verificar que todos los elementos existen
    const missingElements = Object.keys(elementMap).filter(key => !elementMap[key]);
    if (missingElements.length > 0) {
      console.error('ERROR: Elementos faltantes:', missingElements);
      return;
    }

    // Función para sincronizar valores del estado con el UI
    const syncValues = () => {
      elementMap['ci-a11y-sat'].value = state.saturation;
      elementMap['ci-a11y-inv'].checked = state.invert;
      elementMap['ci-a11y-hl'].checked = state.highlightLinks;
      elementMap['ci-a11y-font'].value = state.fontScale;
      elementMap['ci-a11y-line'].value = state.lineHeight;
      elementMap['ci-a11y-letter'].value = state.letterSpacing;
      elementMap['ci-a11y-align'].value = state.textAlign;
      elementMap['ci-a11y-contrast'].value = state.contrast;
      elementMap['ci-a11y-hide-media'].checked = state.hideMedia;
      elementMap['ci-a11y-cursor'].value = state.cursor;
      elementMap['ci-a11y-filter'].value = state.colorFilter;

      const ttsInput = document.getElementById('ci-a11y-tts');
      if (ttsInput) ttsInput.checked = !!state.ttsActive;
    };

    const readModeInput = document.getElementById('ci-a11y-read-mode');
    if (readModeInput) readModeInput.checked = !!state.readingMode;


    syncValues();
    applyState(state);

    // Remover listeners anteriores si existen
    if (panel._a11yHandler) {
      panel.removeEventListener('input', panel._a11yHandler);
      panel.removeEventListener('change', panel._a11yHandler);
      panel.removeEventListener('click', panel._a11yHandler);
    }

    // Crear el handler único con delegación de eventos
    const handleEvent = (e) => {
      const target = e.target;
      const id = target.id;

      switch (id) {
        case 'ci-a11y-sat':
          state.saturation = +target.value;
          applyState(state);
          saveState(state);
          break;
        case 'ci-a11y-inv':
          state.invert = target.checked;
          applyState(state);
          saveState(state);
          break;
        case 'ci-a11y-hl':
          state.highlightLinks = target.checked;
          applyState(state);
          saveState(state);
          break;
        case 'ci-a11y-font':
          state.fontScale = +target.value;
          applyState(state);
          saveState(state);
          break;
        case 'ci-a11y-line':
          state.lineHeight = +target.value;
          applyState(state);
          saveState(state);
          break;
        case 'ci-a11y-letter':
          state.letterSpacing = +target.value;
          applyState(state);
          saveState(state);
          break;
        case 'ci-a11y-align':
          state.textAlign = target.value;
          applyState(state);
          saveState(state);
          break;
        case 'ci-a11y-contrast':
          state.contrast = +target.value;
          applyState(state);
          saveState(state);
          break;
        case 'ci-a11y-hide-media':
          state.hideMedia = target.checked;
          applyState(state);
          saveState(state);
          break;
        case 'ci-a11y-cursor':
          state.cursor = target.value;
          applyState(state);
          saveState(state);
          break;
        case 'ci-a11y-reset':
          localStorage.removeItem(KEY);
          Object.assign(state, DEFAULTS);
          applyState(state);
          saveState(state);
          syncValues();
          break;
        case 'ci-a11y-tts':
          state.ttsActive = target.checked;
          applyState(state);
          saveState(state);
          break;

        case 'ci-a11y-read-mode':
          state.readingMode = target.checked;
          applyState(state);
          saveState(state);
          break;

        case 'ci-a11y-filter':
          state.colorFilter = target.value;
          applyState(state);
          saveState(state);
          break;

        case 'ci-a11y-close':
          togglePanel(false);
          break;
        case 'ci-a11y-save':
          saveState(state);
          // Verificar si ya existe una notificación
          const existingNotif = document.getElementById('a11y-save-notification');
          if (existingNotif) {
            existingNotif.remove();
          }
          // Crear notificación temporal con estilos inline completos
          const notif = document.createElement('div');
          notif.id = 'a11y-save-notification';
          notif.textContent = ' Preferencias guardadas';
          notif.style.cssText = `
    position: fixed;
    top: 20px;
    right: 20px;
    background: #16a34a;
    color: white;
    padding: 12px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
    z-index: 10000;
    font-weight: 500;
    font-size: 14px;
    opacity: 0;
    transition: opacity 0.3s ease;
  `;
          document.body.appendChild(notif);
          // Fade in
          requestAnimationFrame(() => {
            notif.style.opacity = '1';
          });

          // Fade out y remover
          setTimeout(() => {
            notif.style.opacity = '0';
            setTimeout(() => {
              notif.remove();
            }, 300);
          }, 2000);
          togglePanel(false);
          break;
      }
    };

    // Guardar referencia del handler en el panel
    panel._a11yHandler = handleEvent;

    // Agregar listeners con delegación
    panel.addEventListener('input', handleEvent);
    panel.addEventListener('change', handleEvent);
    panel.addEventListener('click', handleEvent);

    // Listener para ESC (solo agregar una vez)
    if (!document._a11yEscHandler) {
      document._a11yEscHandler = (ev) => {
        if (ev.key === 'Escape') togglePanel(false);
      };
      document.addEventListener('keydown', document._a11yEscHandler);
    }
  }

  // Función de inicialización
  function initializeA11y() {
    try {
      const panel = createControlsPanel();
      if (!panel) {
        console.error('ERROR: No se pudo crear el panel');
        return false;
      }

      const toggle = createToggleButton();
      if (!toggle) {
        console.error('ERROR: No se pudo crear el botón toggle');
        return false;
      }

      panel.classList.add('hidden');

      setTimeout(() => {
        wireUi(panel);
        initTtsEngine();
        injectColorFilters();
        // Remover listener anterior del toggle si existe
        if (toggle._toggleHandler) {
          toggle.removeEventListener('click', toggle._toggleHandler);
        }

        // Crear y guardar el handler
        toggle._toggleHandler = () => togglePanel();
        toggle.addEventListener('click', toggle._toggleHandler);

        window.CI_A11Y_APPLY = applyState;
        window.CI_A11Y_LOAD = loadState;
      }, 50);

      return true;
    } catch (err) {
      console.error('a11y-custom init error', err);
      return false;
    }
  }

  // Inicialización
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeA11y);
  } else {
    initializeA11y();
  }

  window.addEventListener('load', () => {
    if (!document.getElementById('ci-a11y-custom-panel')) {
      initializeA11y();
    }
  });

})();
