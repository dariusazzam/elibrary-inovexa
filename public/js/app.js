/* Path ikon Lucide minimal untuk kebutuhan JS (samakan dengan <x-icon>) */
const ICON_PATHS = {
  check: '<path d="M20 6 9 17l-5-5"/>',
  'triangle-alert': '<path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3"/><path d="M12 9v4"/><path d="M12 17h.01"/>'
};

/**
 * Tampilkan notifikasi singkat.
 * @param {string} msg  pesan teks
 * @param {string} [icon]  nama ikon Lucide; bila diisi, teks tetap di-escape manual
 */
function toast(msg, icon) {
  const t = document.getElementById('toast');
  if (!t) return;
  if (icon && ICON_PATHS[icon]) {
    const svg = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" ' +
      'stroke-linecap="round" stroke-linejoin="round" class="icon" ' +
      'style="vertical-align:-.125em;margin-right:6px" aria-hidden="true">' + ICON_PATHS[icon] + '</svg>';
    const span = document.createElement('span');
    span.textContent = msg;
    t.innerHTML = svg;
    t.appendChild(span);
  } else {
    t.textContent = msg;
  }
  t.className = 's';
  clearTimeout(toast.x);
  toast.x = setTimeout(() => (t.className = ''), 2600);
}

function eye(...ids) {
  const targetIds = ids.length ? ids : ['p'];
  targetIds.forEach(id => {
    const el = document.getElementById(id);
    if (el) {
      el.type = el.type === 'password' ? 'text' : 'password';
    }
  });
}

function openModal(id) {
  const el = document.getElementById(id);
  if (el) el.style.display = 'grid';
}

function closeModal(id) {
  const el = document.getElementById(id);
  if (el) el.style.display = 'none';
}

if (window.TOAST) toast(window.TOAST);
