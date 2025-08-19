(function () {
  function serializeScope(scopeEl) {
    const fields = scopeEl.querySelectorAll('[data-form-input="1"][name]');
    const fd = new FormData();
    fields.forEach((el) => {
      if (el.disabled) return;

      if (el.type === 'checkbox' || el.type === 'radio') {
        if (el.checked) fd.append(el.name, el.value || 'on');
      } else {
        fd.append(el.name, el.value ?? '');
      }
    });
    return fd;
  }

  // ---- NEW: валідація заповненості полів ----
  function isScopeComplete(scopeEl) {
    const fields = Array.from(scopeEl.querySelectorAll('[data-form-input="1"][name]'))
      .filter((el) => !el.disabled);

    if (!fields.length) return false;

    const hasRequired = fields.some((el) => el.required === true);

    // чи потрібно враховувати поле в перевірці
    const considered = (el) => hasRequired ? el.required === true : true;

    // зібрати групи radio/checkbox за name
    const groups = new Map(); // name -> { required:boolean, anyChecked:boolean, hasInputs:boolean }
    for (const el of fields) {
      if ((el.type === 'checkbox' || el.type === 'radio') && considered(el)) {
        const g = groups.get(el.name) || { required: false, anyChecked: false, hasInputs: false };
        g.required = g.required || true;          // якщо група у «considered»
        g.anyChecked = g.anyChecked || el.checked;
        g.hasInputs = true;
        groups.set(el.name, g);
      }
    }

    // перевірка не-булевих інпутів
    for (const el of fields) {
      if (!considered(el)) continue;

      if (el.type === 'checkbox' || el.type === 'radio') {
        // групи перевіримо нижче
        continue;
      }

      const tag = el.tagName.toLowerCase();

      if (el.type === 'file') {
        if (!(el.files && el.files.length > 0)) return false;
        continue;
      }

      if (tag === 'select') {
        if ((el.value ?? '').trim() === '') return false;
        continue;
      }

      // текстові/числові/мейл/тощо
      if ((el.value ?? '').toString().trim() === '') return false;
    }

    // перевірка груп чекбоксів/радіо
    for (const [, g] of groups) {
      if (g.required && g.hasInputs && !g.anyChecked) return false;
    }

    const consentCheckbox = scopeEl.querySelector('.cc-input[type="checkbox"][required]');
    if (consentCheckbox && !consentCheckbox.checked) return false;

    return true;
  }

  function updateButtonActiveState(btn, scopeEl) {
    const complete = isScopeComplete(scopeEl);
    btn.classList.toggle('active', complete);
  }

  async function sendForm({ action, method, scopeEl, button, successMessage, errorMessage }) {
    const originalText = button.textContent;
    button.disabled = true;
    button.classList.add('is-loading');

    try {
      const fd = serializeScope(scopeEl);
      const fetchOpts = {
        method: method || 'POST'
      };

      if ((method || 'POST').toUpperCase() === 'GET') {
        const params = new URLSearchParams();
        for (const [k, v] of fd.entries()) params.append(k, v);
        const url = action.includes('?') ? `${action}&${params}` : `${action}?${params}`;
        const res = await fetch(url, { method: 'GET', credentials: 'same-origin' });
        if (!res.ok) throw new Error('Network error');
      } else {
        fetchOpts.body = fd;
        fetchOpts.credentials = 'same-origin';
        const res = await fetch(action, fetchOpts);
        if (!res.ok) throw new Error('Network error');
      }

      // Успіх
      button.classList.remove('is-loading');
      button.classList.add('is-success');
      if (successMessage) alert(successMessage);
      button.textContent = originalText;
    } catch (e) {
      button.classList.remove('is-loading');
      button.classList.add('is-error');
      if (errorMessage) alert(errorMessage);
      console.error('[form-components] submit failed:', e);
      button.textContent = originalText;
    } finally {
      button.disabled = false;
      setTimeout(() => {
        button.classList.remove('is-success', 'is-error');
      }, 1200);
    }
  }

  function bindValidation(btn, scopeEl) {
    if (!scopeEl || btn.__fcValBound) return;
    btn.__fcValBound = true;

    const handler = () => updateButtonActiveState(btn, scopeEl);
    // перша ініціалізація
    handler();

    // делеговані події на всю область форми
    scopeEl.addEventListener('input', handler);
    scopeEl.addEventListener('change', handler);
  }

  function initOnce(root = document) {
    root.querySelectorAll('[data-form-submit="1"]').forEach((btn) => {
      if (btn.__fcBound) return;
      btn.__fcBound = true;

      const scopeClass = btn.getAttribute('data-scope-class') || '.form-scope';
      const action = btn.getAttribute('data-action') || '/';
      const method = (btn.getAttribute('data-method') || 'POST').toUpperCase();
      const successMessage = btn.getAttribute('data-success-message') || 'OK';
      const errorMessage = btn.getAttribute('data-error-message') || 'Error';

      const scopeEl = document.querySelector(scopeClass);
      if (!scopeEl) {
        console.warn('[form-components] scope element not found:', scopeClass);
      } else {
        // підвʼязуємо live‑перевірку і оновлення класу active
        bindValidation(btn, scopeEl);
      }

      btn.addEventListener('click', (e) => {
        e.preventDefault();

        const scopeElNow = document.querySelector(scopeClass);
        if (!scopeElNow) {
          console.warn('[form-components] scope element not found:', scopeClass);
          alert('Не знайдено контейнер форми: ' + scopeClass);
          return;
        }

        sendForm({ action, method, scopeEl: scopeElNow, button: btn, successMessage, errorMessage });
      });
    });
  }

  document.addEventListener('DOMContentLoaded', () => initOnce(document));
  // На випадок динамічних вставок
  document.addEventListener('wp-block-render', (e) => initOnce(e.target || document));
})();
